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
							<canvas class="canvas" id="myCanvas" style="display:none;"></canvas>
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

				<div class="form-group firstaccount">
					<label>默认收款方式</label>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary col-xs-3 faccount active" account="1">
							<input type="radio" name="options" id="option1" autocomplete="off" checked>公司账户
						</label>
						<label class="btn btn-primary col-xs-3 faccount" account="2">
							<input type="radio" name="options" id="option2" autocomplete="off">私人帐户
						</label>
						<label class="btn btn-primary col-xs-3 faccount" account="3">
							<input type="radio" name="options" id="option2" autocomplete="off">支付宝
						</label>
						<label class="btn btn-primary col-xs-3 faccount" account="4">
							<input type="radio" name="options" id="option2" autocomplete="off">微信支付
						</label>
					</div>
				</div>

				<label>加入的同时,同意接受动么</label><a href="#" class="" data-toggle="modal" data-target=".bs-example-modal-sm">《合作协议》</a>
				<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="mySmallModalLabel">《合作协议》<a class="anchorjs-link" href="#mySmallModalLabel"><span class="anchorjs-icon"></span></a></h4>
							</div>
							<div class="modal-body">
								<p>
								    <br/>
								</p>
								<p style="text-align: center;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 19px;font-family: 黑体">商户</span><span style="font-size: 19px;font-family: 黑体">合作协议</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">甲方融合网络平台与社会圈层的优势，为乙方提供企业宣传、产品销售、共享甲方会员等服务，甲乙双方在平等自愿的基础上，达成合作事宜，内容如下：</span>
								</p>
								<p style="margin-left: 0;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">一、双方的资格及权限</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（一）甲方是合法注册的经营企业，有合法的经营范围、充分的经营能力和经验从事本协议中的相关服务业务。</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（二）乙方是合法注册的经营企业，乙方应向甲方提交真实有效的资质证明文件，乙方保证对提交的资质证明文件的真实性、合法性和有效性承担全部责任，若因资质证明文件虚假、失效、缺失等产生法律责任的，由乙方独立承担。</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（三）乙方根据本协议在甲方网站上开展的业务经营和用户服务，其权利仅限于本协议所约定的内容，且只能由乙方自行单独行使，不得以任何方式转让该权利或与其他方共同使用。</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（四）甲方在与乙方合作的同时，有权与甲方以外的第三方进行合作。</span>
								</p>
								<p style="margin-left: 0;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">二、合作内容及方式</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（一）甲方向乙方开放其</span><span style="font-size: 14px;font-family: 黑体">平台，宣传展示乙方向甲方提供的经营相关</span><span style="font-size: 14px;font-family: 黑体">图</span><span style="font-size: 14px;font-family: 黑体">文</span><span style="font-size: 14px;font-family: 黑体">信</span><span style="font-size: 14px;font-family: 黑体">息</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px; line-height: 21px; font-family: 黑体;">（</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">二</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">）甲方为乙方</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">推介甲方会员到店消费，甲方向乙方支付代为预收的费用：人民币20元/次/人（</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">大写</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">贰拾元</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">）</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">，此款项发票</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">如会员已要求甲方</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">代开，</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">则</span><span style="font-size: 14px; line-height: 21px; font-family: 黑体;">乙方有向甲方开具收款发票的义务。</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（</span><span style="font-size: 14px;font-family: 黑体">三</span><span style="font-size: 14px;font-family: 黑体">）乙方在向</span><span style="font-size: 14px;font-family: 黑体">甲方会员</span><span style="font-size: 14px;font-family: 黑体">提供服务前，应通过甲方验证平台进行</span><span style="font-size: 14px;font-family: 黑体">会员卡券核消操作</span><span style="font-size: 14px;font-family: 黑体">，验证成功后，甲方次日支付</span><span style="font-size: 14px;font-family: 黑体">代收费</span><span style="font-size: 14px;font-family: 黑体">用</span><span style="font-size: 14px;font-family: 黑体">至乙方</span><span style="font-size: 14px;font-family: 黑体">指定</span><span style="font-size: 14px;font-family: 黑体">账户</span><span style="font-size: 14px;font-family: 黑体">（遇节假日顺延）。</span>
								</p>
								<p style="margin-left: 0;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">三、</span><span style="font-size: 14px;font-family: 黑体">合约期：默认一年。</span>
								</p>
								<p style="margin-left: 0;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">四</span><span style="font-size: 14px;font-family: 黑体">、违约责任</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">除非另有约定，否则甲乙任何一方未履行本协议约定的，在守约方要求改正的期限内未予以改正或改正后仍不符合本协议约定的，守约方有权解除协议，违约方须承担相应的违约责任。</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">对于乙方提供给甲方会员商品或服务所引发的任何</span><span style="font-size: 14px;font-family: 黑体">争议</span><span style="font-size: 14px;font-family: 黑体">而导致的甲方损失（包括但不仅于诉讼费、律师费、调查费、鉴定费等），乙方均应予以赔偿，并确保甲方不</span><span style="font-size: 14px;font-family: 黑体">因乙方过错</span><span style="font-size: 14px;font-family: 黑体">受损害。</span>
								</p>
								<p style="margin-left: 0;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">五</span><span style="font-size: 14px;font-family: 黑体">、责任免除</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">因战争、自然灾害等不可抗力导致本协议无法履行的，双方互不承担违约责任。</span>
								</p>
								<p style="margin-left: 0;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">六</span><span style="font-size: 14px;font-family: 黑体">、协议的终止</span>
								</p>
								<p style="margin-left: 0;text-indent: 19px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（一）本协议在符合以下条件时终止：</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">1、本协议期满未达到延期条件的；</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">2、双方达成一致提前终止协议的。</span>
								</p>
								<p style="margin-left: 0;text-indent: 19px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">（二）本协议</span><span style="font-size: 14px;font-family: 黑体">期满足</span><span style="font-size: 14px;font-family: 黑体">后，甲乙双方有未结算款项的，双方按照约定的结算方式结算。</span>
								</p>
								<p style="margin-left: 0;text-indent: 21px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">(三)</span><span style="font-size: 14px;font-family: 黑体">本协议期满后，双方均有意愿继续合作的，由双方另订协议延长。双方未及时订立延长协议的，视为按本协议</span><span style="font-size: 14px;font-family: 黑体">约定</span><span style="font-size: 14px;font-family: 黑体">的内容执行，有效期不定期延长，期间双方均有任意解除权。</span>
								</p>
								<p style="margin-left: 0;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">八</span><span style="font-size: 14px;font-family: 黑体">、协议争议解决</span>
								</p>
								<p style="margin-left: 0;text-indent: 28px;font-size: medium;font-family: Times;white-space: normal">
								    <span style="font-size: 14px;font-family: 黑体">凡因本协议与本协议有关的一切争议，由甲乙双方共同协商，</span><span style="font-size: 14px;font-family: 黑体">如</span><span style="font-size: 14px;font-family: 黑体">协商不成</span><span style="font-size: 14px;font-family: 黑体">，提交</span><span style="font-size: 14px;font-family: 黑体">成都市武侯区人民法院管辖</span><span style="font-size: 14px;font-family: 黑体">。</span>
								</p>
								<p>
								    <br/>
								</p>
							</div>
						</div>
					</div>
				</div>
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