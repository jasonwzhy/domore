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
	<ul class="nav nav-tabs">
		<li role="presentation" class="active">
			<a href="#agent" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">非联盟商户</a>
			
		</li>
		<li role="presentation" class="">
			<a href="#memberagent" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">联盟商户</a>
			<!-- <a href="#">321</a> -->
		</li>
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="agent">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<form class="">
							<div class="form-group">
								<select class="form-control">
									<option value="">-场馆类型-</option>
									<option value="1">健身房</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="agentname" name="agentname" placeholder="场馆名">
							</div>
							<div class="form-group">
								<input type="number" class="form-control" id="tel" name="tel" placeholder="前台电话">
							</div>
							<div class="form-group col-xs-4 form-group-nopadding">
								<select class="form-control">
									<option value="">-省/直辖市-</option>
									<option value="1">健身房</option>
								</select>
							</div>
							<div class="form-group col-xs-4 form-group-nopadding">
								<select class="form-control">
									<option value="">-市区-</option>
									<option value="1">健身房</option>
								</select>
							</div>
							<div class="form-group col-xs-4 form-group-nopadding">
								<select class="form-control">
									<option value="">-区-</option>
									<option value="1">健身房</option>
								</select>
							</div>
							<div class="form-group">
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
					<div class="col-xs-12 nextbtn">
						<button type="button" class="col-xs-12 btn btn-default btn-block">下一步</button>
					</div>

				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="memberagent">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>联盟商户</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript" src="/Public/manage/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/Public/manage/js/bootstrap.js"></script>
	<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=ac8dc3ed6052d2d27fc0b1c97266d1a0"></script>
	<script type="text/javascript">
		(function(exports){
			
			var map = new AMap.Map('mapContainer', {
				//resizeEnable: true,
				//rotateEnable: true,
				//dragEnable: true,
				//zoomEnable: true,
				//设置可缩放的级别
				//zooms: [3,18],
				//传入2D视图，设置中心点和缩放级别
				view: new AMap.View2D({
					center: new AMap.LngLat(104.061986,30.658611),
					zoom: 11
				})
			});
			$(".markicon").show();
			AMap.event.addListener(map,"moveend",function callback(e)
				{
					var center = map.getCenter();
					$("#address").val(center);
				}
			);
			// var marker = new AMap.Marker({	
			// 	offset:new AMap.Pixel(-18,-40),
			// 	//复杂图标
			// 	icon: new AMap.Icon({    
			// 		//图标大小
			// 		// size:new AMap.Size(28,37),
			// 		//大图地址
			// 		// image:"img/localtion.png", 
			// 		imageOffset:new AMap.Pixel(0,0),
			// 		size:new AMap.Size(36,36),
			// 		imageSize:new AMap.Size(36,36)
			// 	}),
			// 	//在地图上添加点
			// 	// position:new AMap.LngLat(116.405467,39.907761)

			// });
			// marker.setMap(map);  
		})(window);

		
	</script>
	
</body>
</html>