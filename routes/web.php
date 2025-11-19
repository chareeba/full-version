<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
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

Route::group(['middleware'=>'guest'],function(){
    Route::get('/',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::get('/forget-password',[AuthController::class,'forgetPassword'])->name('forget_password');
    Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    Route::post('/signup',[AuthController::class,'signup'])->name('signup');
});

Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/lang/{lang}',[ LanguageController::class,'switchLang'])->name('switch_lang');
Route::get('/pagination-per-page/{per_page}',[ PaginationController::class,'set_pagination_per_page'])->name('pagination_per_page');

Route::get('/product', [ProductController::class, 'index'])->name('getallproducts');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/delete', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::get('/cart', [CartController::class, 'index'])->name('getallcarts');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete', [CartController::class, 'destroy'])->name('cart.delete');
Route::get('/cart/create', [CartController::class, 'create'])->name('cart.create');
Route::get('/cart/edit', [CartController::class, 'edit'])->name('cart.edit');

Route::get('/cartItem', [CartItemController::class, 'index'])->name('getallcartitems');
Route::post('/cartItem/store', [CartItemController::class, 'store'])->name('cartItem.store');
Route::put('/cartItem/update', [CartItemController::class, 'update'])->name('cartItem.update');
Route::delete('/cartItem/delete', [CartItemController::class, 'destroy'])->name('cartItem.delete');
Route::get('/cartItem/create', [CartItemController::class, 'create'])->name('cartItem.create');
Route::get('/cartItem/edit', [CartItemController::class, 'edit'])->name('cartItem.edit');

Route::get('/category', [CategoryController::class, 'index'])->name('getallcategories');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/delete', [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');

Route::get('/coupon', [CouponController::class, 'index'])->name('getallcoupons');
Route::post('/coupon/store', [CouponController::class, 'store'])->name('coupon.store');
Route::put('/coupon/update', [CouponController::class, 'update'])->name('coupon.update');
Route::delete('/coupon/delete', [CouponController::class, 'destroy'])->name('coupon.delete');
Route::get('/coupon/create', [CouponController::class, 'create'])->name('coupon.create');
Route::get('/coupon/edit', [CouponController::class, 'edit'])->name('coupon.edit');

Route::get('/Order', [OrderController::class, 'index'])->name('getallorders');
Route::post('/Order/store', [OrderController::class, 'store'])->name('order.store');
Route::put('/Order/update', [OrderController::class, 'update'])->name('order.update');
Route::delete('/Order/delete', [OrderController::class, 'destroy'])->name('order.delete');
Route::get('/Order/create', [OrderController::class, 'create'])->name('order.create');
Route::get('/Order/edit', [OrderController::class, 'edit'])->name('order.edit');

Route::get('/OrderItem', [OrderItemController::class, 'index'])->name('getallorderitems');
Route::post('/OrderItem/store', [OrderItemController::class, 'store'])->name('orderItem.store');
Route::put('/OrderItem/update', [OrderItemController::class, 'update'])->name('orderItem.update');
Route::delete('/OrderItem/delete', [OrderItemController::class, 'destroy'])->name('orderItem.delete');
Route::get('/OrderItem/create', [OrderItemController::class, 'create'])->name('orderItem.create');
Route::get('/OrderItem/edit', [OrderItemController::class, 'edit'])->name('orderItem.edit');

Route::get('/payment', [PaymentController::class, 'index'])->name('getallpayments');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::put('/payment/update', [PaymentController::class, 'update'])->name('payment.update');
Route::delete('/payment/delete', [PaymentController::class, 'destroy'])->name('payment.delete');
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::get('/payment/edit', [PaymentController::class, 'edit'])->name('payment.edit');

Route::get('/productImage', [ProductImageController::class, 'index'])->name('getallproductimages');
Route::post('/productImage/store', [ProductImageController::class, 'store'])->name('productImage.store');
Route::put('/productImage/update', [ProductImageController::class, 'update'])->name('productImage.update');
Route::delete('/productImage/delete', [ProductImageController::class, 'destroy'])->name('productImage.delete');
Route::get('/productImage/create', [ProductImageController::class, 'create'])->name('productImage.create');
Route::get('/productImage/edit', [ProductImageController::class, 'edit'])->name('productImage.edit');

Route::get('/productvariant', [ProductVariantController::class, 'index'])->name('getallproductvariants');
Route::post('/productvariant/store', [ProductVariantController::class, 'store'])->name('productvariant.store');
Route::put('/productvariant/update', [ProductVariantController::class, 'update'])->name('productvariant.update');
Route::delete('/productvariant/delete', [ProductVariantController::class, 'destroy'])->name('productvariant.delete');
Route::get('/productvariant/create', [ProductVariantController::class, 'create'])->name('productvariant.create');
Route::get('/productvariant/edit', [ProductVariantController::class, 'edit'])->name('productvariant.edit');

Route::get('/Review', [ReviewController::class, 'index'])->name('getallreviews');
Route::post('/Review/store', [ReviewController::class, 'store'])->name('review.store');
Route::put('/Review/update', [ReviewController::class, 'update'])->name('review.update');
Route::delete('/Review/delete', [ReviewController::class, 'destroy'])->name('review.delete');
Route::get('/Review/create', [ReviewController::class, 'create'])->name('review.create');
Route::get('/Review/edit', [ReviewController::class, 'edit'])->name('review.edit');

Route::get('/setting', [SettingController::class, 'index'])->name('getallsettings');
Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');
Route::put('/setting/update', [SettingController::class, 'update'])->name('setting.update');
Route::delete('/setting/delete', [SettingController::class, 'destroy'])->name('setting.delete');
Route::get('/setting/create', [SettingController::class, 'create'])->name('setting.create');
Route::get('/setting/edit', [SettingController::class, 'edit'])->name('setting.edit');

Route::get('/Subcategory', [SubcategoryController::class, 'index'])->name('getallsubcategories');
Route::post('/Subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
Route::put('/Subcategory/update', [SubcategoryController::class, 'update'])->name('subcategory.update');
Route::delete('/Subcategory/delete', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
Route::get('/Subcategory/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
Route::get('/Subcategory/edit', [SubcategoryController::class, 'edit'])->name('subcategory.edit');

Route::get('/user', [UserController::class, 'index'])->name('getallusers');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.delete');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');

Route::get('/wishlist', [WishListController::class, 'index'])->name('getallwishlists');
Route::post('/wishlist/store', [WishListController::class, 'store'])->name('wishlist.store');
Route::put('/wishlist/update', [WishListController::class, 'update'])->name('wishlist.update');
Route::delete('/wishlist/delete', [WishListController::class, 'destroy'])->name('wishlist.delete');
Route::get('/wishlist/create', [WishListController::class, 'create'])->name('wishlist.create');
Route::get('/wishlist/edit', [WishListController::class, 'edit'])->name('wishlist.edit');

Route::get('/shippingaddress', [ShippingAddressController::class, 'index'])->name('getallshippingaddresses');
Route::post('/shippingaddress/store', [ShippingAddressController::class, 'store'])->name('shippingaddress.store');
Route::put('/shippingaddress/update', [ShippingAddressController::class, 'update'])->name('shippingaddress.update');
Route::delete('/shippingaddress/delete', [ShippingAddressController::class, 'destroy'])->name('shippingaddress.delete');
Route::get('/shippingaddress/create', [ShippingAddressController::class, 'create'])->name('shippingaddress.create');
Route::get('/shippingaddress/edit', [ShippingAddressController::class, 'edit'])->name('shippingaddress.edit');
