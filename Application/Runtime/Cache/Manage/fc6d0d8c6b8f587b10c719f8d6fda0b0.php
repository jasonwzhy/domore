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
				
	<span class="navtext">DB28-1342</span>

			</div>
		</nav>
		
	<div class="container detailcontainer">
		<div class="row agentdetail">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-10">
						<h4>商家经理</h4>
					</div>
					<div class="col-xs-2">
						<a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-8">
						<h5>品牌: 传奇健身</h5>
					</div>
					<div class="col-xs-4">
						<h5>场馆: 5</h5>
					</div>
				</div>
				<hr>
				<div class="row blacktext">
					<div class="col-xs-6">
						<h5>18628286543</h5>
					</div>
					<div class="col-xs-6">
						<h5>1002301@qq.com</h5>
					</div>
				</div>
				<hr>
				<div class="row blacktext">
					<div class="col-xs-12">
						<h5>成都市天府新区南宋御街打浦桥2号旌上云亭东区A座18层234室</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 managebtn">
				<!-- <button type="button" id="subrelationbtn" agentid="" class="btn btn-primary btn-lg">管理关联场馆</button> -->
				<a href="/manage/agentshop/mkrelation/1"  id="subrelationbtn" agentid="" class="btn btn-primary btn-lg">管理关联场馆</a> <!-- 添加相对应的agentid跳转 -->
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
		<div class="row shopitem">
			<div class="col-xs-12">
				<h5>DP28-01453</h5>
				<hr>
				<strong>传奇健身科华南路馆</strong>
				<h6>成都市武侯区科华南路326号伊云中心12层</h6>
			</div>
		</div>

		<div class="row shopitem">
			<div class="col-xs-12">
				<h5>DP28-01453</h5>
				<hr>
				<strong>传奇健身科华南路馆</strong>
				<h6>成都市武侯区科华南路326号伊云中心12层</h6>
			</div>
		</div>

		<div class="row shopitem">
			<div class="col-xs-12">
				<h5>DP28-01453</h5>
				<hr>
				<strong>传奇健身科华南路馆</strong>
				<h6>成都市武侯区科华南路326号伊云中心12层</h6>
			</div>
		</div>
		<div class="row shopitem">
			<div class="col-xs-12">
				<h5>DP28-01453</h5>
				<hr>
				<strong>传奇健身科华南路馆</strong>
				<h6>成都市武侯区科华南路326号伊云中心12层</h6>
			</div>
		</div>
	</div>
<!-- 	<div class="container myagentcont">
		<?php if(empty($myagentlst)): ?><div class="row">
				<div class="col-xs-12">
					<div class="myempty">
						<p class="text-center"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> 还没有添加 商户 哦!</p>
					</div>
				</div>
			</div>
		<?php else: ?> 
			<?php if(is_array($myagentlst)): foreach($myagentlst as $key=>$myagent): ?><div class="row shopitem">
					<a href="#">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-9">
								<h5><?php echo ($myagent["agent_id"]); ?></h5>
							</div>
							<div class="col-xs-3">
								<?php if(($myagent["agentcount"]) == "0"): ?><span class="noagentmark">无场馆</span><?php endif; ?>
							</div>
						</div>
						
						<hr>
						<div class="row">
							<div class="col-xs-4">
								<strong><?php echo ($myagent["agent_name"]); ?></strong>
							</div>
							<div class="col-xs-4">
								<h6><?php echo ($myagent["agent_manager"]); ?></h6>
							</div>
							<div class="col-xs-4 text-center">
								<h6><?php echo ($myagent["agentcount"]); ?></h6>		
							</div>
						</div>
					</div>
					</a>
				</div><?php endforeach; endif; endif; ?>
	</div> -->


		</div><!--  st-pusher -->

		<script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
		
		
	<script src="/Public/manage/js/agentdetail.js"></script>

	</body>
</html>