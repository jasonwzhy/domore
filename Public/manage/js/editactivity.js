

$("#delactbtn").click(function(){
	var actid = $("#delactbtn").attr("actid");
	var sid = $("#delactbtn").attr("sid");
	$.post("/manage/agentshop/delactivity",
		{
			actid:actid,
		},
		function(ret){
			window.location.href="/manage/agentshop/shopdetail/sid/"+sid;
		}
	);
})
$("#editactbtn").click(function(){
	var actid = $("#editactbtn").attr("actid");
	var sid = $("#delactbtn").attr("sid");
	var actname = $("#actname").val();
	var actstartdt = $("#actstartdt").val();
	var actenddt = $("#actenddt").val();
	var actdesc = $("#actdesc").val();

	$.post("/manage/agentshop/subactivityedit",
		{
			actid:actid,
			actname:actname,
			actstartdt:actstartdt,
			actenddt:actenddt,
			actdesc:actdesc
		},
		function(ret){
			window.location.href="/manage/agentshop/shopdetail/sid/"+sid;
		}
	);
});