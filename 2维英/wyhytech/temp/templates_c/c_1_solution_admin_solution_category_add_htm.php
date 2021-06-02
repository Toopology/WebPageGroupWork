<?php require_once('/var/www/virtual/weiyinghy/home/wwwroot/include/template_lite/plugins/function.solution_category.php'); $this->register_function("solution_category", "tpl_function_solution_category",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-11-22 11:14 CST */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script  charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#add_form").click(function()
	{
	$("#html").append($("#html_tpl").html());
	});
	
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
    <?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("solution/admin_solution_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>提示：</h2>
	<p>
点击“继续添加”按钮，可同时添加多个分类！<br />
</p>
</div>
<div class="toptit">新增分类</div>

    <form id="form1" name="form1" method="post" action="?act=add_category_save">
	<?php echo $this->_vars['inputtoken']; ?>

	<div id="html_tpl">
      <table width="100%" border="0" cellpadding="3" cellspacing="5" style="border-bottom:1px  #86AFE8 dashed">
        <tr>
          <td width="120" align="right">所属分类：</td>
          <td>
		  <select name="parentid[]" id="parentid"  style="width:108px; font-size:12px;">
              <option value="0">顶级分类</option>
			  <?php echo tpl_function_solution_category(array('set' => "列表名:category,学堂大类:0"), $this);?>
			  <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
            <option value="<?php echo $this->_vars['list']['id']; ?>
" <?php if ($_GET['parentid'] == $this->_vars['list']['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_vars['list']['categoryname']; ?>
</option>
			<?php endforeach; endif; ?>       
          </select>		  </td>
        </tr>
        <tr>
          <td align="right">名称：</td>
          <td><input name="categoryname[]" type="text" class="input_text_200"  value="" maxlength=""/></td>
        </tr>
        <tr>
          <td align="right">排序：</td>
          <td><input name="category_order[]" type="text" style="width:30px; font-size:12px;"   value="0" maxlength="3" class="input_text_200" /></td>
        </tr>
        <tr>
          <td align="right">title：</td>
          <td><input name="title[]" type="text" class="input_text_200"  maxlength="30"/>
            不填则为分类名称</td>
        </tr>
        <tr>
          <td align="right">description：</td>
          <td><textarea name="description[]" class="input_text_400" style="height:50px;"></textarea></td>
        </tr>
        <tr>
          <td align="right">keywords：</td>
          <td><textarea name="keywords[]" class="input_text_400" style="height:50px;"></textarea></td>
        </tr>
          <tr>
              <td align="right" valign="top">内容：</td>
              <td><textarea id="content" name="content" class="input_text_400" style="width:700px;height:300px;visibility:hidden;"><?php echo $this->_vars['category']['content']; ?>
</textarea></td>
              <script>
                  KE.show({
                      id : 'content',
                      shadowMode : false,
                      autoSetDataMode: false,
                      allowPreviewEmoticons : false,
                      //skinType : 'tinymce',
                      urlType : 'absolute',
                      filterMode : false,
                      //allowFileManager : true,
                      afterCreate : function(id) {
                          KE.event.add(KE.$('form1'), 'submit', function() {
                              KE.util.setData(id);
                          });
                      }
                  });
              </script>
          </tr>
		 </table>
		 </div>
		 <div id="html"></div>
		<table width="100%" border="0" cellpadding="3" cellspacing="5">
        <tr>
          <td width="120" align="right">&nbsp;</td>
          <td >
		  <input type="submit" name="addsave" value="保存" class="admin_submit" />
		  <input type="button" name="add_form" id="add_form" value="继续添加" class="admin_submit" />
		  <input name="submit22" type="button" class="admin_submit"    value="返 回" onclick="history.go(-1)"/>
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