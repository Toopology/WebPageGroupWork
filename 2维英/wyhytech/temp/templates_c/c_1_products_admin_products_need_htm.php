<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.parse_url.php'); $this->register_modifier("parse_url", "tpl_modifier_parse_url",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-13 15:43 ÖĞ¹ú±ê×¼Ê±¼ä */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	//ç¹å»æ¹éåæ¶	
	$("#ButDel").click(function(){
		if (confirm('ä½ ç¡®å®è¦å é¤åï¼'))
		{
			$("form[name=form1]").submit()
		}
	});
		
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
  <div class="clear"></div>
</div>
	
 <div class="seltpye_x">
		<div class="left">æäº¤æ¶é´</div>	
		<div class="right">
		<a href="<?php echo $this->_run_modifier("settr:", 'parse_url', 'plugin', 1); ?>
" <?php if ($_GET['settr'] == ""): ?>class="select"<?php endif; ?>>ä¸é</a>
		<a href="<?php echo $this->_run_modifier("settr:3", 'parse_url', 'plugin', 1); ?>
" <?php if ($_GET['settr'] == "3"): ?>class="select"<?php endif; ?>>ä¸å¤©å</a>
		<a href="<?php echo $this->_run_modifier("settr:7", 'parse_url', 'plugin', 1); ?>
" <?php if ($_GET['settr'] == "7"): ?>class="select"<?php endif; ?>>ä¸å¨å</a>
		<a href="<?php echo $this->_run_modifier("settr:30", 'parse_url', 'plugin', 1); ?>
" <?php if ($_GET['settr'] == "30"): ?>class="select"<?php endif; ?>>ä¸æå</a>
		<a href="<?php echo $this->_run_modifier("settr:180", 'parse_url', 'plugin', 1); ?>
" <?php if ($_GET['settr'] == "180"): ?>class="select"<?php endif; ?>>åå¹´å</a>
		<a href="<?php echo $this->_run_modifier("settr:360", 'parse_url', 'plugin', 1); ?>
" <?php if ($_GET['settr'] == "360"): ?>class="select"<?php endif; ?>>ä¸å¹´å</a>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
  </div>
  <form id="form1" name="form1" method="post" action="?act=migrate_products_need">
  <?php echo $this->_vars['inputtoken']; ?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="list" class="link_lan">
    <tr>
      <td height="26" class="admin_list_tit admin_list_first" >
      <label id="chkAll"><input type="checkbox" name=" " title="å¨é/åé" id="chk"/>å§å</label></td>
	  <td width="50"   align="center" class="admin_list_tit">çµè¯</td>
      <td width="120"   align="center" class="admin_list_tit" >æ·»å æ¥æ</td>
      <td width="100"   align="center" class="admin_list_tit" >æä½</td>
    </tr>
	  <?php if (count((array)$this->_vars['products_need'])): foreach ((array)$this->_vars['products_need'] as $this->_vars['list']): ?>
      <tr>
      <td  class="admin_list admin_list_first">
        <input name="id[]" type="checkbox" id="id" value="<?php echo $this->_vars['list']['id']; ?>
"/>      
		<a  style="color: #006699"></a>
			<?php echo $this->_vars['list']['name']; ?>

	    </td>

		<td align="center"  class="admin_list"><?php echo $this->_vars['list']['phone']; ?>
</td>
        <td align="center"  class="admin_list"><?php echo $this->_run_modifier($this->_vars['list']['addtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
</td>
        <td align="center"  class="admin_list" >
		<a href="?act=products_need_edit&id=<?php echo $this->_vars['list']['id']; ?>
">è¯¦æ</a> &nbsp;&nbsp;
		<a href="?act=migrate_products_need&id=<?php echo $this->_vars['list']['id']; ?>
&del_Submit=ok&<?php echo $this->_vars['urltoken']; ?>
" onclick="return confirm('ä½ ç¡®å®è¦å é¤åï¼')">å é¤</a></td>
      </tr>
      <?php endforeach; endif; ?>
    </table>
  </form>
	<?php if (! $this->_vars['products_need']): ?>
	<div class="admin_list_no_info">æ²¡æä»»ä½ä¿¡æ¯ï¼</div>
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