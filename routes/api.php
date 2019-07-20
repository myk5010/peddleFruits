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
Route::get('/test', 'API\LoginController@getTest');
// 登录
Route::post('/login', 'API\LoginController@signIn');
// 注册
Route::post('/register', 'API\LoginController@register');
// auth认证过滤
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/getDetails', 'API\LoginController@getDetails');
    /*
    |--------------------------------------------------------------------------
    | 后台管理-admin
    |--------------------------------------------------------------------------
    */
    /* 小麦报价单-fruits */
    // 水果分类
    Route::get('/admin/fruits/category', 'Admin\Fruits\CategoryController@getCategory');
    // 获取水果分类详情
    Route::post('/admin/fruits/detail', 'Admin\Fruits\DetailController@getDetail');
    // 修改水果分类详情
    Route::post('/admin/fruits/saveDetail', 'Admin\Fruits\DetailController@saveDetail');
    // 图片上传
    Route::post('/admin/fruits/uploadPicture', 'Admin\Fruits\DetailController@uploadPicture');
});
