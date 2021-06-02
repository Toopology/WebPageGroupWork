<html>
<head>
<title>拍卖公告修改</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body bgcolor="#FFFFFF">
<?
	include "conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
	mysql_select_db("cc-auction");
	mysql_query("SET NAMES 'gbk'");
	$sql="update announcement set type='".
				$_POST['type']."',time='".
				$_POST['time']."',main='".
				$_POST['main']."' where id=".$_GET['id'];
	mysql_query($sql);
	$sql="select * from announcement where id=".$_GET['id'];
	$result=mysql_query($sql);
	while($arr=mysql_fetch_array($result)){
		$id=$arr['id'];
    $name=$arr['aname'];
    $type=$arr['type'];
    $time=$arr['time'];
    $main=$arr['main'];
	}
	mysql_close($conn);
	echo "修改公告成功!";
?>

<p>拍卖公告修改</p>
<hr>
<form method="post" action="updateAnnouncement.php?id=<? echo $id; ?>">
	<p>公告名称:<br>
		<input type="text" name="name" size="80" value="<? echo $name; ?>" disabled="disabled">
	</p>
	<p>公告类型:<br>
		<input type="text" name="type" size="80" value="<? echo $type; ?>">
	</p>
	<p>拍卖时间:<br>
		<input type="text" name="time" size="80" value="<? echo $time; ?>">
	</p>
	<p>公告内容:<br>
		<textarea name="main" cols="80" rows="30" wrap="Physical"><? echo $main; ?></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="修改">
		<input type="reset" name="cancel" value="取消">
	</p>
</form>
</body>
</html>	