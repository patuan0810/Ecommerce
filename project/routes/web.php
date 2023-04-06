<?php

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
////////////////////////////////////////////////  CLIENT


// Route::post('loginApi',[LoginController::class, 'loginApi'])->name('loginApi');
Route::post('loginApi','LoginController@loginApi');
Route::get('dang-nhap','LoginController@show_login')->name('dang-nhap');

Route::get('dang-ky','RegisterController@show_register')->name('dang-ky');
Route::post('registerApi','RegisterController@registerApi');
Route::post('resetApi','ResetController@resetApi');
Route::get('/quen-mat-khau','ForgetController@show_forget');
//dang nhap phan quyen
Auth::routes();

Route::get('admin/dashboard', 'HomeController@adminHome')->name('admin/dashboard')->middleware('is_admin');

//dang xuat

Route::middleware('auth')->group(function(){
    
    Route::get('doi-mat-khau','ResetController@show_reset');
    Route::get('logout', 'LogoutController@logout');
    Route::get('/tai-khoan','HomeController@account');
    Route::get('/thanh-toan','HomeController@checkout');
    
});

Route::get('/tinh-trang','HomeController@order_status');
//header
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index')->name('trang-chu');
Route::get('/gioi-thieu','HomeController@introduction');
Route::get('/lien-he','HomeController@show_contact');

Route::get('/thanh-toan','CheckoutController@payment');
Route::get('/tai-khoan','HomeController@account');
Route::get('/san-pham','ProductController@show_product');

//tim kiem
Route::post('/tim-kiem','HomeController@search');

//lọc slide bar
Route::get('/thuong-hieu-san-pham/{category_id}','ProductController@show_category');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');

//cart
Route::get('/show_cart','CartController@show_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/update-quantity','CartController@update_quantity');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');

//checkout
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/shipping','CheckoutController@shipping_save');
Route::post('/order-place','CheckoutController@order_place');


//////////////////////////////////////////////////////////////////////////// ADMIN

// admin
Route::get('/','HomeController@index');
//admin

Route::get('/admin','AdminController@index');
// Route::get('/dashboard','AdminController@show_dashboard');


Route::prefix('dashboard')->group(function () {
    Route::get('/','AdminController@show_dashboard')->name('dashboard');
        Route::get('/category','CategoryController@show_category_admin'); 
        Route::get('/product','ProductController@show_product_admin');  
        Route::get('/customer','CustomerController@show_customer');
        Route::get('/user','UserController@show_user');        
        Route::get('/order','OrderController@show_order');
        Route::get('/admin','AccController@index');
        Route::get('/chart','ChartController@show_chart');
});
