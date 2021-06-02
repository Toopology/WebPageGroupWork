<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<?
	include "../conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
  if(mysql_select_db("gcgj")){
		mysql_query("SET NAMES 'gbk'");
		$id=$_GET['id'];
		$sql="select * from admin where id=$id";
		$result=mysql_query($sql);
		$arr=mysql_fetch_array($result);
?>
<LINK href="../css.css" type=text/css rel=stylesheet>
<META http-equiv=Content-Type content=text/html; charset=gb2312>
<script type="text/Jscript" src="js/base.js"></script>
<form method="POST" action="admin_adminmodi.php?id=<? echo $arr['id']; ?>" onSubmit="return check(this)">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
  
          
    <tr bgcolor="#CCCCCC"> 
      <td width="100%" height="24" colspan=2 align=center><b>修 改 管 理 员 资 料</b></td>
</tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="30%" height="22" align="right">用户名：</td>
      <td width="70%"> 
        <input type="text" name="username" value="<? echo $arr['username']; ?>" size="20" ></td>
</tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="30%" height="22" align="right">密码：</td>
      <td width="70%"> 
        <input type="text" name="password" value="<? echo $arr['password']; ?>" size="20" ></td>
</tr>
    <tr align="center" bgcolor="#FFFFFF" height="24"> 
      <td height="30" colspan=2> 
<input name="cmdok" type="submit" id="cmdok" value=" 修 改 " class="input">
        &nbsp;
<input name="cmdcance" type="reset" id="cmdcance" value=" 重 置 " class="input">
</td>
</tr>

</table></form>
<?
	}
	mysql_close($conn);
?>