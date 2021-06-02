<!--#include file="check.asp"-->
<!--#include file="../inc/ypage.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>服务明星</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
<script language="javascript" type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

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
<script src="../js/jquery.min.js"></script>
<script src="../js/tips_win/tipswindow.js"></script>
</head>

<body>
<%
const datafrom = "t_album"
act=request.Form("act")
id=chkNumeric(request.Form("id"))
if act="save" then

	title = outHTML(request.Form("title"))
	content = trim(request.Form("content"))
	addtime = now()
	phototime = now()
	hits = 0
	classname = trim(request.Form("classname"))
	bigpic = trim(request.Form("bigpic"))
	preview = trim(request.Form("preview"))
	is_top = reqForm("is_top","num")
	is_del = 0
	desc = desc&reqForm("desc0","trim")&"###"
	desc = desc&reqForm("desc1","trim")&"###"
	desc = desc&reqForm("desc2","trim")&"###"
	desc = desc&reqForm("desc3","trim")&"###"
	desc = desc&reqForm("desc4","trim")&"###"
	
	if id=0 then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT * FROM "&datafrom&" WHERE 1=0 "
		Rs.Open SQL,Conn,1,3
		Rs.Addnew
		  Rs("title") = title
		  Rs("content") = content
		  Rs("addtime") = addtime
		  Rs("phototime") = phototime
		  Rs("hits") = hits
		  Rs("classname") = classname
		  Rs("bigpic") = bigpic
		  Rs("preview") = preview
		  Rs("is_top") = is_top
		  Rs("is_del") = is_del
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
		  Rs("phototime") = phototime
		  Rs("classname") = classname
		  Rs("bigpic") = bigpic
		  Rs("preview") = preview
		  Rs("is_top") = is_top
		  Rs("desc") = desc
		  Rs.update
		End If
		Rs.Close
	end if

	call jsInfo("","album.asp")
end if
%>

<%
act = request.QueryString("act")
select case act
	case "edit"
		call edit()
	case "del"
		call del()
	case else
		call list()
end select

sub del()
	id = chkNumeric(request.QueryString("id"))
	sql = "delete from t_album where id="&id
	conn.execute(sql)
	call jsInfo("","album.asp")
end sub
%>

<%
sub list()
%>
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="7" class="header">&nbsp;<a href="album.asp?act=edit">增加服务明星</a></td>
  </tr>
  <tr class="title">
    <td>编号</td>
    <td>名称</td>
    <td>分类</td>
    <td>查看次数</td>
    <td>最后更新时间</td>
    <td>操作</td>
  </tr>

  
  <%
	'------------------------------------------------分页显示开始
   
	taxis = " order by is_top desc,id desc"
	selectsql = "*"
	index_id = "id"
	maxperpage=16 
	
	'-----------搜索条件
	orderby = request.QueryString("orderby")
	wherestr = "where 1=1 and is_del=0 "
	page_param = ""
	wherestr = wherestr&"":page_param=page_param&""
	if q<>"" then wherestr = wherestr&" and title like '%"&q&"%' ":page_param=page_param&"&q="&server.URLEncode(q)
	if orderby<>"" then taxis=" ORDER BY "&orderby&" desc ":page_param=page_param&"&orderby="&orderby
	
	rs_total=getRsTotal(index_id,datafrom,wherestr)'记录总数
	if rs_total>0 then sqlid = getSqlID(index_id,maxperpage,datafrom,wherestr,taxis)'id字符串
	
	if sqlid<>"" then
		sql="select top "&maxperpage&" "&selectsql&" from "&datafrom&" where "&index_id&" in ("& sqlid &") "&taxis
		'response.Write(sql)
		set rs=conn.execute(sql)
		do while not rs.eof

	  %>
  
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("id")%></td>
    <td><%=rs("title")%>
    <%if rs("is_top")=1 then response.Write("  <font color=red>封面</font>")%>
    </td>
    <td><%=rs("classname")%></td>
    <td><%=rs("hits")%></td>
    <td><%=rs("addtime")%></td>
    <td>
    <a href="album.asp?act=edit&id=<%=rs("id")%>">修改</a>　
    <a onclick="return confirm('确定要删除吗？删除后无法撤销！')" href="?act=del&id=<%=rs("id")%>">删除</a></td>
  </tr>
<%
	rs.movenext
	loop
	rs.close
