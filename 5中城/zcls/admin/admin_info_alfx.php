<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<html>
<head>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��������</title>
</head>

<body >
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>��</td>
  </tr>
</table>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
  <tr> 
    <td width="5%" height="25" align="center" bgcolor="#CCCCCC">ID</td>
    <td width="25%" align="center" bgcolor="#CCCCCC">���ű���</td>
    <td width="10%" align="center" bgcolor="#CCCCCC">������</td>
    <td width="15%" align="center" bgcolor="#CCCCCC">�ȵ�������</td>
    <td width="20%" align="center" bgcolor="#CCCCCC">��������</td>
    <td width="10%" align="center" bgcolor="#CCCCCC">����</td>
  </tr>
  <?
    	include "../conn.php";
	  $conn=mysql_connect($url,$c_username,$c_password);
   
		if(mysql_select_db("zcls")){
		  mysql_query("SET NAMES 'gbk'");
			$sql="select * from information where name='��������'";
      $result=mysql_query($sql);
      $total=mysql_num_rows($result);
      if($total%10==0){
        $maxpage=intval($total/10);
      }
      $maxpage=intval($total/10)+1;
      $npage=$_GET['npage'];
      if($npage<=0){
        $npage=1;
      }
      if($npage==$maxpage){
        $npage=$maxpage;
      }
      $first=10*($npage-1);
      $sql="select * from information where name='��������' order by id desc limit $first,10";
      $result=mysql_query($sql);
      while($arr=mysql_fetch_array($result)){
  ?>
  			<tr bgcolor="#FFFFFF"> 
    			<td height="22" align="center"><? echo $arr['id']; ?></td>
    			<td>
      			&nbsp;&nbsp;&nbsp;&nbsp;<a href="../alfx_view.php?id=<? echo $arr['id']; ?>" target="_blank" title="<? echo $arr['name']; ?>"><? echo $arr['name']; ?></a></td>
    			<td align="center">�г���ʦ����������</td>
    			<td align="center"><? echo $arr['type']; ?></td>
    			<td align="center"><? echo $arr['date']; ?></td>
    			<td align="center"><a href="admin_infoview.php?id=<? echo $arr['id']; ?>">�޸�</a> <a href="admin_infodel.php?id=<? echo $arr['id']; ?>">ɾ��</a></td>
  			</tr>
  <?
  		}
  ?>
</table>
<form method=Post action="admin_info.php"> 
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>��</td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
		 
      <td height="30" align="center">
      	<?
      		if($npage==1){
      			echo "��ҳ ��һҳ&nbsp;";
      		}else{
      			echo "<a href=admin_info_alfx.php?npage=1>��ҳ</a>&nbsp;";
      			echo "<a href=admin_info_alfx.php?npage=".($npage-1).">��һҳ</a>&nbsp;";
      		}
      		if($npage==$maxpage){
      			echo "��һҳ βҳ";
      		}else{
      			echo "<a href=admin_info_alfx.php?npage=".($npage+1).">��һҳ</a>&nbsp;";
      			echo "<a href=admin_info_alfx.php?npage=".$maxpage.">βҳ</a>";
      		}
      		echo "&nbsp;ҳ�Σ�<strong><font color=red>".$npage."</font>/".$maxpage."</strong>ҳ ";
      		echo "&nbsp;��<b><font color='#FF0000'>".$total."</font></b>����¼ <b>10</b>����¼/ҳ";
      		echo " ת����<input type='text' name='npage' size=4 maxlength=10 class=input value=".$npage.">";
      		echo " <input class=input type='submit'  value=' Goto '  name='cndok'></span></p>";
      	?> 
      </td>
    
  </tr>
</table></form>
<?
	}
	mysql_close($conn);
?>
</body>
</html>