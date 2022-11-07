<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Frontend\IndexController;



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

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function() {
    return view('admin.index');
})->name('admindashboard');

//Admin all routes

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('update.change.password');

//User all routes

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function() {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);

Route::get('/user/login', [IndexController::class, 'UserLogin'])->name('user.login');

Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'ProfileUser'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'StoreProfileUser'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'ChangeUserPassword'])->name('change.password');

Route::post('/user/password/update', [IndexController::class, 'PasswordUserUpdate'])->name('user.password.update');

// Admin brands

Route::prefix('brand')->group(function(){

Route::get('/view', [BrandController::class, 'Brand'])->name('all.brand');

Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

Route::get('/edit/{id}', [BrandController::class, 'EditBrand'])->name('brand.edit');

Route::post('/update', [BrandController::class, 'UpdateBrand'])->name('brand.update');

Route::post('/delete/{id}', [BrandController::class, 'DeleteBrand'])->name('brand.delete');

});

// Admin category

Route::prefix('category')->group(function(){

    Route::get('/view', [CategoryController::class, 'Category'])->name('view.category');
    
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    
    Route::get('/edit/{id}', [CategoryController::class, 'EditCategory'])->name('category.edit');
    
    Route::post('/update', [CategoryController::class, 'UpdateCategory'])->name('category.update');
    
    Route::post('/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');

// Admin subcategory

    Route::get('/subcategory/view', [SubcategoryController::class, 'Subcategory'])->name('view.subcategory');
    
    Route::post('/subcategory/store', [SubcategoryController::class, 'SubcategoryStore'])->name('subcategory.store');

    Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'EditSubcategory'])->name('subcategory.edit');

    Route::post('/subcategory/update', [SubcategoryController::class, 'UpdateSubcategory'])->name('subcategory.update');

    Route::post('/subcategory/delete/{id}', [SubcategoryController::class, 'DeleteSubcategory'])->name('subcategory.delete');

// Admin Subsubcategory   

    Route::get('/subsubcategory/view', [SubcategoryController::class, 'Subsubcategory'])->name('view.subsubcategory');

    });

    // Admin products

Route::prefix('product')->group(function(){

    Route::get('/add', [ProductController::class, 'ProductAdd'])->name('add.product');
    
    });




