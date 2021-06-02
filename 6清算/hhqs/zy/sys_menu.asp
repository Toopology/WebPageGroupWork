<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站栏目设置</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<a name="top" id="top"></a>
<%
act = LCase(Request("act"))
Select Case Trim(act)
	Case "add"
		Call add
	Case "del"
		Call del
	Case "edit"
		Call edit
	Case "editsave"
		Call editsave
	Case "save"
		Call saves
	Case Else
		Call list
End Select

Sub loadspace(ii)
	If ii = 1 Then Response.Write "&nbsp;&nbsp;<font color=""#666666"">├</font> "
	If ii > 1 Then
		For i = 2 To ii
			Response.Write "&nbsp;&nbsp;<font color=""#666666"">│</font>"
		Next
		Response.Write "&nbsp;&nbsp;<font color=""#666666"">├</font> "
	End If
End Sub

Sub del()
	classid = request.QueryString("id")
	if classid<>"" then
		conn.execute("delete from t_company where parentid="&classid)
		conn.execute("delete from t_menu where id="&classid)
	end if
	Response.Write("<script>location='sys_menu.asp';</script>")
	response.End()
end sub

Sub editsave()
	title = Get_SafeStr(request.Form("title"))
	id = chkNumeric(request.Form("editid"))
	linkurl = request.Form("linkurl")
	isshow = chkNumeric(request.Form("isshow"))
	orders = chkNumeric(request.Form("orders"))
	language = chkNumeric(request.Form("language"))
	
	For i=1 To Request.Form("content").Count   
		content = content & Request.Form("content")(i)
	Next
	content=replace(content,"'","''")
	
	Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT TOP 1 * FROM t_menu WHERE id="&id
		Rs.Open SQL,Conn,1,3
		If Not Rs.Eof Then
		  Rs("linkurl") = linkurl
		  Rs("title") = title
		  Rs("content") = content
		  Rs.update
		End If
		Rs.Close

	Response.Write("<script>location='sys_menu.asp';</script>")
	response.End()
end sub

Sub saves()

	For i=1 To Request.Form("content").Count   
		content = content & Request.Form("content")(i)
	Next
	content=replace(content,"'","''")
	
	If Request("parentid") <> "0" Then
		SQL = "SELECT rootid,id,depth,orders FROM t_menu WHERE id=" & Request("parentid")
		Set Rs = conn.Execute (SQL)
		If not rs.eof then
			rootid = Rs(0)
			ParentID = Rs(1)
			depth = Rs(2)
			orders = Rs(3)
		end if
		Rs.Close
		neworders = orders
		SQL = "SELECT MAX(orders) FROM t_menu WHERE ParentID=" & Request("parentid")
		Set Rs = conn.Execute (SQL)
		If Not (Rs.EOF And Rs.bof) Then
			neworders = Rs(0)
		End If
		If IsNull(neworders) Then neworders = orders
		Rs.Close
		conn.Execute ("UPDATE t_menu SET orders=orders+1 WHERE orders>" & CInt(neworders) & "")
	Else
		SQL = "SELECT MAX(rootid) FROM t_menu"
		Set Rs = conn.Execute (SQL)
		Maxrootid = Rs(0) + 1
		If IsNull(Maxrootid) Then Maxrootid = 1
		Rs.Close
	End If

	Set Rs = Server.CreateObject("adodb.recordset")
	SQL = "SELECT * FROM t_menu"
	Rs.Open SQL, Conn, 1, 3
	Rs.addnew
	If Request("parentid") <> "0" Then
		Rs("depth") = depth + 1
		Rs("rootid") = rootid
		Rs("orders") = neworders + 1
		Rs("parentid") = chkNumeric(Request.Form("parentid"))
		
	Else
		Rs("depth") = 0
		Rs("rootid") = Maxrootid
		Rs("orders") = 0
		Rs("parentid") = 0
	End If
	Rs("title") = Get_SafeStr(request.Form("title"))
	Rs("isshow") = chkNumeric(request.Form("isshow"))
	Rs("language") = chkNumeric(request.Form("language"))
	Rs("linkurl") = Get_SafeStr(request.Form("linkurl"))
	Rs("content") = content
	Rs.Update
	Rs.Close
		
	Response.Write("<script>location='sys_menu.asp?act=add&editid="&Request("parentid")&"';</script>")
	response.End()
