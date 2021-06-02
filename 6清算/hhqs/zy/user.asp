<!--#include file="check.asp"-->
<!--#include file="../inc/ypage.asp"-->
<!--#include file="../inc/md5.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员管理</title>
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
'truename	points	company	address	tel	mobile	email	remark	passwd
const data_from = "t_user"
page_url = request.ServerVariables("SCRIPT_NAME")
act=request("act")
if act="save" then
	id = chkNumeric(request.Form("id"))
	
	truename = Get_SafeStr(request.Form("truename"))
	points_sign = Get_SafeStr(request.Form("points_sign"))
	points = chkNumeric(request.Form("points"))*points_sign
	level = chkNumeric(request.Form("level"))
	company = Get_SafeStr(request.Form("company"))
	address = Get_SafeStr(request.Form("address"))
	tel = Get_SafeStr(request.Form("tel"))
	mobile = Get_SafeStr(request.Form("mobile"))
	email = Get_SafeStr(request.Form("email"))
	remark = Get_SafeStr(request.Form("remark"))
	passwd = trim(request.Form("passwd"))

	Set Rs = Server.CreateObject("ADODB.Recordset")
	SQL = "SELECT * FROM "&data_from&" WHERE id="&id
	Rs.Open SQL,Conn,1,3
	if not rs.eof then
		Rs("truename") = truename
		if points<>0 then total_points=chkNumeric(Rs("points")) + points:Rs("points") = chkNumeric(Rs("points") ) + points
		Rs("company") = company
		Rs("address") = address
		Rs("level") = level
		Rs("tel") = tel
		Rs("mobile") = mobile
		Rs("email") = email
		Rs("remark") = remark
		if passwd<>"" then Rs("passwd") = md5(passwd)
		Rs.update
	end if
	Rs.Close
	
	if points<>0 then call insert_elog("score",points,id,"管理员操作",total_points)
	
	call jsInfo("",page_url)

elseif 	act="del" then
	id = chkNumeric(request.QueryString("id"))
	conn.execute("update  "&data_from&" set is_del=1 where id="&id)
end if
%>

<%
task = reqStr("task","trim")
select case task
	case "edit": call edit()
	case else:call list()
end select
%>


<%sub list()%>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="my_table">

  <tr>
    <td colspan="20" class="header">会员管理</td>
  </tr>
  <tr>
    <td colspan="20">
    <%
	q = trim(request.QueryString("q"))
	%>
    <form method="get" id="sForm">
    搜索：<input type="text" value="<%=q%>" name="q" size="30" />
    <input type="submit" class="btn" value=" 搜 索 " />
    </form>
    </td>
  </tr>
  <tr class="title" align="center">
    <td>帐号</td>
    <td >姓名</td>
    <td >电话</td>
    <td>积分</td>
    <td>注册时间</td>
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
	wherestr = "where is_del=0 ":page_param = ""
	wherestr = wherestr&"":page_param=page_param&""
	if q<>"" then wherestr = wherestr&" and (uname like '%"&q&"%' or truename like '%"&q&"%') ":page_param=page_param&"&q="&server.URLEncode(q)
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
    <td><%=rs("uname")%></td>
    <td><%=rs("truename")%></td>
    <td><%=rs("tel")%>　<%=rs("mobile")%></td>
    <td><%=rs("points")%></td>
    <td><%=rs("addtime")%></td>
    <td>
	<a href="?task=edit&id=<%=rs(0)%>">修改</a> | 
	<a onclick="return confirm('是否删除？');" href="?act=del&id=<%=rs(0)%>">删除</a>
    </td>
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
<%end sub%>

<%sub edit()%>
<%
id = reqStr("id","num")
if id>0 then
	sql = "select * from "&data_from&" where id="&id
	set rs=conn.execute(sql)
	if not rs.eof then
		truename = rs("truename")
		sex = rs("sex")
		points = rs("points")
		level = rs("level")
		company = rs("company")
		address = rs("address")
		qq = rs("qq")
		tel = rs("tel")
		mobile = rs("mobile")
		email = rs("email")
		photo = rs("photo")
		remark = rs("remark")
		addtime = rs("addtime")
		lasttime = rs("lasttime")
		uname = rs("uname")
		passwd = rs("passwd")
		userip = rs("userip")
		birthday = rs("birthday")
		is_vip = rs("is_vip")
		is_del = rs("is_del")
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
    <td width="10%" class="right">帐号</td>
    <td width="90%"><%=uname%></td>
  </tr>
  <tr>
    <td class="right">密码</td>
    <td><input name="passwd" type="text" class="text" id="passwd" value="" size="20" /> *不修改密码请留空</td>
  </tr>
  <tr>
    <td class="right">姓名</td>
    <td><input name="truename" type="text" class="text" id="truename" value="<%=truename%>" size="20" /></td>
  </tr>
  <tr>
    <td class="right">电话</td>
    <td><input name="tel" type="text" class="text" id="tel" value="<%=tel%>" size="50" /></td>
  </tr>
  <tr>
    <td class="right">手机</td>
    <td><input name="mobile" type="text" class="text" id="mobile" value="<%=mobile%>" size="50" /></td>
  </tr>
  <tr>
    <td class="right">地址</td>
    <td><input name="address" type="text" class="text" id="address" value="<%=address%>" size="50" /></td>
  </tr>
  <tr>
    <td class="right">公司</td>
    <td><input name="company" type="text" class="text" id="company" value="<%=company%>" size="50" /></td>
  </tr>
  <tr>
    <td class="right">会员等级</td>
    <td>
    <select name="level">
    <option value="0">★</option>
    <option value="1" <%if level=1 then response.Write("selected")%>>★★</option>
    <option value="2" <%if level=2 then response.Write("selected")%>>★★★</option>
    <option value="3" <%if level=3 then response.Write("selected")%>>★★★★</option>
    <option value="4" <%if level=4 then response.Write("selected")%>>★★★★★</option>
    </select>
    </td>
  </tr>
  <tr>
    <td class="right">会员积分</td>
    <td>当前积分：<%=points%>
    积分调整：
    <select name="points_sign">
    	<option value="1">增加</option>
    	<option value="-1">减少</option>
    </select>
    <input name="points" type="text" class="text" id="points" value="" size="10" /></td>
  </tr>
	<tr>
    <td class="right">备注</td>
    <td><textarea name="remark" cols="50" rows="3" class="text" id="remark"><%=remark%></textarea></td>
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
</body>
</html>
