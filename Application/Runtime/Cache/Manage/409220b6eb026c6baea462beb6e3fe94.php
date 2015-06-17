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
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/normalize.css">
	<!-- <link rel="stylesheet" type="text/css" href="/Public/manage/css/demo.css"> -->
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/base.css">
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/component.css">
	<script type="text/javascript" src="/Public/manage/js/modernizr.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/bootstrap-datetimepicker.min.css">
	

</head>
	<body >
	<div id="st-container" class="st-container">
		<nav class="st-menu st-effect-2" id="menu-2">
			<ul>
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span><span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
    					<li><a href="/manage/agentshop/newshop">新建场馆</a></li>
    					<li><a href="/manage/agentshop/newagent">新建商户</a></li>
					</ul>
				</div>
				<div class="stmenulogo">
					<img src="/Public/manage/img/logo2.png" >
					<li><a href="#">HOME</a></li>
					<li><a href="#">通知中心</a></li>
					<li><a href="/manage/agentshop/myagent">我的商户</a></li>
					<li><a href="/manage/agentshop/myshop">我的场馆</a></li>
					<li><a href="/manage/agentshop/signout">登出</a></li>
				</div>
				<div class="stmenuimg">
					<img src="/Public/manage/img/profile.png" class="img-circle" width="80px">
				</div>
				
			</ul>
		</nav>
		
		<div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" id="myModal">
		<div class="modal-dialog modal-lg">
			<div class="container">
				<div class="row">
					<button class="col-xs-12 btn btn-lg delshoppic btn-default btn-block" onclick="delshoppic(this);" >删除图片</button>
				</div>
			</div>
		</div>
	</div>

		<div class="st-pusher">
			<div class="st-content">
			<!-- this is the wrapper for the content -->
				<div class="st-content-inner">
					<nav class="navbar navbar-fixed-top">
						<div class="container-fluid">
							<div class="navbar-header toolbar" id="st-trigger-effects">
								<a class="navbar-brand menu-button menu-left" href="" id="" data-effect="st-effect-2"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
							</div>
							
	<span class="navtext">新建场馆</span>

						</div>
					</nav>
					
<div class="container newshopinfo">
	<div class="row shopalbums">
		<div class="col-xs-4" id="addimg">
			<form id="addshoppicform">
				<span class="glyphicon glyphicon-plus" id="addplusspan" aria-hidden="true"></span>
				<!-- <a href="#" id="upimgbtn"><img src="/Public/manage/img/addimg.png" alt="" class="img-rounded"></a> -->
				<input type="file" name="upimg" id="upimg" value="" required="required" accept="image/*"  runat="server"  /> <!-- style="display:none;" -->
			</form>
		</div>
		<canvas class="canvas" id="myCanvas" style="display:none;"></canvas>
		<div class="col-xs-4">
			<a href="#" type="button" class="" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="onshoppic(this);">
				<!-- <img src="" alt="" id="1" class="img-rounded"> -->
				<div class="picitem" style="background-image:url('/Public/manage/img/hahaha.jpeg');background-size:cover;height:100px;">
				</div>
			</a>
		</div>
		
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group ">
				<textarea class="form-control" rows="6" id="shopdesc" placeholder="场馆介绍"></textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">场馆负责人信息</label>
				<input type="email" class="form-control" id="shopGM" placeholder="场馆经理">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="shopGMtel" placeholder="场馆经理电话">
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="shopGMemail" placeholder="场馆经理email">
			</div>
		</div>
	<!-- 	<div class="col-xs-4">
			<button type="button" class="col-xs-12 btn btn-default btn-block" id="editprv">上一步</button>
		</div> -->
		<div class="col-xs-12">
			<button type="button" class="col-xs-12 btn btn-default btn-block" id="subbtn">完 成</button>
		</div>
	</div>
	
</div>

				</div>
			</div>

		</div><!--  st-pusher -->

	</div><!--  st-container -->
		<script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
		<script type="text/javascript" src="/Public/manage/js/classie.js"></script>
		<script type="text/javascript" src="/Public/manage/js/sidebarEffects.js"></script>

		<script type="text/javascript">
			
		</script>
		
	<script type="text/javascript" src="/Public/manage/js/newshopinfo.js"></script>

	</body>
</html>