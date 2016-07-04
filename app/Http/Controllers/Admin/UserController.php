<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Hash;


class UserController extends Controller
{
    //显示一个资源列表
    public function index(Request $request){
        //查询所有用户操作
        $users = DB::table('admin_user')
                    ->where('uname','like','%'.$request->get('keyword').'%')
                    ->orWhere('nickname','like','%'.$request->get('keyword').'%')
                    ->paginate(2);
      // dd($user);
        //获取分页数据和页码值
//        foreach($users as $tmp){
//           var_dump($tmp);
//        
//        }
//        echo ($users->render());
        return view("Admin.user.index",["users"=>$users,"keyword"=>$request->get("keyword")]);
    }
    
    
    
    
    
    
    
    
    


}