<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            
            <div style="padding:0 5px;font-size:14px; ">
            <%=content%>
       	  </div>
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>