<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 17:26 中国标准时间 */ ?>

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
  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="list" class="link_lan">
    <tr>
      <td class="admin_list_tit admin_list_first">鐢ㄦ埛鍚�</td>
      <td  class="admin_list_tit">澶磋</td>
      <td  class="admin_list_tit">鍒涘缓鏃堕棿</td>
      <td  class="admin_list_tit">鏈�鍚庣櫥褰曟椂闂�</td>
      <td  class="admin_list_tit">鏈�鍚庣櫥褰昳p</td>
      <td width="230" align="center"  class="admin_list_tit">鎿嶄綔</td>
    </tr>
	 <?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['li']): ?>
	   <tr>
      <td  class="admin_list admin_list_first"><?php echo $this->_vars['li']['admin_name']; ?>
</td>
      <td   class="admin_list"><?php echo $this->_vars['li']['rank']; ?>
</td>
      <td   class="admin_list"><?php echo $this->_run_modifier($this->_vars['li']['add_time'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
 </td>
      <td   class="admin_list">
	  <?php if ($this->_vars['li']['last_login_time'] == "0"): ?>
		浠庢湭
		<?php else: ?>
		<?php echo $this->_run_modifier($this->_vars['li']['last_login_time'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>

		<?php endif; ?>
	  </td>
      <td   class="admin_list"><?php echo $this->_vars['li']['last_login_ip']; ?>
</td>
      <td   class="admin_list">
	  <a href="?act=loglist&adminname=<?php echo $this->_vars['li']['admin_name']; ?>
" >鐧诲綍鏃ュ織</a>
		&nbsp;&nbsp;
		<a href="?act=users_set&id=<?php echo $this->_vars['li']['admin_id']; ?>
">鏉冮檺</a>
		&nbsp;&nbsp;
		<a href="?act=edit_users&id=<?php echo $this->_vars['li']['admin_id']; ?>
" >璇︽儏</a>
		&nbsp;&nbsp;
		<a href="?act=edit_users_pwd&id=<?php echo $this->_vars['li']['admin_id']; ?>
" >瀵嗙爜</a>
		<?php if ($this->_vars['admin_purview'] == "all"): ?>
		&nbsp;&nbsp;
		<a href="?act=del_users&id=<?php echo $this->_vars['li']['admin_id']; ?>
&<?php echo $this->_vars['urltoken']; ?>
" onclick="return confirm('纭畾瑕佸垹闄ゅ悧锛�')">鍒犻櫎</a>
		<?php endif; ?>		
	  </td>
    </tr>
	  <?php endforeach; endif; ?>
  </table>
  <?php if ($this->_vars['admin_purview'] == "all"): ?>
   <table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>

          <input type="button" name="add" value="娣诲姞绠＄悊鍛�" class="admin_submit"   onclick="window.location.href='?act=add_users'" />
        	
		</td>
        <td width="305" align="right">
		 
		
	    </td>
      </tr>
  </table>
  <?php endif; ?>
<div class="page link_bk"><?php echo $this->_vars['page']; ?>
</div>
	 
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>