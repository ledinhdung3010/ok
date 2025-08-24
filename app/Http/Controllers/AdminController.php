<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\CompanyIntro;
use App\Models\News;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');

        }
        return view('admin.login.index');

    }
    public function dashboard()
    {
        $posts = Post::selectRaw('category_id, COUNT(*) as total')
            ->groupBy('category_id')
            ->pluck('total','category_id');
        $news=News::all()->count();
        $product = Product::all()->count();

        return view('admin.dashboard.index',compact('posts','news','product'));

    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Kiểm tra đăng nhập
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');

        } else {
            // Nếu đăng nhập thất bại, quay lại form đăng nhập với thông báo lỗi
            return redirect()->back()
                ->withInput() // giữ lại dữ liệu cũ
                ->withErrors(['login' => 'Thông tin đăng nhập không chính xác']);
        }

    }
    public function desginProduct()
    {
        $product=Post::where('category_id',1)->orderBy('id','desc')->get();
        return view('admin.desginPost.index',compact('product'));

    }
    public function createDesginProduct()
    {
        return view('admin.desginPost.create');

    }
    public function ckeditor(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return response()->json(['error' => ['message' => 'No file uploaded']], 400);
        }

        $file = $request->file('upload');

        // Validate nhanh
        $request->validate([
            'upload' => 'required|mimes:jpg,jpeg,png,gif,webp|max:50120' // 5MB
        ]);

        $path = $file->store('uploads/ckeditor', 'public');
        $url  = Storage::url($path); // => /storage/uploads/ckeditor/xxx.png

        // CKEditor 5 SimpleUpload cần "url". Trả thêm "uploaded" cho tương thích CKFinder.
        return response()->json([
            'url'      => $url,
            'uploaded' => true,
            'fileName' => basename($path),
        ]);
    }
    public function storeDesginProduct(Request $request)
    {

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120', // 5MB
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.array'          => 'Định dạng ảnh không hợp lệ',
            'image.*.image'        => 'File phải là ảnh',
            'image.*.mimes'        => 'Ảnh phải là jpg, jpeg, png, gif hoặc webp',
            'image.*.max'          => 'Mỗi ảnh tối đa 5MB',
        ]);
        $base = Str::slug($validated['title']);
        $slug = $base;
        $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $filenames = [];
        foreach ($request->file('image', []) as $file) {
            $nameOnly = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = strtolower($file->getClientOriginalExtension());
            $finalName = $nameOnly . '-' . Str::random(6) . '.' . $ext;

            // lưu vào storage/app/public/uploads/posts
            $path = $file->storeAs('uploads/posts', $finalName, 'public');
            $filenames[] = Storage::url($path); // => '/storage/uploads/posts/abc.png'

        }

        // 4) Tạo Post (category_id = 1)
        $post = Post::create([
            'title'       => $validated['title'],
            'description' => $validated['description'], // nếu cột là desc thì đổi key
            'slug'        => $slug,
            'category_id' => 1,
            'image'       => implode(',', $filenames), // "a.png,b.png,..." (đơn giản)
        ]);

        // 5) Trả về
        return redirect()
            ->route('desginProduct') // hoặc route danh sách bài viết
            ->with('success', 'Tạo thiết kế sản phẩm thành công!');

    }
    public function editDesginProduct($id)
    {
        $post = Post::findOrFail($id);
        // tách ảnh cũ thành mảng
        $oldImages = $post->image ? explode(',', $post->image) : [];
        return view('admin.desginPost.edit', compact('post', 'oldImages'));
    }
    public function updateDesginProduct(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120',
            'remove'      => 'nullable|array', // danh sách ảnh cũ cần xoá
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
        ]);

        // cập nhật slug nếu đổi title (và giữ unique)
        if ($post->title !== $validated['title']) {
            $base = \Illuminate\Support\Str::slug($validated['title']);
            $slug = $base; $i = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $base.'-'.$i++;
            }
            $post->slug = $slug;
        }

        // ảnh cũ còn giữ lại
        $current = $post->image ? explode(',', $post->image) : [];
        $toRemove = $request->input('remove', []); // mảng path ảnh cần xoá
        // lọc ra ảnh còn lại
        $kept = array_values(array_diff($current, $toRemove));

        // upload ảnh mới
        $newPaths = [];
        foreach ($request->file('image', []) as $file) {
            $nameOnly = \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = strtolower($file->getClientOriginalExtension());
            $finalName = $nameOnly.'-'.\Illuminate\Support\Str::random(6).'.'.$ext;
            $path = $file->storeAs('uploads/posts', $finalName, 'public');
            $newPaths[] = Storage::url($path);
        }

        $allPaths = array_merge($kept, $newPaths);

        // cập nhật dữ liệu
        $post->title       = $validated['title'];
        $post->description = $validated['description'];
        $post->image       = implode(',', $allPaths);
        $post->save();

        // (tuỳ chọn) Xoá file vật lý của ảnh bị remove
        // foreach ($toRemove as $p) { \Storage::disk('public')->delete($p); }

        return redirect()
            ->route('desginProduct') // hoặc route danh sách bài viết
            ->with('success', 'Cập nhật thành công');
    }

    public function destroyDesginProduct($id)
    {
        // Tìm sản phẩm theo ID
        $product = Post::findOrFail($id);

        // Xóa sản phẩm
        $product->delete();

        return redirect()
            ->route('desginProduct') // hoặc route danh sách bài viết
            ->with('success', 'Xóa thành công');
    }




    public function desginIdeas()
    {
        $product=Post::where('category_id',2)->orderBy('id','desc')->get();
        return view('admin.desginIdeas.index',compact('product'));

    }
    public function createDesginIdeas()
    {
        return view('admin.desginIdeas.create');

    }

    public function storeDesginIdeas(Request $request)
    {

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120', // 5MB
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.array'          => 'Định dạng ảnh không hợp lệ',
            'image.*.image'        => 'File phải là ảnh',
            'image.*.mimes'        => 'Ảnh phải là jpg, jpeg, png, gif hoặc webp',
            'image.*.max'          => 'Mỗi ảnh tối đa 5MB',
        ]);
        $base = Str::slug($validated['title']);
        $slug = $base;
        $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $filenames = [];
        foreach ($request->file('image', []) as $file) {
            $nameOnly = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = strtolower($file->getClientOriginalExtension());
            $finalName = $nameOnly . '-' . Str::random(6) . '.' . $ext;

            // lưu vào storage/app/public/uploads/posts
            $path = $file->storeAs('uploads/posts', $finalName, 'public');
            $filenames[] = Storage::url($path); // => '/storage/uploads/posts/abc.png'

        }

        // 4) Tạo Post (category_id = 1)
        $post = Post::create([
            'title'       => $validated['title'],
            'description' => $validated['description'], // nếu cột là desc thì đổi key
            'slug'        => $slug,
            'category_id' => 2,
            'image'       => implode(',', $filenames), // "a.png,b.png,..." (đơn giản)
        ]);

        // 5) Trả về
        return redirect()
            ->route('desginIdeas') // hoặc route danh sách bài viết
            ->with('success', 'Tạo thiết kế sản phẩm thành công!');

    }
    public function editDesginIdeas($id)
    {
        $post = Post::findOrFail($id);
        // tách ảnh cũ thành mảng
        $oldImages = $post->image ? explode(',', $post->image) : [];
        return view('admin.desginIdeas.edit', compact('post', 'oldImages'));
    }
    public function updateDesginIdeas(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120',
            'remove'      => 'nullable|array', // danh sách ảnh cũ cần xoá
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
        ]);

        // cập nhật slug nếu đổi title (và giữ unique)
        if ($post->title !== $validated['title']) {
            $base = \Illuminate\Support\Str::slug($validated['title']);
            $slug = $base; $i = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $base.'-'.$i++;
            }
            $post->slug = $slug;
        }

        // ảnh cũ còn giữ lại
        $current = $post->image ? explode(',', $post->image) : [];
        $toRemove = $request->input('remove', []); // mảng path ảnh cần xoá
        // lọc ra ảnh còn lại
        $kept = array_values(array_diff($current, $toRemove));

        // upload ảnh mới
        $newPaths = [];
        foreach ($request->file('image', []) as $file) {
            $nameOnly = \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = strtolower($file->getClientOriginalExtension());
            $finalName = $nameOnly.'-'.\Illuminate\Support\Str::random(6).'.'.$ext;
            $path = $file->storeAs('uploads/posts', $finalName, 'public');
            $newPaths[] = Storage::url($path);
        }

        $allPaths = array_merge($kept, $newPaths);

        // cập nhật dữ liệu
        $post->title       = $validated['title'];
        $post->description = $validated['description'];
        $post->image       = implode(',', $allPaths);
        $post->save();

        // (tuỳ chọn) Xoá file vật lý của ảnh bị remove
        // foreach ($toRemove as $p) { \Storage::disk('public')->delete($p); }

        return redirect()
            ->route('desginIdeas') // hoặc route danh sách bài viết
            ->with('success', 'Cập nhật thành công');
    }

    public function destroyDesginIdeas($id)
    {
        // Tìm sản phẩm theo ID
        $product = Post::findOrFail($id);

        // Xóa sản phẩm
        $product->delete();

        return redirect()
            ->route('desginIdeas') // hoặc route danh sách bài viết
            ->with('success', 'Xóa thành công');
    }







    public function sellIdeas()
    {
        $product=Post::where('category_id',3)->orderBy('id','desc')->get();
        return view('admin.sellIdeas.index',compact('product'));

    }
    public function createSellIdeas()
    {
        return view('admin.sellIdeas.create');

    }

    public function storeSellIdeas(Request $request)
    {

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120', // 5MB
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.array'          => 'Định dạng ảnh không hợp lệ',
            'image.*.image'        => 'File phải là ảnh',
            'image.*.mimes'        => 'Ảnh phải là jpg, jpeg, png, gif hoặc webp',
            'image.*.max'          => 'Mỗi ảnh tối đa 5MB',
        ]);
        $base = Str::slug($validated['title']);
        $slug = $base;
        $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $filenames = [];
        foreach ($request->file('image', []) as $file) {
            $nameOnly = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = strtolower($file->getClientOriginalExtension());
            $finalName = $nameOnly . '-' . Str::random(6) . '.' . $ext;

            // lưu vào storage/app/public/uploads/posts
            $path = $file->storeAs('uploads/posts', $finalName, 'public');
            $filenames[] = Storage::url($path); // => '/storage/uploads/posts/abc.png'

        }

        // 4) Tạo Post (category_id = 1)
        $post = Post::create([
            'title'       => $validated['title'],
            'description' => $validated['description'], // nếu cột là desc thì đổi key
            'slug'        => $slug,
            'category_id' => 3,
            'image'       => implode(',', $filenames), // "a.png,b.png,..." (đơn giản)
        ]);

        // 5) Trả về
        return redirect()
            ->route('sellIdeas') // hoặc route danh sách bài viết
            ->with('success', 'Tạo bán ý tưởng thành công!');

    }
    public function editSellIdeas($id)
    {
        $post = Post::findOrFail($id);
        // tách ảnh cũ thành mảng
        $oldImages = $post->image ? explode(',', $post->image) : [];
        return view('admin.sellIdeas.edit', compact('post', 'oldImages'));
    }
    public function updateSellIdeas(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120',
            'remove'      => 'nullable|array', // danh sách ảnh cũ cần xoá
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
        ]);

        // cập nhật slug nếu đổi title (và giữ unique)
        if ($post->title !== $validated['title']) {
            $base = \Illuminate\Support\Str::slug($validated['title']);
            $slug = $base; $i = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $base.'-'.$i++;
            }
            $post->slug = $slug;
        }

        // ảnh cũ còn giữ lại
        $current = $post->image ? explode(',', $post->image) : [];
        $toRemove = $request->input('remove', []); // mảng path ảnh cần xoá
        // lọc ra ảnh còn lại
        $kept = array_values(array_diff($current, $toRemove));

        // upload ảnh mới
        $newPaths = [];
        foreach ($request->file('image', []) as $file) {
            $nameOnly = \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = strtolower($file->getClientOriginalExtension());
            $finalName = $nameOnly.'-'.\Illuminate\Support\Str::random(6).'.'.$ext;
            $path = $file->storeAs('uploads/posts', $finalName, 'public');
            $newPaths[] = Storage::url($path);
        }

        $allPaths = array_merge($kept, $newPaths);

        // cập nhật dữ liệu
        $post->title       = $validated['title'];
        $post->description = $validated['description'];
        $post->image       = implode(',', $allPaths);
        $post->save();

        // (tuỳ chọn) Xoá file vật lý của ảnh bị remove
        // foreach ($toRemove as $p) { \Storage::disk('public')->delete($p); }

        return redirect()
            ->route('sellIdeas') // hoặc route danh sách bài viết
            ->with('success', 'Cập nhật thành công');
    }

    public function destroySellIdeas($id)
    {
        // Tìm sản phẩm theo ID
        $product = Post::findOrFail($id);

        // Xóa sản phẩm
        $product->delete();

        return redirect()
            ->route('sellIdeas') // hoặc route danh sách bài viết
            ->with('success', 'Xóa thành công');
    }


    public function category()
    {
        $product=Category::orderBy('id','desc')->get();
        return view('admin.category.index',compact('product'));

    }
    public function createCategory()
    {
        return view('admin.category.create');

    }

    public function storeCategory(Request $request)
    {

        $validated = $request->validate([
            'name'       => 'required|string|max:255',

        ], [
            'name.required'       => 'Vui lòng nhập tên danh mục',
        ]);
        $base = Str::slug($validated['name']);
        $slug = $base;
        $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $post = Category::create([
            'name'       => $validated['name'],
            'slug'        => $slug,
        ]);

        // 5) Trả về
        return redirect()
            ->route('category') // hoặc route danh sách bài viết
            ->with('success', 'Tạo danh mục sản phẩm thành công!');

    }
    public function editCategory($id)
    {
        $post = Category::findOrFail($id);
        // tách ảnh cũ thành mảng
        $oldImages = $post->image ? explode(',', $post->image) : [];
        return view('admin.category.edit', compact('post', 'oldImages'));
    }
    public function updateCategory(Request $request, $id)
    {
        $post = Category::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',

        ], [
            'name.required'       => 'Vui lòng nhập tên danh mục',

        ]);

        // cập nhật slug nếu đổi title (và giữ unique)
        if ($post->name !== $validated['name']) {
            $base = \Illuminate\Support\Str::slug($validated['name']);
            $slug = $base; $i = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $base.'-'.$i++;
            }
            $post->slug = $slug;
        }


        // cập nhật dữ liệu
        $post->name       = $validated['name'];
        $post->save();

        // (tuỳ chọn) Xoá file vật lý của ảnh bị remove
        // foreach ($toRemove as $p) { \Storage::disk('public')->delete($p); }

        return redirect()
            ->route('category') // hoặc route danh sách bài viết
            ->with('success', 'Cập nhật thành công');
    }

    public function destroyCategory($id)
    {
        // Tìm sản phẩm theo ID
        $product = Category::findOrFail($id);

        // Xóa sản phẩm
        $product->delete();

        return redirect()
            ->route('category') // hoặc route danh sách bài viết
            ->with('success', 'Xóa thành công');
    }





    public function product()
    {
        $product=Product::orderBy('id','desc')->get();
        return view('admin.product.index',compact('product'));

    }
    public function createProduct()
    {
        $categories=CategoryProduct::all();
        return view('admin.product.create',compact('categories'));

    }

    public function storeProduct(Request $request)
    {

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'desc' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120', // 5MB
            'category_id' => 'required|array|min:1', // Kiểm tra phải có ít nhất một category được chọn
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'desc.required' => 'Vui lòng nhập mô tả',
            'image.array'          => 'Định dạng ảnh không hợp lệ',
            'image.*.image'        => 'File phải là ảnh',
            'image.*.mimes'        => 'Ảnh phải là jpg, jpeg, png, gif hoặc webp',
            'image.*.max'          => 'Mỗi ảnh tối đa 5MB',
            'category_id.required' => 'Vui lòng chọn ít nhất một danh mục',  // Thông báo lỗi cho trường category_id
            'category_id.array'    => 'Danh mục phải là một mảng',             // Kiểm tra nếu category_id không phải là mảng
            'category_id.min'      => 'Vui lòng chọn ít nhất một danh mục',   // Kiểm tra nếu không có danh mục nào được chọn
        ]);

        $base = Str::slug($validated['title']);
        $slug = $base;
        $i = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $filenames = [];
        foreach ($request->file('image', []) as $file) {
            $nameOnly = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = strtolower($file->getClientOriginalExtension());
            $finalName = $nameOnly . '-' . Str::random(6) . '.' . $ext;

            // lưu vào storage/app/public/uploads/posts
            $path = $file->storeAs('uploads/posts', $finalName, 'public');
            $filenames[] = Storage::url($path); // => '/storage/uploads/posts/abc.png'

        }
        $categoryIds = $request->input('category_id', []);
        $categoryIdsString = implode(',', $categoryIds); // Convert array to string "1,2,3"


        // 4) Tạo Post (category_id = 1)
        $post = Product::create([
            'title'       => $validated['title'],
            'desc' => $validated['desc'], // nếu cột là desc thì đổi key
            'slug'        => $slug,
            'image'       => implode(',', $filenames), // "a.png,b.png,..." (đơn giản)
            'category_id' => $categoryIdsString, // Save as comma-separated string
        ]);

        // 5) Trả về
        return redirect()
            ->route('product') // hoặc route danh sách bài viết
            ->with('success', 'Tạo bán ý tưởng thành công!');

    }
    public function editProduct($id)
    {
        $post = Product::findOrFail($id);
        $categories=CategoryProduct::all();
        // tách ảnh cũ thành mảng
        $oldImages = $post->image ? explode(',', $post->image) : [];
        return view('admin.product.edit', compact('post', 'oldImages','categories'));
    }
    public function updateProduct(Request $request, $id)
    {
        $post = Product::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'desc' => 'required|string',
            'image'       => 'nullable|array|max:10',
            'image.*'     => 'image|mimes:jpg,jpeg,png,gif,webp|max:50120', // 5MB
            'category_id' => 'required|array|min:1',  // Yêu cầu ít nhất một category_id
            'remove'      => 'nullable|array',  // Danh sách ảnh cũ cần xoá
        ], [
            'title.required'       => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng nhập mô tả',
            'category_id.required' => 'Vui lòng chọn ít nhất một danh mục', // Thông báo nếu không chọn danh mục
            'category_id.array'    => 'Danh mục phải là một mảng hợp lệ',
            'category_id.min'      => 'Vui lòng chọn ít nhất một danh mục',  // Thông báo nếu mảng rỗng
        ]);


        // Cập nhật slug nếu title thay đổi
        if ($post->title !== $validated['title']) {
            $base = \Illuminate\Support\Str::slug($validated['title']);
            $slug = $base;
            $i = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $base . '-' . $i++;
            }
            $post->slug = $slug;
        }

        // Ảnh cũ còn giữ lại
        $current = $post->image ? explode(',', $post->image) : [];
        $toRemove = $request->input('remove', []); // Mảng path ảnh cần xoá
        // Lọc ra ảnh còn lại
        $kept = array_values(array_diff($current, $toRemove));

        // Upload ảnh mới
        $newPaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image', []) as $file) {
                $nameOnly = \Illuminate\Support\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $ext = strtolower($file->getClientOriginalExtension());
                $finalName = $nameOnly . '-' . \Illuminate\Support\Str::random(6) . '.' . $ext;
                $path = $file->storeAs('uploads/posts', $finalName, 'public');
                $newPaths[] = Storage::url($path);
            }
        }

        // Kết hợp ảnh cũ và ảnh mới
        $allPaths = array_merge($kept, $newPaths);

        // Cập nhật category_id, cho phép xóa hết nếu không có giá trị nào
        $categoryIds = $request->input('category_id', []);
        $categoryIdsString = !empty($categoryIds) ? implode(',', $categoryIds) : null; // Xử lý khi category_id bị bỏ trống

        // Cập nhật dữ liệu sản phẩm
        $post->title = $validated['title'];
        $post->desc = $validated['desc'];
        $post->image = implode(',', $allPaths); // Lưu đường dẫn ảnh thành chuỗi
        $post->category_id = $categoryIdsString; // Lưu category_id dưới dạng chuỗi
        $post->save();

        // (Tuỳ chọn) Xoá file vật lý của ảnh bị xoá
        if ($toRemove) {
            foreach ($toRemove as $path) {
                // Lấy đường dẫn đầy đủ của ảnh để xoá
                $fullPath = public_path('storage/' . str_replace('/storage', '', $path));
                if (file_exists($fullPath)) {
                    unlink($fullPath); // Xoá ảnh từ hệ thống
                }
            }
        }

        // Trả về thông báo thành công
        return redirect()->route('product')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroyProduct($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Xóa sản phẩm
        $product->delete();

        return redirect()
            ->route('product') // hoặc route danh sách bài viết
            ->with('success', 'Xóa thành công');
    }



    public function new()
    {
        $product=News::orderBy('id','desc')->get();
        return view('admin.new.index',compact('product'));

    }
    public function createNew()
    {
        return view('admin.new.create');

    }

    public function storeNew(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'desc'        => 'required|string',
            'image'       => 'required|image|mimes:jpg,png,gif,webp|max:50000', // Xác thực hình ảnh
            'sort'        => 'required|string',
        ], [
            'title.required' => 'Vui lòng nhập tên danh mục',
            'desc.required'  => 'Vui lòng nhập mô tả',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'image.image'     => 'Tệp tải lên phải là hình ảnh',
            'image.mimes'     => 'Chỉ hỗ trợ tệp ảnh với định dạng JPG, PNG, GIF, WebP',
            'image.max'       => 'Kích thước tệp ảnh không được vượt quá 5MB',
            'sort.required'        => 'Vui lòng nhập mô tả sơ lược',
        ]);

        // Tạo slug cho bài viết
        $base = Str::slug($validated['title']);
        $slug = $base;
        $i = 1;
        while (News::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        $image = $request->file('image');

        $finalName = time() . '-' . $image->getClientOriginalName();
        $path = $image->storeAs('uploads/posts', $finalName, 'public');  // Lưu vào thư mục 'uploads/posts' trong 'public'

        // Tạo bài viết mới
        $post = News::create([
            'title'   => $validated['title'],
            'slug'    => $slug,
            'desc'    => $validated['desc'],
            'image'   => $path, // Lưu đường dẫn hình ảnh
            'sort'    => $validated['sort'],
        ]);

        // Trả về sau khi lưu thành công
        return redirect()
            ->route('new') // Hoặc route danh sách bài viết
            ->with('success', 'Tạo danh mục sản phẩm thành công!');
    }

    public function editNew($id)
    {
        $post = News::findOrFail($id);
        return view('admin.new.edit', compact('post'));
    }
    public function updateNew(Request $request, $id)
    {
        $post = News::findOrFail($id);

        // Validate dữ liệu
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'desc'        => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:50120', // Thêm validate cho ảnh
            'sort'        => 'required|string',
        ], [
            'title.required'       => 'Vui lòng nhập tên danh mục',
            'desc.required'        => 'Vui lòng nhập mô tả',
            'image.image'          => 'Ảnh phải có định dạng đúng (JPG, PNG, GIF, WebP)',
            'image.max'            => 'Ảnh tối đa 5MB',
            'sort.required'        => 'Vui lòng nhập mô tả sơ lược',
        ]);

        // Cập nhật slug nếu đổi title (và giữ unique)
        if ($post->name !== $validated['title']) {
            $base = \Illuminate\Support\Str::slug($validated['title']);
            $slug = $base;
            $i = 1;
            while (News::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $base.'-'.$i++;
            }
            $post->slug = $slug;
        }

        // Kiểm tra nếu người dùng có tải ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có (tùy thuộc vào yêu cầu)
            if ($post->image) {
                \Storage::disk('public')->delete($post->image);
            }

            // Lưu ảnh mới vào thư mục uploads
            $image = $request->file('image');
            $imagePath = $image->store('uploads/news', 'public'); // Lưu vào thư mục 'uploads/news'

            // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
            $post->image = $imagePath;
        }

        // Cập nhật dữ liệu
        $post->title = $validated['title'];
        $post->desc  = $validated['desc'];
        $post->sort = $validated['sort'];
        $post->save();

        return redirect()
            ->route('new') // hoặc route danh sách bài viết
            ->with('success', 'Cập nhật thành công');
    }


    public function destroyNew($id)
    {
        // Tìm sản phẩm theo ID
        $product = News::findOrFail($id);

        // Xóa sản phẩm
        $product->delete();

        return redirect()
            ->route('new') // hoặc route danh sách bài viết
            ->with('success', 'Xóa thành công');
    }
    public function company()
    {
        $product=CompanyIntro::first();
        return view('admin.company.index',compact('product'));

    }
    public function updateCompany(Request $request, $id)
    {
        $post = CompanyIntro::findOrFail(1);

        $validated = $request->validate([
            'description' => 'required|string',

        ], [
            'description.required'=>'Vui lòng nhập mô tả'
        ]);




        $post->description       = $validated['description'];
        $post->save();

        // (tuỳ chọn) Xoá file vật lý của ảnh bị remove
        // foreach ($toRemove as $p) { \Storage::disk('public')->delete($p); }

        return redirect()
            ->route('company') // hoặc route danh sách bài viết
            ->with('success', 'Cập nhật thành công');
    }


}
