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
		$id=$_GET['id'];
		$sql="delete from information where id=$id";
		if(mysql_query($sql)){
			echo "<SCRIPT language=JavaScript>alert('É¾³ý³É¹¦£¡');";
			echo "window.document.location.href='admin_center.php';</script>";
		}else{
			echo "<SCRIPT language=JavaScript>alert('É¾³ýÊ§°Ü£¡');";
			echo "window.document.location.href='admin_center.php';</script>";
		}
	}
	mysql_close($conn);
?>