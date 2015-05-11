var mapcenter = "";
(function(exports){
	
	var map = new AMap.Map('mapContainer', {
		//resizeEnable: true,
		//rotateEnable: true,
		//dragEnable: true,
		//zoomEnable: true,
		//设置可缩放的级别
		zooms: [9,18],
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
			mapcenter = center;
			//$("#address").val(center);
		}
	);
})(window);

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
	if (mapcenter == "") {
		warring("地图选择");
	} else{
		var lng = mapcenter.lng;
		var lat = mapcenter.lat;
	};
	var agentid = "";
	if($("#hasagent").attr("class") == "active"){
		agentid = $("#sagent").val() ? $("#sagent").val() : warring("所属商户");
	}
	$.post("/agentshop/newshop",
		{
			shopagentid:agentid,
			shoptypeid:shoptype,
			shopname:shopname,
			shoptel:shoptel,
			shoptel2:shoptel2,
			sproviceid:sprovice,
			scityid:scity,
			sareaid:sarea,
			address:address,
			lng:lng,
			lat:lat,
			starttime:starttime,
			endtime:endtime
		},
		function(ret){
			console.log(ret);
			if ("" != ret.error ) {
				alert(ret.error);
			}
			else{
				alert("店铺创建成功!");
				// window.location.href="/agentshop/shopinfo/shopid/"+ret.agentshopid;
				window.location.href="/agentshop/shopinfo/";
			}
		}

	);
});
function warring(errstr)
{
	alert(errstr+" 不能为空,请选填!");
	throw "";
}