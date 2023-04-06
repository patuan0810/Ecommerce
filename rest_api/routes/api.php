<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ResetController;
use App\Http\Controllers\API\LogoutController;

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
Route::prefix('client')->group(function(){
    Route::resource('api_all_product', 'ApiProductController')->only('index','store','show');
    Route::resource('api_all_category', 'ApiCategoryController')->only('index');
    Route::get('api_order', 'ApiOrder@index');
    Route::get('api_customer/{user_email}', 'ApiOrder@customer');
    Route::get('api_all_canon', 'ApiCategoryController@category_name');
    Route::get('api_product_details/{product_id}', 'ApiProductController@detail');
    Route::get('api_category_id/{category_id}', 'ApiCategoryController@cate_by_id');
});
// Route::post('dang-nhap','API\LoginController@login');
Route::post('dang-nhap',[LoginController::class, 'login']);

// Route::post('dang-ky',[RegisterController::class, 'register']);
Route::post('dang-ky',[RegisterController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dang-xuat',[LogoutController::class, 'logout']);
    Route::post('doi-mat-khau',[ResetController::class, 'reset']);
});
