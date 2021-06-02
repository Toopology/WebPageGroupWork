<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加产品</title>
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
const datafrom = "t_products"
act=request.Form("act")
id=chkNumeric(request.Form("id"))
lasturl = request.ServerVariables("HTTP_REFERER")

init_all = 0
if init_all = 999 then
'-------------------------------------------
for i=128 to 177
	title = "杆盒系列"
	classid = 10
'-------------------------------------------
	
	userid = 0
	addtime = now()
	lasttime = now()
	hits = 0	
	num = 0
	is_del = 0
	preview = "upload/preview/small/"&(right("000"&i,3))&".jpg"
	is_top = 0
	intro = title
	content = "upload/preview/"&(right("000"&i,3))&".jpg"
	content = "<img src='"&content&"' />"
	price = 0
	
	Set Rs = Server.CreateObject("ADODB.Recordset")
	SQL = "SELECT * FROM "&datafrom&" WHERE 1=0 "
	Rs.Open SQL,Conn,1,3
	Rs.Addnew
	  Rs("title") = title
	  Rs("userid") = userid
	  Rs("addtime") = addtime
	  Rs("lasttime") = lasttime
	  Rs("userip") = userip
	  Rs("hits") = hits
	  Rs("num") = num
	  Rs("is_del") = is_del
	  Rs("no") = no
	  Rs("preview") = preview
	  Rs("is_top") = is_top
	  Rs("intro") = intro
	  Rs("content") = content
	  Rs("classid") = classid
	  Rs("price") = price
	Rs.update
	Rs.Close
next
end if

