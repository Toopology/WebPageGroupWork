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
    <td height="30" align="center" bgcolor="#00509F"><a href="admin_center.php" target="main"><font color="#FFFFFF">后台管理首页</font></a></td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_addinfo.php" target="main">添加新闻内容</a></td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_info.php?npage=1" target="main">管理招贤纳才</a></td>
  </tr>
    <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_info_taolun.php?npage=1" target="main">管理热点讨论</a></td>
  </tr>
    <tr>
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_admin.php" target="main">超级管理选项</a></td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="adminlogin.html" target="_top">退出管理系统</a></td>
  </tr>
</table>
</body>
</html>