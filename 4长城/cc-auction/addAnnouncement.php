<html>
<head>
<title>��������¼��</title>
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
		echo "�����������ɹ���";
		mysql_close($conn);
	}
?>

<p>��������¼��</p>
<hr>
<form method="post" action="addAnnouncement.php">
	<p>��������:<br>
		<input type="text" name="name" size="80">
	</p>
	<p>��������:<br>
		<input type="text" name="type" size="80">
	</p>
	<p>����ʱ��:<br>
		<input type="text" name="time" size="80">
	</p>
	<p>��������:<br>
		<textarea name="main" cols="80" rows="30" wrap="Physical"></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="ȷ��">
		<input type="reset" name="cancel" value="ȡ��">
	</p>
</form>
</body>
</html>	