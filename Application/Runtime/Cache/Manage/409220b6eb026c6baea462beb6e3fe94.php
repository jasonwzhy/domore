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
			</div>
		</nav>
		
<div class="container newshopinfo">
	<div class="row">
		<div class="col-xs-4" id="addimg">
			<form id="addshoppicform">
				<a href="#" id="upimgbtn"><img src="/Public/manage/img/addimg.png" alt="" class="img-rounded"></a>
				<input type="file" name="upimg" id="upimg" value="" required="required" accept="image/*"  runat="server" style="display:none;"/>
			</form>
		</div>
		<div class="col-xs-4">
			<a href="#" type="button" class="" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="onshoppic(this);">
			<img src="/Public/manage/img/logo.png" alt="" id="1" class="img-rounded">
			</a>
		</div>
		
	</div>
	<div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
		<div class="modal-dialog modal-lg">
			<div class="container">
				<div class="row">
					<button class="col-xs-12 btn btn-lg delshoppic btn-default btn-block" onclick="delshoppic(this);" >删除图片</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


		

		<script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
		
	<script type="text/javascript" src="/Public/manage/js/newshopinfo.js"></script>

	</body>
</html>