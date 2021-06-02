<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员密码</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>

<%
Action = LCase(Request("action"))
Select Case Trim(Action)
	Case "save"
		Call saves
	Case Else
		Call list
End Select

Sub saves()
	pwd1 = Get_SafeStr(request.Form("pwd1"))
	pwd2 = Get_SafeStr(request.Form("pwd2"))
	userid = left(Get_SafeStr(request.Form("userid")),12)
	
	set rs=conn.execute("select top 1 id from t_admin where passwd='"&pwd1&"'")
	if not rs.eof then isadmin = 1 else  isadmin = 0
	rs.close
	
	if pwd1<>"" and pwd2<>"" and userid<>"" and (isadmin = 1) then
		conn.execute("update t_admin set userid='"&userid&"',passwd='"&pwd2&"' ")
		Response.Write("<script>location='chkpwd.asp?f=1';</script>")
	else
		Response.Write("<script>location='chkpwd.asp?f=2';</script>")
	end if
	response.End()
end sub

Sub list()

f=request.QueryString("f")

set rs=conn.execute("select top 1 userid from t_admin")
if not rs.eof then userid=rs(0)
rs.close
%>

<form id="form1" name="form1" method="post" action="chkpwd.asp">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="3" class="header">修改密码</td>
  </tr>
  <tr>
    <td width="22%" class="right">管理员</td>
    <td width="78%">
    	<strong><%=userid%></strong>
      <input name="userid" type="hidden" class="text" id="userid" value="<%=userid%>" maxlength="12" />    </td>
  </tr>

  
  <tr>
    <td class="right">旧密码</td>
    <td><input name="pwd1" type="password" class="text" id="pwd1" /></td>
  </tr>
  <tr>
    <td class="right">新密码</td>
    <td><input name="pwd2" type="password" class="text" id="pwd2" /></td>
  </tr>
  <tr class="bottom">
    <td align="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 保 存 " />
      <input name="action" type="hidden" id="action" value="save" /></td>
  </tr>

  <tr>
    <td colspan="3" align="center" style="color:#FF0000">&nbsp;<%
	if f="1" then response.Write("密码修改成功！") 
	if f="2" then response.Write("您输入的旧密码错误！")%></td>
  </tr>
</table> 
</form>
<%end sub%>

</body>
</html>
