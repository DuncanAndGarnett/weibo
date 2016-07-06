/* 
 * Copyright(c)2016 All rights reserved.
 * @Licenced  http://www.w3.org
 * @Author  liutian<1538731090@qq.com> liutian_jiayi
 * @Create on 2016-6-23 11:19:04
 * @Version 1.0
 */
$(function () {
	$("#avartar").uploadify({
		//绑定swf文件
		swf : "/plugins/uploadify/uploadify.swf",
		//设置按钮样式
		buttonText : "换头像",
		buttonImage: "/plugins/uploadify/ImgBtn.png",
		width : 50,
		height: 23,
		//设置上传要求
		fileTypeDesc : "选择图片",
		fileTypeExts : "*.jpg;*.jpeg;*.png;*.gif",
		fileSizeLimit : 1*1024*1024,
		method: 'post',
		//上传处理的地址
		uploader : "/Admin/user/avartar",
		//随表单一起提交的数据  
		formData : {
			uid : document.fm.uid.value,
			_token : document.fm._token.value,
		},
		//成功处理 触发的事件
		onUploadSuccess : function (file, txt, response) {
			/*
			 * eval('var result = {"status" :false, "info" : "\dxoxzikdisju\dshy\u"}');//再执行
			 */
			eval('var result = ' + txt);
			//输出提示
			if (result.status == false) {
				alert(result.info);
			}
			//预览图片
			$("#im").attr("src", result.info);
		}
	});
})

