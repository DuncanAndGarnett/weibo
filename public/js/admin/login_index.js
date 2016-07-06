/* 
 * Copyright(c)2016 All rights reserved.
 * @Licenced  http://www.w3.org
 * @Author  liutian<1538731090@qq.com> liutian_jiayi
 * @Create on 2016-6-22 9:42:19
 * @Version 1.0
 */
//显示图片位置
function dis(obj) {
	var ix = obj.offsetLeft;
	var iy = obj.offsetTop;
	document.getElementById("code").style.display = "block";
	document.getElementById("code").style.left = ix + "px";
	document.getElementById("code").style.top = (iy + 24) + "px";
}

////给表单绑定提交事件
//document.login.onsubmit = function () {
//	//获取用户输入
//	var uname = this.uname.value;
//	var password = this.password.value;
//	var code = this.code.value;
//	//验证值
//	var result = new Array();
//	if (uname.match(/^\s*$/)) {
//		result["uname"] = "账号未填写";
//	} else {
//		result["uname"] = "";
//	}
//	if (password.length < 6 || password.length > 15) {
//		result["password"] = "密码长度应为6-15位";
//	} else {
//		result["password"] = "";
//	}
//	if (code.length != 5) {
//		result["code"] = "验证法不合法";
//	} else {
//		result["code"] = "";
//	}
//	//输出提示
//	var flag = true;
//	for (var key in result) {
//		if (result[key]) flag = false;
//		//新建span用来存放提示信息
//		var span = this[key].nextSibling || document.createElement("span");
//		//给span绑定类
//		span.className = result[key] ? "error" : "right";
//		//放入提示信息
//		span.innerHTML = result[key];
//		//追加到相应控件的后面
//		this[key].parentNode.appendChild(span);
//	}
//	
//	return flag;
//}

