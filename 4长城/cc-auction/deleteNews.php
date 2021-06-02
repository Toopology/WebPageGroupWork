<html>
<head>
<title>新闻删除</title>
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
		echo "删除新闻成功!";
	}
	mysql_close($conn);
?>
<p>新闻修改</p>
<hr>
<form method="post" action="delete.php">
	<p>新闻名:<br>
		<input type="text" name="name" size="80">
	</p>
	<p>
		<input type="submit" name="submit" value="确定">
		<input type="reset" name="cancel" value="取消">
	</p>
</form>
</body>
</html>	