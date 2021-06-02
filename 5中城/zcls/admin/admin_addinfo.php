<?
	session_start();
	if(!$_SESSION['username']){
		echo "<script language='javascript'>window.document.location.href='adminlogin.html';</script>";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css.css" type="text/css">
<script type="text/Jscript" src="js/base.js"></script>
<title>添加新闻</title>
</head>

<body leftmargin="0" topmargin="0" bgcolor="#FFFFEE">
<form name="addInformation" method="post" action="addinfo_ok.php" onSubmit="return check(this);">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
  
    <tr> 
      <td height="30" colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr> 
      <td width="100" height="25"><font color="#FF0000">*</font>新闻标题：</td>
      <td width="400">
				<input name="name" type="text" class="input" size="30"></td>
    </tr>
    <tr> 
      <td height="25"><font color="#FF0000">*</font>新闻类别：</td>
      <td> 
        <select name="type">
          <option value="">请选择新闻类别</option>
          <option value="律师介绍">律师介绍</option>
          <option value="案例分析">案例分析</option>
          <option value="诉讼常识">诉讼常识</option>
        </select> 
      </td>
    </tr>
    <tr> 
      <td height="25" valign="top"><font color="#FF0000">*</font>新闻内容：</td>
      <td valign="top">
      	<textarea name="content" cols="100" rows="30"></textarea>
      </td>
    </tr> 
    <tr> 
      <td height="30" colspan="2" align="center"> 
        <input type="submit" name="Submit" value="提交" class="input">        　 
        <input type="reset" name="Submit2" value="重置" class="input"> 
      </td>
    </tr>
  
  <tr> 
    <td height="30" colspan="2" align="center">&nbsp;</td>
  </tr>
</table></form>
</body>
</html>