<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:01 �й���׼ʱ�� */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
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
<div class="toptip">
	<h2>提示：</h2>
	<p>您可以通过发送测试邮件来调试配置信息。<br />
通过连接 SMTP 服务器发送邮件需邮箱账户开通SMTP服务。
</p>
  </div>
<div class="toptit">设置</div>
<form action="?act=email_set_save" method="post"   name="form1" id="form1">
<?php echo $this->_vars['inputtoken']; ?>

	
		<table width="700" border="0" cellspacing="8" cellpadding="1" style=" margin-bottom:3px;  id="method_sendmail">
          <tr>
            <td width="121" align="right">SMTP服务器地址：</td>
            <td width="560"><input name="smtpservers" type="text"  class="input_text_200" id="smtpservers" value="<?php echo $this->_vars['mailconfig']['smtpservers']; ?>
" maxlength="30"/>
              如：smtp.qq.com</td>
          </tr>
          <tr>
            <td align="right">SMTP服务帐户名：</td>
            <td><input name="smtpusername" type="text"  class="input_text_200" id="smtpusername" value="<?php echo $this->_vars['mailconfig']['smtpusername']; ?>
" maxlength="100"/></td>
          </tr>
          <tr>
            <td align="right">SMTP服务密码：</td>
            <td><input name="smtppassword" type="text"  class="input_text_200" id="smtppassword" value="<?php echo $this->_vars['mailconfig']['smtppassword']; ?>
" maxlength="40"/></td>
          </tr>
          <tr>
            <td align="right">发信人邮件地址：</td>
            <td><input name="smtpfrom" type="text"  class="input_text_200" id="site_title" value="<?php echo $this->_vars['mailconfig']['smtpfrom']; ?>
" maxlength="60"/>
             </td>
          </tr>
          <tr>
            <td align="right">SMTP 端口：</td>
            <td><input name="smtpport" type="text"  class="input_text_200" id="smtpport" value="<?php echo $this->_vars['mailconfig']['smtpport']; ?>
" maxlength="60"/>
默认：25</td>
          </tr>
         
      </table>
	  <table width="700" border="0" cellspacing="8" cellpadding="1"  >
        
          <tr>
            <td width="120" align="right">&nbsp;</td>
            <td> 
              <input name="save" type="submit" class="admin_submit"    value="保存修改"/>
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