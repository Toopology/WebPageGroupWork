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
<title>left</title>
</head>

<body bgcolor="#0066CC">
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
  <tr> 
    <td height="30" align="center" bgcolor="#00509F"><a href="admin_center.php" target="main"><font color="#FFFFFF">��̨������ҳ</font></a></td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_addinfo.php" target="main">�����������</a></td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_info.php?npage=1" target="main">���������ɲ�</a></td>
  </tr>
    <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_info_taolun.php?npage=1" target="main">�����ȵ�����</a></td>
  </tr>
    <tr>
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_admin.php" target="main">��������ѡ��</a></td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="adminlogin.html" target="_top">�˳�����ϵͳ</a></td>
  </tr>
</table>
</body>
</html>