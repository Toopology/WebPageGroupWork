<html>
<head>
<title>����ɾ��</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body bgcolor="#FFFFFF">
<?
	include "conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
	if(mysql_select_db("cc-auction")){
		mysql_query("SET NAMES 'gbk'");
		$sql="delete from news where nname='".$_POST['name']."'";
		mysql_query($sql);
		echo "ɾ�����ųɹ�!";
	}
	mysql_close($conn);
?>
<p>�����޸�</p>
<hr>
<form method="post" action="delete.php">
	<p>������:<br>
		<input type="text" name="name" size="80">
	</p>
	<p>
		<input type="submit" name="submit" value="ȷ��">
		<input type="reset" name="cancel" value="ȡ��">
	</p>
</form>
</body>
</html>	