<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-26 17:00 �й���׼ʱ�� */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript"> 
$(document).ready(function()
{
	$("#check").click(function () {	
	$("#submitbox").hide();
	$("#hide").show();	
	});
});
</script>
<div class="admin_main_nr_dbox">
 <div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("mail/admin_mail_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
 
		  <div class="toptit">发送测试邮件</div>
    <span id="submitbox">
		<form action="?act=email_testing" method="post"   name="form1" id="form1">
		<?php echo $this->_vars['inputtoken']; ?>

		<table width="700" border="0" cellspacing="10" cellpadding="1" style=" margin-bottom:3px;">
          <tr>
            <td width="100" align="right">收件人地址:</td>
            <td width="560">
			<input name="check_smtp" type="text"  class="input_text_200" id="check_smtp" value="" maxlength="60"/></td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td><input name="check" type="submit" class="admin_submit" id="check"    value="立即测试" /></td>
          </tr>
        </table>
	    </form>
  </span>
<span id="hide" style="display: none; color: #009900; padding-left:30px; padding-bottom:80px;">
 正在发送测试邮件.......<br />
<br />
</span>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>