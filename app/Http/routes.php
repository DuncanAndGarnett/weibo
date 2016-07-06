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

Route::get("/top","Admin\LayoutController@top");

Route::get("/left","Admin\LayoutController@left");

Route::get("/right","Admin\LayoutController@right");

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
