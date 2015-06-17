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
					
	<ul class="nav nav-tabs">
		<li role="presentation" class="active">
			<a href="#agent" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">非联盟商户</a>
			
		</li>
		<li role="presentation" id="hasagent" class="">
			<a href="#memberagent" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">联盟商户</a>
			<!-- <a href="#">321</a> -->
		</li>
	</ul>
	<div class="tab-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<form class="">
						<div class="form-group">
							<select class="form-control" id="shoptype">
								<option value="">-场馆类型-</option>
								<?php if(is_array($stypedata)): foreach($stypedata as $key=>$stype): ?><option value="<?php echo ($stype["shoptype_id"]); ?>"><?php echo ($stype["type_name"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="shopname" name="shopname" placeholder="场馆名">
						</div>
						<div class="form-group">
							<label>场馆电话</label>
							<input type="text" class="form-control" id="shoptel" name="shoptel" placeholder="前台电话1">
							<input type="text" class="form-control" id="shoptel2" name="shoptel2" placeholder="前台电话2" style="margin-top:-1px;">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-4 dtpk"><label for="startdtpicker">营业时间</label></div>
								<div class="col-xs-4 dtpk"><input id="startdtpicker" class="form-control"  data-date-format="hh:ii" value="" placeholder="起始" readonly></div>
								<div class="col-xs-4 dtpk"><input id="enddtpicker" class="form-control"  data-date-format="hh:ii" value="" placeholder="截至" readonly></div>
							</div>
						</div>

						<div class="form-group">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-primary col-xs-6 active" id="noappointment">
									<input type="radio" name="options" id="option1" autocomplete="off" checked>无需预约
								</label>
								<label class="btn btn-primary col-xs-6" id="appointment">
									<input type="radio" name="options" id="option2" autocomplete="off">需要预约
								</label>
							</div>
						</div>

						<div class="form-group" id="appointmenttype" style="display:none;">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">类型</span>
								<select class="form-control" aria-describedby="basic-addon1" id="appointmenttime">
									<option value="12">半天</option>
									<option value="24">一天</option>
									<option value="48">两天</option>
								</select>
							</div>
						</div>

						<div class="form-group col-xs-4 form-group-nopadding">
							<select class="form-control" id="sprovice">
								<option value="">-省/直辖市-</option>
								<?php if(is_array($provicedata)): foreach($provicedata as $key=>$pdata): ?><option value="<?php echo ($pdata["region_id"]); ?>" zcode="<?php echo ($pdata["zipcode"]); ?>"><?php echo ($pdata["areaname"]); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
						<div class="form-group col-xs-4 form-group-nopadding">
							<select class="form-control" id="scity">
								<option value="">-市区-</option>
							</select>
						</div>
						<div class="form-group col-xs-4 form-group-nopadding">
							<select class="form-control" id="sarea">
								<option value="">-区-</option>
							</select>
						</div>
						<div class="form-group col-xs-12 form-group-nopadding">
							<input type="text" class="form-control" id="address" name="address" placeholder="详细地址">
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div id="mapContainer">
						<div class="markicon"><img src="/Public/manage/img/localtion.png" style="width: 36px; height: 36px; top: 0px; left: 0px;"></div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane active" id="agent">

		</div>
		<div role="tabpanel" class="tab-pane" id="memberagent">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">场馆所属商户</label>
								<select class="form-control" id="sagent">
									<option value="">-请选择场馆所属商家-</option>
									<?php if(is_array($agentlist)): foreach($agentlist as $key=>$agent): ?><option value="<?php echo ($agent["agent_id"]); ?>"><?php echo ($agent["moblie_no"]); ?> - <?php echo ($agent["agent_name"]); ?></option><?php endforeach; endif; ?>
								</select>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 nextbtn">
					<button type="button" class="col-xs-12 btn btn-default btn-block" id="createsub">下一步</button>
				</div>
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
		
	<script type="text/javascript" src="/Public/manage/js/region.js"></script>
	<script type="text/javascript" src="/Public/manage/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=ac8dc3ed6052d2d27fc0b1c97266d1a0"></script>
	<script type="text/javascript" src="/Public/manage/js/newshop.js"></script>
	<script type="text/javascript">
		$('#startdtpicker').datetimepicker({
			format: "hh:ii",
			autoclose: true,
			todayBtn: true,
			pickerPosition: "bottom-left",
			startView: 1
		});
		$('#enddtpicker').datetimepicker({
			format: "hh:ii",
			autoclose: true,
			todayBtn: true,
			pickerPosition: "bottom-left",
			startView: 1
		});
		
	</script>

	</body>
</html>