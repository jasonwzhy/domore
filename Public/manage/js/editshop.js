var mapcenter = "";
(function(exports){
	var toolBar, locationInfo;
	var lon = $("#mapContainer").attr("lon");
	var lat = $("#mapContainer").attr("lat");
	var map = new AMap.Map('mapContainer', {
		// resizeEnable: true,
		//rotateEnable: true,
		//dragEnable: true,
		//zoomEnable: true,
		//设置可缩放的级别
		zooms: [9,18],
		// 传入2D视图，设置中心点和缩放级别
		view: new AMap.View2D({
			center: new AMap.LngLat(lon,lat),
			zoom: 18
		})
	});
	// map.plugin(["AMap.ToolBar"],function(){
	// 	var toolBar = new AMap.ToolBar({
	// 		autoPosition:true,
	// 		ruler:false,
	// 		direction:false,
	// 		// locationMarker:false
	// 	});
	// 	toolBar.hide();
	// 	map.addControl(toolBar);
	// 	toolBar.doLocation();
	// 	var locallisten = AMap.event.addListener(toolBar,'location',function callback(e){	
	// 		locationInfo = e.lnglat;
	// 		// toolBar.doLocation();
			
	// 		if (toolBar.doLocation() == undefined) {
	// 			AMap.event.removeListener(locallisten);
	// 		};
	// 	});
	// 	// AMap.event.removeListener(locallisten);
	// 	// toolBar.hideLocation();
	// 	// toolBar.hide();
	// });
	

	// map.plugin(["AMap.ToolBar"],function(){		
	// 		toolBar = new AMap.ToolBar(); //设置地位标记为自定义标记
	// 		map.addControl(toolBar);		
	// 		toolBar.doLocation();
	// 		AMap.event.addListener(map,'location',function callback(e){	
	// 			locationInfo = e.lnglat;		
	// 			toolBar.doLocation();
	// 		});
	// 	});

	$(".markicon").show();
	AMap.event.addListener(map,"moveend",function callback(e)
		{
			var center = map.getCenter();
			mapcenter = center;
			//$("#address").val(center);
			console.log(mapcenter);
		}
	);
})(window);

$("#noappointment").click(function(){
	$("#appointmenttype").hide();
});
$("#appointment").click(function(){
	$("#appointmenttype").show();
});

$("#createsub").click(function(){
	var shoptype = $("#shoptype").val() ? $("#shoptype").val() : warring("场馆类型");
	var shopname = $("#shopname").val() ? $("#shopname").val() : warring("场馆名");
	var shoptel	= $("#shoptel").val() ? $("#shoptel").val() : warring("场馆联系电话");
	var shoptel2 = $("#shoptel2").val();
	var sprovice =	$("#sprovice").val() ? $("#sprovice").val() : warring("省份");
	var scity = $("#scity").val() ? $("#scity").val() : warring("城市");
	var sarea = $("#sarea").val() ? $("#sarea").val() : warring("区域");
	var address = $("#address").val() ? $("#address").val() : warring("详细地址");
	var starttime = $("#startdtpicker").val();
	var endtime = $("#enddtpicker").val();
	if ($("#noappointment").attr("class").indexOf("active")>=0) {
		var isappointment = 0;
		var appointmenttime = 0;
	}else{
		var isappointment = 1;
		var appointmenttime = $("#appointmenttime").val();
	}
	if (mapcenter == "") {
		// warring("地图选择");
		var lng = $("#mapContainer").attr("lon");
		var lat = $("#mapContainer").attr("lat");
	} else{
		var lng = mapcenter.lng;
		var lat = mapcenter.lat;
	};
	var agentid = "";
	agentid = $("#sagent").val() ? $("#sagent").val() : null;
	var agentshopid = $("#createsub").attr("sid");
	// console.log(agentshopid,agentid,shoptype,shopname,shoptel,shoptel2,sprovice,scity,sarea,address,lng,lat,starttime,endtime,isappointment,appointmenttime);
	$("#createsub").text("场馆资料提交中...").attr("disabled","true");
	$.post("/manage/agentshop/subshopedit",
		{
			agentshopid:agentshopid,
			agentid:agentid,
			shopname:shopname,
			shoptel:shoptel,
			shoptel2:shoptel2,
			proviceid:sprovice,
			cityid:scity,
			areaid:sarea,
			address:address,
			lng:lng,
			lat:lat,
			shoptypeid:shoptype,
			isappointment:isappointment,
			appointmenttime:appointmenttime,
			starttime:starttime,
			endtime:endtime
		},
		function(ret){
			window.location.href="/manage/agentshop/editshopinfo/sid/"+agentshopid;
			// if ("" != ret.error ) {
			// 	alert(ret.error);
			// 	$("#createsub").text("重新提交").removeAttr("disabled");
			// }
			// else{
			// 	// alert("店铺创建成功!");
			// 	// window.location.href="/agentshop/shopinfo/shopid/"+ret.agentshopid;
			// 	window.location.href="/manage/agentshop/editshopinfo/sid/"+agentshopid;
			// }
		}

	);
});
