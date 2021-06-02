<!--#include file="inc_conn.asp"-->
<!--#include file="inc/ypage.asp"--><%
classid = reqStr("classid","num")
if classid=0 then classid = 6
page_title = "资讯中心"

if classid>0 then
	sql = "select * from t_classify where classid="&classid
	set rs = conn.execute(sql)
	if not rs.eof then
		page_title = rs("classname")
	end if
end if
%><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=page_title%> - <%=conf_sitename%></title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link href="inc/ypage.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--#include file="inc_top.asp"-->

    <div id="main_body">
    
    	<!--#include file="inc_left.asp"-->
    
    	<div class="right_body" style="line-height:2em">
        
        	<div class="nav_bar">
                <div><%=page_title%></div>
            </div>
            
            <ul class="news_list2">
                        <%
                                '------------------------------------------------分页显示开始
                                datafrom = "t_article"
                                taxis = " order by is_top desc,id desc"
                                selectsql = "*"
                                index_id = "id"
                                maxperpage=16 
                                
                                '-----------搜索条件
                                orderby = request.QueryString("orderby")
                                wherestr = "where is_del=0 "
                                page_param = ""
                                wherestr = wherestr&"":page_param=page_param&""
                                if q<>"" then wherestr = wherestr&" and title like '%"&q&"%' ":page_param=page_param&"&q="&server.URLEncode(q)
                                if classid>0 then wherestr = wherestr&" and classid = "&classid&"":page_param=page_param&"&classid="&classid
                                if orderby<>"" then taxis=" ORDER BY "&orderby&" desc ":page_param=page_param&"&orderby="&orderby
                                
                                rs_total=getRsTotal(index_id,datafrom,wherestr)'记录总数
                                if rs_total>0 then sqlid = getSqlID(index_id,maxperpage,datafrom,wherestr,taxis)'id字符串
                                
                                if sqlid<>"" then
                                    sql="select top "&maxperpage&" "&selectsql&" from "&datafrom&" where "&index_id&" in ("& sqlid &") "&taxis
                                    'response.Write(sql)
									set rs=conn.execute(sql)
                                    do while not rs.eof

                                %>
                                <li>
                                	<span><%=format_time(rs("addtime"),2)%></span>
                                	<a href="detail.asp?id=<%=rs("id")%>"><%=rs("title")%></a>
                                </li>
                                <%
                                    rs.movenext
                                    loop
                                    rs.close
                                end if
                                '------------------------------------------------分页显示结束
                                %>
                     </ul>
                     
             <%call showPage(maxperpage,rs_total,page_param)%>    
            
            
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>