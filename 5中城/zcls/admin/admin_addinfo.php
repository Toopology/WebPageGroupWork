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
<title>�������</title>
</head>

<body leftmargin="0" topmargin="0" bgcolor="#FFFFEE">
<form name="addInformation" method="post" action="addinfo_ok.php" onSubmit="return check(this);">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
  
    <tr> 
      <td height="30" colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr> 
      <td width="100" height="25"><font color="#FF0000">*</font>���ű��⣺</td>
      <td width="400">
				<input name="name" type="text" class="input" size="30"></td>
    </tr>
    <tr> 
      <td height="25"><font color="#FF0000">*</font>�������</td>
      <td> 
        <select name="type">
          <option value="">��ѡ���������</option>
          <option value="��ʦ����">��ʦ����</option>
          <option value="��������">��������</option>
          <option value="���ϳ�ʶ">���ϳ�ʶ</option>
        </select> 
      </td>
    </tr>
    <tr> 
      <td height="25" valign="top"><font color="#FF0000">*</font>�������ݣ�</td>
      <td valign="top">
      	<textarea name="content" cols="100" rows="30"></textarea>
      </td>
    </tr> 
    <tr> 
      <td height="30" colspan="2" align="center"> 
        <input type="submit" name="Submit" value="�ύ" class="input">        �� 
        <input type="reset" name="Submit2" value="����" class="input"> 
      </td>
    </tr>
  
  <tr> 
    <td height="30" colspan="2" align="center">&nbsp;</td>
  </tr>
</table></form>
</body>
</html>