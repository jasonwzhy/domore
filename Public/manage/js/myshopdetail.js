$(".editdmprice").click(function(){
	$(".editdomoreprice").toggle(200);
});
$(".addactivitybtn").click(function(){
	console.log("log");
	$(".addactivity").toggle(200);
});
$("#subeditpricebtn").click(function(){
	var marketprice = $("#marketprice").val() ? $("#marketprice").val() : 0;
	var domorecontractprice = $("#domorecontractprice").val() ? $("#domorecontractprice").val() : 0;
	var domoreprice = $("#domoreprice").val() ? $("#domoreprice").val() : 0;
	var idlecontractprice = $("#idlecontractprice").val() ? $("#idlecontractprice").val() : 0;
	var idledomoreprice = $("#idledomoreprice").val() ? $("#idledomoreprice").val() : 0;
	var agentshopid = $("#subeditpricebtn").attr('sid');
	var timelimit = $("#timelimit").val() ? $("#timelimit").val() : 0;
	var shoptag = "";
	$(".tagbg").each(function(){
		if ($(this).attr("class").indexOf("active")>=0) {
			shoptag += $(this).attr("value")+",";
		}
	});
	var descp = $("#descp").val() ? $("#descp").val() : '';
	shoptag = shoptag.substring(0,shoptag.length-1);
	console.log(shoptag);
	$.post("/manage/agentshop/updateshopprice",
		{
			agentshopid:agentshopid,
			marketprice:marketprice,
			domorecontractprice:domorecontractprice,
			domoreprice:domoreprice,
			idlecontractprice:idlecontractprice,
			idledomoreprice:idledomoreprice,
			timelimit:timelimit,
			shoptag:shoptag,
			descp:descp
		},
		function(ret){
			location.reload();
			// if ("" != ret.error) {
			// 	alert(ret.error);
			// } else{
			// 	location.reload();
			// };
		}
	);
});
$("#submitactbtn").click(function(){
	var actname = $("#actname").val() ? $("#actname").val() : warring("活动名称");
	var actstartdt = $("#actstartdt").val() ? $("#actstartdt").val() : warring("活动开始时间");
	var actenddt = $("#actenddt").val() ? $("#actenddt").val() : warring("活动结束时间");
	var actdesc = $("#actdesc").val() ? $("#actdesc").val() : warring("活动描述");
	var shopid = $("#submitactbtn").attr("sid");
	$.post("/manage/agentshop/addactivity",
		{
			actname:actname,
			actstartdt:actstartdt,
			actenddt:actenddt,
			actdesc:actdesc,
			shopid:shopid
		},
		function(ret){
			location.reload();
		}
	);
});
$(".tagbg").click(function(){
	if ($(this).attr("class").indexOf("active")>=0) {
		$(this).attr("class","tagbg");
	}else{
		$(this).attr("class","tagbg active");
	}
});
function warring(errstr)
{
	alert(errstr+" 不能为空!");
	throw "";
}