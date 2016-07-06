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

//后台用户模块
Route::any("/Admin/user","Admin\UserController@index");













/**
    ============================前台开始============================
 **/
//前台模板
Route::get("/Home","Home\IndexController@index");
//前台注册
Route::post("/Home/zc","Home\UserController@store");
//登录页面
Route::any("/Home/login","Home\LoginController@login");
