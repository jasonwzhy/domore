$("#upimgbtn").click(function(){
	 $('input[id=agentimg]').click();

})
function dataURItoBlob(dataURI) {
    // convert base64 to raw binary data held in a string 
    var byteString 
        ,mimestring 

    if(dataURI.split(',')[0].indexOf('base64') !== -1 ) {
        byteString = atob(dataURI.split(',')[1])
    } else {
        byteString = decodeURI(dataURI.split(',')[1])
    }
    

    mimestring = dataURI.split(',')[0].split(':')[1].split(';')[0]
    
    var content = new Array();
    for (var i = 0; i < byteString.length; i++) {
        content[i] = byteString.charCodeAt(i)
    }
    console.log(mimestring);
    console.log(content);
    return new Blob([new Uint8Array(content)], {type: mimestring});
}

$("#agentimg").change(function(){
	if ($('input[id=agentimg]').val() == "") {
		
	} else{
		$("#upimgbtn").text("上传中...").attr("disabled","true");
		var formData = new FormData($( "#addagenticform" )[0]);
		var file = this.files[0];
		// console.log(file);
		var url = URL.createObjectURL(file);
		var img = new Image();
		img.onload = function() {
			//生成比例
			var width = img.width,
				height = img.height,  
				scale = width / height;  
			// console.log(scale);
			width = parseInt(800);  
			height = parseInt(width / scale);
			//生成canvas  
			var $canvas = $('#myCanvas');  
			var ctx = $canvas[0].getContext('2d');  
			$canvas.attr({width : width, height : height});  
			ctx.drawImage(img, 0, 0, width, height);  
			var base64 = $canvas[0].toDataURL('image/jpeg',0.5);  
			var blob = dataURItoBlob(base64);
			var fdata = new FormData();
			fdata.append("myupimg",blob);
			$.ajax({
				url: '/manage/agentshop/newagent',
				type: 'POST',
				data: fdata,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function (returndata) {
					$("#agentimglabel").text("已上传");
					$("#upimgbtn").text("重新上传").removeAttr("disabled");
					$("#agentimglabel").attr("imgpath",returndata.imgpath);
					$("#agentimglabel").attr("bakimgpath",returndata.bakimgpath);
					alert("上传成功");
				},
				error: function (returndata) {
					console.log(returndata);
					alert("图片上传失败,请将图片控制在3M以内,并且用 jpg | gif | png | jpeg格式");
					$("#upimgbtn").text("重新上传").removeAttr("disabled");
				}
			})
		}
		img.src = url;
	};
	$('input[id=agentimg]').val('');
});

// $("#agentimg").change(function(){
// 	if ($('input[id=agentimg]').val() == "") {
		
// 	} else{
// 		var formData = new FormData($( "#addagenticform" )[0]);
// 		$.ajax({
// 			url: '/manage/agentshop/newagent',
// 			type: 'POST',
// 			data: formData,
// 			async: true,
// 			cache: false,
// 			contentType: false,
// 			processData: false,
// 			success: function (returndata) {
// 				$("#agentimglabel").text("已上传");
// 				$("#agentimglabel").attr("imgpath",returndata.imgpath);
// 				alert("上传成功");
// 			},
// 			error: function (returndata) {
// 				alert("图片上传失败,请将图片控制在3M以内,并且用 jpg | gif | png | jpeg格式");
// 			}
// 		})
// 	};
// });

$("#accountself").click(function(){
	$("#accountform").hide();
});
$("#accountformbtn").click(function(){
	$("#accountform").show();
});
$("#subbtn").click(function(){
	var sprovice =	$("#sprovice").val() ? $("#sprovice").val() : warring("省份");
	var scity = $("#scity").val() ? $("#scity").val() : warring("城市");
	var sarea = $("#sarea").val() ? $("#sarea").val() : warring("区域");
	var address = $("#address").val() ? $("#address").val() : warring("详细地址");
	var agentname = $("#agentname").val() ? $("#agentname").val() : warring("公司名");
	var regno = $("#regno").val() ? $("#regno").val() : warring("注册号");
	var agentimgpath = $("#agentimglabel").attr("imgpath") ? $("#agentimglabel").attr("imgpath") : warring("上传照片");
	var agentimgpathbak = $("#agentimglabel").attr("bakimgpath") ? $("#agentimglabel").attr("bakimgpath") : "";
	var manager = $("#manager").val() ? $("#manager").val() : warring("负责人姓名");
	var managertel = $("#managertel").val() ? $("#managertel").val() : warring("负责人电话");
	var manageremail = $("#manageremail").val() ? $("#manageremail").val() : warring("负责人email");
	if ($("#accountself").attr("class").indexOf("active")>=0) {
		var accountself = 1;
		var accountmanager="";
		var accountmanagertel="";
		var accountmanageremail="";
	} else{
		var accountself = 0;
		var accountmanager = $("#accountmanager").val() ? $("#accountmanager").val() : warring("财务负责人");
		var accountmanagertel = $("#accountmanagertel").val() ? $("#accountmanagertel").val() : warring("财务电话");
		var accountmanageremail = $("#accountmanageremail").val();
	};
	var compyaccountbank = $("#compyaccountbank").val();
	var compyaccountname = $("#compyaccountname").val();
	var compyaccountno = $("#compyaccountno").val();

	var peraccountbank = $("#peraccountbank").val();
	var peraccountname = $("#peraccountname").val();
	var peraccountno = $("#peraccountno").val();

	var alipayname = $("#alipayname").val();
	var alipayno = $("#alipayno").val();

	var wxpayname = $("#wxpayname").val();
	var wxpayno = $("#wxpayno").val();
	if (compyaccountno =="" && peraccountno=="" && alipayno=="" && wxpayno=="") {
		warring("银行账户");
	}
	$.post("/manage/agentshop/newagent",
		{
			sprovice:sprovice,
			scity:scity,
			sarea:sarea,
			address:address,
			agentname:agentname,
			regno:regno,
			agentimgpath:agentimgpath,
			agentimgpathbak:agentimgpathbak,
			manager:manager,
			managertel:managertel,
			manageremail:manageremail,
			accountself:accountself,
			accountmanager:accountmanager,
			accountmanagertel:accountmanagertel,
			accountmanageremail:accountmanageremail,
			compyaccountbank:compyaccountbank,
			compyaccountname:compyaccountname,
			compyaccountno:compyaccountno,
			peraccountbank:peraccountbank,
			peraccountname:peraccountname,
			peraccountno:peraccountno,
			alipayname:alipayname,
			alipayno:alipayno,
			wxpayname:wxpayname,
			wxpayno:wxpayno
		},
		function(ret){
			if (ret.error == "") {//success
				alert('创建商户成功');
				window.location.href="/manage/agentshop/newshop";
			}else{//err
				alert(ret.error);
			}
			
		}
	);
});

function warring(errstr)
{
	alert(errstr+" 不能为空,请选填!");
	throw "";
}