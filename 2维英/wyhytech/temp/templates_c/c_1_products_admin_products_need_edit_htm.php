<?php require_once('/var/www/virtual/weiyinghy/home/wwwroot/include/template_lite/plugins/modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-18 17:54 CST */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"><?php echo $this->_vars['pageheader']; ?>
</div>

  <div class="clear"></div>
</div>
<div class="toptip">

</div>  
  <div class="toptit">客户需求详情</div>

	<table width="100%" border="0" cellpadding="4" cellspacing="0"  class="admin_table" >

	<tr>
      <td height="30" align="right"   width="120" style="border:0px;" >姓名：</td>
      <td  style="border:0px;" ><?php echo $this->_vars['edit_products_need']['name']; ?>
</td>
    </tr>
    <tr>
        <td height="30" align="right"  >电话：</td>
        <td   ><?php echo $this->_vars['edit_products_need']['phone']; ?>
</td>
    </tr>
    <tr>
      <td height="30" align="right"  >电子邮件：</td>
      <td   ><?php echo $this->_vars['edit_products_need']['email']; ?>
</td>
    </tr>
    <tr>
        <td height="30" align="right"  >公司名称：</td>
        <td   ><?php echo $this->_vars['edit_products_need']['company_name']; ?>
</td>
    </tr>
    <tr>
        <td height="30" align="right"  >部门：</td>
        <td   ><?php echo $this->_vars['edit_products_need']['office']; ?>
</td>
    </tr>
    <tr>
        <td height="30" align="right"  >职务：</td>
        <td   ><?php echo $this->_vars['edit_products_need']['job']; ?>
</td>
    </tr>
    <tr>
        <td height="30" align="right"  >内容：</td>
        <td   ><?php echo $this->_vars['edit_products_need']['content']; ?>
</td>
    </tr>
	<tr>
      <td height="30" align="right"  >创建时间：</td>
      <td   ><?php echo $this->_run_modifier($this->_vars['edit_products_need']['addtime'], 'date_format', 'plugin', 1, "%Y-%m-%d %H:%M"); ?>
</td>
    </tr>

	  <tr>
      <td height="30" align="right"  >&nbsp;</td>
      <td height="50"  >
            <input name="submit22" type="button" class="admin_submit"    value="返回" onclick="Javascript:window.history.go(-1)"/>
       </td>
    </tr>	
  </table>

</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>