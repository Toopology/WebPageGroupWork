<!--#include file="inc_conn.asp"--><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=conf_sitename%></title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--#include file="inc_top.asp"-->
	<div id="main_body" >
    
    	<div class="box1">
        	<div class="box1_header">
            	<a href="company.asp" class="more"><img src="img/more.gif" /></a>
                公司简介
            </div>
            <div class="box1_body">
            	<div style="height:243px; padding:0 10px">
            	　　<%=get_content(14)%>
                </div>
            </div>
            <div class="box1_footer"></div>
        </div>
        
        <div class="box1">
        	<div class="box1_header">
            	<a href="news.asp" class="more"><img src="img/more.gif" /></a>
                行业动态
            </div>
            <div class="box1_body">
            	<ul class="news_list">
                <%
				sql = "select top 8 id,title,addtime from t_article where is_del=0 and classid=6 order by is_top desc,id desc"
				set rs=conn.execute(sql)
				do until rs.eof
				%><li><span><%=format_time(rs("addtime"),2)%></span>
				<a href="detail.asp?id=<%=rs("id")%>" title="<%=rs("title")%>"><%=left(rs("title"),18)%></a></li>
                <%
				rs.movenext
				loop
				rs.close
				%>
                </ul>
            </div>
            <div class="box1_footer"></div>
        </div>
        
        <div class="box2">
        	<div class="box2_header">
            	<a href="service.asp" class="more"><img src="img/more.gif" /></a>
                业务领域
            </div>
            <div class="box2_body">
            <a href="company.asp?id=15"><img border="0" src="img/service.gif" /></a><a href="company.asp?id=16"><img border="0" src="img/service2.gif" /></a><a href="company.asp?id=17"><img border="0" src="img/service3.gif" /></a><a href="company.asp?id=18"><img border="0" src="img/service4.gif" /></a>
            </div>
            <div class="box1_footer"></div>
        </div>
        
    </div>
    
    <div class="HackBox"></div>
        
<!--#include file="inc_bottom.asp"-->   
</body>
</html>