/**
 * tipsWindow: 11.11.12
 * feedback: www.51sea.com
 * require: jquery
 */
var ticket_host;//js path
var max_w = 950;
var max_h = 527;
ticket_host = document.getElementsByTagName("script");
ticket_host = ticket_host[ticket_host.length-1].src.substring(0,ticket_host[ticket_host.length-1].src.lastIndexOf("/")+1);

function tipsWindow(title, content, width, height, drag, time, showbg, cssName) {
	$("#windown-box").remove(); //clear old content
	var width = width>=max_w?this.width=max_w:this.width=width;	     //set max width
	var height = height>=max_h?this.height=max_h:this.height=height; //set max height
	if(true == true) {
		var simpleWindown_html = new String;
		simpleWindown_html = "<div id=\"windownbg\" style=\"height:"+($(document).height()-5)+"px;filter:alpha(opacity=0);opacity:0;z-index: 999901\"></div>";
		simpleWindown_html += "<div id=\"windown-box\">";
		simpleWindown_html += "<div id=\"windown-title\"><h2></h2><span id=\"windown-close\">close</span></div>";
		simpleWindown_html += "<div id=\"windown-content-border\"><div id=\"windown-content\"><img src='" + ticket_host + "loadingone.gif' class='loading'/></div></div>"; 
		simpleWindown_html += "</div>";
		$("body").append(simpleWindown_html);
		show = false;
	}
	contentType = content.substring(0,content.indexOf(":"));
	content = content.substring(content.indexOf(":")+1,content.length);
	switch(contentType) {
		case "text":
			var errorResult = "<table width=\"480\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" id=\"okl11\">";
			    errorResult += 	"<tr>";
			    errorResult += 		"<td width=\"25%\" align=\"right\" style=\"color:#666\"><img src='" + ticket_host + "errormark.jpg' width=\"59\" height=\"64\"/></td>";
			    errorResult += 		"<td width=\"75%\">&nbsp;&nbsp;" + content + "</td>";
			    errorResult += 	"</tr>";
				errorResult += 	"<tr>";
				errorResult += 		"<td colspan=\"2\" align=\"center\"><img src='" + ticket_host + "close.gif' width=\"64\" height=\"23\" style=\"cursor:pointer\" onclick=\"closeTipswindow()\"/></td>";
				errorResult += 	"</tr>";
			  	errorResult += "</table>";
			$("#windown-content").html(errorResult);
			break;
		case "id":
			$("#windown-content").html($("#"+content+"").html());
			break;
		case "img":
			$("#windown-content").ajaxStart(function() {
				$(this).html("<img src='"+ticket_host+"loadingone.gif' class='loading' />");
			});
			$.ajax({
				error:function(){
					$("#windown-content").html("<p class='windown-error'>Loading error...</p>");
				},
				success:function(html){
					$("#windown-content").html("<img onload='resizeTipswin(this)' src='"+content+"' alt='"+title+"' />");
				}
			});
			break;
		case "url":
			var content_array=content.split("?");
			$("#windown-content").ajaxStart(function(){
				$(this).html("<img src='" + ticket_host + "loadingone.gif' class='loading' />");
			});
			$.ajax({
				type:content_array[0], url:content_array[1], data:content_array[2],cache:false,
				error:function(){
					$("#windown-content").html("<p class='windown-error'>Loading error...</p>");
				},
				success:function(html){
					$("#windown-content").html(html);
				}
			});
			break;
		case "iframe":
			$("#windown-content").ajaxStart(function(){
				$(this).html("<img src='"+ticket_host+"loadingone.gif' class='loading' />");
			});
			$("#windown-content").html("<iframe src=\""+content+"\" width=\"100%\" height=\""+parseInt(height)+"px"+"\" scrolling=\"auto\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"></iframe>");
	}
	$("#windown-title h2").html(title);
	if(showbg == "true") {
		$("#windownbg").show();
	}else {
		$("#windownbg").remove();
	};
	$("#windownbg").animate({opacity:"0.5"},"normal");//set opacity
    if( height >= max_h ) {
        $("#windown-title").css({width:(parseInt(width)+22)+"px"});
        $("#windown-content").css({width:(parseInt(width)+17)+"px",height:height+"px"});
    }else {
        $("#windown-title").css({width:(parseInt(width)+10)+"px"});
        $("#windown-content").css({width:width+"px",height:height+"px"});
    }
	var	cw = document.documentElement.clientWidth,ch = document.documentElement.clientHeight,est = document.documentElement.scrollTop; 
	var _version = $.browser.version;
	if ( _version == 6.0 ) {
		$("#windown-box").css({left:"50%",top:(parseInt((ch)/2)+est)+"px",marginTop: -((parseInt(height)+53)/2)+"px",marginLeft:-((parseInt(width)+32)/2)+"px",zIndex: "999999"});
	}else {
		$("#windown-box").css({left:"50%",top:"50%",marginTop:-((parseInt(height)+53)/2)+"px",marginLeft:-((parseInt(width)+32)/2)+"px",zIndex: "999999"});
	};
	$("#windown-box").show();
	var Drag_ID = document.getElementById("windown-box"),DragHead = document.getElementById("windown-title");
	var moveX = 0,moveY = 0,moveTop,moveLeft = 0,moveable = false;
		if ( _version == 6.0 ) {
			moveTop = est;
		}else {
			moveTop = 0;
		}
	var	sw = Drag_ID.scrollWidth,sh = Drag_ID.scrollHeight;
		DragHead.onmouseover = function(e) {
			if(drag == "true"){DragHead.style.cursor = "move";}else{DragHead.style.cursor = "default";}
		};
		DragHead.onmousedown = function(e) {
		if(drag == "true"){moveable = true;}else{moveable = false;}
		e = window.event?window.event:e;
		var ol = Drag_ID.offsetLeft, ot = Drag_ID.offsetTop-moveTop;
		moveX = e.clientX-ol;
		moveY = e.clientY-ot;
		document.onmousemove = function(e) {
				if (moveable) {
				e = window.event?window.event:e;
				var x = e.clientX - moveX;
				var y = e.clientY - moveY;
					if ( x > 0 &&( x + sw < cw) && y > 0 && (y + sh < ch) ) {
						Drag_ID.style.left = x + "px";
						Drag_ID.style.top = parseInt(y+moveTop) + "px";
						Drag_ID.style.margin = "auto";
						}
					}
				}
		document.onmouseup = function () {moveable = false;};
		Drag_ID.onselectstart = function(e){return false;}
	}
	$("#windown-content").attr("class","windown-"+cssName);
	var closeWindown = function() {
		$("#windownbg").remove();
		$("#windown-box").fadeOut("slow",function(){$(this).remove();});
	}
	if( time == "" || typeof(time) == "undefined") {
		$("#windown-close").click(function() {
			//$("#windownbg").remove();
			//$("#windown-box").fadeOut("slow",function(){$(this).remove();});
			closeTipswindow();
		});
	}else { 
		setTimeout(closeWindown,time);
	}
}
function resizeTipswin(e){
    var w = e.width,h=e.height;
    var	cw = document.documentElement.clientWidth,ch = document.documentElement.clientHeight,est = document.documentElement.scrollTop;
    if(w>max_w) {
        h = h*max_w/w;
        w = max_w;
    }
    if(h>max_h) {
        w = w*max_h/h;
        h = max_h;
    }
    e.width = w;e.height=h;
    $("#windown-title").css({width:'100%'});
    var _version = $.browser.version;
    if ( _version == 6.0 ) {
        $("#windown-box").css({width:w,height:h,left:"50%",top:(parseInt((ch)/2)+est)+"px",marginTop: -((parseInt(h)+53)/2)+"px",marginLeft:-((parseInt(w)+32)/2)+"px",zIndex: "999999"});
    }else {
        $("#windown-box").css({width:w,height:h,left:"50%",top:"50%",marginTop:-((parseInt(h)+53)/2)+"px",marginLeft:-((parseInt(w)+32)/2)+"px",zIndex: "999999"});
    };
}
function closeTipswindow(){
	$("#windownbg").remove();
	$("#windown-box").fadeOut("slow",function(){$(this).remove();});
}
function attachStyle(ownDoc,styCss) {
     var elmSty = ownDoc.createElement('STYLE');
     elmSty.setAttribute("type", "text/css");
     if (elmSty.styleSheet) {
         elmSty.styleSheet.cssText=styCss; 
     } else { 
         elmSty.appendChild(ownDoc.createTextNode(styCss)); 
     }
     ownDoc.getElementsByTagName("head")[0].appendChild(elmSty);
}
attachStyle(document,'#windownbg {background: rgb(0, 0, 0); left: 0px; top: 0px; width: 100%; height: 100%; display: none; position: absolute;}#windown-box {background: rgb(255, 255, 255); border: 5px solid rgb(51, 51, 51); text-align: left; position: fixed; _position: absolute;overflow:hidden;}#windown-title{background: rgb(232, 232, 232); height: 30px; overflow: hidden; position: relative;}#windown-title h2 {left: 10px; color: rgb(0, 0, 0); line-height: 30px; font-size: 12px; position: relative;}#windown-title-seat {background: rgb(232, 232, 232); height: 30px; overflow: hidden; position: relative;}#windown-title-seat h2 {left: 10px; color: rgb(0, 0, 0); line-height: 30px; font-size: 12px; position: relative;}#windown-close {background: url("'+ticket_host+'icon.png") no-repeat -820px -720px; top: 8px; width: 10px; height: 16px; right: 10px; color: rgb(255, 255, 255); text-indent: -10em; overflow: hidden; position: absolute; cursor: pointer;}#windown-close-seat {background: url("icon.png") no-repeat -820px -720px; top: 8px; width: 10px; height: 16px; right: 10px; color: rgb(255, 255, 255); text-indent: -10em; overflow: hidden; position: absolute; cursor: pointer;}#windown-content-border {padding: 5px 0px 5px 5px; top: -1px; position: relative;}#windown-content .loading {left: 50%; top: 50%; margin-top: -8px; margin-left: -8px; position: absolute;}.hide {display:none}h1,h2,h3,h4,h5,h6{margin:0;padding:0;}');