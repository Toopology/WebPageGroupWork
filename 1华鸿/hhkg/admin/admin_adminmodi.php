<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<?
  	include "../conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);

	if(mysql_select_db("hhkg")){
		mysql_query("SET NAMES 'gbk'");
		$id=$_GET['id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="update admin set username='".$username."',password='".$password."' where id=$id";
		if(mysql_query($sql)){
			echo "<SCRIPT language=JavaScript>alert('�޸ĳɹ���');";
			echo "window.document.location.href='admin_admin.php';</script>";
		}else{
			echo "<SCRIPT language=JavaScript>alert('�޸�ʧ�ܣ�');";
			echo "window.document.location.href='admin_admin.php';</script>";
		}
	}
	mysql_close($conn);
?>
