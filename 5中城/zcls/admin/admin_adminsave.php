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
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="select * from admin where username='".$username."'";
		$result=mysql_query($sql);
		if($arr=mysql_fetch_array($result)){
			echo "<SCRIPT language=JavaScript>alert('该管理帐户已存在！');";
			echo "window.document.location.href='admin_admin.php';</script>";
		}else{
			$sql="insert into admin (username,password) values('".$username."','".$password."')";
			if(mysql_query($sql)){
				echo "<SCRIPT language=JavaScript>alert('添加成功！');";
				echo "window.document.location.href='admin_admin.php';</script>";
			}else{
				echo "<SCRIPT language=JavaScript>alert('添加失败！');";
				echo "window.document.location.href='admin_admin.php';</script>";
			}
		}
	}
	mysql_close($conn);
?>
