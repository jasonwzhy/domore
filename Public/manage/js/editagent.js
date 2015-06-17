
$("#subbtn").click(function(){
	var sprovice =	$("#sprovice").val() ? $("#sprovice").val() : warring("省份");
	var scity = $("#scity").val() ? $("#scity").val() : warring("城市");
	var sarea = $("#sarea").val() ? $("#sarea").val() : warring("区域");
	var address = $("#address").val() ? $("#address").val() : warring("详细地址");
	var agentname = $("#agentname").val() ? $("#agentname").val() : warring("公司名");
	var regno = $("#regno").val() ? $("#regno").val() : warring("注册号");
	// var agentimgpath = $("#agentimglabel").attr("imgpath") ? $("#agentimglabel").attr("imgpath") : warring("上传照片");
	// var agentimgpathbak = $("#agentimglabel").attr("bakimgpath") ? $("#agentimglabel").attr("bakimgpath") : "";
	var manager = $("#manager").val() ? $("#manager").val() : warring("负责人姓名");
	var managertel = $("#managertel").val() ? $("#managertel").val() : warring("负责人电话");
	var manageremail = $("#manageremail").val() ? $("#manageremail").val() : warring("负责人email");
	// if ($("#accountself").attr("class").indexOf("active")>=0) {
	// 	var accountself = 1;
	// 	var accountmanager="";
	// 	var accountmanagertel="";
	// 	var accountmanageremail="";
	// } else{
	// var accountself = 0;
	var accountmanager = $("#accountmanager").val() ? $("#accountmanager").val() : warring("财务负责人");
	var accountmanagertel = $("#accountmanagertel").val() ? $("#accountmanagertel").val() : warring("财务电话");
	var accountmanageremail = $("#accountmanageremail").val();
	// // };
	// var compyaccountbank = $("#compyaccountbank").val();
	// var compyaccountname = $("#compyaccountname").val();
	// var compyaccountno = $("#compyaccountno").val();

	// var peraccountbank = $("#peraccountbank").val();
	// var peraccountname = $("#peraccountname").val();
	// var peraccountno = $("#peraccountno").val();

	// var alipayname = $("#alipayname").val();
	// var alipayno = $("#alipayno").val();

	// var wxpayname = $("#wxpayname").val();
	// var wxpayno = $("#wxpayno").val();
	// if (compyaccountno =="" && peraccountno=="" && alipayno=="" && wxpayno=="") {
	// 	warring("银行账户");
	// }
	var agentid = $("#subbtn").attr("aid");
	$.post("/manage/agentshop/subagentedit",
		{
			agentid:agentid,
			sprovice:sprovice,
			scity:scity,
			sarea:sarea,
			address:address,
			agentname:agentname,
			regno:regno,
			// agentimgpath:agentimgpath,
			// agentimgpathbak:agentimgpathbak,
			manager:manager,
			managertel:managertel,
			manageremail:manageremail,
			// accountself:accountself,
			accountmanager:accountmanager,
			accountmanagertel:accountmanagertel,
			accountmanageremail:accountmanageremail,
			// compyaccountbank:compyaccountbank,
			// compyaccountname:compyaccountname,
			// compyaccountno:compyaccountno,
			// peraccountbank:peraccountbank,
			// peraccountname:peraccountname,
			// peraccountno:peraccountno,
			// alipayname:alipayname,
			// alipayno:alipayno,
			// wxpayname:wxpayname,
			// wxpayno:wxpayno
		},
		function(ret){
			window.location.href="/manage/agentshop/myagent";
			// if (ret.error == "") {//success
			// 	alert('编辑成功');
			// 	window.location.href="/manage/agentshop/myagent";
			// }else{//err
			// 	alert(ret.error);
			// }
			
		}
	);
});

function warring(errstr)
{
	alert(errstr+" 不能为空,请选填!");
	throw "";
}