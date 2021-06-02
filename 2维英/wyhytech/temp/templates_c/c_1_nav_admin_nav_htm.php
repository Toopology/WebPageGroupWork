<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-11-01 17:00 CST */ ?>

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
echo $this->_fetch_compile_include("nav/admin_nav_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
<h2>提示：</h2>
<p>
页面关联标记与导航关联标记相同时(导航关联标记请在页面管理中查看)，与之关联的页面将高亮显示；        例如：在页面管理中，首页的导航关联标记为homepage,在自定义导航中增加网站首页栏目，页面关联标为homepage，那么打开网站首页页面，则此栏目高亮显示。
</p>
</div>
  <form action="?act=site_navigation_all_save" method="post"  name="form1" id="form1"> 
  <?php echo $this->_vars['inputtoken']; ?>

    <table width="100%" border="0" cellpadding="0" cellspacing="0"  id="list" class="link_lan">
      <tr>
        <td width="8%"  class="admin_list_tit admin_list_first" >显示</td>
        <td  class="admin_list_tit">名称</td>
        <td width="15%" align="center" class="admin_list_tit">页面关联标记</td>
        <td width="8%" align="center" class="admin_list_tit">位置</td>
        <td width="15%" align="center" class="admin_list_tit">打开方式</td>
        <td width="8%" align="center" class="admin_list_tit">排序</td>
        <td width="12%" align="center" class="admin_list_tit">编辑</td>
      </tr>
	   <?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['li']): ?>
	     <tr>
        <td  class="admin_list admin_list_first">
		 <?php if ($this->_vars['li']['display'] == "1"): ?>
	  <span style="color: #FF3300">显示</span>
	  <?php else: ?>
	<span style="color:#999999">不显示</span>
	  <?php endif; ?>
		</td>
        <td    class="admin_list">
		<input name="title[]" type="text"  class="input_text_200" id="title" value="<?php echo $this->_vars['li']['title']; ?>
"   />
		</td>
        <td align="center"    class="admin_list"><?php echo $this->_vars['li']['tag']; ?>
&nbsp;</td>
        <td align="center"   class="admin_list"><?php echo $this->_vars['li']['categoryname']; ?>
</td>
        <td align="center"   class="admin_list">
		<?php if ($this->_vars['li']['target'] == "_blank"): ?>
		新窗口
		<?php endif; ?>
		<?php if ($this->_vars['li']['target'] == "_self"): ?>
		<span style="color:#666666">原窗口</span>
		<?php endif; ?>		</td>
        <td align="center"  class="admin_list" >
		<input name="navigationorder[]" type="text"  class="input_text_50" id="title" value="<?php echo $this->_vars['li']['navigationorder']; ?>
"   />
		</td>
        <td align="center"  class="admin_list" >
		<a href="?act=site_navigation_edit&id=<?php echo $this->_vars['li']['id']; ?>
">修改</a>		<?php if ($this->_vars['li']['systemclass'] != "1"): ?>
		<a href="?act=del_navigation&id=<?php echo $this->_vars['li']['id']; ?>
&<?php echo $this->_vars['urltoken']; ?>
"  onclick="return confirm('你确定要删除吗？')">删除</a>
		<?php endif; ?>
		<input name="id[]" type="hidden" value="<?php echo $this->_vars['li']['id']; ?>
" />	
		</td>
      </tr>
	   <?php endforeach; endif; ?>
    </table>
	<table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>
<input type="submit" name="Submit22" value="保存修改" class="admin_submit"   />

		<input name="add" type="button" class="admin_submit" id="add"    value="添加栏目"  onclick="window.location='?act=site_navigation_add'"/>
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