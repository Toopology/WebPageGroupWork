<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css.css" rel="stylesheet" type="text/css">
<script type="text/Jscript" src="js/base.js"></script>
<title>�������</title>
</head>
<?
	include "../conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
  if(mysql_select_db("gcgj")){
		mysql_query("SET NAMES 'gbk'");
		$id=$_GET['id'];
		$sql="select * from information where id=$id";
		$result=mysql_query($sql);
		$arr=mysql_fetch_array($result);
?>
<body leftmargin="0" topmargin="0" bgcolor="#FFFFEE">
<form name="modifyInformation" method="post" action="admin_infomodi.php" onSubmit="return check(this);">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
  
    <tr align="center" bgcolor="#FFFFEE"> 
      <td height="30" colspan="2"><font color="#0000FF"><strong>�޸�����</strong></font></td>
    </tr>
    <tr> 
      <td height="30" colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr> 
      <td width="100" height="25"><font color="#FF0000">*</font>���ű��⣺</td>
      <td width="400">
				<input name="name" type="text" class="input" size="30" value="<? echo $arr['name'] ?>"></td>
    </tr>
    <tr> 
      <td height="25"><font color="#FF0000">*</font>�������</td>
      <td> 
        <select name="type">
          <option value="">��ѡ���������</option>
          <option value="��˾����">��˾����</option>
          <option value="��������">��������</option>
          <option value="���۳�ʶ">���۳�ʶ</option>
          <option value="���ɷ���">���ɷ���</option>
        </select> 
      </td>
    </tr>
    <tr> 
      <td height="25" valign="top"><font color="#FF0000">*</font>�������ݣ�</td>
      <td valign="top">
      	<textarea name="content" cols="100" rows="30" wrap="Physical"><? echo $arr['content'] ?></textarea>
      </td>
    </tr> 
    <tr> 
      <td height="30" colspan="2" align="center"> 
        <input type="submit" name="Submit" value="�ύ" class="input">
        <input type="hidden" name="id" value="<? echo $arr['id'] ?>">        �� 
        <input type="reset" name="Submit2" value="����" class="input"> 
      </td>
    </tr>
  
</table></form>
</body>
<?
	}
	mysql_close($conn);
?>
</html>
