<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Hash;

class LoginController extends Controller
{
    //前台主页
    public function login()
    {
      return view("Home.login");
    }
}