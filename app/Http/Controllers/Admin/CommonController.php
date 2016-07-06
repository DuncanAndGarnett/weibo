<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
class CommonController extends Controller
{
    //初始化控制器的执行动作
	public function __construct()
	{
//		parent::__construct();
		//登陆验证
		if (!Session::has("userData"))
		{
//			return redirect("/login");
			header("Location:/Admin/login");
			exit;
		}
	}
}
