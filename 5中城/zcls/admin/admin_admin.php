<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<html>
<head>
<title>�Ϻ��г���ʦ����������ϵͳ</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css.css" type="text/css">
<script type="text/Jscript" src="js/base.js"></script>
</head>
<body text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>��</td>
        </tr>
      </table>
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr align="center" bgcolor="#CCCCCC"> 
          <td width="15%" height="24"> ID</td>
          <td width="15%">�û�</td>
          <td width="20%">����</td>
          <td width="15%">�޸�</td>
          <td width="15%">ɾ��</td>
        </tr>
        <?
          	include "../conn.php";
	        $conn=mysql_connect($url,$c_username,$c_password);
        
					if(mysql_select_db("zcls")){
						mysql_query("SET NAMES 'gbk'");
						$sql="select * from admin where 1=1";
						$result=mysql_query($sql);
						while($arr=mysql_fetch_array($result)){
        ?>
        <tr align="center" bgcolor="#FFFFFF"> 
          <td height="22"><? echo $arr['id']; ?></td>
          <td><? echo $arr['username']; ?></td>
          <td><? echo $arr['password']; ?></td>
          <td><a href="admin_adminview.php?id=<? echo $arr['id']; ?>">�޸�</a></td>
          <td><a href="admin_admindel.php?id=<? echo $arr['id']; ?>">ɾ��</a></td>
        </tr>
        <?      						
						}
        	}
        	mysql_close($conn);
        ?>
      </table> 
      <br>
       <form name="add" method="post" action="admin_adminsave.php" onSubmit="return check(this)">
			<table width="300" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#000000">
        <tr bgcolor="#CCCCCC"> 
          <td colspan="2">��ӹ���Ա��</td> 
        </tr>
       
          <tr bgcolor="#FFFFFF"> 
            <td align="right" height="22">�����ʺţ�</td>
            <td> 
              <input type="text" name="username" class="form"> </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td align="right" height="22">�������룺</td>
            <td> 
              <input type="password" name="password" class="form"> </td>
          </tr>
          <tr bgcolor="#CCCCCC"> 
            <td colspan="2" align="center"> 
              <input type="submit" name="Submit" value="ȷ ��"> 
            </td>
          </tr>
       
      </table> </form>
      <br>
    </td>
  </tr>
</table>
</body>
</html>