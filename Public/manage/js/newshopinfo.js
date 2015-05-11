$("#upimgbtn").click(function(){
	 $('input[id=upimg]').click();

})
$("#upimg").change(function(){
	if ($('input[id=upimg]').val() == "") {
		
	} else{
		//alert($('input[id=upimg]').val());
		var formData = new FormData($( "#addshoppicform" )[0]);
		//console.log(formData);
		$.ajax({
			url: '/manage/agentshop/shopinfo',
			type: 'POST',
			data: formData,
			async: true,
			cache: false,
			contentType: false,
			processData: false,
			success: function (returndata) {
				//addpic(returndata.savepath+returndata.savename);
				//console.log(returndata.savepath+returndata.savename);
				console.log(returndata);
				addpic(returndata.imgpath,returndata.albumsid);

				alert("上传成功");
			},
			error: function (returndata) {
				alert("图片上传失败,请将图片控制在3M以内,并且用 jpg | gif | png | jpeg格式");
			}
		})
	};
	$("input[id=upimg]").val('');
});
function addpic(imgpath,albumsid){
	$("#addimg").before('<div class="col-xs-4 shoppic" style="overflow:auto"><a href="#" type="button" class="" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="onshoppic(this);"><img src="'+imgpath+'" id="'+albumsid+'" class="shoppic img-responsive img-rounded" alt="Responsive image"></a></div>');
};

// $(".shoppic").click(function(){
// 	alert($(this).find('img').attr("id"));
// });
function onshoppic(thisobj){
	var imgid = $(thisobj).find('img').attr("id")
	$(".delshoppic").attr("id",imgid);
};
function delshoppic(thisobj){
	albumsid = $(thisobj).attr("id");
	$.post("/manage/agentshop/delshoppic",
		{
			albumsid:albumsid
		},
		function(ret){
			if (ret.error == "") {//success
				alert('success');
				var imgsel = "#"+albumsid;
				$(imgsel).parent().parent().remove();
				$('#myModal').modal('hide');
			}else{//err
				alert(ret.error);
			}
			
		}
	);
}

$("#subbtn").click(function(){
	var shopdesc = $("#shopdesc").val();
	var shopmanager = $("#shopGM").val();
	var shopmanagertel = $("#shopGMtel").val();
	var shopmanageremail = $("#shopGMemail").val();
	$.post("/manage/agentshop/shopinfo",
		{
			shopdesc:shopdesc,
			shopmanager:shopmanager,
			shopmanagertel:shopmanagertel,
			shopmanageremail:shopmanageremail,
		},
		function(ret){
			if (ret.error != "") {//success
				alert(ret.error);
				console.log(ret);
			}else{
				alert("提交成功!");
				window.location.href="/manage/agentshop/newshop/";
			}
		}
	);
});




