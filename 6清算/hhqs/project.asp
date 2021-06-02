<!--#include file="inc_conn.asp"-->
<%
id = reqStr("id","num")
if id=0 then id = 15
page_title = "客户案例"

sql = "select * from t_company where id="&id
set rs=conn.execute(sql)
if not rs.eof then
	title = rs("title")
	addtime = rs("addtime")
	content = rs("content")
	hits = rs("hits")
	page_title = title
end if

hits = chkNumeric(hits)
call updateHits("t_company",id,(hits+1))
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=page_title%> - <%=conf_sitename%></title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--#include file="inc_top.asp"-->

    <div style="overflow:hidden">
    
    	<!--#include file="inc_left.asp"-->
    
    	<div class="right_body" style="line-height:2em">
        
        	<div class="nav_bar">
                <div><%=page_title%></div>
            </div>
            
            <div style="padding:0 5px; line-height:20px; ">
            <%=content%>
       	  </div>
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>