<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB, Hash;
class UserController extends CommonController {

	/**
	 * Display a listing of the resource.
	 * 显示一个资源列表
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		//查询所有用户记录
		$users = DB::table("admin_user")
				->where("uname", 'LIKE','%'.$request->get("keyword").'%')
				->orWhere("nickname", "LIKE", "%".$request->get('keyword')."%")
				//->orderBy("uid", "DESC")
				->paginate(5);
//		dd($users);//LengthAwarePaginator
		//获取分页数据和页码值
//		foreach ($users  as $tmp)
//		{
//			var_dump($tmp);
//		}
//		dd(get_class_methods($users));
//		echo ($users->render());
		return view("admin.user.index", ["users" => $users, 'keyword' => $request->get('keyword')]);
	}

	/**
	 * Show the form for creating a new resource.
	 * 显示一个用来创建资源的表单
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		return view("admin.user.create");
	}

	/**
	 * Store a newly created resource in storage.
	 * 存储一个新建的资源
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//有效性验证
		
		$this->validate($request, [
			"uname" => "required|unique:user",
			"password" => "required|between:6,15",
			"repassword" => "required|same:password",
			"nickname" => "required",
		],[
			"uname.required" => "账号不能为空",
			"uname.unique" => "该账号已被占用",
			"password.required" => "密码未填写",
			"password.between" => "密码长度应为6-15位",
			"repassword.required" => "确认密码未填写",
			"repassword.same" => "两次密码输入不一致",
			"nickname.required" => "昵称未填写",
		]);
		
		//数据入库
		$data = $request->except("_token", "repassword");
		$data["password"] = Hash::make($data["password"]);
		//设置默认头像
		$data["avartar"] = "/uploads/avartar/asd.png";
		if(DB::table("admin_user")->insert($data))//返回提示
		{
			return redirect("/Admin/user");
		} else
		{
			return back()->with(["info" => "注册失败"]);
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//查找用户记录
//		dd($request->get("uid"));
		$userRec = DB::table("admin_user")->where("uid", $id)->first();
		//在模板中显示
		return view("admin.user.edit", compact("userRec"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {
		//验证数据
		$this->validate($request, [
			"password" => "between:6,15",
			"repassword" => "same:password",
			"nickname" => "required",
		],[
			"password.between" => "密码长度应为6-15位",
			"repassword.same" => "两次密码输入不一致",
			"nickname.required" => "昵称未填写",
		]);
		//保存用户
		$data = $request->except("uid", "_token", "repassword");
		if (!empty($data["password"])) //如果有密码 则进行Hash加密
		{
			$data["password"] = Hash::make($data["password"]);
		} else //否则去除密码字段
		{
			unset($data["password"]);
		}
		if (DB::table("admin_user")->where("uid", $request->get("uid"))->update($data))
		{
			return redirect("/Admin/user");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		if (DB::table("admin_user")->where("uid", $id)->delete()) 
		{
			return redirect("Admin/user");
		} else 
		{
			return back()->with(["info" => "删除失败"]);
		}
	}

	/**
	 * Change the avartar resouce from the loginer
	 * 
	 * @param 
	 */
	public function avartar(Request $request) {
		//转存文件
		$avartar = $request->file("Filedata");
		if (!$avartar->isValid()) {
//			echo json_encode(array("status" => false, "info" => "不合法的上传"));
//			exit;
			return response()->json(array("status" => false, "info" => "不合法的上传"));
		}
		//重命名文件
		$suffix = $avartar->getClientOriginalExtension();
		$rename = date("YmdHis") . rand(1000, 9999) . "." . $suffix;
		//转存
		$result = $avartar->move("./uploads/avartar", $rename);

		//修改数据库
		$userModel = new \App\User();
		$user = $userModel->find($request->get("uid"));
		$user->avartar = "/uploads/avartar/" . $rename;
		$user->save();
		//返回结果
		echo json_encode(array("status" => true, "info" => "/uploads/avartar/" . $rename));
	}

}
