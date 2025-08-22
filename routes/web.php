<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/thiet-ke', [HomeController::class, 'listPost'])->name('listPost');
Route::get('detail/{slug}', [HomeController::class, 'detailPost'])->name('detailPost');
Route::get('/introduce', [HomeController::class, 'introduce'])->name('introduce');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/new', [HomeController::class, 'news'])->name('home.new');
Route::get('/new/detail/{slug}', [HomeController::class, 'detailNews'])->name('detailNews');
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'checkLogin'])->name('handLogin');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/logout', function () {
    Auth::guard('admin')->logout();  // Đăng xuất cho admin guard
    return redirect('/admin');  // Sau khi đăng xuất, chuyển hướng về trang login
})->name('logout');
Route::get('/admin/thiet-ke-san-pham', [AdminController::class, 'desginProduct'])->name('desginProduct');
Route::get('/admin/thiet-ke-san-pham/create', [AdminController::class, 'createDesginProduct'])->name('createDesginProduct');
// routes/web.php

Route::post('/ckeditor/upload', [AdminController::class, 'ckeditor'])
    ->name('ckeditor.upload');
Route::post('/admin/thiet-ke-san-pham/store', [AdminController::class, 'storeDesginProduct'])->name('admin.storeDesginProduct');
// routes/web.php (trong group admin)
Route::get('/admin/thiet-ke-san-pham/{id}/edit', [AdminController::class, 'editDesginProduct'])
    ->name('admin.editDesginProduct');

Route::put('/admin/thiet-ke-san-pham/{id}', [AdminController::class, 'updateDesginProduct'])
    ->name('admin.updateDesginProduct');
Route::delete('/admin/thiet-ke-san-pham/delete/{id}', [AdminController::class, 'destroyDesginProduct'])->name('admin.deleteDesignProduct');

Route::get('/admin/thiet-ke-y-tuong', [AdminController::class, 'desginIdeas'])->name('desginIdeas');
Route::get('/admin/thiet-ke-y-tuong/create', [AdminController::class, 'createDesginIdeas'])->name('createDesginIdeas');
// routes/web.php


Route::post('/admin/thiet-ke-y-tuong/store', [AdminController::class, 'storeDesginIdeas'])->name('admin.storeDesginIdeas');
// routes/web.php (trong group admin)
Route::get('/admin/thiet-ke-y-tuong/{id}/edit', [AdminController::class, 'editDesginIdeas'])
    ->name('admin.editDesginIdeas');

Route::put('/admin/thiet-ke-y-tuong/{id}', [AdminController::class, 'updateDesginIdeas'])
    ->name('admin.updateDesginIdeas');
Route::delete('/admin/thiet-ke-y-tuong/delete/{id}', [AdminController::class, 'destroyDesginIdeas'])->name('admin.deleteDesignIdeas');


Route::get('/admin/ban-y-tuong', [AdminController::class, 'sellIdeas'])->name('sellIdeas');
Route::get('/admin/ban-y-tuong/create', [AdminController::class, 'createSellIdeas'])->name('createSellIdeas');
// routes/web.php


Route::post('/admin/ban-y-tuong/store', [AdminController::class, 'storeSellIdeas'])->name('admin.storeSellIdeas');
// routes/web.php (trong group admin)
Route::get('/admin/ban-y-tuong/{id}/edit', [AdminController::class, 'editSellIdeas'])
    ->name('admin.editSellIdeas');

Route::put('/admin/ban-y-tuong/{id}', [AdminController::class, 'updateSellIdeas'])
    ->name('admin.updateSellIdeas');
Route::delete('/admin/ban-y-tuong/delete/{id}', [AdminController::class, 'destroySellIdeas'])->name('admin.deleteSellIdeas');



Route::get('/ban-san-pham', [HomeController::class, 'listProduct'])->name('listProduct');








Route::get('/admin/category', [AdminController::class, 'category'])->name('category');
Route::get('/admin/category/create', [AdminController::class, 'createCategory'])->name('createCategory');
// routes/web.php


Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
// routes/web.php (trong group admin)
Route::get('/admin/category/{id}/edit', [AdminController::class, 'editCategory'])
    ->name('admin.editCategory');

Route::put('/admin/category/{id}', [AdminController::class, 'updateCategory'])
    ->name('admin.updateCategory');
Route::delete('/admin/category/delete/{id}', [AdminController::class, 'destroyCategory'])->name('admin.deleteCategory');




Route::get('/admin/product', [AdminController::class, 'product'])->name('product');
Route::get('/admin/product/create', [AdminController::class, 'createProduct'])->name('createProduct');
// routes/web.php


Route::post('/admin/product/store', [AdminController::class, 'storeProduct'])->name('admin.storeProduct');
// routes/web.php (trong group admin)
Route::get('/admin/product/{id}/edit', [AdminController::class, 'editProduct'])
    ->name('admin.editProduct');

Route::put('/admin/product/{id}', [AdminController::class, 'updateProduct'])
    ->name('admin.updateProduct');
Route::delete('/admin/product/delete/{id}', [AdminController::class, 'destroyProduct'])->name('admin.deleteProduct');






Route::get('product/detail/{slug}', [HomeController::class, 'detailProduct'])->name('detailProduct');


Route::get('/admin/new', [AdminController::class, 'new'])->name('new');
Route::get('/admin/new/create', [AdminController::class, 'createNew'])->name('createNew');
// routes/web.php


Route::post('/admin/new/store', [AdminController::class, 'storeNew'])->name('admin.storeNew');
// routes/web.php (trong group admin)
Route::get('/admin/new/{id}/edit', [AdminController::class, 'editNew'])
    ->name('admin.editNew');

Route::put('/admin/new/{id}', [AdminController::class, 'updateNew'])
    ->name('admin.updateNew');
Route::delete('/admin/new/delete/{id}', [AdminController::class, 'destroyNew'])->name('admin.deleteNew');
Route::get('/admin/company', [AdminController::class, 'company'])
    ->name('company');

Route::put('/admin/company/{id}', [AdminController::class, 'updateCompany'])
    ->name('admin.updateCompany');
Route::get('/thiet-ke-san-pham', [HomeController::class, 'desginPost'])->name('desginPost');
Route::get('/thiet-ke-y-tuong', [HomeController::class, 'desginIdeas'])->name('desginIdeas');
Route::get('/ban-y-tuong', [HomeController::class, 'buyIdeas'])->name('buyIdeas');
