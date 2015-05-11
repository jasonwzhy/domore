$("#sprovice").change(function(){
	var getzcode = $("#sprovice").find("option:selected").attr("zcode");
	$("#sprovice option[value='']").remove();
	if ($(this).val() == "") {
		return 
	} else{
		getregion(getzcode,2);
	};			
});
$("#scity").change(function(){
	var getzcode = $("#scity").find("option:selected").attr("zcode");
	$("#scity option[value='']").remove();
	if ($(this).val() == "") {
		return 
	} else{
		getregion(getzcode,3);
	};			
});
// var optiontpl = "<option>"
// "<option value="+region_id+"zcode="+zipcode+"><"+areaname+"></option>"
function getregion(pzcode,alevel){
	$.ajax({
		url: "/manage/agentshop/getregion/pzcode/"+pzcode+"/alevel/"+alevel,
		success: function(ret){
			if (alevel == 2) {
				// if (ret == null) {//上级为直辖市 本级复制上级option后 disable
				// 	changesciyt(ret);
				// 	// $("#scity").append("<option value="+1+"zcode="+1+"><"+21+"></option>");
				// } else{
				// 	alert("here");
				// 	$.each(ret,function(n,val){
				// 		$("#scity").append("<option value="+val.region_id+"zcode="+val.zipcode+">"+val.areaname+"</option>");	
				// 	});
				// };
				changesciyt(ret);
			}else if(alevel == 3){
				changesarea(ret);
			};
		}
	});
};
function changesciyt(optiondata){
	$("#scity").empty();
	if (optiondata == "") {
		//alert($("#sprovice").find("option:selected"));
		$("#scity").append($("#sprovice").find("option:selected").clone());
	} else{
		$.each(optiondata,function(index,item){
			$("#scity").append("<option value="+'"'+item.region_id+'"'+"zcode="+'"'+item.zipcode+'"'+">"+item.areaname+"</option>");
		});

	};
	var getzcode = $("#scity").find("option:selected").attr("zcode");
	getregion(getzcode,3);

};
function changesarea(optiondata){
	$("#sarea").empty();
	if(optiondata == ""){

	}else{
		$.each(optiondata,function(index,item){
			$("#sarea").append("<option value="+'"'+item.region_id+'"'+"zcode="+'"'+item.zipcode+'"'+">"+item.areaname+"</option>");
		});
	};
};