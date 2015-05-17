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
					
	<a class="navbar-brand menu-button menu-left" href="/manage/agentshop/myagent" id="" data-effect="st-effect-2"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>

				</div>
				
	<span class="navtext">为商户关联场馆</span>

			</div>
		</nav>
		
	<div class="row relationcontainer">
		<div class="col-xs-12">
			<?php if(is_array($membershoplst)): foreach($membershoplst as $key=>$membershop): ?><div class="row reshopitem member">
					<div class="col-xs-12">
						<h5><?php echo ($membershop["agentshop_id"]); ?></h5>
						<hr>
						<strong><?php echo ($membershop["shop_name"]); ?></strong>
						<h6><?php echo ($membershop["address"]); ?></h6>
					</div>
				</div><?php endforeach; endif; ?>
			<?php if(is_array($nomembershoplst)): foreach($nomembershoplst as $key=>$nomembershop): ?><div class="row reshopitem nomember" id="<?php echo ($nomembershop["agentshop_id"]); ?>">
					<div class="col-xs-12">
						<h5><?php echo ($nomembershop["agentshop_id"]); ?></h5>
						<hr>
						<strong><?php echo ($nomembershop["shop_name"]); ?></strong>
						<h6><?php echo ($nomembershop["address"]); ?></h6>
					</div>
				</div><?php endforeach; endif; ?>
		</div>
		<button type="button" id="mkagentrelation" agentid="<?php echo ($agentid); ?>" class="btn btn-primary btn-lg">确 定</button>
	</div>



		</div><!--  st-pusher -->

		<script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
		
		
	<script src="/Public/manage/js/mkagentrelation.js"></script>

	</body>
</html>