// JavaScript Document
//通用函数
$(function(){
	ajax_chk_login('login_form');		   
});

function ajax_chk_login(frm_id){
	$.ajax({
		type:'POST',
		data:'act=chk_login',
		url:'ajax.asp',
		cache:false,
		success:function(data){
			//alert(data)
			if(data!='') $('#'+frm_id+'').html(data);
		}
	});
	return false;
}

function ajax_login(frm_id){
	var uname = $('#'+frm_id+' #uname').val();
	var passwd = $('#'+frm_id+' #passwd').val();
	$.ajax({
		type:'POST',
		data:'act=login&uname='+uname+'&passwd='+passwd,
		url:'ajax.asp',
		cache:false,
		success:function(data){
			//alert(data)
			if (data.indexOf('success')>=0) {
				//window.location.reload();	
				window.location.href = 'u_list.asp';	
			}else if (data.indexOf('failed')>=0) {
				alert('登录失败，请检查您输入的帐号和密码');	
			}
		}
	});
	return false;
}

function ajax_logout(){
	$.ajax({
		type:'POST',
		data:'act=logout',
		url:'ajax.asp',
		cache:false,
		success:function(data){
			//alert(data)
			window.location.reload();
		}
	});
}

function setMenuStyle(m) {
	$("#top_nav ."+m).attr('class','mouseon');	
}

function copyToClipBoard(title,url){
	var clipBoardContent=""+title+"：\r\n"+url+"\r\n(来自叶子的博客)";
	window.clipboardData.clearData();
	window.clipboardData.setData("Text",clipBoardContent);
	alert("复制成功，请粘贴到你的QQ/MSN上推荐给你的好友！\r\n\r\n内容如下：\r\n" + clipBoardContent);	
}


//---------------------------------------------------------------------
// 顶和踩文章功能
//---------------------------------------------------------------------
function setEval(){
	var nickname = escape($("#voteForm #nickname").val());
	var score = $("#voteForm #score").val();
	var remark = escape($("#voteForm #remark").val());
	var vid = parseInt($("#voteForm #vid").val());
	
	if(nickname == '') {
		tipsWindown("错误", "text:请留下您的昵称！", "400", "160", "true", "", "true", "text");
		return false;
	}
	if(score == '') {
		tipsWindown("错误", "text:请选择您的评分！", "400", "160", "true", "", "true", "text");
		return false;
	}
	if(remark == '') {
		tipsWindown("错误", "text:请留下您的点评！", "400", "160", "true", "", "true", "text");
		return false;
	}
	
	//alert(cb)
	$.ajax({
	   type: "POST",
	   url: "ajax.asp",
	   cache:false,
	   data: "act=saveEval&score="+score+"&parentid="+vid+"&remark="+remark+"&nickname="+nickname,
	   success: function(msg){
		   //alert(msg)
		   if (msg=="repeat") {
				alert("请不要重复评分。");   
			}else{
		   		loadComment(vid);
			}
	   }
	}); 
	return false;
}


//---------------------------------------------------------------------
// 保存用户评论
//---------------------------------------------------------------------
function saveComment(){
	var nickname=escape($("#commentForm #nickname").val());
	var content=escape($("#commentForm #content").val());
	var parentid=$("#commentForm #parentid").val();
	var channelid=$("#commentForm #channelid").val();
	var title=escape($("#commentForm #title").val());

	if (nickname=="") {alert("请留下您的大名？");return false;}
	if (content=="") {alert("想说点什么？");return false;}
	
	$.ajax({
	   type: "POST",
	   url: "ajax.asp",
	   cache:false,
	   data: "act=saveComment&title="+title+"&channelid="+channelid+"&parentid="+parentid+"&content="+content+"&nickname="+nickname+ "&t="+((new Date()).valueOf()),
	   success: function(msg){
		$("#commentForm #content").val("");
		 //loadComment(parentid,channelid);
	   }
	}); 
}


//---------------------------------------------------------------------
// 读取用户评论
//---------------------------------------------------------------------
function loadComment(vid,cid,p){
	//alert(vid)
	tipsWindown("提示", "text:正在读取数据，请稍等", "400", "120", "true", "", "true", "text");
	$.post("ajax.asp", { act: "loadComment", parentid: vid, channelid: cid,page:p, t: ((new Date()).valueOf()) },
	  function(data){
		$("#load_comment").html(data);
		closeTipswindown();
	}); 
}

//---------------------------------------------------------------------
// 书签的点击次数
//---------------------------------------------------------------------
function linkHits(id){
	$.post("/ajax_comment.asp", { act: "linkHits", id: id, t: ((new Date()).valueOf()) },
	  function(data){
		//$("#load_comment").html(data);
	}); 
}

