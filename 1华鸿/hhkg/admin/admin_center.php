<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<html>
<head>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������</title>
</head>

<body >
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
  <tr> 
    <td height="300" align="center" valign="top" bgcolor="#ECE9D8"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="5%">��</td>
          <td width="95%" height="40" align="center">����Ա��<font color="#FF0000"><strong><%=session("admin")%></strong></font> 
            <font size="2">��ӭ�����Ϻ�����ʵҵ����ϵͳ������������Ȩ��</font></td> 
        </tr>
        <tr> 
          <td colspan="2">��</td>
        </tr>
      </table>
      <table width="95%" border="0" cellspacing="2" cellpadding="0">
        <tr> 
          <td height="30" align="center"><font color="#0000FF"><strong></strong></font></td>
        </tr>
        <tr> 
          <td></td>
        </tr>
        <tr> 
          <td height="25">��</td>
        </tr>
        <tr> 
          <td height="25">����</td>
        </tr>
        <tr> 
          <td height="25">����</td>
        </tr>
        <tr>
          <td height="25">����<a href="mailto:woku@21cn.com"><font color="#0000FF"></font></a></td>
        </tr>
        <tr> 
          <td height="25" align="right"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#0066CC"> <font color="#FFFFFF"> ���������� 
      X-QI</font></td>
  </tr>
</table>
</body>
</html>