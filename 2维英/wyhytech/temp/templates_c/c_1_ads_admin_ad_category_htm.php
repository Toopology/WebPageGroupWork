<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2019-04-18 14:56 �й���׼ʱ�� */ ?>

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
echo $this->_fetch_compile_include("ads/admin_ad_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
</div>
 
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="list" class="link_lan">
          <tr>
            <td  class="admin_list_tit admin_list_first">名称</td>
            <td class="admin_list_tit">调用名称</td>
            <td width="12%" align="center" class="admin_list_tit">类型</td>
            <td width="12%" align="center" class="admin_list_tit">编辑</td>
            </tr>
			<?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['li']): ?>
			
			  <tr>
            <td  class="admin_list admin_list_first">
			<?php echo $this->_vars['li']['categoryname']; ?>
	
			</td>
            <td class="admin_list">
			<?php echo $this->_vars['li']['alias']; ?>

			</td>
            <td align="center" class="admin_list">
			<?php if ($this->_vars['li']['admin_set'] == "1"): ?>
			<span style="color:#FF6600">系统内置</span>
			<?php else: ?>
			自定义广告位
			<?php endif; ?>			</td>
            <td align="center" class="admin_list">
			<?php if ($this->_vars['li']['admin_set'] != "1"): ?>
			<a href="?act=edit_ad_category&id=<?php echo $this->_vars['li']['id']; ?>
"  >修改</a>
			&nbsp;&nbsp;&nbsp;
			<a href="?act=del_ad_category&id=<?php echo $this->_vars['li']['id']; ?>
&<?php echo $this->_vars['urltoken']; ?>
" onclick="return confirm('你确定要删除吗？')">删除</a>
			<?php else: ?>
			<span style="color:#999999">修改</span>&nbsp;&nbsp;&nbsp;
			<span style="color:#999999">删除</span>
			
			<?php endif; ?>			</td>
            </tr>
			<?php endforeach; endif; ?>
  </table>
		<table width="100%" border="0" cellspacing="10"  class="admin_list_btm">
<tr>
      <!--<td>
       <input type="button" name="Submit22" value="添加" class="admin_submit"    onclick="window.location='?act=ad_category_add'"/>
	  </td>-->
      <td width="360">	  
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