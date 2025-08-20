<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UsefulLinksController;
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
//Route::group(['middleware' => 'page-cache'], function () {
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/assemble', [HomeController::class, 'assemble'])->name('assemble');
Route::get('/assemble-pkg', [HomeController::class, 'assemblePkg'])->name('assemble-pkg');
Route::get('/assemble/{id}', [HomeController::class, 'assemble'])->name('assemble-package');
Route::get('/terms-conditions', [HomeController::class, 'terms'])->name('terms-conditions');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/cookie', [HomeController::class, 'cookie'])->name('cookie');
Route::get('/customerInfo', [OrderController::class, 'customerInfo'])->name('customer.customerInfo');
Route::post('/productCheckout', [OrderController::class, 'productCheckout'])->name('product.checkout');
Route::get('/order', [OrderController::class, 'index'])->name('customer.order');
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/userLogin', [AuthController::class, 'login'])->name('userLogin');
Route::get('/userLogout', [AuthController::class, 'userLogout'])->name('user.logout');
Route::get('/update-order', [OrderController::class, 'updateOrder'])->name('customer.update-order');
Route::get('/update-cart-order', [OrderController::class, 'updateCartOrder'])->name('customer.update-cart-order');
Route::get('/order-success', [HomeController::class, 'orderSuccess'])->name('order-success');
Route::get('/generate-pdf', [HomeController::class, 'generatePdf'])->name('generate-pdf');
Route::get('/generate-pdf-base64', [HomeController::class, 'generatePdfBase64'])->name('generate-pdf-base64');
Route::post('/store-user-data', [HomeController::class, 'storeUserData'])->name('store-user-data');

Route::post('/getProductCart', [HomeController::class, 'getProductCart'])->name('getProductCart');


/***********  Normal Routes With Auth *********************/

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/admin', function () {
    return view('admin.login');
})->name('login');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.home');

    Route::get('/slider', [SliderController::class, 'index'])->name('admin.slider');
    Route::get('/aboutUs', [AboutController::class, 'index'])->name('admin.aboutUs');
    Route::get('/team', [TeamController::class, 'index'])->name('admin.team');
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('/setting', [SettingController::class, 'index'])->name('admin.setting');
    Route::get('/social-media', [SocialMediaController::class, 'index'])->name('admin.socialMedia');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::post('/productSequence', [ProductController::class, 'productSequence'])->name('admin.productSequence');
    Route::get('/partners', [PartnerController::class, 'index'])->name('admin.partners');
    Route::get('/packages', [PackagesController::class, 'index'])->name('admin.packages');
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/useful-link', [UsefulLinksController::class, 'index'])->name('admin.usefulLink');
});
/***********  End Normal Routes With Auth *********************/


/***********  Super Admin Routes *********************/
Route::group(['middleware' => ['auth', 'SuperAdmin'], 'prefix' => 'admin'], function () {

});

Route::group(['middleware' => ['Customer'], 'prefix' => 'customer'], function () {
    Route::get('/profile', [HomeController::class, 'customerProfile'])->name('customer-profile');
});
/***********  End Super Admin Routes *********************/

//});

