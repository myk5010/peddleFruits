<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// 测试
Route::get('test', 'API\LoginController@getTest');
// 登录
Route::post('login', 'API\LoginController@signIn');
// auth认证过滤
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('getDetails', 'API\LoginController@getDetails');
});
