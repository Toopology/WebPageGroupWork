define(function(require, exports, module) {

	var $ = require('jquery');
	require('uploadify/jquery.uploadify.v2.1.4.min');

	var text1 = '上传';
	var text2 = '上传临时文件夹（upload_tmp_dir）不可写或者域名/后台文件夹/include/uploadify.php没有访问权限。';
	var text3 = '上传成功';
	
	function uperror(r,t){ //错误提示
		t.html(r);
	}
	function upHandle(o,d,lval,cval){ //处理回传值
		d.val(o.path);

		var listval=$("input[name='"+lval+"']"),
		contentval=$("input[name='"+cval+"']");
		if(listval)listval.val(o.thumblist_path);
		if(contentval)contentval.val(o.thumbcontent_path);
	}
	function upload(d) { //上传
		var t_html,n=d.attr("name"),t,url,is_thumblist,is_thumbcontent;
		d.addClass("text").attr("style","display:block;");
		t_html ='<div class="metuplaodify">';
		t_html+='<form id="upfileFormmet_'+n+'" enctype="multipart/form-data">';
		t_html+='<div class="file_uploadfrom">';
		t_html+='<input name="'+n+'_upload" type="file">';
		t_html+='</div>';
		t_html+='<a href="javascript:;" title="'+text1+'" class="upbutn">'+text1+'</a>';
		t_html+='</form>';
		t_html+='<span class="uptips"></span>';
		t_html+='</div>';
		d.after(t_html);

		//
		$(document).on('mouseenter mouseout','.file_uploadfrom input',function(){
			if(event.type=='mouseover'){
				$(this).parent('.file_uploadfrom').next(".upbutn").addClass('upbutn_hover');
			}else if(event.type=='mouseout'){
				$(this).parent('.file_uploadfrom').next(".upbutn").removeClass('upbutn_hover');
			}
		});
		$(".file_uploadfrom").mousedown(function(){
			$(this).next(".upbutn").addClass("upbutn_active");
		}).mouseup(function(){
			$(this).next(".upbutn").removeClass("upbutn_active");
		}).mouseleave(function(){
			$(this).next(".upbutn").removeClass("upbutn_active");
		});
		//
		var w=d.attr('data-upload-imgwidth'),
			h=d.attr('data-upload-imgheight'),
			lval=d.attr('data-upload-listval'),
			cval=d.attr('data-upload-contentval');
		url = 'include/uploadifty.php?type=upfile';
		t = d.next('.metuplaodify').find(".uptips");
		$("input[name='"+n+"_upload']").change(function(){ //弹出选择文件
			$("#upfileFormmet_"+n).ajaxSubmit({ //异步上传并返回结果
				type: "POST",
				url: url,
				uploadProgress:function(e, w, l, r){
					t.html(r+'%');
				},
				error: function (r) {
					if(typeof r !== 'string')r=text2;
					uperror(r,t);
				},
				success: function (r) {
					var obj = eval('('+r+')');

					if(obj.error==0){
						t.html(text3);
						upHandle(obj,d,lval,cval);
					}else{
						uperror(obj.errorcode,t);
					}
				}
			});
			return false;
			$("#upfileFormmet_"+n).submit();
		});
		$("div.file_uploadfrom").css("opacity", "0");
		d.next(".metuplaodify").css('left',d.outerWidth());
	}
	exports.func = function(d){
		d = d.find('.ftype_upload .fbox input');
		d.each(function(){
			if($(this).data("upload-type")=='doupfile')upload($(this));
		});
	}
});
