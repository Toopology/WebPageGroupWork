<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:01 中国标准时间 */ ?>

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
	<h2>鎻愮ず锛�</h2>
	<p>鎮ㄥ彲浠ラ�氳繃鍙戦�佹祴璇曢偖浠舵潵璋冭瘯閰嶇疆淇℃伅銆�<br />
閫氳繃杩炴帴 SMTP 鏈嶅姟鍣ㄥ彂閫侀偖浠堕渶閭璐︽埛寮�閫歋MTP鏈嶅姟銆�
</p>
  </div>
<div class="toptit">璁剧疆</div>
<form action="?act=email_set_save" method="post"   name="form1" id="form1">
<?php echo $this->_vars['inputtoken']; ?>

	
		<table width="700" border="0" cellspacing="8" cellpadding="1" style=" margin-bottom:3px;  id="method_sendmail">
          <tr>
            <td width="121" align="right">SMTP鏈嶅姟鍣ㄥ湴鍧�锛�</td>
            <td width="560"><input name="smtpservers" type="text"  class="input_text_200" id="smtpservers" value="<?php echo $this->_vars['mailconfig']['smtpservers']; ?>
" maxlength="30"/>
              濡傦細smtp.qq.com</td>
          </tr>
          <tr>
            <td align="right">SMTP鏈嶅姟甯愭埛鍚嶏細</td>
            <td><input name="smtpusername" type="text"  class="input_text_200" id="smtpusername" value="<?php echo $this->_vars['mailconfig']['smtpusername']; ?>
" maxlength="100"/></td>
          </tr>
          <tr>
            <td align="right">SMTP鏈嶅姟瀵嗙爜锛�</td>
            <td><input name="smtppassword" type="text"  class="input_text_200" id="smtppassword" value="<?php echo $this->_vars['mailconfig']['smtppassword']; ?>
" maxlength="40"/></td>
          </tr>
          <tr>
            <td align="right">鍙戜俊浜洪偖浠跺湴鍧�锛�</td>
            <td><input name="smtpfrom" type="text"  class="input_text_200" id="site_title" value="<?php echo $this->_vars['mailconfig']['smtpfrom']; ?>
" maxlength="60"/>
             </td>
          </tr>
          <tr>
            <td align="right">SMTP 绔彛锛�</td>
            <td><input name="smtpport" type="text"  class="input_text_200" id="smtpport" value="<?php echo $this->_vars['mailconfig']['smtpport']; ?>
" maxlength="60"/>
榛樿锛�25</td>
          </tr>
         
      </table>
	  <table width="700" border="0" cellspacing="8" cellpadding="1"  >
        
          <tr>
            <td width="120" align="right">&nbsp;</td>
            <td> 
              <input name="save" type="submit" class="admin_submit"    value="淇濆瓨淇敼"/>
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