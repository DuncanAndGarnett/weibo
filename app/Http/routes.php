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

<<<<<<< HEAD
/*-----------------------------------
 * 后台用户模块
 *-----------------------------------*/
Route::resource("/Admin/user","Admin\UserController@index");
//添加用户
Route::get("/Admin/user/create","Admin\UserController@create");
Route::post("/Admin/user/store","Admin\UserController@store");
//编辑用户
Route::get("/Admin/user/edit/{tmp}", "Admin\UserController@edit");
Route::post("/Admin/user/update", "Admin\UserController@update");
//删除用户
Route::get("/Admin/user/destroy/{tmp}", "Admin\UserController@destroy");
//修改用户 对象的分组
Route::post("/Admin/user/setGroup","Admin\UserController@setGroup");

/*------------------------------------

 * ---------------------------------- */
=======
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
>>>>>>> 10dadbbdbadd3f82f13278af6506699ad4a6b127
