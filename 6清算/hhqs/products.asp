<!--#include file="inc_conn.asp"-->
<!--#include file="inc/ypage.asp"--><%
classid = reqStr("classid","num")
page_title = "产品中心"
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=page_title%> - <%=conf_sitename%></title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link href="inc/ypage.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--#include file="inc_top.asp"-->

    <div style="overflow:hidden">
    
    	<!--#include file="inc_left.asp"-->
    
    	<div class="right_body" style="line-height:2em">
        
        	<%
			Dim classname_arr(20),classid_arr(20)
				i= 0 
                    sql = "select classid,classname from t_classify where is_del=0 and channelid=2"
                    set rs=conn.execute(sql)
                    do until rs.eof
						classname_arr(i) = rs("classname")
						classid_arr(i) = rs("classid") 
						i = i+1
						rs.movenext
                    loop
                    rs.close
                    %>
                    
                    <%
					for j=0 to i-1
					%>
        	<div class="nav_bar">
                <div><a class="more" href="products_list.asp?classid=<%=classid_arr(j)%>"><img src="img/more.gif" /></a>
				<%=classname_arr(j)%></div>
            </div>
            
             <ul class="album">
             	<%
				set rs=conn.execute("select top 4 id,title,preview from t_products where classid="&classid_arr(j)&" order by id desc,is_top desc")
				do while not rs.eof
				%>
				 <li><a href="view.asp?id=<%=rs("id")%>"><img src="<%=rs("preview")%>" width="120" height="100" style="border:1px solid #CCC; padding:1px;" /></a><br/><a  href="view.asp?id=<%=rs("id")%>"><%=rs("title")%></a></li>
                 <%
				 rs.movenext
				 loop
				 rs.close
				 %>
              </ul>
                    <%
                   next
                    %> 

				<!--#include file="inc_msg.asp"-->  
                
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>