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
<title>管理新闻</title>
</head>

<body >
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>　</td>
  </tr>
</table>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
  <tr> 
    <td width="5%" height="25" align="center" bgcolor="#CCCCCC">ID</td>
    <td width="25%" align="center" bgcolor="#CCCCCC">新闻标题</td>
    <td width="10%" align="center" bgcolor="#CCCCCC">发布者</td>
    <td width="15%" align="center" bgcolor="#CCCCCC">热点讨论类</td>
    <td width="20%" align="center" bgcolor="#CCCCCC">发布日期</td>
    <td width="10%" align="center" bgcolor="#CCCCCC">操作</td>
  </tr>
  <?
    	include "../conn.php";
	  $conn=mysql_connect($url,$c_username,$c_password);
   
		if(mysql_select_db("zcls")){
		  mysql_query("SET NAMES 'gbk'");
			$sql="select * from information where name='案例分析'";
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
      $sql="select * from information where name='案例分析' order by id desc limit $first,10";
      $result=mysql_query($sql);
      while($arr=mysql_fetch_array($result)){
  ?>
  			<tr bgcolor="#FFFFFF"> 
    			<td height="22" align="center"><? echo $arr['id']; ?></td>
    			<td>
      			&nbsp;&nbsp;&nbsp;&nbsp;<a href="../alfx_view.php?id=<? echo $arr['id']; ?>" target="_blank" title="<? echo $arr['name']; ?>"><? echo $arr['name']; ?></a></td>
    			<td align="center">中城律师事务所管理</td>
    			<td align="center"><? echo $arr['type']; ?></td>
    			<td align="center"><? echo $arr['date']; ?></td>
    			<td align="center"><a href="admin_infoview.php?id=<? echo $arr['id']; ?>">修改</a> <a href="admin_infodel.php?id=<? echo $arr['id']; ?>">删除</a></td>
  			</tr>
  <?
  		}
  ?>
</table>
<form method=Post action="admin_info.php"> 
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>　</td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
		 
      <td height="30" align="center">
      	<?
      		if($npage==1){
      			echo "首页 上一页&nbsp;";
      		}else{
      			echo "<a href=admin_info_alfx.php?npage=1>首页</a>&nbsp;";
      			echo "<a href=admin_info_alfx.php?npage=".($npage-1).">上一页</a>&nbsp;";
      		}
      		if($npage==$maxpage){
      			echo "下一页 尾页";
      		}else{
      			echo "<a href=admin_info_alfx.php?npage=".($npage+1).">下一页</a>&nbsp;";
      			echo "<a href=admin_info_alfx.php?npage=".$maxpage.">尾页</a>";
      		}
      		echo "&nbsp;页次：<strong><font color=red>".$npage."</font>/".$maxpage."</strong>页 ";
      		echo "&nbsp;共<b><font color='#FF0000'>".$total."</font></b>条记录 <b>10</b>条记录/页";
      		echo " 转到：<input type='text' name='npage' size=4 maxlength=10 class=input value=".$npage.">";
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