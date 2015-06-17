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
	<link rel="stylesheet" type="text/css" href="/Public/manage/css/base2.css">
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
		<div class="st-pusher">
			<div class="st-content">
				<div class="st-content-inner"> 
					<nav class="navbar navbar-fixed-top">
						<div class="container-fluid">
							<div class="navbar-header toolbar" id="st-trigger-effects">
								<a class="navbar-brand menu-button menu-left" href="" id="" data-effect="st-effect-2"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
							</div>
							
	<span class="navtext">我的商户</span>

						</div>
					</nav>
					
	<div class="container myagentcont">
		<?php if(empty($myagentlst)): ?><div class="row">
				<div class="col-xs-12">
					<div class="myempty">
						<p class="text-center"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> 还没有添加 商户 哦!</p>
					</div>
				</div>
			</div>
		<?php else: ?> 
			<?php if(is_array($myagentlst)): foreach($myagentlst as $key=>$myagent): ?><div class="row shopitem">
					<a href="/manage/agentshop/agentdetail/aid/<?php echo ($myagent["agent_id"]); ?>">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-9">
								<h5><?php echo ($myagent["agent_sn"]); ?></h5>
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
		


	</body>
</html>