<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2019-04-18 14:56 �й���׼ʱ�� */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"><?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("users/admin_users_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
<h2>提示：</h2>
<p>
通过管理员设置，您可以进行编辑管理员资料、权限、密码以及删除管理员等操作；
</p>
</div>  
 <div class="toptit">新增管理员</div>
 
    <form id="form1" name="form1" method="post" action="?act=add_users_save">
	<?php echo $this->_vars['inputtoken']; ?>

  <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
    <tr>
      <td width="120" height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">用户名：</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed"><input name="admin_name" type="text" class="input_text_200" id="admin_name" maxlength="25" value=""/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">电子邮件：</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="email" type="text" class="input_text_200" id="old_emailpwd" maxlength="25" value=""/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">密码：</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="password" type="password" class="input_text_200" id="password" maxlength="25" value=""/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">再次输入密码：</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="password1" type="password" class="input_text_200" id="password1" maxlength="25" value=""/></td>
    </tr>
	  <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">头衔：</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="rank" type="text" class="input_text_200" id="rank" maxlength="25"/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" >&nbsp;</td>
      <td height="50" bgcolor="#FFFFFF" > 
            <input name="submit3" type="submit" class="admin_submit"    value="添加"/>
        <input name="submit22" type="button" class="admin_submit"    value="返回" onclick="Javascript:window.history.go(-1)"/>
       </td>
    </tr>
  </table>
    </form>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>