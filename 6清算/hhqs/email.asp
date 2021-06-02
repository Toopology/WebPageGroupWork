<!--#include file="inc_conn.asp"--><%
page_title = "企业邮局"
%><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=page_title%> - <%=conf_sitename%></title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--#include file="inc_top.asp"-->

    <div id="main_body">
    
    	<!--#include file="inc_left.asp"-->
    
    	<div class="right_body" style="line-height:2em">
        
        	<div class="nav_bar">
                <div><%=page_title%></div>
            </div>
            
            <div style="padding:50px 0 0 100px;font-size:14px; ">
            
            	<div style=" width:400px;text-align:center">
                	<form><ul>
                    	<li>帐号：<input size="25" type="text" class="txt" name="uname" /></li>
                    	<li style="padding:18px 0">密码：<input size="25" class="txt" type="text" name="passwd" /></li>
                        <li><img src="img/btn_02.jpg" /></li>
                        </ul>
                    </form>
                </div>
            
       	  </div>
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>