<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:08 中国标准时间 */ ?>

锘�<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit">娆㈣繋鐧婚檰 <?php echo $this->_vars['SYS']['site_name']; ?>
 绠＄悊涓績锛�</div>
  <div class="clear"></div>
</div>
<span id="version"></span>


<div class="toptit">绯荤粺淇℃伅</div>
<table width="100%" border="0"  cellspacing="0" cellpadding="4">
  <tr>
    <td style="  color:#666666; padding-left:15px;line-height:220%;">
	<table border="0" style="font-size: 12px;color:#666666;" cellpadding="0" cellspacing="0" class="link_lan">
      <tr>
        <td width="300"  >鎿嶄綔绯荤粺锛�<?php echo $this->_vars['system_info']['os']; ?>
</td>
        <td  >PHP 鐗堟湰锛�<?php echo $this->_vars['system_info']['php_ver']; ?>
</td>
      </tr>
      <tr>
        <td  >鏈嶅姟鍣ㄨ蒋浠讹細<?php echo $this->_vars['system_info']['web_server']; ?>
<br /></td>
        <td  >MySQL 鐗堟湰锛�<?php echo $this->_vars['system_info']['mysql_ver']; ?>
</td>
      </tr>
    </table></td>
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