<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Hash;

class IndexController extends Controller
{
    //前台主页
    public function index(Request $request)
    {
       $message=DB::select('select * from message');
        return view("Home.index",['message'=>$message]);
    }
}
 