end sub

Sub list()
%>


<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="20" class="header">栏目列表</td>
  </tr>
  <tr class="title">
    <td>编号</td>
    <td>名称</td>
    <td>链接地址</td>
    <td>排序</td>
    <td>操作</td>
  </tr>
  <%
  	i = 0
	set rs=server.createobject("adodb.recordset")
	sqlstr = "select * from t_menu where parentid=0 order by id asc"
	rs.open sqlstr,conn,1,1
	do while not rs.eof
		i = i+1
		conn.execute("update t_menu set orders="&i&" where id="&rs("id"))
		sql = "select id from t_menu where parentid="&rs("id")&" order by id asc"
		set rs_temp = conn.execute(sql)
		do until rs_temp.eof
			i = i+1
			sql = "update t_menu set orders="&i&" where id="&rs_temp("id")
			conn.execute(sql)
			rs_temp.movenext
		loop
		rs_temp.close
		rs.movenext
	loop
	rs.close	
	
	set rs=server.createobject("adodb.recordset")
	sqlstr = "select * from t_menu order by orders asc"
	rs.open sqlstr,conn,1,1
	do while not rs.eof
  %>
  
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("id")%></td>
    <td><%loadspace(rs("depth"))%><a href="company.asp?parentid=<%=rs("id")%>"><%=rs("title")%></a>    
    </td>
    <td>&nbsp;<%=rs("linkurl")%></td>
    <td><%=rs("orders")%></td>
    <td><a href="?act=add&editid=<%=rs("id")%>">增加子栏目</a> | 
    <a href="?act=edit&editid=<%=rs("id")%>">修改</a> | 
    <a onClick="return confirm('确定要删除分类吗？分类下的信息也会被删除。删除后无法恢复！')" href="?act=del&id=<%=rs("id")%>">删除</a></td>
  </tr>
  <%
		rs.movenext
	loop
	rs.close
  %>
  <tr class="bottom">
    <td colspan="20">&nbsp;<a href="?act=add">增加新栏目</a></td>
  </tr>
</table>
<%
end sub

sub add()
%>
<form id="form1" name="form1" method="post" action="sys_menu.asp" onsubmit="et.save();">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="3" class="header">增加栏目</td>
  </tr>
  <tr>
    <td width="14%" class="right">栏目名称</td>
    <td width="86%">
      <input name="title" type="text" class="text" id="title" size="50" />    </td>
  </tr>
  <tr>
    <td class="right">所属栏目</td>
    <td>
