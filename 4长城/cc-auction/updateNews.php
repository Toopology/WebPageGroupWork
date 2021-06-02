<html>
<head>
<title>新闻修改</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body bgcolor="#FFFFFF">
<?
	include "conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
	mysql_select_db("cc-auction");
	$sql="update news set type='".
				$_POST['type']."',time='".
				$_POST['time']."',main='".
				$_POST['main']."' where id=".$_GET['id'];
	mysql_query($sql);
	$sql="select * from news where id=".$_GET['id'];
	$result=mysql_query($sql);
	while($arr=mysql_fetch_array($result)){
		$id=$arr['id'];
    $name=$arr['nname'];
    $type=$arr['type'];
    $time=$arr['time'];
    $main=$arr['main'];
	}
	mysql_close($conn);
	echo "修改新闻成功!";
?>

<p>新闻中心修改</p>
<hr>
<form method="post" action="updateNews.php?id=<? echo $id; ?>">
	<p>新闻名称:<br>
		<input type="text" name="name" size="80" value="<? echo $name; ?>" disabled="disabled">
	</p>
	<p>新闻类型:<br>
		<input type="text" name="type" size="80" value="<? echo $type; ?>">
	</p>
	<p>新闻时间:<br>
		<input type="text" name="time" size="80" value="<? echo $time; ?>">
	</p>
	<p>新闻内容:<br>
		<textarea name="main" cols="80" rows="30" wrap="Physical"><? echo $main; ?></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="修改">
		<input type="reset" name="cancel" value="取消">
	</p>
</form>
</body>
</html>	