<!--#include file="check.asp"-->
<!--#include file="../inc/ypage.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>积分规则</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
<script src="../js/tips_win/tipswindow.js"></script>
<script src="../js/jquery.min.js"></script>
<script>
function chk_form(){
	var title = document.getElementById("title");
	if (title.value == '') {
		alert('请输入标题');
		title.focus();
		return false;
	}
}
</script>
</head>

<body>

<%
const data_from = "t_point_rule"
page_url = request.ServerVariables("SCRIPT_NAME")
action=request("action")
if action="save" then
	id = chkNumeric(request.Form("id"))
	title = Get_SafeStr(request.Form("title"))
	classname = Get_SafeStr(request.Form("classname"))
	points = chkNumeric(request.Form("points"))
	price = chkNumeric(request.Form("price"))
	'price = points

	addtime = now()
	if id=0 then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT * FROM "&data_from&" WHERE 1=0 "
		Rs.Open SQL,Conn,1,3
		Rs.Addnew
		  Rs("title") = title
		  Rs("classname") = classname
		  Rs("points") = points
		  Rs("price") = price
		  Rs("addtime") = addtime
		Rs.update
		Rs.Close
	else
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT TOP 1 * FROM "&data_from&" WHERE id="&id
		Rs.Open SQL,Conn,1,3
		If Not Rs.Eof Then
		  Rs("title") = title
		  Rs("classname") = classname
		  Rs("points") = points
		  Rs("price") = price
		  Rs("addtime") = addtime
		  Rs.update
		End If
		Rs.Close
	end if
	
	lasturl = request.Form("lasturl")
	if lasturl<>"" and instr(lasturl,"index.asp")=0 then page_url = lasturl
	call jsInfo("",page_url)

elseif 	action="del" then
	id = chkNumeric(request.QueryString("id"))
	conn.execute("delete from "&data_from&" where id="&id)
end if


%>


<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="my_table">

  <tr>
    <td colspan="21" class="header">积分规则</td>
  </tr>
  <tr>
    <td colspan="21">
    <%
	q = trim(request.QueryString("q"))
	%>
    <form method="get" id="sForm">
    搜索：<input type="text" value="<%=q%>" name="q" size="30" />
    <input type="submit" class="btn" value=" 搜 索 " />
    </form>
    </td>
  </tr>

  <tr  class="title" align="center">
    <td>序号</td>
    <td align="left">分类</td>
    <td align="left">规则</td>
    <td align="left">兑换积分</td>
    <td>兑换金额(分)</td>
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
	
	rs_total=getRsTotal(index_id,data_from,wherestr)'记录总数
	if rs_total>0 then sqlid = getSqlID(index_id,maxperpage,data_from,wherestr,taxis)'id字符串
	
	if sqlid<>"" then
		sql="select top "&maxperpage&" "&selectsql&" from "&data_from&" where "&index_id&" in ("& sqlid &") "&taxis
		'response.Write(sql)
		set rs=conn.execute(sql)
		do while not rs.eof
	%>
  <tr align="center" onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("id")%></td>
    <td align="left"><%=rs("classname")%></td>
    <td align="left"><%=getKeywords(rs("title"),q)%></td>
    <td><%=rs("points")%></td>
    <td><%=rs("price")%></td>
    <td><%=rs("addtime")%></td>
    <td>
	<a href="?action=edit&id=<%=rs(0)%>&page=<%=reqStr("page","num")%>">修改</a>
	|
	<a onclick="return confirm('是否删除？');" href="?action=del&id=<%=rs(0)%>">删除</a></td>
  </tr>
  <%
  		rs.movenext
	  loop
	  rs.close
  end if
  %><tr>
    <td colspan="21" class="bottom"><% call showPage(maxperpage,rs_total,page_param) %></td>
  </tr>
</table> 



<br/>

<%
if action="edit" then
  	id=request.QueryString("id")
  	set rs=conn.execute("select  * from "&data_from&" where id="&id)
	if not rs.eof then
		title = rs("title")
		classname = rs("classname")
		points = rs("points")
		price = rs("price")
		addtime = rs("addtime")
	
	end if
	rs.close
  end if
%>
<form id="form1" name="form1" method="post" action="<%=page_url%>" onsubmit="return chk_form()">
<table width="100%" border="0" cellspacing="0" class="my_table" cellpadding="0">
  <tr>
    <td colspan="2" class="header">添加</td>
  </tr>
    <tr>
    <td class="right">分类</td>
    <td><input name="classname" autocomplete='off'  type="text" class="text" value="<%=classname%>" id="classname" size="50" /></td>
  </tr>
  <tr>
    <td width="18%" class="right">标题</td>
    <td width="82%"><input autocomplete='off'  name="title" type="text" class="text" value="<%=title%>" id="title" size="50" /></td>
  </tr>

  <tr>
    <td class="right">可兑换积分</td>
    <td><input autocomplete='off' name="points" type="text" class="text" value="<%=points%>" id="points" size="50" /></td>
  </tr>
  <tr>
    <td class="right">可兑换金额</td>
    <td><input autocomplete='off' name="price" type="text" class="text" value="<%=price%>" id="price" size="50" />
    (分)</td>
  </tr>

  <tr>
    <td class="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 提 交 " />
      <input name="action" type="hidden" id="action" value="save" />
      <input name="lasturl" type="hidden" id="lasturl" value="<%=request.ServerVariables("HTTP_REFERER")%>" />
      <input name="id" type="hidden" id="id" value="<%=id%>" /></td>
  </tr>
</table>
</form>
<br/><br/>
</body>
</html>
