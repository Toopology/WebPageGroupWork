<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
</head>

<body>

<%
Action = LCase(Request("action"))
Select Case Trim(Action)
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

Sub del()
	classid = request.QueryString("id")
	if classid<>"" then
		conn.execute("delete from t_product where classid="&classid)
		conn.execute("delete from t_class where classid="&classid)
	end if
	Response.Write("<script>location='product_class.asp';</script>")
	response.End()
end sub

Sub editsave()
	classname = request.Form("classname")
	classid = request.Form("id")
	if classname<>"" and classid<>"" then conn.execute("update t_class set classname='"&classname&"' where classid="&classid)
	Response.Write("<script>location='product_class.asp';</script>")
	response.End()
end sub

Sub saves()
	classname = request.Form("classname")
	if classname<>"" then conn.execute("insert into t_class (classname,allhits) values ('"&classname&"',0)")
	Response.Write("<script>location='product_class.asp';</script>")
	response.End()
end sub

Sub list()
%>


<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="5" class="bg1">�����б�</td>
  </tr>
  <tr>
    <td width="7%">���</td>
    <td width="56%">����</td>
    <td width="10%">ͳ��</td>
    <td width="10%">����</td>
  </tr>
  <%
	set rs=conn.execute("select classid,classname,allhits from t_class")
	do while not rs.eof
  %>
  
  <tr>
    <td><%=rs(0)%></td>
    <td><%=rs(1)%></td>
    <td><%=rs(2)%></td>
    <td><a href="?action=edit&id=<%=rs(0)%>">�޸�</a> | <a onClick="return confirm('ȷ��Ҫɾ�������𣿷����µĲ�ƷҲ�ᱻɾ����ɾ�����޷��ָ���')" href="?action=del&id=<%=rs(0)%>">ɾ��</a></td>
  </tr>
  <%
		rs.movenext
	loop
	rs.close
  %>
  <tr>
    <td colspan="5">&nbsp;<a href="?action=add">�����·���</a></td>
  </tr>
</table>
<%
end sub

sub add()
%>
<form id="form1" name="form1" method="post" action="product_class.asp">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="3" class="bg1">���ӷ���</td>
  </tr>
  <tr>
    <td width="22%" align="right">��������</td>
    <td width="78%">
      <input name="classname" type="text" class="text" />
   
    </td>
  </tr>

  
  <tr>
    <td align="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" �� �� " />
      <input name="action" type="hidden" id="action" value="save" /></td>
  </tr>

  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table> </form>
<%end sub

sub edit()
	id=request.QueryString("id")
	set rs=conn.execute("select classname from t_class where classid="&id)
	if not rs.eof then classname = rs(0)
	rs.close
%>
<form id="form1" name="form1" method="post" action="product_class.asp">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td colspan="3" class="bg1">���ӷ���</td>
  </tr>
  <tr>
    <td width="22%" align="right">��������</td>
    <td width="78%">
      <input name="classname" type="text" class="text" value="<%=classname%>" />
   
    </td>
  </tr>

  
  <tr>
    <td align="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" �� �� " />
      <input name="action" type="hidden" id="action" value="editsave" />
	  <input name="id" type="hidden" id="id" value="<%=id%>" /></td>
  </tr>

  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table> </form>
<%end sub%>


<script language="JavaScript" type="text/JavaScript">
parent.document.all("main").style.height=document.body.scrollHeight+40;
</script>
</body>
</html>
