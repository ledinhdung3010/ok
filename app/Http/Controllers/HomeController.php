<?php

namespace App\Http\Controllers;

use App\Models\CompanyIntro;
use App\Models\News;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function listPost()
    {
        return view('listPost.index');

    }

    public function introduce(){
        $company=CompanyIntro::first();

        return view('introduce.index',compact('company'));
    }
    public function contact(){
        return view('contact.index');
    }
    public function news(Request $request){
        $sear = $request->s;  // Lấy từ input tìm kiếm

        // Tìm kiếm trong bảng News với title có chứa từ khóa tìm kiếm
        $news = News::where('title', 'like', '%' . $sear . '%')->get();
        return view('news.index',compact('news'));
    }
    public function detailNews($slug){
        $new=News::where('slug',$slug)->first();
        $nextPosts = News::inRandomOrder() // Lấy ngẫu nhiên
        ->take(3) // Lấy 3 bài
        ->get();

        return view('news.detail',compact('new','nextPosts'));
    }
    public function desginPost(Request $request)
    {
        $sear = $request->s;  // Lấy từ input tìm kiếm
        $post=Post::where('category_id',1)->where('title', 'like', '%' . $sear . '%')->get();
        $title='Thiết kế sản phẩm';
        return view('listPost.index',compact('post','title'));

    }
    public function desginIdeas(Request $request)
    {
        $sear = $request->s;  // Lấy từ input tìm kiếm
        $post=Post::where('category_id',2)->where('title', 'like', '%' . $sear . '%')->get();
        $title='Thiết kế ý tưởng';
        return view('listPost.index',compact('post','title'));

    }
    public function buyIdeas(Request $request)
    {
        $sear = $request->s;  // Lấy từ input tìm kiếm
        $post=Post::where('category_id',3)->where('title', 'like', '%' . $sear . '%')->get();
        $title='Bán ý tưởng';
        return view('listPost.index',compact('post','title'));

    }
    public function detailPost($slug){
        $post=Post::where('slug',$slug)->first();
        return view('listPost.detail',compact('post'));
    }
    public function listProduct(Request $request)
    {
        $sear=$request->s;
        $products = DB::table('category_product')
            ->join('product', 'category_product.id', '=', 'product.category_id') // JOIN với bảng product
                ->where('product.title', 'like', '%' . $sear . '%')
            ->select('category_product.name',
                'product.title as title',
                'product.id as id',
                'product.slug as slug',
                'product.image as image')
            ->get();

        // Nhóm sản phẩm theo category_id
        $groupedProducts = $products->groupBy('name')->toArray();
        $title='Bán sản phẩm';
        return view('listPost.product',compact('groupedProducts','title'));

    }
    public function detailProduct($slug){
        $post=Product::where('slug',$slug)->first();
        return view('listPost.detail',compact('post'));
    }

}

