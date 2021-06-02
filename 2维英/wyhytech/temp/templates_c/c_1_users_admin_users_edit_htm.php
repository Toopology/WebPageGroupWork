<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2019-04-18 15:09 �й���׼ʱ�� */ ?>

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
  <div class="toptit">管理员详情</div>
    <form id="form1" name="form1" method="post" action="?act=edit_users_info_save">
	<?php echo $this->_vars['inputtoken']; ?>

	<table width="100%" border="0" cellpadding="4" cellspacing="0"  class="admin_table" >
	<?php if ($this->_vars['admin_purview'] == "all" && $this->_vars['account']['purview'] <> "all"): ?><!--超级管理员登录并且不是修改超级管理员的资料-->
    <tr>
      <td width="120" height="30" align="right"  style="border:0px;"  >用户名：</td>
      <td  tyle="border:0px;" >
	  <input name="admin_name" type="text" class="input_text_200" id="admin_name" maxlength="25" value="<?php echo $this->_vars['account']['admin_name']; ?>
"/>	  </td>
    </tr>
    <tr>
      <td height="30" align="right"  >电子邮件：</td>
      <td   ><input name="email" type="text" class="input_text_200" id="email" maxlength="50" value="<?php echo $this->_vars['account']['email']; ?>
"/></td>
    </tr>
	<tr>
      <td height="30" align="right"  >头衔：</td>
      <td   ><input name="rank" type="text" class="input_text_200" id="email" maxlength="20" value="<?php echo $this->_vars['account']['rank']; ?>
"/></td>
    </tr>
	<?php else: ?>
	    <tr>
      <td height="30" align="right"   width="120" style="border:0px;" >用户名：</td>
      <td  style="border:0px;" ><?php echo $this->_vars['account']['admin_name']; ?>
</td>
    </tr>
    <tr>
      <td height="30" align="right"  >电子邮件：</td>
      <td   ><?php echo $this->_vars['account']['email']; ?>
</td>
    </tr>
	<tr>
      <td height="30" align="right"  >头衔：</td>
      <td   ><?php echo $this->_vars['account']['rank']; ?>
</td>
    </tr>
	<?php endif; ?>
	    <tr>
      <td height="30" align="right"  >创建时间：</td>
      <td   ><?php echo $this->_run_modifier($this->_vars['account']['add_time'], 'date_format', 'plugin', 1, "%Y-%m-%d %H:%M"); ?>
</td>
    </tr>
    <tr>
      <td height="30" align="right"  >最后登录ip：</td>
      <td   ><?php echo $this->_vars['account']['last_login_ip']; ?>
</td>
    </tr>
    <tr>
      <td height="30" align="right"  >最后登录时间：</td>
      <td   ><?php echo $this->_run_modifier($this->_vars['account']['last_login_time'], 'date_format', 'plugin', 1, "%Y-%m-%d %H:%M"); ?>
</td>
    </tr>
	
	  <tr>
      <td height="30" align="right"  >&nbsp;</td>
      <td height="50"  >
	  <?php if ($this->_vars['admin_purview'] == "all" && $this->_vars['account']['purview'] <> "all"): ?><!--超级管理员登录并且不是修改超级管理员的资料-->
	  <input name="id" type="hidden" value="<?php echo $this->_vars['account']['admin_id']; ?>
" />
            <input name="submit3" type="submit" class="admin_submit"    value="修改"/>
			<?php endif; ?>
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