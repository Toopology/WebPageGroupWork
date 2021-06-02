<!--#include file="check.asp"-->
<%
action = Get_SafeStr(request("action"))
passwd = Get_SafeStr(request.Form("passwd"))
userid = left(Get_SafeStr(request.Form("userid")),12)

call delFile("../cache/index.html")
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理界面</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <div id="admin_top"><img src="img/logo.gif" /></div>
    
    <div id="admin_body">
        
    	<div id="admin_left">
        	<ul>
            	<li class="title icon1">公司信息</li>
                    <li><a href="sys_menu.asp" target="main_frame">·栏目设置</a></li>
                    <li><a href="company.asp" target="main_frame">·内容管理</a></li>
                    <li class="hide"><a href="album.asp" target="main_frame">·服务明星</a></li>
                    <li><a href="feedback.asp" target="main_frame">·在线留言</a></li>
                    <li class="hide"><a href="user.asp" target="main_frame">·会员管理</a></li>
                    <li class="hide"><a href="recycle.asp" target="main_frame">·交投记录</a></li>
                    
                <!--li class="title icon3">积分商城</li>
                    <li><a href="gift.asp" target="main_frame">·商品管理</a></li>
                    <li><a href="order.asp" target="main_frame">·积分订单</a></li>
                    <li><a href="points_rule.asp" target="main_frame">·积分规则</a></li>
                    <li><a href="points_log.asp" target="main_frame">·积分日志</a></li-->
   
                <li class="title icon2">产品和新闻</li>
                    <li class="hide"><a href="product_list.asp" target="main_frame">·产品管理</a></li>
                    <li class="hide"><a href="info_class.asp" target="main_frame">·产品分类</a></li>

                    <li><a href="hr.asp" target="main_frame">·人才招聘</a></li>
                    <li><a href="news_list.asp" target="main_frame">·新闻列表</a></li>
                    <li><a href="news_class.asp" target="main_frame">·新闻分类</a></li>
                    
            	<li class="title icon4">系统设置</li>
                    <li class="hide"><a href="flash.asp" target="main_frame">·广告设置</a></li>
                    <li class="hide"><a href="links.asp" target="main_frame">·友情链接</a></li>
                    <li><a href="system.asp" target="main_frame">·系统设置</a></li>
                    <li><a href="chkpwd.asp" target="main_frame">·管理密码</a></li>
                    <li><a href="check.asp?action=logout">·退出管理</a></li>
            </ul>
        </div>
    
    	<div id="admin_right">
        	<div id="admin_right_body">
            	<iframe id="main_frame" name="main_frame" height="480" width="100%" frameborder="0" scrolling="no" src="main.asp"></iframe>
            </div>
        </div>
        
        <div class="HackBox"></div>
        
    </div>
    
    <div id="admin_bottom"></div>
    
</div>

<script>
function reinitIframe(){
	var iframe = document.getElementById("main_frame");
	try{
		var bHeight = iframe.contentWindow.document.body.scrollHeight;
		var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
		var height = Math.max(bHeight, dHeight);iframe.height = height;
	}
	catch (ex)
	{}
}
//reinitIframe();
//window.setInterval("reinitIframe()", 200);
</script>

</body>
</html>
