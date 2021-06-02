<!--#include file="check.asp"-->
<!--#include file="../inc/ypage.asp"--><%
'title	addr	addtime	num	salary	intro
const datafrom = "t_hr"
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HR</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
<script src="../js/tips_win/tipswindow.js"></script>
<script src="../js/jquery.min.js"></script>
</head>

<body>

<%
page_url = request.ServerVariables("SCRIPT_NAME")
action=request("action")
if action="save" then
	id = intval(apost("id"))

	title = trim(request.Form("title"))
	addr = trim(request.Form("addr"))
	addtime = trim(request.Form("addtime"))
	num = intval(request.Form("num"))
	salary = trim(request.Form("salary"))
	intro = trim(request.Form("intro"))


	addtime = now()
	if id=0 then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT * FROM "&datafrom&" WHERE 1=0 "
		Rs.Open SQL,Conn,1,3
		Rs.Addnew
			'新增数据
			Rs("title") = title
			Rs("addr") = addr
			Rs("addtime") = addtime
			Rs("num") = num
			Rs("salary") = salary
			Rs("intro") = intro
		Rs.update
		Rs.Close
	else
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT TOP 1 * FROM "&datafrom&" WHERE id="&id
		Rs.Open SQL,Conn,1,3
		If Not Rs.Eof Then
			'更新数据
			Rs("title") = title
			Rs("addr") = addr
			Rs("addtime") = addtime
			Rs("num") = num
			Rs("salary") = salary
			Rs("intro") = intro
			Rs.update
		End If
		Rs.Close
	end if
	
	call jsInfo("",page_url)

elseif 	action="del" then
	id = chkNumeric(request.QueryString("id"))
	conn.execute("delete from "&datafrom&" where id="&id)
end if
%>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="my_table">
  <tr>
    <td colspan="20" class="header">人才招聘</td>
  </tr>

  <tr  class="title" align="center">
    <td>序号</td>
    <td align="left">职位</td>
    <td >人数</td>
    <td >待遇</td>
    <td>添加时间</td>
    <td>操作</td>
  </tr>
  <%
	'------------------------------------------------分页显示开始
	taxis = " order by id desc"
	selectsql = "*"
	index_id = "id"
	maxperpage=10 
	
	'-----------搜索条件
	orderby = request.QueryString("orderby")
	wherestr = "where 1=1 ":page_param = ""
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
  <tr align="center" onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("id")%></td>
    <td align="left"><%=getKeywords(rs("title"),q)%></td>
    <td><%=rs("num")%></td>
    <td><%=rs("salary")%></td>

    <td><%=rs("addtime")%></td>
    <td>
	<a href="?action=edit&id=<%=rs(0)%>">修改</a>
	|
	<a onclick="return confirm('是否删除？');" href="?action=del&id=<%=rs(0)%>">删除</a></td>
  </tr>
  <%
  		rs.movenext
	  loop
	  rs.close
  end if
  %><tr>
    <td colspan="20" class="bottom"><% call showPage(maxperpage,rs_total,page_param) %></td>
  </tr>
</table> 



<br/>

<%
if action="edit" then
  	id=request.QueryString("id")
  	set rs=conn.execute("select  * from "&datafrom&" where id="&id)
	if not rs.eof then
		title = rs("title")
addr = rs("addr")
addtime = rs("addtime")
num = rs("num")
salary = rs("salary")
intro = rs("intro")

	end if
	rs.close
  end if
%>
<form id="form1" name="form1" method="post" action="<%=page_url%>" onsubmit="">
<table width="100%" border="0" cellspacing="0" class="my_table" cellpadding="0">
  <tr>
    <td colspan="2" class="header">添加</td>
  </tr>
  
  <tr>
    <td width="18%" class="right">职位</td>
    <td width="82%"><input name="title" type="text" class="text" value="<%=title%>" id="title" size="50" /></td>
  </tr>
  <tr>
    <td class="right">人数</td>
    <td><input name="num" type="text" class="text" value="<%=num%>" id="num" size="20" /> * 请输入数字
    </td>
  </tr>
  <tr>
    <td class="right">待遇</td>
    <td><input name="salary" type="text" class="text" value="<%=salary%>" id="salary" size="20" />
    <input type="button" value="面议" onclick="$('#salary').val(this.value);" />
    </td>
  </tr>
  <tr>
    <td class="right">工作地点</td>
    <td><input name="addr" type="text" class="text" value="<%=addr%>" id="addr" size="50" /></td>
  </tr>

  <tr>
    <td class="right">职位要求</td>
    <td><textarea name="intro" cols="60" rows="6" class="text" id="intro"><%=intro%></textarea></td>
  </tr>

  <tr>
    <td class="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 提 交 " />
      <input name="action" type="hidden" id="action" value="save" />
      <input name="id" type="hidden" id="id" value="<%=id%>" /></td>
  </tr>
</table>
</form>
</body>
</html>
