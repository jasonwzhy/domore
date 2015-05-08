<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="cache-control" content="no-cache">
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Sun">

	<link rel="stylesheet" type="text/css" href="/Public/manage/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/base.css">
</head>
	<body>
		<nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
				</div>
				<span class="navtext">新建场馆</span>
			</div>
		</nav>
		
	<div class="container newagent">
		<div class="row">
			<div class="col-xs-12">
				<form class="">
					<div class="form-group">
						<label for="exampleInputEmail1">营业执照信息</label>
						<div class="input-group">
							<span class="input-group-addon">注册 名</span><hr width="1"  size="100">
							<input type="text" class="form-control" id="" name="">
						</div>
						<div class="input-group">
							<span class="input-group-addon">注册 号</span>
							<input type="text" class="form-control" id="" name="">
						</div>
					</div>
					<div class="form-group">
						<!-- <input type="text" class="form-control" id="address" name="address" placeholder="详细地址"> -->
						<div class="input-group">
					    <span class="input-group-addon">姓名</span>
					    <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
					  </div>
					  <div class="input-group">
					    <span class="input-group-addon">电话</span>
					    <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
					  </div>
					</div>
				</form>
				<form class="form-horizontal">
			
			 		<div class="form-group">
			 			<div class="col-xs-6">
			 				<button type="button" class="btn btn-default btn-block">上传照片</button>
			 			</div>
			 			<div class="col-xs-6">
			 				<label class="agentuplabel">未上传</label>
			 			</div>
			 			
			 			
			 		</div>
					

				</form>
			</div>
		</div>
	</div>


		

		<script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
		
	</body>
</html>