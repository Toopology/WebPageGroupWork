<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章分类</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<a name="top" id="top"></a>
<%
const datafrom = "t_classify"
const channelid = 1
act = LCase(Request("act"))
Select Case Trim(act)
	Case "add"
		Call add
	Case "del"
		Call del
	Case "edit"
		Call edit
	Case "update"
		Call updates
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
	classid = request.QueryString("classid")
	if classid<>"" then
		conn.execute("update "&datafrom&" set is_del=1 where classid="&classid)
	end if
	Response.Write("<script>location='news_class.asp';</script>")
	response.End()
end sub

Sub updates()
	'classid	classname	orders	hits	intro	channelid	preview	addtime	rootid	depth	parentid	
	classname = trim(request.Form("classname"))
	intro = trim(request.Form("intro"))
	preview = trim(request.Form("preview"))
	rootid = chkNumeric(request.Form("rootid"))
	depth = chkNumeric(request.Form("depth"))
	parentid = chkNumeric(request.Form("parentid"))
	classid = chkNumeric(request.Form("classid"))
	if classname<>"" and classid>0 then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT * FROM "&datafrom&" WHERE classid="&classid
		Rs.Open SQL,Conn,1,3
		if not rs.eof then
		  Rs("classname") = classname
		  Rs("intro") = intro
		  Rs("preview") = preview
		Rs.update
		end if
		Rs.Close
	end if
	
	Response.Write("<script>location='news_class.asp';</script>")
	response.End()
end sub

Sub saves()
	classid = chkNumeric(request.Form("classid"))
	classname = trim(request.Form("classname"))
	orders = chkNumeric(request.Form("orders"))
	hits = chkNumeric(request.Form("hits"))
	intro = trim(request.Form("intro"))

	preview = trim(request.Form("preview"))
	addtime = now()
	rootid = chkNumeric(request.Form("rootid"))
	depth = chkNumeric(request.Form("depth"))
	parentid = chkNumeric(request.Form("parentid"))
	
	If parentid>0 Then
		SQL = "SELECT rootid,classid,depth,orders FROM "&datafrom&" WHERE classid=" & parentid
		Set Rs = conn.Execute (SQL)
		If not rs.eof then
			rootid = Rs(0)
			ParentID = Rs(1)
			depth = Rs(2)
			orders = Rs(3)
		end if
		Rs.Close
		neworders = orders
		SQL = "SELECT MAX(orders) FROM "&datafrom&" WHERE ParentID=" & parentid
		Set Rs = conn.Execute (SQL)
		If Not (Rs.EOF And Rs.bof) Then
			neworders = Rs(0)
		End If
		If IsNull(neworders) Then neworders = orders
		Rs.Close
		conn.Execute ("UPDATE "&datafrom&" SET orders=orders+1 WHERE orders>" & CInt(neworders) & "")
	Else
		SQL = "SELECT MAX(rootid) FROM "&datafrom&""
		Set Rs = conn.Execute (SQL)
		Maxrootid = Rs(0) + 1
		If IsNull(Maxrootid) Then Maxrootid = 1
		Rs.Close
	End If

	Set Rs = Server.CreateObject("adodb.recordset")
	SQL = "SELECT * FROM "&datafrom&" where 1=0 "
	Rs.Open SQL, Conn, 1, 3
	Rs.addnew
	If parentid>0 Then
		Rs("depth") = depth + 1
		Rs("rootid") = rootid
		Rs("orders") = neworders + 1
		Rs("parentid") = parentid
	Else
		Rs("depth") = 0
		Rs("rootid") = Maxrootid
		Rs("orders") = 0
		Rs("parentid") = 0
	End If
	Rs("classname") = classname
	Rs("intro") = intro
	Rs("channelid") = channelid
	Rs("preview") = preview
	Rs("is_del") = 0
	Rs.Update
	Rs.Close
		
	Response.Write("<script>location='news_class.asp?act=add&parentid="&parentid&"';</script>")
	response.End()
end sub

Sub list()
%>
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="5" class="header">分类列表</td>
  </tr>
  <tr class="title">
    <td>编号</td>
    <td>名称</td>
    <td>排序</td>
    <td>统计</td>
    <td>操作</td>
  </tr>
  <%
  	wherestr = " where is_del=0 and channelid="&channelid
	set rs=conn.execute("select classid,classname,rootid,orders,depth,hits from "&datafrom&" "&wherestr&" order by rootid,[orders]")
	do while not rs.eof
	
	'conn.execute("update t_product set classid="&rs(0)&" where classid="&rs(6))
  %>
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs(0)%></td>
    <td><%loadspace(rs(4))%><a href="news_list.asp?classid=<%=rs(0)%>"><%=rs(1)%></a>
    </td>
    <td><%=rs("orders")%></td>
    <td><%=rs(5)%></td>
    <td>
    <a href="?act=add&classid=<%=rs("classid")%>#top">增加子分类</a> | 
    <a href="?act=edit&classid=<%=rs(0)%>#top">修改</a> | 
    <a onClick="return confirm('确定要删除分类吗？')" href="?act=del&classid=<%=rs(0)%>">删除</a></td>
  </tr>
  <%
		rs.movenext
	loop
	rs.close
  %>
  <tr class="bottom">
    <td colspan="5">&nbsp;<a href="?act=add">增加新分类</a></td>
  </tr>
