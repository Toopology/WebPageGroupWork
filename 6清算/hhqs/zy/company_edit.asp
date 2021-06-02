<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目内容管理</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>

<%
const datafrom = "t_company"
act=request.Form("action")
id=chkNumeric(request.Form("id"))
if act="save" then

	title = trim(request.Form("title"))
	content = trim(request.Form("content"))
	addtime = now()
	hits = 0
	parentid = chkNumeric(request.Form("parentid"))
	is_del = 0
	keywords = trim(request.Form("keywords"))
	desc = trim(request.Form("desc"))
	
	if id=0 then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT * FROM "&datafrom&" WHERE 1=0 "
		Rs.Open SQL,Conn,1,3
		Rs.Addnew
		  Rs("title") = title
		  Rs("content") = content
		  Rs("addtime") = addtime
		  Rs("hits") = hits
		  Rs("parentid") = parentid
		  Rs("is_del") = is_del
		  Rs("language") = language
		  Rs("keywords") = keywords
		  Rs("desc") = desc
		Rs.update
		Rs.Close
	else
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT TOP 1 * FROM "&datafrom&" WHERE id="&id
		Rs.Open SQL,Conn,1,3
		If Not Rs.Eof Then
		  Rs("title") = title
		  Rs("content") = content
		  Rs("addtime") = addtime
		  Rs("parentid") = parentid
		  Rs("keywords") = keywords
		  Rs("desc") = desc
		  Rs.update
		End If
		Rs.Close
	end if

	Response.Write("<script>location=""company.asp"";</script>")	
end if

id=request.QueryString("id")
action=request.QueryString("action")
parentid = chkNumeric(request.QueryString("parentid"))
is_del=true

'title	content	addtime	hits	parentid	is_del	language	keywords	desc	
if action="edit" and id<>"" then
	set rs=conn.execute("select top 1 * from [t_company] where id="&id)
	if not rs.eof then
		title = rs("title")
		content = rs("content")
		addtime = rs("addtime")
		hits = rs("hits")
		parentid = rs("parentid")
		is_del = rs("is_del")
		language = rs("language")
		keywords = rs("keywords")
		desc = rs("desc")
	end if
	rs.close
end if
%>


<form id="form1" name="form1" method="post" action="" onsubmit="et.save();">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="2" class="header">修改<%=title%></td>
  </tr>
  <tr>
    <td width="9%" class="right">主 题</td>
    <td width="91%"><input name="title" type="text" class="text" id="title" value="<%=title%>" size="50" /></td>
  </tr>
  <tr>
    <td class="right">所属栏目</td>
    <td>
    <%
	i=1
	set rs=conn.execute("select id,title,depth from [t_menu] ORDER BY rootid,orders")
	do while not rs.eof%>
    <span style="display:block; float:left; width:120px"><input type="radio" <%if cint(parentid)=rs(0) or (parentid=0 and i=1) then response.Write("checked")%> name="parentid" value="<%=rs(0)%>" /><%=rs(1)%></span>
	<%
	i=i+1
	rs.movenext
	loop
	rs.close
	%>&nbsp;
    </td>
  </tr>
  
  <tr>
    <td width="14%" class="right">是否显示</td>
    <td width="86%">
      <label for="is_del">
        <input <%if is_del=true then response.Write("checked=""checked""")%> type="radio" name="is_del" id="is_del" value="1" />
      显示</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="ishide">
        <input <%if is_del=false then response.Write("checked=""checked""")%> type="radio" name="is_del" id="ishide" value="0" />
     隐藏</label>
      </td>
  </tr>
  <tr style="display:none">
    <td class="right">语言版本</td>
    <td><label for="language_cn">
        <input <%if language=0 then response.Write("checked=""checked""")%> type="radio" name="language" id="language_cn" value="0" />
      中文</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="language_en">
        <input <%if language=1 then response.Write("checked=""checked""")%> type="radio" name="language" id="language_en" value="1" />
     英文</label></td>
  </tr>
  <tr>
    <td class="right">内 容</td>
    <td>
    <textarea name="content" style="width:90%; height:300px" id="content"><%=content%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'content',filterMode : false});</script>
	</td>
  </tr>
  <tr class="bottom">
    <td>&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 提 交 " />
      <input name="action" type="hidden" id="action" value="save" />
      <input name="id" type="hidden" id="id" value="<%=id%>" />
      <input name="Submit2" type="button" class="button" value=" 返 回 " onclick="history.back();" /></td>
  </tr>
</table>
</form>

</body>
</html>