if act="save" then
	lasturl = ""
	'title	userid	addtime	lasttime	userip	hits	num	is_del	no	preview	is_top	intro	content	classid	price
	title = outHTML(request.Form("title"))
	userid = chkNumeric(request.Form("userid"))
	addtime = now()
	lasttime = addtime
	userip = getip()
	hits = chkNumeric(request.Form("hits"))
	num = chkNumeric(request.Form("num"))
	is_del = 0
	no = Get_SafeStr(request.Form("no"))
	preview = Get_SafeStr(request.Form("preview"))
	is_top = chkNumeric(request.Form("is_top"))
	intro = trim(request.Form("intro"))
	content = trim(request.Form("content"))
	classid = chkNumeric(request.Form("classid"))
	price = chkNumeric(request.Form("price"))
	bigpic = trim(request.Form("bigpic"))
	is_supply = reqForm("is_supply","num")
	
	if id=0 then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT * FROM "&datafrom&" WHERE 1=0 "
		Rs.Open SQL,Conn,1,3
		Rs.Addnew
		  Rs("title") = title
		  Rs("userid") = userid
		  Rs("addtime") = addtime
		  Rs("lasttime") = lasttime
		  Rs("userip") = userip
		  Rs("hits") = hits
		  Rs("num") = num
		  Rs("is_del") = is_del
		  Rs("no") = no
		  Rs("preview") = preview
		  Rs("is_top") = is_top
		  Rs("intro") = intro
		  Rs("content") = content
		  Rs("classid") = classid
		  Rs("price") = price
		  Rs("bigpic") = bigpic
		  Rs("is_supply") = is_supply
		Rs.update
		Rs.Close
	else
		lasturl = request.Form("lasturl")
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT TOP 1 * FROM "&datafrom&" WHERE id="&id
		Rs.Open SQL,Conn,1,3
		If Not Rs.Eof Then
		  Rs("title") = title
		  Rs("lasttime") = lasttime
		  Rs("userip") = userip
		  Rs("num") = num
		  Rs("no") = no
		  Rs("preview") = preview
		  Rs("is_top") = is_top
		  Rs("intro") = intro
		  Rs("content") = content
		  Rs("classid") = classid
		  Rs("price") = price
		  Rs("bigpic") = bigpic
		  Rs("is_supply") = is_supply
		  Rs.update
		End If
		Rs.Close
	end if
	
	set rs=conn.execute("select count(id) from t_products where classid="&classid)
	hits=rs(0)
	rs.close
	
	conn.execute("update t_classify set hits="&hits&" where classid="&classid)
	
	if lasturl<>"" then	
		response.Write("<script>location="""&lasturl&""";</script>")
	else
		response.Write("<script>location=""product.asp?classid="&classid&""";</script>")
	end if
	response.End()
	
end if



id=chkNumeric(request.QueryString("id"))
classid = chkNumeric(request.QueryString("classid"))
is_top = 0

if id>0 then
	set rs=conn.execute("select top 1 * from "&datafrom&" where id="&id)
	if not rs.eof then
		title = rs("title")
		userid = rs("userid")
		addtime = rs("addtime")
		lasttime = rs("lasttime")
		userip = rs("userip")
		hits = rs("hits")
		num = rs("num")
		is_del = rs("is_del")
		is_supply = rs("is_supply")
		no = rs("no")
		preview = rs("preview")
		is_top = rs("is_top")
		intro = rs("intro")
		content = rs("content")
		content = replace(content,"src=""upload/","src=""/upload/")
		content = replace(content,"src='upload/","src='/upload/")
		classid = rs("classid")
		price = rs("price")
		bigpic = rs("bigpic")
	end if
	rs.close
end if
%>


<form id="form1" name="form1" method="post" action="" onsubmit="return checkFrm();">
<table border="0" cellspacing="0" class="my_table" cellpadding="0">
  <tr>
    <td colspan="2" class="header">增加产品</td>
  </tr>
  <tr>
    <td width="15%" class="right">名 称</td>
    <td width="85%"><input name="title" type="text" value="<%=title%>" class="text" id="title" size="50" /></td>
  </tr>
  <tr>
    <td class="right">分 类</td>
    <td><%
	Response.Write "<select name=""classid"">"
	'Response.Write "<option value=""0"">请选择分类</option>"
	SQL = "SELECT classid,depth,ClassName FROM t_Classify where  is_del=0 and channelid=2 ORDER BY rootid,orders"
	Set Rs = conn.Execute(SQL)
	Do While Not Rs.EOF
		Response.Write "<option value=""" & Rs(0) & """ "
		If CLng(classid) = Rs(0) Then Response.Write "selected"
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
%>	</td>
  </tr>
 
  <tr style="display:none">
    <td class="right">产品编号</td>
    <td><input name="no" type="text" class="text" id="no" value="<%=no%>" /></td>
  </tr>
  <tr class="hide">
    <td class="right">供求</td>
    <td>
    <input type="radio" <%if is_supply="1" then response.Write("checked")%> name="is_supply" value="1" /> 供应信息　　
    <input type="radio" <%if is_supply="0" then response.Write("checked")%> name="is_supply" value="0" /> 求购信息
	</td>
  </tr>
  <tr class="hide">
    <td class="right">置顶</td>
    <td>
    <input type="radio" <%if is_top="1" then response.Write("checked")%> name="is_top" value="1" /> 是　　
    <input type="radio" <%if is_top="0" then response.Write("checked")%> name="is_top" value="0" /> 否
	</td>
  </tr>
  <tr>
    <td class="right">小图片</td>
    <td><input name="preview" type="text" class="text" id="preview" value="<%=preview%>" size="50" />
    <input type="button" value="上传图片" onclick="showUpload('preview',200,120);" />
    <input type="button" value="预览" onclick="previewUpload('preview',500,400);" />
	</td>
  </tr>
  <tr class="hide">
    <td class="right">大图片</td>
    <td><input name="bigpic" type="text" class="text" id="bigpic" value="<%=bigpic%>" size="50" />
    <input type="button" value="上传图片" onclick="showUpload('bigpic',800,800);" />
    <input type="button" value="预览" onclick="previewUpload('bigpic',500,400);" />
	</td>
  </tr>

  <tr class="hide">
    <td class="right">简单介绍</td>
    <td><input name="intro" type="text" class="text" id="intro" size="60" value="<%=intro%>" />
    </td>
  </tr>
  <tr>
    <td class="right">产品介绍</td>
    <td>
    <textarea name="content" style="width:90%; height:400px" id="content"><%=content%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'content',filterMode : false});</script>
	</td>
  </tr>

  <tr class="bottom">
    <td>&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 提 交 " />
      <input name="act" type="hidden" id="act" value="save" />
      <input name="id" type="hidden" id="id" value="<%=id%>" />
      <input name="lasturl" type="hidden" id="lasturl" value="<%=lasturl%>" />
      
	  </td>
  </tr>
</table>
</form>
</body>
</html>
