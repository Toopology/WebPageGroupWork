<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>上海国城管理系统=>后台管理</title>
</head>

<frameset rows="*" framespacing="1" frameborder="yes" border="1" bordercolor="#47478D">
  <frameset cols="180,*" framespacing="1" frameborder="yes" border="1" bordercolor="#47478D">
  <frame src="admin_left.php" name="left" scrolling="NO" noresize>
  <frame src="admin_center.php" name="main">
	</frameset>
</frameset>
<noframes><body>

</body></noframes>
</html>