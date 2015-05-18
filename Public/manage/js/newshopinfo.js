$("#upimgbtn").click(function(){
	 $('input[id=upimg]').click();

})
function dataURItoBlob(dataURI) {
    // convert base64 to raw binary data held in a string 
    var byteString 
        ,mimestring 

    if(dataURI.split(',')[0].indexOf('base64') !== -1 ) {
        byteString = atob(dataURI.split(',')[1])
    } else {
        byteString = decodeURI(dataURI.split(',')[1])
    }
    

    mimestring = dataURI.split(',')[0].split(':')[1].split(';')[0]
    
    var content = new Array();
    for (var i = 0; i < byteString.length; i++) {
        content[i] = byteString.charCodeAt(i)
    }
    console.log(mimestring);
    console.log(content);
    return new Blob([new Uint8Array(content)], {type: mimestring});
}
function loadding(){
	$("#addshoppicform").addClass("loadding");
	$("#addplusspan").removeClass("glyphicon-plus");
}
function loadend(){
	$("#addshoppicform").removeClass("loadding");
	$("#addplusspan").addClass("glyphicon-plus");
}
$("#upimg").change(function(){
	if ($('input[id=upimg]').val() == "") {
		
	} else{
		loadding();
		var formData = new FormData($( "#addshoppicform" )[0]);
		// console.log(formData);
		var file = this.files[0];
		// console.log(file);
		var url = URL.createObjectURL(file);
		var img = new Image();
		 
		img.onload = function() {
			//生成比例
			var width = img.width,
				height = img.height,  
				scale = width / height;  
			// console.log(scale);
			width = parseInt(800);  
			height = parseInt(width / scale);
			//生成canvas  
			var $canvas = $('#myCanvas');  
			var ctx = $canvas[0].getContext('2d');  
			$canvas.attr({width : width, height : height});  
			ctx.drawImage(img, 0, 0, width, height);  
			var base64 = $canvas[0].toDataURL('image/jpeg',0.5);  
			var blob = dataURItoBlob(base64);
			var fdata = new FormData();
			fdata.append("myupimg",blob);
			$.ajax({
				url: '/manage/agentshop/shopinfo',
				type: 'POST',
				data: fdata,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function (returndata) {
					console.log(returndata);
					loadend();
					addpic(returndata.imgpath,returndata.albumsid);
					alert("上传成功");
				},
				error: function (returndata) {
					console.log(returndata);
					alert("图片上传失败,请将图片控制在3M以内,并且用 jpg | gif | png | jpeg格式");
					loadend();
				}
			})
		}
		img.src = url;
		//console.log(formData);
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
	$("#subbtn").text("提交中...").attr("disabled","true");
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
				$("#subbtn").text("重新提交").removeAttr("disabled");
				console.log(ret);
			}else{
				alert("提交成功!");
				window.location.href="/manage/agentshop/newshop/";
			}
		}
	);
});




