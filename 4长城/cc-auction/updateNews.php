<html>
<head>
<title>�����޸�</title>
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
	echo "�޸����ųɹ�!";
?>

<p>���������޸�</p>
<hr>
<form method="post" action="updateNews.php?id=<? echo $id; ?>">
	<p>��������:<br>
		<input type="text" name="name" size="80" value="<? echo $name; ?>" disabled="disabled">
	</p>
	<p>��������:<br>
		<input type="text" name="type" size="80" value="<? echo $type; ?>">
	</p>
	<p>����ʱ��:<br>
		<input type="text" name="time" size="80" value="<? echo $time; ?>">
	</p>
	<p>��������:<br>
		<textarea name="main" cols="80" rows="30" wrap="Physical"><? echo $main; ?></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="�޸�">
		<input type="reset" name="cancel" value="ȡ��">
	</p>
</form>
</body>
</html>	