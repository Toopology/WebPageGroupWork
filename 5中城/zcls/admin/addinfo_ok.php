<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<?
  	include "../conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);

	if(mysql_select_db("zcls")){
		mysql_query("SET NAMES 'gbk'");
		$name=$_POST['name'];
		$type=$_POST['type'];
		$content=$_POST['content'];
		$date=date("Y-m-d");
		$sql="select * from information where name='".$name."'";
		$result=mysql_query($sql);
		if($arr=mysql_fetch_array($result)){
			echo "<SCRIPT language=JavaScript>alert('该新闻已存在！');";
			echo "window.document.location.href='admin_addinfo.php';</script>";
		}else{
			$sql="insert into information (name,type,content,date) values('".$name."','".$type."','".$content."','".$date."')";
			if(mysql_query($sql)){
				echo "<SCRIPT language=JavaScript>alert('添加成功！');";
				echo "window.document.location.href='admin_addinfo.php';</script>";
			}else{
				echo "<SCRIPT language=JavaScript>alert('添加失败！');";
				echo "window.document.location.href='admin_addinfo.php';</script>";
			}
		}
	}
	mysql_close($conn);
?>
