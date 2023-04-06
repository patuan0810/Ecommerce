<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
Route::post('customer/update','CustomerController@update');
Route::get('customer/update','CustomerController@index');
//api admin
//danh muc
Route::get('category','CategoryController@index');
Route::post('category/create','CategoryController@store');
Route::get('category/show/{id}','CategoryController@show');
Route::post('category/update','CategoryController@update');
Route::post('category/delete','CategoryController@destroy');
//san pham
Route::get('test','DatatablesController@anyData');
Route::get('product','ProductController@index');
Route::get('product','ProductController@list_product');
Route::post('product/create','ProductController@store');
Route::post('product/delete','ProductController@destroy');
Route::get('product/show/{id}','ProductController@show_details');
Route::post('product/update','ProductController@update_product');
//don hang
Route::get('order','OrderController@list_order');
Route::post('order/update','OrderController@update');
Route::get('order/details','OrderController@details');
Route::post('order/delete','OrderController@destroy');
//khach hang
Route::get('customer','CustomerController@index');
Route::post('customer/delete','CustomerController@destroy');
//tai khoan
Route::get('user','UserController@index');
Route::post('user/delete','UserController@destroy');
//admin acc
Route::get('acc_admin','AccController@show_list_admin');
Route::post('create_acc','AccController@create_acc');
Route::post('delete_acc','AccController@destroy');
Route::post('update_acc','AccController@update');
Route::get('acc_admin/show/{id}','AccController@show');



