<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.cat.php'); $this->register_modifier("cat", "tpl_modifier_cat",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.products_category.php'); $this->register_function("products_category", "tpl_function_products_category",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-13 15:35 中国标准时间 */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	$(".Bclass").click(function()
	{
		$(".Sclass_"+$(this).attr("id")).toggle();
		if ($(".Sclass_"+$(this).attr("id")).css("display")=="none")
		{
		$(this).attr("src","images/left_e.gif");
		}
		else
		{
		$(this).attr("src","images/left_d.gif");
		}
	});
	//鍏ㄩ��
	$('#categorychkAll').click(function(){$("#form1 :checkbox").attr('checked',$("#chk").attr('checked'))});
	//璁剧疆鍙啓鏉冮檺
	$(".Bcheck,#categorychkAll").click(function()
	{
	setcheck();
	});
	function setcheck()
	{
		$(".Bcheck").each(function(i){		
			if ($(this).attr("checked"))
			{
			$(".Scheck_"+$(this).attr("id")).attr("checked","true");
			//alert($(this).attr("id"));
			$(".Scheck_"+$(this).attr("id")).attr("disabled","disabled");
			}
			else
			{
			$(".Scheck_"+$(this).attr("id")).attr("disabled","")	;
			}
		});
	}
	
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("products/admin_products_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>鎻愮ず锛�</h2>
	<p>
鍒犻櫎椤剁骇绾у垎绫诲皢浼氳嚜鍔ㄥ垹闄ゆ鍒嗙被涓嬬殑瀛愬垎绫汇��
</p>
</div>
	 <form id="form1" name="form1" method="post" action="?act=del_category">
	 <?php echo $this->_vars['inputtoken']; ?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="list" class="link_lan"  >
    <tr>
      <td height="26" class="admin_list_tit admin_list_first" >
      <label id="categorychkAll"><input type="checkbox" name=" " title="鍏ㄩ��/鍙嶉��" id="chk"/>鍒嗙被鏍囬</label></td>

      <td width="160"   align="center"  class="admin_list_tit">鎺掑簭</td>
      <td width="200"   align="center" class="admin_list_tit">鎿嶄綔</td>
    </tr>
	<?php echo tpl_function_products_category(array('set' => "鍒楄〃鍚�:category,浜у搧澶х被:0"), $this);?>
	  <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
     <tr>
      <td   class="admin_list admin_list_first" >
      <input type="checkbox" name="id[]" value="<?php echo $this->_vars['list']['id']; ?>
" id="<?php echo $this->_vars['list']['id']; ?>
"  class="Bcheck"/>
      <img src="images/left_d.gif" border="0" align="absmiddle"  id="<?php echo $this->_vars['list']['id']; ?>
" class="Bclass"/>
	  <strong><?php echo $this->_vars['list']['categoryname']; ?>
</strong>
	  <span style="color:#CCCCCC">(id:<?php echo $this->_vars['list']['id']; ?>
)</span>
	  </td>

      <td align="center"  class="admin_list">
	  <?php echo $this->_vars['list']['category_order']; ?>

	  </td>
      <td class="admin_list" style="padding-left:90px;">
	  <a href="?act=edit_category&id=<?php echo $this->_vars['list']['id']; ?>
">淇敼</a>&nbsp;&nbsp;
			  <?php if ($this->_vars['list']['admin_set'] <> "1"): ?>
			  |&nbsp;&nbsp;<a onclick="return confirm('浣犵‘瀹氳鍒犻櫎鍚楋紵')" href="?act=del_category&id=<?php echo $this->_vars['list']['id']; ?>
">鍒犻櫎</a>
			  <?php endif; ?>	  </td>
    </tr>
			<!--灏忕被 -->
			<?php echo tpl_function_products_category(array('set' => $this->_run_modifier("鍒楄〃鍚�:sclass,浜у搧澶х被:", 'cat', 'plugin', 1, $this->_vars['list']['id'])), $this);?>
			<?php if (count((array)$this->_vars['sclass'])): foreach ((array)$this->_vars['sclass'] as $this->_vars['slist']): ?>
			 <tr class="Sclass_<?php echo $this->_vars['list']['id']; ?>
"  >
			  <td  class="admin_list"  style="padding-left:31px;">
			  <input type="checkbox" name="id[]" value="<?php echo $this->_vars['slist']['id']; ?>
" class="Scheck_<?php echo $this->_vars['list']['id']; ?>
"/>
			  <img src="images/left_d.gif" border="0" align="absmiddle"  id="<?php echo $this->_vars['slist']['id']; ?>
" class="Bclass"/>
			  <?php echo $this->_vars['slist']['categoryname']; ?>

			  <span style="color: #CCCCCC">(id:<?php echo $this->_vars['slist']['id']; ?>
)</span>
			  </td>

			  <td align="center"  class="admin_list">
			  <?php echo $this->_vars['slist']['category_order']; ?>

			  </td>
			  <td class="admin_list" style="padding-left:100px;">

				  <a href="?act=edit_category&id=<?php echo $this->_vars['slist']['id']; ?>
">淇敼</a>&nbsp;&nbsp;
					  <?php if ($this->_vars['slist']['admin_set'] <> "1"): ?>
					  |&nbsp;&nbsp;<a onclick="return confirm('浣犵‘瀹氳鍒犻櫎鍚楋紵')" href="?act=del_category&id=<?php echo $this->_vars['slist']['id']; ?>
&<?php echo $this->_vars['urltoken']; ?>
">鍒犻櫎</a>
					  <?php endif; ?>	  </td>
			</tr>
			<?php endforeach; endif; ?>
			
      <?php endforeach; endif; ?>
    </table>
	<table width="100%" border="0" cellspacing="10"  class="admin_list_btm">
<tr>
        <td>
        <input name="ButADD" type="button" class="admin_submit" id="ButADD" value="娣诲姞鍒嗙被"  onclick="window.location='?act=category_add'"/>
		<input name="ButDel" type="submit" class="admin_submit" id="ButDel"  value="鍒犻櫎鎵�閫�" onclick="return confirm('浣犵‘瀹氳鍒犻櫎鍚楋紵')"/>
		</td>
        <td width="305" align="right">
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