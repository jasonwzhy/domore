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
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/base3.css">
</head>
	<body>
		<nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header toolbar" id="st-trigger-effects">
					
	<a class="navbar-brand menu-button menu-left" href="/manage/agentshop/myagent" id="" data-effect="st-effect-2"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>

				</div>
				
	<span class="navtext"><?php echo ($agentdetail["agent_sn"]); ?></span>

			</div>
		</nav>
		
	<div class="container detailcontainer">
		<div class="row agentdetail">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-10">
						<h4><?php echo ($agentdetail["agent_manager"]); ?></h4>
					</div>
					<div class="col-xs-2">
						<a href="/manage/agentshop/editagent/aid/<?php echo ($agentdetail["agent_id"]); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-8">
						<h5>品牌: <?php echo ($agentdetail["agent_name"]); ?></h5>
					</div>
					<div class="col-xs-4">
						<h5>场馆: <?php echo ($agentshopcount); ?></h5>
					</div>
				</div>
				<hr>
				<div class="row blacktext">
					<div class="col-xs-6">
						<h5><?php echo ($agentdetail["agent_manager_tel"]); ?></h5>
					</div>
					<div class="col-xs-6">
						<h5><?php echo ($agentdetail["agent_manager_email"]); ?></h5>
					</div>
				</div>
				<hr>
				<div class="row blacktext">
					<div class="col-xs-12">
						<h5><?php echo ($agentdetail["agent_address"]); ?></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 managebtn">
				<!-- <button type="button" id="subrelationbtn" agentid="" class="btn btn-primary btn-lg">管理关联场馆</button> -->
				<a href="/manage/agentshop/mkrelation/aid/<?php echo ($agentdetail["agent_id"]); ?>"  id="subrelationbtn" agentid="" class="btn btn-primary btn-lg">管理关联场馆</a> <!-- 添加相对应的agentid跳转 -->
			</div>
		</div>

		<!-- <div class="row shopitem">
			<div class="col-xs-12">
				<h5><?php echo ($member["agentshop_id"]); ?></h5>
				<hr>
				<strong><?php echo ($member["shop_name"]); ?></strong>
				<h6><?php echo ($member["address"]); ?></h6>
			</div>
		</div> -->
		<?php if(is_array($agetnshoplst)): foreach($agetnshoplst as $key=>$agetnshop): ?><div class="row shopitem">
				<div class="col-xs-12">
					<h5><?php echo ($agetnshop["shop_sn"]); ?></h5>
					<hr>
					<strong><?php echo ($agetnshop["shop_name"]); ?></strong>
					<h6><?php echo ($agetnshop["address"]); ?></h6>
				</div>
			</div><?php endforeach; endif; ?>

	</div>



		</div><!--  st-pusher -->

		<script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
		
		
	</body>
</html>