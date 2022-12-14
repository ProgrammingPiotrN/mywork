<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;

use App\Http\Controllers\Client\WishlistController;


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

Route::middleware(['auth:admin'])->group(function(){

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function() {
    return view('admin.index');
})->name('admindashboard')->middleware('auth:admin');

//Admin all routes

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password')->middleware('auth:admin');

Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('update.change.password');

});

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

// Admin subsubcategory

    Route::get('/subsubcategory/view', [SubcategoryController::class, 'SubSubcategory'])->name('view.subsubcategory');

    Route::get('/subcategory/crud/{category_id}', [SubcategoryController::class, 'GetAjaxSubCategory']);

    Route::get('/subsubcategory/crud/{subcategory_id}', [SubcategoryController::class, 'GetAjaxSubSubCategory']);

    Route::post('/subsubcategory/store', [SubcategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');

    Route::get('/subsubcategory/edit/{id}', [SubcategoryController::class, 'EditSubSubCategory'])->name('subsubcategory.edit');

    Route::post('/subsubcategory/update', [SubcategoryController::class, 'UpdateSubSubCategory'])->name('subsubcategory.update');

    Route::post('/subsubcategory/delete/{id}', [SubcategoryController::class, 'DeleteSubSubCategory'])->name('subsubcategory.delete');

    });

    // Admin products

Route::prefix('product')->group(function(){

    Route::get('/addprod', [ProductController::class, 'ProductAdd'])->name('add.product');

    Route::get('/listprod', [ProductController::class, 'ProductList'])->name('product.list');

    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');

    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');

    Route::post('/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('product.delete');

    Route::post('/update', [ProductController::class, 'UpdateProduct'])->name('product.update');

    Route::post('/update/image', [ProductController::class, 'UpdateMultiImage'])->name('product_image.update');

    Route::post('/update/thamb', [ProductController::class, 'UpdateThambImage'])->name('product_thamb.update');

    Route::get('/multi/delete/{id}', [ProductController::class, 'DeleteMultiImage'])->name('productmulti.delete');

    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');

    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    
    });

Route::prefix('slider')->group(function(){

    Route::get('/view', [SliderController::class, 'Slider'])->name('slider.view');

    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

    Route::get('/edit/{id}', [SliderController::class, 'EditSlider'])->name('slider.edit');

    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

    Route::post('/delete/{id}', [SliderController::class, 'DeleteSlider'])->name('slider.delete');

    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');

    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
        
        });

//Language

    Route::get('/lang/{locale}', function ($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    });

// Product details frontend    
    Route::get('/product/details/{id}/{slug}', [IndexController::class, 'DetailsProduct']);

// Product tags frontend    
    Route::get('/product/tags/{tag}', [IndexController::class, 'TagsProduct']);    

// Subcategory frontend    
    Route::get('/product/subcategory/{subc_id}/{slug}', [IndexController::class, 'SubCategoryProduct']);  

// SubSubcategory frontend    
    Route::get('/product/subsubcategory/{subsubc_id}/{slug}', [IndexController::class, 'SubSubCategoryProduct']);

// Product model frontend    
    Route::get('/product/view/model/{id}', [IndexController::class, 'ModelProductAjax']);

// Add to cart frontend    
    Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCartAjax']);

// Small cart frontend    
    Route::get('/product/small/cart/', [CartController::class, 'AddToSmallCartAjax']);

// Removing the product from the cart frontend    
    Route::get('/smallcart/product-remove/{rowId}', [CartController::class, 'RemoveProductAjax']);

// Wishlist frontend    
    Route::post('/wishlist/{product_id}', [CartController::class, 'WishlistAjax']);
    

    
  
    // Wishlist frontend site   
        Route::get('/wishlist', [WishlistController::class, 'WishlistSite'])->name('wishlist');

        Route::get('/wishlist/my-wishlist', [WishlistController::class, 'WishlistAjax']);

        Route::get('/wishlist/remove/{id}', [WishlistController::class, 'WishlistRemoveAjax']);

   
  
    
    









            
                  




