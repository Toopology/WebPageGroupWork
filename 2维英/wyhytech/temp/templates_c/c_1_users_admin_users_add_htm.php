<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2019-04-18 14:56 中国标准时间 */ ?>

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
<h2>鎻愮ず锛�</h2>
<p>
閫氳繃绠＄悊鍛樿缃紝鎮ㄥ彲浠ヨ繘琛岀紪杈戠鐞嗗憳璧勬枡銆佹潈闄愩�佸瘑鐮佷互鍙婂垹闄ょ鐞嗗憳绛夋搷浣滐紱
</p>
</div>  
 <div class="toptit">鏂板绠＄悊鍛�</div>
 
    <form id="form1" name="form1" method="post" action="?act=add_users_save">
	<?php echo $this->_vars['inputtoken']; ?>

  <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
    <tr>
      <td width="120" height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">鐢ㄦ埛鍚嶏細</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed"><input name="admin_name" type="text" class="input_text_200" id="admin_name" maxlength="25" value=""/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">鐢靛瓙閭欢锛�</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="email" type="text" class="input_text_200" id="old_emailpwd" maxlength="25" value=""/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">瀵嗙爜锛�</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="password" type="password" class="input_text_200" id="password" maxlength="25" value=""/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">鍐嶆杈撳叆瀵嗙爜锛�</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="password1" type="password" class="input_text_200" id="password1" maxlength="25" value=""/></td>
    </tr>
	  <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">澶磋锛�</td>
      <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed" ><input name="rank" type="text" class="input_text_200" id="rank" maxlength="25"/></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF" >&nbsp;</td>
      <td height="50" bgcolor="#FFFFFF" > 
            <input name="submit3" type="submit" class="admin_submit"    value="娣诲姞"/>
        <input name="submit22" type="button" class="admin_submit"    value="杩斿洖" onclick="Javascript:window.history.go(-1)"/>
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