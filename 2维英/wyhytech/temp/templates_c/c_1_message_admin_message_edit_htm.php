<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:25 中国标准时间 */ ?>

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
  <div class="toptit">鍦ㄧ嚎鐣欒█璇︽儏</div>

	<table width="100%" border="0" cellpadding="4" cellspacing="0"  class="admin_table" >

	<tr>
      <td height="30" align="right"   width="120" style="border:0px;" >濮撳悕锛�</td>
      <td  style="border:0px;" ><?php echo $this->_vars['edit_message']['name']; ?>
</td>
    </tr>
    <tr>
        <td height="30" align="right"  >鐢佃瘽锛�</td>
        <td   ><?php echo $this->_vars['edit_message']['phone']; ?>
</td>
    </tr>
    <tr>
      <td height="30" align="right"  >鐢靛瓙閭欢锛�</td>
      <td   ><?php echo $this->_vars['edit_message']['email']; ?>
</td>
    </tr>
    <tr>
        <td height="30" align="right"  >鍐呭锛�</td>
        <td   ><?php echo $this->_vars['edit_message']['content']; ?>
</td>
    </tr>
	<tr>
      <td height="30" align="right"  >鍒涘缓鏃堕棿锛�</td>
      <td   ><?php echo $this->_run_modifier($this->_vars['edit_message']['addtime'], 'date_format', 'plugin', 1, "%Y-%m-%d %H:%M"); ?>
</td>
    </tr>

	  <tr>
      <td height="30" align="right"  >&nbsp;</td>
      <td height="50"  >
            <input name="submit22" type="button" class="admin_submit"    value="杩斿洖" onclick="Javascript:window.history.go(-1)"/>
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