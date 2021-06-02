<html>
<head>
<title>拍卖公告录入</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body bgcolor="#FFFFFF">
<?
	include "conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
	if(mysql_select_db("cc-auction")){
		mysql_query("SET NAMES 'gbk'");
		$sql="insert into announcement (aname,type,time,main) values('$_POST[name]','$_POST[type]','$_POST[time]','$_POST[main]')";
		if (!mysql_query($sql)){
  		die('Error: ' . mysql_error());
  	}
		echo "添加拍卖公告成功！";
		mysql_close($conn);
	}
?>

<p>拍卖公告录入</p>
<hr>
<form method="post" action="addAnnouncement.php">
	<p>公告名称:<br>
		<input type="text" name="name" size="80">
	</p>
	<p>公告类型:<br>
		<input type="text" name="type" size="80">
	</p>
	<p>公告时间:<br>
		<input type="text" name="time" size="80">
	</p>
	<p>公告内容:<br>
		<textarea name="main" cols="80" rows="30" wrap="Physical"></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="确定">
		<input type="reset" name="cancel" value="取消">
	</p>
</form>
</body>
</html>	