<html>
<head>
<title>公告删除</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body bgcolor="#FFFFFF">
<?
	include "conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
	if(mysql_select_db("cc-auction")){
		mysql_query("SET NAMES 'gbk'");
		$sql="delete from announcement where aname='".$_POST['name']."'";
		mysql_query($sql);
		$sql="delete from product where announcement='".$_POST['name']."'";
		mysql_query($sql);
		echo "删除拍卖公告及其相应信息成功!";
	}
	mysql_close($conn);
?>
<p>公告修改</p>
<hr>
<form method="post" action="delete.php">
	<p>公告名:<br>
		<input type="text" name="name" size="80">
	</p>
	<p>
		<input type="submit" name="submit" value="确定">
		<input type="reset" name="cancel" value="取消">
	</p>
</form>
</body>
</html>	