<%
	Response.Write " <select name=""parentid"">"
	Response.Write "<option value=""0"">做为一级栏目</option>"
	SQL = "SELECT id,depth,title FROM t_menu ORDER BY rootid,orders"
	Set Rs = conn.Execute(SQL)
	Do While Not Rs.EOF
		Response.Write "<option value=""" & Rs(0) & """ "
		If Request("editid") <> "" And chkNumeric(Request("editid")) = Rs(0) Then Response.Write "selected"
		Response.Write ">"
		If Rs(1) = 1 Then Response.Write "&nbsp;&nbsp;├ "
		If Rs(1) > 1 Then
			For i = 2 To Rs(1)
				Response.Write "&nbsp;&nbsp;│"
			Next
			Response.Write "&nbsp;&nbsp;├ "
		End If
		Response.Write Rs(2) & "</option>" & vbCrLf
		Rs.movenext
	Loop
	Rs.Close
	Response.Write "</select>"
	Set Rs = Nothing
%>    </td>
  </tr>
  
  <tr>
    <td width="14%" class="right">链接地址</td>
    <td width="86%">
      <input name="linkurl" type="text" class="text" id="linkurl" size="50" />    </td>
  </tr>
  
  <tr class="hide">
    <td width="14%" class="right">是否显示</td>
    <td width="86%">
      <label for="isshow">
        <input checked="checked" type="radio" name="isshow" id="isshow" value="1" />
      显示</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="ishide">
        <input type="radio" name="isshow" id="ishide" value="0" />
     隐藏</label>
      </td>
  </tr>
  
  <tr class="hide">
    <td class="right">语言版本</td>
    <td><label for="language_cn">
        <input checked="checked" type="radio" name="language" id="language_cn" value="0" />
      中文</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="language_en">
        <input type="radio" name="language" id="language_en" value="1" />
     英文</label></td>
  </tr>
  <tr>
    <td class="right" valign="top">栏目介绍</td>
    <td><textarea name="content" style="width:90%; height:300px" id="content"><%=content%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'content',filterMode : false});</script>
		</td>
  </tr>

  <tr class="bottom">
    <td align="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 保 存 " />
      <input name="Submit2" type="button" class="button" value="返 回" onclick="window.location.href='sys_menu.asp';" />
      <input name="act" type="hidden" id="act" value="save" />	  </td>
  </tr>
</table> 
</form>
<%
end sub

sub edit()
	editid=request.QueryString("editid")
	parentid = 0
	set rs=conn.execute("select title,rootid,orders,depth,parentid,content,linkurl,isshow from t_menu where id="&editid)
	if not rs.eof then
		title = rs(0)
		rootid = rs(1)
		orders = rs(2)
		depth = rs(3)
		parentid = rs(4)
		content = rs(5)
		linkurl = rs(6)
		isshow = rs(7)
	end if
	rs.close
%>
<form id="form1" name="form1" method="post" action="sys_menu.asp" onsubmit="">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="3" class="header" align="right">修改栏目</td>
  </tr>
  
  
  <tr>
    <td width="14%" class="right">栏目名称</td>
    <td width="86%">
      <input name="title" type="text" class="text" id="title" value="<%=title%>" size="50" />    </td>
  </tr>


	<tr>
		<td class="right">所属栏目</td>
		<td>
<%
	Response.Write " <select name=""parentid"" disabled>"
	Response.Write "<option value=""0"">做为一级栏目</option>"
	SQL = "SELECT id,depth,title FROM t_menu ORDER BY rootid,orders"
	Set Rs = conn.Execute(SQL)
	Do While Not Rs.EOF
		Response.Write "<option value=""" & Rs(0) & """ "
		If chkNumeric(parentid) = Rs(0) Then Response.Write "selected"
		Response.Write ">"
		If Rs(1) = 1 Then Response.Write "&nbsp;&nbsp;├ "
		If Rs(1) > 1 Then
			For i = 2 To Rs(1)
				Response.Write "&nbsp;&nbsp;│"
			Next
			Response.Write "&nbsp;&nbsp;├ "
		End If
		Response.Write Rs(2) & "</option>" & vbCrLf
		Rs.movenext
	Loop
	Rs.Close
	Response.Write "</select>"
%>		</td>
	</tr>

  
  <tr>
    <td width="14%" class="right">链接地址</td>
    <td width="86%">
      <input name="linkurl" type="text" class="text" id="linkurl" size="50" value="<%=linkurl%>" />    </td>
  </tr>
  <tr>
    <td class="right">排 序</td>
    <td><input type="text" class="text" name="orders" id="orders" size="50" value="<%=orders%>" />
    * 数字越小，排序越靠前
    </td>
  </tr>
  <tr>
    <td width="14%" class="right">是否显示</td>
    <td width="86%">
      <label for="isshow">
        <input <%if isshow=true then response.Write("checked=""checked""")%> type="radio" name="isshow" id="isshow" value="1" />
      显示</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="ishide">
        <input <%if isshow=false then response.Write("checked=""checked""")%> type="radio" name="isshow" id="ishide" value="0" />
     隐藏</label>
      </td>
  </tr>

  <tr>
    <td class="right" valign="top">栏目介绍</td>
    <td>
    <textarea name="content" style="width:90%; height:300px" id="content"><%=content%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'content',filterMode : false});</script>
    
		</td>
  </tr>

    <tr>
    <td align="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 保 存 " />
      <input name="Submit3" type="button" class="button" value="返 回" onclick="history.back();" />
      <input name="act" type="hidden" id="act" value="editsave" />	  
	  <input name="editid" type="hidden" id="editid" value="<%=editid%>" /></td>
  </tr>
</table> 
</form>
<%end sub%>

</body>
</html>