end if
'------------------------------------------------分页显示结束
%>
  <tr class="bottom">
    <td colspan="20"><%call showPage(maxperpage,rs_total,page_param)%></td>
  </tr>
</table>
<%
end sub
%>

<%sub edit()
	id=chkNumeric(request.QueryString("id"))
	parentid = chkNumeric(request.QueryString("parentid"))
	is_del=0
	is_top=0
	desc = "### ### ### ### ###"
	
	'title	content	addtime	phototime	hits	classid	bigpic	preview	is_top	is_del	
	if id>0 then
		set rs=conn.execute("select top 1 * from "&datafrom&" where id="&id)
		if not rs.eof then
			title = rs("title")
			content = rs("content")
			addtime = rs("addtime")
			phototime = rs("phototime")
			hits = rs("hits")
			classid = rs("classid")
			bigpic = rs("bigpic")
			preview = rs("preview")
			is_top = rs("is_top")
			is_del = rs("is_del")
			classname = rs("classname")
			desc = rs("desc")&"### ### ### ### ###"
		end if
		rs.close
	end if
	
	desc = split(desc,"###")
%>
<form id="form1" name="form1" method="post" action="" onsubmit="">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="2" class="header">修改<%=title%></td>
  </tr>
  <tr>
    <td width="9%" class="right">标 题</td>
    <td width="91%"><input autocomplete="off" name="title" type="text" class="text" id="title" value="<%=title%>" size="50" /></td>
  </tr>
  <tr>
    <td class="right">分 类</td>
    <td><%=showSelect("classname","","优秀员工,物流部门,加盟服务商,集团成员,回收店留影,优秀合作服务商",classname)%></td>
  </tr>
  <tr>
    <td width="9%" class="right">个人信息</td>
    <td width="91%">
    	性别：<%=showSelect("desc0","","男,女",desc(0))%>
    	工号：<input name="desc1" type="text" class="text" value="<%=desc(1)%>" size="10" />
    	岗位：<input name="desc2" type="text" class="text" value="<%=desc(2)%>" size="20" />
    	荣誉：<input name="desc3" type="text" class="text" value="<%=desc(3)%>" size="20" />
    	颁发时间：<input name="desc4" type="text" class="text" value="<%=desc(4)%>" size="10" />
    </td>
  </tr>

  <tr>
    <td width="9%" class="right">照片</td>
    <td width="91%">
    <input name="preview" type="text" class="text" id="preview" value="<%=preview%>" size="50" />
    <input type="button" value="上传图片" onclick="showUpload('preview',400,300);" />
    <input type="button" value="预览" onclick="previewUpload('preview',500,400);" />
    
    </td>
  </tr>
  <tr class="hide">
    <td width="9%" class="right">大 图</td>
    <td width="91%">
    <input name="bigpic" type="text" class="text" id="bigpic" value="<%=bigpic%>" size="50" />
    <input type="button" value="上传图片" onclick="showUpload('bigpic',400,300);" />
    <input type="button" value="预览" onclick="previewUpload('bigpic',500,400);" />
    
    </td>
  </tr>
  <tr class="hide">
    <td width="14%" class="right">设置为分类封面</td>
    <td width="86%">

        <input <%if is_top=0 then response.Write("checked=""checked""")%> type="radio" name="is_top" id="is_top0" value="0" />
      <label for="is_top0">否</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input <%if is_top=1 then response.Write("checked=""checked""")%> type="radio" name="is_top" id="is_top1" value="1" />
     <label for="is_top1">是</label>
      </td>
  </tr>
  <tr>
    <td class="right">荣誉事迹</td>
    <td>
    <textarea name="content" style="width:90%; height:250px" id="content"><%=content%></textarea>
	<script charset="utf-8" src="gycteditor/kindeditor.js"></script>
	<script>KE.show({id : 'content',filterMode : false});</script>
	</td>
  </tr>
  <tr class="bottom">
    <td>&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 提 交 " />
      <input name="act" type="hidden" id="act" value="save" />
      <input name="id" type="hidden" id="id" value="<%=id%>" />
      <input name="Submit2" type="button" class="button" value=" 返 回 " onclick="history.back();" /></td>
  </tr>
</table>
</form>
<%end sub%>

<%
function getParentName(pid)
	set rs_temp = conn.execute("select top 1 title from t_menu where id="&pid)
	if not rs_temp.eof then getParentName=rs_temp("title")
	rs_temp.close
end function
%>

</body>
</html>
