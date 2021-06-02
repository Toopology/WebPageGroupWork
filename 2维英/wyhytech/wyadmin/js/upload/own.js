define(function(require, exports, module) {




	/*插入图片*/
	function imgadd(dom,src,value){

		$li = ' <li class="sort">' +
					'<a href="'+src+'" target="_blank">' +
						'<img src="'+src+'">' +
					'</a>' +
					'<span class="close hide" data-imgval="'+value+'">&times;</span>' +
				'</li>';
		dom.next().find(".app-image-list li.upnow").before($li);
	}
	/*重新赋值*/
	function imgvalue(dom){
		var list = dom.next().find('li.sort'),value = '',l = list.length;
		list.each(function(i){
			var vl = $(this).find("span").data('imgval');
			value += (i+1)==l?vl:vl + '|';
		});
		dom.attr('value',value);
	}

	exports.func = function(e){
		var ik = false,tf = false;
		//构建版面
		var es = e.find('.ftype_upload .fbox input');
		es.each(function(){
			if($(this).data("upload-type")=='doupimg' || $(this).data("upload-type")=='doupico'){
				ik = true;
				var dom = $(this),name = dom.attr('name');
				var doaction = $(this).data("upload-type");
				var data_key = $(this).data("upload-key");
				dom.hide();
				var html = '<div class="picture-list ui-sortable">';
					html+= '<ul class="js-picture-list app-image-list clearfix">';
					html+= '<li class="upnow">' +
							'<div data-name="'+name+'" id="filePicker_'+name+'" class="btn btn-default" style="border-radius:0px"><span class="uptxt">上传</span></div>' +
							'</li>';

					html+= '</ul>';
					html+= '</div>';
				dom.after(html);
				var src = dom.val();
				if(src){
					src += '|';
					var srcs = src.split('|'),isrc='';
					for(var i=0;i<srcs.length;i++){
						if(srcs[i]!=''){
							isrc = srcs[i];
							isrc =siteurl+isrc;
							imgadd(dom,isrc,srcs[i]);
							isrc = '';
						}
					}
				}
				require.async('upload/webuploader.min',function(){
					var uploaders = WebUploader.create({
						auto: true,
						swf: 'js/upload/Uploader.swf',
						server: 'include/uploadifty.php',
						pick: {
						id:'#filePicker_'+name,
						multiple :false
						},
						compress:{
							width: 2000,
							height: 2000,
							noCompressIfLarger: true
						},
						accept: {
							title: 'Images',
							extensions: 'gif,jpg,jpeg,bmp,png,ico',
							mimeTypes: 'image/*'
						}
					});
					//文件上传成功时
					uploaders.on( 'uploadSuccess', function( file, response ) {

						if(response.error!='0'){
							alert(response.errorcode);
						}else{
							if(!dom.data('upload-many')){
								if(dom.next().find('li.sort').length)dom.next().find('li.sort').remove();
							}
							var path =siteurl+response.path;
							imgadd(dom,path,response.path);
							imgvalue(dom);
						}
					});
					uploaders.on( 'startUpload', function() {
						$('#filePicker_'+name+' span.uptxt').html("上传中...");
					});
					//文件全部上传完成时
					uploaders.on( 'uploadFinished', function( file ) {
						$('#filePicker_'+name+' span.uptxt').html("上传");
					});
				});
			}
			if($(this).data("upload-type")=='doupfile'){
				tf = true;
			}
		});
		if(tf){
			require.async('uploadify/upload',function(a){
				a.func(e);
			});

		}
		if(ik){

			/*拖曳排序*/
			require.async('dragsort/jquery.dragsort-0.5.2.min',function(){
				$('.ftype_upload ul.app-image-list').dragsort({
					dragSelector: "li.sort",
					dragBetween: false ,
					dragEnd: function() {
						var dom = $(this).parents('.picture-list').prev();
						imgvalue(dom);
					}
				});
			});
			$(document).on('mouseover','.ftype_upload .app-image-list li.sort',function(){
				$(this).find("span").removeClass('hide');
			})
			$(document).on('mouseout','.ftype_upload .app-image-list li.sort',function(){
				$(this).find("span").addClass('hide');
			})
			//删除按钮
			$(document).on('click','.ftype_upload .app-image-list li.sort span',function(){
				if(confirm('你确定要删除吗？')){
					var dom = $(this).parents('.picture-list').prev();

					$(this).parent('li.sort').remove();
					imgvalue(dom);
				}

			});
			//imgku();//图片库
		}

	}
});