</table>
<%
end sub

sub add()
	parentid = chkNumeric(request.QueryString("parentid"))
%>
<form id="form1" name="form1" method="post" action="news_class.asp" onsubmit="et.save();">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="3" class="header">增加文章分类</td>
  </tr>
  <tr>
    <td width="14%" class="right">分类名称</td>
    <td width="86%">
      <input name="classname" type="text" class="text" id="classname" size="50" />    </td>
  </tr>
  
  <tr>
    <td class="right">排序</td>
    <%
	set rs=conn.execute("select max(orders) from "&datafrom&"")
	if not rs.eof then max_orders =rs(0)
	rs.close
	%>
    <td><input name="orders" type="text" class="text" id="orders" value="<%=max_orders+1%>" />
      不能重复</td>
  </tr>
  <tr>
    <td class="right">所属分类</td>
    <td>
<%
	Response.Write " <select name=""parentid"">"
	Response.Write "<option value=""0"">做为一级分类</option>"
	SQL = "SELECT classid,depth,ClassName FROM "&datafrom&" where channelid=1 ORDER BY rootid,orders"
	Set Rs = conn.Execute(SQL)
	Do While Not Rs.EOF
		Response.Write "<option value=""" & Rs("classid") & """ "
		If parentid = Rs("classid") Then Response.Write "selected"
		Response.Write ">"
		If Rs("depth") = 1 Then Response.Write "&nbsp;&nbsp;├ "
		If Rs("depth") > 1 Then
			For i = 2 To Rs("depth")
				Response.Write "&nbsp;&nbsp;│"
			Next
			Response.Write "&nbsp;&nbsp;├ "
		End If
		Response.Write Rs("ClassName") & "</option>" & vbCrLf
		Rs.movenext
	Loop
	Rs.Close
	Response.Write "</select>"
	Set Rs = Nothing
%>    </td>
  </tr>
  <tr>
    <td class="right" valign="top">分类说明</td>
    <td>
    <textarea name="intro" style="width:90%; height:250px" id="intro"><%=intro%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'intro',filterMode : false});</script>
		</td>
  </tr>
    
  <tr class="bottom">
    <td class="right" width="14%">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 保 存 " />
      <input name="Submit2" type="button" class="button" value="返 回" onclick="window.location.href='news_class.asp';" />
      <input name="act" type="hidden" id="act" value="save" />	  </td>
  </tr>
</table> 
</form>
<%
end sub

sub edit()
	classid=chkNumeric(request.QueryString("classid"))
	set rs=conn.execute("select classname,rootid,orders,depth,parentid,intro,preview from "&datafrom&" where classid="&classid)
	if not rs.eof then
		classname = rs(0)
		rootid = rs(1)
		orders = rs(2)
		depth = rs(3)
		parentid = rs(4)
		intro = rs(5)
		preview = rs("preview")
	end if
	rs.close
	
	set rs=conn.execute("select count(id) from t_article where classid="&classid)
	hits=rs(0)
	rs.close
	
	conn.execute("update "&datafrom&" set hits="&hits&" where classid="&classid)
%>
<form id="form1" name="form1" method="post" action="news_class.asp" onsubmit="">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="3" class="header" align="right">修改分类</td>
  </tr>
  
  
  <tr>
    <td width="14%" class="right">分类名称</td>
    <td width="86%">
      <input name="classname" type="text" class="text" id="classname" value="<%=classname%>" size="50" />    </td>
  </tr>


	<tr>
	  <td class="right">排序</td>
	  <td><input name="orders" type="text" class="text" id="orders" value="<%=orders%>" /></td>
    </tr>
	<tr>
		<td class="right">所属分类</td>
		<td>
<%
	Response.Write " <select name=""parentid"" disabled>"
	Response.Write "<option value=""0"">做为一级分类</option>"
	SQL = "SELECT classid,depth,ClassName FROM "&datafrom&" where channelid=1 ORDER BY rootid,orders"
	Set Rs = conn.Execute(SQL)
	Do While Not Rs.EOF
		Response.Write "<option value=""" & Rs("classid") & """ "
		If CLng(parentid) = Rs("classid") Then Response.Write "selected"
		Response.Write ">"
		If Rs("depth") = 1 Then Response.Write "&nbsp;&nbsp;├ "
		If Rs("depth") > 1 Then
			For i = 2 To Rs("depth")
				Response.Write "&nbsp;&nbsp;│"
			Next
			Response.Write "&nbsp;&nbsp;├ "
		End If
		Response.Write Rs("ClassName") & "</option>" & vbCrLf
		Rs.movenext
	Loop
	Rs.Close
	Response.Write "</select>"
%>		</td>
	</tr>
    <tr>
      <td class="right">分类说明</td>
      <td>
    <textarea name="intro" style="width:90%; height:250px" id="intro"><%=intro%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'intro',filterMode : false});</script>
      
	</td>
    </tr>
    <tr class="bottom">
    <td width="14%" class="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 保 存 " />
      <input name="Submit3" type="button" class="button" value="返 回" onclick="history.back();" />
      <input name="act" type="hidden" id="act" value="update" />	  
	  <input name="classid" type="hidden" id="classid" value="<%=classid%>" /></td>
  </tr>
</table> 
</form>
<%end sub%>

</body>
</html>
