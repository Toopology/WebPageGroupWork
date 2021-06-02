<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>公司信息</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="7" class="header">公司信息管理</td>
  </tr>
  <tr class="title">
    <td>编号</td>
    <td>名称</td>
    <td>栏目</td>
    <td>查看次数</td>
    <td>最后更新时间</td>
    <td>操作</td>
  </tr>
  <%
  if request.QueryString("action")="del" and request.QueryString("id")<>"" then
  	conn.execute("delete from t_company where id="&request.QueryString("id"))
  end if
  
				const datafrom = "t_company"
				const selectsql = "*"
				const taxis = " order by parentid asc,id asc"
				wherestr = " where is_del=0 "
				
				set rs=conn.execute("select * from t_company "&taxis)
				do while not rs.eof
  %>
  
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("id")%></td>
    <td><%=rs("title")%></td>
    <td><%=getParentName(rs("parentid"))%></td>
    <td><%=rs("hits")%></td>
    <td><%=rs("addtime")%></td>
    <td>
    <a href="company_edit.asp?action=edit&id=<%=rs("id")%>">修改</a></td>
  </tr>
  <%
					i=i+1
					rs.movenext
				loop
				rs.close
  %>
  <tr class="bottom">
    <td colspan="6">&nbsp;<a href="company_edit.asp">增加新信息</a></td>
  </tr>
</table>

<%
function getParentName(pid)
	set rs_temp = conn.execute("select top 1 title from t_menu where id="&pid)
	if not rs_temp.eof then getParentName=rs_temp("title")
	rs_temp.close
end function
%>

</body>
</html>
