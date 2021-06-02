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
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="select password from admin where username='".$username."'";
		$result=mysql_query($sql);
		if($arr=mysql_fetch_array($result)){
			$loginpw=$arr['password'];
			if($password != $loginpw ){
				echo "<SCRIPT language=JavaScript>alert('密码不正确！');";
				echo "javascript:history.go(-1)</SCRIPT>";
			}else{
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['password']=$password;
				echo "<script language='javascript'>window.document.location.href='admin.php';</script>";
			}
		}else{
			echo "<SCRIPT language=JavaScript>alert('用户名不正确！');";
			echo "javascript:history.go(-1)</SCRIPT>";
		}
	}
?>