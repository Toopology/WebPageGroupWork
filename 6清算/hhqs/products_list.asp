<!--#include file="inc_conn.asp"-->
<!--#include file="inc/ypage.asp"--><%
classid = reqStr("classid","num")
page_title = "产品中心"

if classid>0 then
	set rs=conn.execute("select top 1 classname from t_classify where classid="&classid)
	if not rs.eof then page_title=rs("classname")
	rs.close
end if
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
        
        	<div class="nav_bar">
                <div><%=page_title%></div>
            </div>
            
             <ul class="news_list3">
				 <%
                                '------------------------------------------------分页显示开始
                                datafrom = "t_products"
                                taxis = " order by is_top desc,id desc"
                                selectsql = "*"
                                index_id = "id"
                                maxperpage=11 
                                
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
					
					<table width="100%">
                                    	<tr>
                                        	<td width="13%"><a href="view.asp?id=<%=rs("id")%>"><img src="<%=rs("preview")%>" width="80" height="60" style="border:1px solid #CCC; padding:1px;" /></a></td>
                                            <td width="87%" valign="top">
                                	<a style="font-size:14px; color:#039; font-weight:bold" href="view.asp?id=<%=rs("id")%>"><%=rs("title")%></a>
                                    <div style="color:#777"><%=left(RemoveHtml(rs("content")),80)%>...</div>
                                    </td>
                                        </tr>
                                    </table>
				
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
              
              <!--#include file="inc_msg.asp"-->  
            
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>