<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//网站首页
Route::get('/', function () {
    return view('welcome');
});

//后台首页
Route::get("/Admin","Admin\IndexController@index");

Route::get("/Admin/top","Admin\LayoutController@top");

Route::get("/Admin/left","Admin\LayoutController@left");

Route::get("/Admin/right","Admin\LayoutController@right");

//后台登录
Route::get("/Admin/login","Admin\LoginController@index");
//验证码路由
Route::get(" /Admin/captcha/{tmp}","Admin\LoginController@captcha");
//登录验证
Route::post("/Admin/logTodo","Admin\LoginController@logTodo");
//退出登录
Route::get("/Admin/logout","Admin\LoginController@logout");



//前台模板
Route::get("/Home","Home\IndexController@index");
//登录页面
Route::any("/Home/login","Home\LoginController@login");