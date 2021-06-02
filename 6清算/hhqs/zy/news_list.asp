<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻管理</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<%
const datafrom = "t_article"

act = LCase(Request("act"))
Select Case Trim(act)

	Case "del"
		Call del

End Select

sub del()
	id = chkNumeric(request.QueryString("id"))
	conn.execute("update  "&datafrom&" set is_del=1 where id="&id)
end sub

%>
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="20" class="header">新闻列表</td>
  </tr>
  <tr>
    <td colspan="20">
    <%
	q = trim(request.QueryString("q"))
	%>
    <form method="get" id="sForm">
    <input type="button" onclick="window.location.href='news.asp'" class="btn" value=" 添加新闻 " />
    搜索：<input type="text" value="<%=q%>" name="q" size="30" />
    <input type="submit" class="btn" value=" 搜 索 " />
    </form>
    </td>
  </tr>
  <tr class="title">
    <td width="7%">编 号</td>
    <td width="11%">分 类</td>
    <td width="40%">标 题</td>
    <td width="10%">查看次数</td>
    <td width="18%">加入时间</td>
    <td width="13%">操作</td>
  </tr>
  <%
	const selectsql = "id,title,hits,addtime,preview"
	const taxis = " order by id desc"
	wherestr = " where is_del=0 "
	classid = reqStr("classid","num")
	
	if q<>"" then wherestr=wherestr&" and title like '%"&q&"%' "
	if classid>0 then wherestr=wherestr&" and classid = "&classid
	
	sql="select count(id) from ["& datafrom &"] "&wherestr&""
	set rs=server.createobject("adodb.recordset")
	rs.open sql,conn,0,1
	rs_total=rs(0)
	rs.close
	
	ii=1
	maxperpage=15
	prevpage = 1
	nextpage = 1                                
	page = (request.QueryString("page"))
	if (isnumeric(page) = false) then	page = 0
	if (page = "" ) or (page <= 0) then
		page = 0
		prevpage = 0
	end if 
									
	currentpage=page+1                                
	page = page*maxperpage
	if rs_total mod Maxperpage = 0 then
		totalpage = (rs_total/Maxperpage)
	else
		totalpage = int(rs_total/Maxperpage)+1
	end if
	if currentpage >= totalpage then
		currentpage = totalpage
		nextpage = 0
	end if
	i=page
					
	if(rs_total>0) then
		sql="select id from ["& datafrom &"] "&wherestr&" " & taxis
		set rs=server.createobject("adodb.recordset")
		rs.open sql,conn,0,1
		rs.move(page)
		for i=1 to maxperpage
			if rs.eof then exit for  
			if(i=1)then sqlid=rs(0) else sqlid=sqlid &","&rs(0)
			rs.movenext
		next
		rs.close
	end if

	if trim(sqlid)<>"" then
	sql="select top "&maxperpage&" id,title,A.hits,A.addtime,B.classname,A.preview from ["& datafrom &"] A right join t_classify B on A.classid=B.classid  where id in("& sqlid &") "&taxis
	rs.open sql,conn,0,1
	i=page
	do while not rs.eof
  %>
  
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs(0)%></td>
    <td><font color="#0033FF"><%=rs("classname")%></font></td>
    <td>
		<%if rs("preview")<>"" then response.Write("<img src='img/img.gif' align='absmiddle' /> ")%>
   		 <%=left(rs("title"),25)%>
    </td>
    <td><%=rs(2)%></td>
    <td><%=rs(3)%></td>
    <td><a href="news.asp?action=edit&id=<%=rs(0)%>">修改</a>　<a href="?act=del&id=<%=rs(0)%>">删除</a></td>
  </tr>
  <%
					i=i+1
					rs.movenext
				loop
				rs.close
				end if
				
				wherestr = ""
				if class1<>"" then wherestr="c="&class1&"&"
  %>
  <tr>
    <td colspan="20" class="bottom">
		<%call showPage(prevpage,page,currentpage,Maxperpage,totalpage,rs_total,wherestr)%>
    </td>
  </tr>
</table>

</body>
</html>