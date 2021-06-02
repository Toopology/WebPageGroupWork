<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻管理</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
<script src="../js/tips_win/tipswindow.js"></script>
<script src="../js/jquery.min.js"></script>
<script>
//打开上传对话框
function showUpload(id,w,h){
	tipsWindow("上传图片", "iframe:xupload/upload.htm?id="+id+"&w="+w+"&h="+h, "500", "150", "false", "", "true", "text");
}

//预览上传图片
function previewUpload(id,w,h){
	var img = document.getElementById(id).value;
	tipsWindow("预览图片", "img:../"+img, w, h, "true", "", "true", "text");
}
</script>
</head>

<body>
<%
const datafrom = "t_article"
act=request.Form("act")
id=chkNumeric(request.Form("id"))
if act="save" then
	
	title = outHTML(request.Form("title"))
	content = trim(request.Form("content"))
	'call replace_path(content,"save")
	
	parentid = chkNumeric(request.Form("parentid"))
	addtime = now()
	lasttime = addtime
	tags = trim(request.Form("tags"))
	classid = Get_SafeStr(request.Form("classid"))
	intro = trim(request.Form("intro"))
	intro = replace(intro,",","###")

	hits = chkNumeric(request.Form("hits"))
	good = chkNumeric(request.Form("good"))
	bad = chkNumeric(request.Form("bad"))
	preview = trim(request.Form("preview"))
	is_top = chkNumeric(request.Form("is_top"))
	is_del = 0
	author = trim(request.Form("author"))
	
	if title<>"" then
		if id=0 then
			Set Rs = Server.CreateObject("ADODB.Recordset")
			SQL = "SELECT * FROM "&datafrom&" WHERE 1=0 "
			Rs.Open SQL,Conn,1,3
			Rs.Addnew
			  Rs("title") = title
			  Rs("content") = content
			  Rs("parentid") = parentid
			  Rs("addtime") = addtime
			  Rs("lasttime") = lasttime
			  Rs("tags") = tags
			  Rs("classid") = classid
			  Rs("intro") = intro
			  Rs("hits") = hits
			  Rs("good") = good
			  Rs("bad") = bad
			  Rs("preview") = preview
			  Rs("is_top") = is_top
			  Rs("is_del") = is_del
			  Rs("author") = author
			Rs.update
			Rs.Close
		else
			Set Rs = Server.CreateObject("ADODB.Recordset")
			SQL = "SELECT TOP 1 * FROM "&datafrom&" WHERE id="&id
			Rs.Open SQL,Conn,1,3
			If Not Rs.Eof Then
			  Rs("title") = title
			  Rs("content") = content
			  Rs("parentid") = parentid
			  Rs("lasttime") = lasttime
			  Rs("tags") = tags
			  Rs("classid") = classid
			  Rs("intro") = intro
			  Rs("preview") = preview
			  Rs("is_top") = is_top
			  Rs("author") = author
			  Rs.update
			End If
			Rs.Close
		end if
	end if
	
	set rs=conn.execute("select count(id) from t_article where classid="&classid)
	hits=rs(0)
	rs.close
	
	conn.execute("update t_classify set hits="&hits&" where classid="&classid)
	
	response.Write("<script>location=""news_list.asp"";</script>")
	response.End()
	
end if

id = chkNumeric(request.QueryString("id"))
classid = chkNumeric(request.QueryString("classid"))
is_top = 0
intro = "### ### ### ### ### ###"
if id>0 then
	'title	content	parentid	addtime	lasttime	tags	classid	intro	hits	good	bad	preview	is_top	is_del	author
	set rs=conn.execute("select top 1 * from "&datafrom&" where id="&id)
	if not rs.eof then
		title = rs("title")
		content = rs("content")
		parentid = rs("parentid")
		addtime = rs("addtime")
		lasttime = rs("lasttime")
		tags = rs("tags")
		classid = rs("classid")
		intro = rs("intro")&"### ### ### ### ### ###"
		hits = rs("hits")
		good = rs("good")
		bad = rs("bad")
		preview = rs("preview")
		is_top = rs("is_top")
		is_del = rs("is_del")
		author = rs("author")
		
		'call replace_path(content,"show")
	end if
	rs.close
end if

intro = split(intro,"###")
%>
<form id="form1" name="form1" method="post" action="" onsubmit="return checkFrm();">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="2" class="header">增加新闻</td>
  </tr>
  <tr>
    <td width="15%" class="right">标 题</td>
    <td width="85%"><input name="title" type="text" value="<%=title%>" class="text" id="title" size="50" /></td>
  </tr>
  
  <tr>
    <td class="right">来 源(作者)</td>
    <td><input name="author" type="text" class="text" value="<%=author%>" id="author" size="20" /></td>
  </tr>
  <tr>
    <td class="right">预览图</td>
    <td><input name="preview" type="text" class="text" value="<%=preview%>" id="preview" size="50" />
    <input type="button" value="上传图片" onclick="showUpload('preview',200,150);" />
    <input type="button" value="预览" onclick="previewUpload('preview',500,400);" />
      </td>
  </tr>
  <tr class="hide">
    <td class="right">标签</td>
    <td><input name="tags" type="text" class="text" id="tags" value="<%=tags%>" size="50" /></td>
  </tr>
  <tr>
    <td class="right">置顶</td>
    <td>
    <input type="radio" <%if is_top="1" then response.Write("checked")%> name="is_top" value="1" /> 是　　
    <input type="radio" <%if is_top="0" then response.Write("checked")%> name="is_top" value="0" /> 否
	</td>
  </tr>
  <tr>
    <td class="right">分类</td>
    <td><%
	i=1
	set rs=conn.execute("select classid,classname from [t_classify] where channelid=1 and is_del=0")
	do while not rs.eof%><input id="classid<%=i%>" type="radio" <%if cint(classid)=rs(0) or (classid=0 and i=1) then response.Write("checked")%> name="classid" value="<%=rs(0)%>" /> <label for="classid<%=i%>"><%=rs(1)%></label>　
	<%
	if i mod 6 = 0 then response.Write("<br/>")
	i=i+1
	rs.movenext
	loop
	rs.close
	%>&nbsp;
	</td>
  </tr> 

  <tr>
    <td class="right">内 容</td>
    <td>
	<textarea name="content" style="width:90%; height:250px" id="content"><%=content%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'content',filterMode : false});</script>
	</td>
  </tr>
  <tr class="bottom">
    <td width="18%">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 提 交 " />
      <input name="act" type="hidden" id="act" value="save" />
      <input name="id" type="hidden" id="id" value="<%=id%>" />
      <input type="button" name="button" id="button" value=" 返 回 " onclick="history.back();" /></td>
  </tr>
</table>
</form>

</body>
</html>
