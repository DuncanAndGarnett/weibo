/* 
 * Copyright(c)2016 All rights reserved.
 * @Licenced  http://www.w3.org
 * @Author  Expression email is undefined on line 6, column 28 in Templates/Licenses/license-default.txt. LauTinggg <weibo>
 * @Create on 2016-7-1 12:05:31
 * @Version 1.0
 */
$(function () {
	$("#avartar").uploadify({
		//绑定上传的flash脚本
		swf : "/plugins/uploadify/uploadify.swf",
		buttonImage : "/plugins/uploadify/ImgBtn.png",
		width:50,
		height:23,
		method:"post",
		fileTypeExts:"*.jpg;*.jpeg;*.png;*.gif",
		fileSizeLimit:1*1024*1024,
		formData : {
			_token : document.upload._token.value,
			uid : document.upload.uid.value,
		},
		//提交处理地址
		uploader : "/Admin/user/avartar",
		//上传成功时 的处理
		onUploadSuccess : function (file, txt, response) {
			eval("var result =" +  txt);
			if (!result.status) {
				alert(result.info);
			}
			//预览图片
			$("#im").attr("src", result.info);
		}
	})
})
