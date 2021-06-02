window.onload=function(){
	//parent.document.all("main_frame").style.height=document.body.scrollHeight+20+'px';
	reinitIframe();
	
}

function reinitIframe(){
	var iframe = parent.document.getElementById("main_frame");
	try{
		var bHeight = iframe.contentWindow.document.body.scrollHeight;
		var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
		var height = Math.max(bHeight, dHeight);iframe.height = height;
	}
	catch (ex)
	{}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function checkFrm(){
	et.save();	
	if (document.getElementById("title").value=="") {
		alert("请输入产品名称")
		document.getElementById("title").focus();
		return false;
	}
	if (document.getElementById("preview").value=="") {
		alert("请上传产品缩略图")
		document.getElementById("preview").focus();
		return false;
	}
	if (document.getElementById("content").value=="") {
		alert("请输入产品介绍")
		return false;
	}
}

function checkFrm(){
	et.save();	
	if (document.getElementById("title").value=="") {
		alert("请输入新闻标题")
		document.getElementById("title").focus();
		return false;
	}

	if (document.getElementById("content").value=="") {
		alert("请输入新闻内容")
		return false;
	}
}
