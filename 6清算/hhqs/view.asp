<!--#include file="inc_conn.asp"-->
<%
id = reqStr("id","num")
sql = "select top 1 * from t_products where id="&id
set rs=conn.execute(sql)
if not rs.eof then
	title = rs("title")
	preview = rs("preview")
	content = rs("content")
	addtime = rs("addtime")
	hits = rs("hits")
	bigpic= rs("bigpic")
	
	if content="" then content="<p align='center'><img src='"&preview&"' /></p>"
end if
rs.close

call updateHits("t_products",id,(hits+1))
%><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=title%> - <%=conf_sitename%></title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--#include file="inc_top.asp"-->

    <div id="main_body">
    
    	<!--#include file="inc_left.asp"-->
    
    	<div class="right_body" style="line-height:2em">
        
        	<div class="nav_bar"><%=title%></div>

            <div class="news_content"><%=content%></div>
            
            <!--#include file="inc_msg.asp"-->  
            
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>