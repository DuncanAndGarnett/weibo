<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Hash;
use Session;

class UserController extends Controller
{
    public function store(Request $request)
    {
        //注册用户
        $this->validate($request,[
            "uname"=>"required|unique:home_user",
            "password"=>"required|between:6,15",
            "repassword"=>"required|same:password",
            "nickname"=>"required",
            "sex"=>"required"
        ],[
            "uname.required"=>"账户不能为空",
            "uname.unique"=>"账户已存在",
	    "nickname.required"=>"昵称不能为空",
	    "password.required"=>"密码不能为空",
	    "repassword.same"=>"两次输入密码不一致",
	    "repassword.required"=>"确认密码不能为空",
	    "password.between"=>"密码长度6-15位"
            
        ]);
        $data=$request->except("_token","repassword");
        $data["password"]=Hash::make($data["password"]);
        if(DB::table("home_user")->insert($data)){
            return redirect("/Home");
        }else{
            return back()->with(["info"=>"插入失败"]);
        }    
    }        
}
    
    
    
    
    
    
    
    
    


