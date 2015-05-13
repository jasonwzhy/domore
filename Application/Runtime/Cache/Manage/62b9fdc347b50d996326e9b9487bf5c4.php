<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>业务管理登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="cache-control" content="no-cache">
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Sun">

	<link rel="stylesheet" type="text/css" href="/Public/manage/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/signin.css">
</head>
	<body>
		<nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#"><img src="/Public/manage/img/logo.png" width="50px" height="50px"></a>
				</div>
				<span class="navtext">动么</span>
			</div>
		</nav>
		<div class="container signinbody">
			<div class="row titletext">
				<div class="col-xs-12">
					<h3><p class="text-center">欢迎您，亲爱的伙伴</p></h3>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label>手机号</label>
						<input type="number" class="form-control" id="mobileno" placeholder="手机号">
					</div>
					<div class="form-group">
						<label>密码</label>
						<input type="password" class="form-control" id="passwd" placeholder="Password">
					</div>
					<label class="errlabel"></label>
					<button type="submit" class="btn btn-default" id="signinbtn">登录</button>
					<p class="text-right"><a href="#">忘记密码.</a></p>
				</div>
				
			</div>
		</div>
		
		<script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
		<script type="text/javascript">
			$("#signinbtn").click(function(){
				var mobileno = $("#mobileno").val();
				var passwd = $("#passwd").val();
				if (mobileno == "" || passwd == "") {
					$(".errlabel").text("手机号 或 密码不能为空,请重新填写!");
					return ;
				}else{
					$.post("/manage/agentshop/signin",
						{
							mobileno:mobileno,
							passwd:passwd
						},
						function(ret){
							if (ret.error != "") {
								$(".errlabel").text(ret.error);
							}else{
								window.location.href="/manage/agentshop/newshop";
							}
						}
					);
				}
			});
		</script>
	</body>
</html>