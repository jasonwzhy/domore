$(".editdmprice").click(function(){
	$(".editdomoreprice").toggle(500);
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
			shoptag:shoptag
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
$(".tagbg").click(function(){
	if ($(this).attr("class").indexOf("active")>=0) {
		$(this).attr("class","tagbg");
	}else{
		$(this).attr("class","tagbg active");
	}
});