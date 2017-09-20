<?php

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

Route::get('/', function () {
    return view('welcome');
});

//文章列表
Route::get('/posts', '\App\Http\Controllers\PostController@index');
//创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
Route::post('/posts', '\App\Http\Controllers\PostController@store');
//文章详情
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
//编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
//删除
Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
//图片上传的方法
Route::post('/posts/upload', '\App\Http\Controllers\PostController@upload');
//评论提交
Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');
//赞
Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
//取消赞
Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');

//用户注册
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
//注册逻辑
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
//用户登录
Route::get('/login', '\App\Http\Controllers\LoginController@index');
//登录逻辑
Route::post('/login', '\App\Http\Controllers\LoginController@login');
//退出登录
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');

//个人设置
Route::get('/user', '\App\Http\Controllers\UserController@index');
Route::post('/user/setting', '\App\Http\Controllers\UserController@settingStore');
