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
							
	<span class="navtext">新建商户</span>

						</div>
					</nav>
					
	<div class="container newagent">
		<div class="row">
			<div class="col-xs-12">
				<form class="">
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
					<div class="form-group">
						<label for="exampleInputEmail1">营业执照信息</label>
						<div class="input-group">
							<span class="input-group-addon">注册 名</span><input type="text" class="form-control" id="agentname" name="agentname">
						</div>
						<div class="input-group">
							<span class="input-group-addon">注册 号</span>
							<input type="text" class="form-control" id="regno" name="regno">
						</div>
					</div>
				</form>
				<form class="form-horizontal" id="addagenticform">
					<div class="form-group">
						<div class="col-xs-6">
							<button type="button" class="btn btn-default btn-block" id="upimgbtn">上传照片</button>
							<input type="file" name="agentimg" id="agentimg" value="" required="required" accept="image/*"  runat="server" style="display:none;"/>
						</div>
						<div class="col-xs-6">
							<label class="agentuplabel" id="agentimglabel">未上传</label>
						</div>
					</div>
				</form>

				<div class="form-group">
					<label>负责人信息</label>
					<div class="input-group">
						<span class="input-group-addon"> 姓 名 </span>
						<input type="text" class="form-control" id="manager" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon"> 电 话 </span>
						<input type="text" class="form-control" id="managertel" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon"> 邮 箱 </span>
						<input type="text" class="form-control" id="manageremail" aria-describedby="inputGroupSuccess1Status">
					</div>
				</div>

				<div class="form-group">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary col-xs-6 active" id="accountformbtn">
							<input type="radio" name="options" id="option1" autocomplete="off" checked>财务对接人
						</label>
						<label class="btn btn-primary col-xs-6" id="accountself">
							<input type="radio" name="options" id="option2" autocomplete="off">商户本人负责
						</label>
					</div>
				</div>

				<div class="form-group"  id="accountform">
					<div class="input-group">
						<span class="input-group-addon"> 姓 名 </span>
						<input type="text" class="form-control" id="accountmanager" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon"> 电 话 </span>
						<input type="text" class="form-control" id="accountmanagertel" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon"> 邮 箱 </span>
						<input type="text" class="form-control" id="accountmanageremail" aria-describedby="inputGroupSuccess1Status">
					</div>	
				</div>

				<div class="form-group firstaccount">
					<label>默认收款方式</label>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary col-xs-3 active">
							<input type="radio" name="options" id="option1" autocomplete="off" checked>公司账户
						</label>
						<label class="btn btn-primary col-xs-3">
							<input type="radio" name="options" id="option2" autocomplete="off">私人帐户
						</label>
						<label class="btn btn-primary col-xs-3">
							<input type="radio" name="options" id="option2" autocomplete="off">支付宝
						</label>
						<label class="btn btn-primary col-xs-3">
							<input type="radio" name="options" id="option2" autocomplete="off">微信支付
						</label>
					</div>
				</div>

				<div class="form-group">
					<label>公司账户</label>
					<div class="input-group">
						<span class="input-group-addon">开户行 </span>
						<input type="text" class="form-control" id="compyaccountbank" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon">账户名 </span>
						<input type="text" class="form-control" id="compyaccountname" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon">账号＃</span>
						<input type="text" class="form-control" id="compyaccountno" aria-describedby="inputGroupSuccess1Status">
					</div>	
				</div>
				<div class="form-group">
					<label>私人账户</label>
					<div class="input-group">
						<span class="input-group-addon">开户行 </span>
						<input type="text" class="form-control" id="peraccountbank" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon">账户名 </span>
						<input type="text" class="form-control" id="peraccountname" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon">账号＃</span>
						<input type="text" class="form-control" id="peraccountno" aria-describedby="inputGroupSuccess1Status">
					</div>	
				</div>

				<div class="form-group">
					<label>支付宝</label>
					<div class="input-group">
						<span class="input-group-addon">账户名 </span>
						<input type="text" class="form-control" id="alipayname" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon">账号＃</span>
						<input type="text" class="form-control" id="alipayno" aria-describedby="inputGroupSuccess1Status">
					</div>	
				</div>

				<div class="form-group">
					<label>微信支付</label>
					<div class="input-group">
						<span class="input-group-addon">账户名 </span>
						<input type="text" class="form-control" id="wxpayname" aria-describedby="inputGroupSuccess1Status">
					</div>
					<div class="input-group">
						<span class="input-group-addon">账号＃</span>
						<input type="text" class="form-control" id="wxpayno" aria-describedby="inputGroupSuccess1Status">
					</div>	
				</div>
				<label>加入的同时,同意接受动么</label><a href="">《合作协议》</a>
				<button type="button" class="col-xs-12 btn btn-default btn-block" id="subbtn">确认创建</button>
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
	<script type="text/javascript" src="/Public/manage/js/newagent.js"></script>


	</body>
</html>