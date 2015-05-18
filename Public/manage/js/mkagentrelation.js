$(".nomember").click(function(){
	// alert($(this).attr("id"));
	if ($(this).attr("class").indexOf("active")>=0) {
		$(this).attr("class","row reshopitem nomember");
	} else{
		$(this).attr("class","row reshopitem nomember active");
	};

});
$("#mkagentrelation").click(function(){
	var agentid = $(this).attr("agentid");
	var ids = new Array();
	$(".active").each(function(){
		ids.push($(this).attr("id"));		
	});
	console.log(ids);
	$.post("/manage/agentshop/agentaddshop",
		{
			agentid:agentid,
			ids:ids
		},
		function(ret){
			if (ret.error == "") {//success
				alert('商户关联场馆成功');
				window.location.href="/manage/agentshop/myagent";
			}else{//err
				alert(ret.error);
			}
			
		}
	);

});