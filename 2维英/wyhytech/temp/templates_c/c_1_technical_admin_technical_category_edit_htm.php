<?php require_once('E:\wamp\www\weiyinhengye\include\template_lite\plugins\function.technical_category.php'); $this->register_function("technical_category", "tpl_function_technical_category",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-17 09:23 中国标准时间 */ ?>

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
echo $this->_fetch_compile_include("technical/admin_technical_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptit">淇敼鍒嗙被</div>
    <form id="form1" name="form1" method="post" action="?act=edit_category_save">
	<?php echo $this->_vars['inputtoken']; ?>

      <table width="100%" border="0" cellpadding="3" cellspacing="5"  >
        <tr>
          <td width="120" align="right">鎵�灞炲垎绫伙細</td>
          <td>
		  <select name="parentid" id="parentid"  style="width:108px; font-size:12px;">
              <option value="0">椤剁骇鍒嗙被</option>
			  <?php echo tpl_function_technical_category(array('set' => "鍒楄〃鍚�:categorylist,鍩硅澶х被:0"), $this);?>
			  <?php if (count((array)$this->_vars['categorylist'])): foreach ((array)$this->_vars['categorylist'] as $this->_vars['list']): ?>
            <option value="<?php echo $this->_vars['list']['id']; ?>
" <?php if ($this->_vars['category']['parentid'] == $this->_vars['list']['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_vars['list']['categoryname']; ?>
</option>
			<?php endforeach; endif; ?>       
          </select>		  </td>
        </tr>
        <tr>
          <td align="right">鍚嶇О锛�</td>
          <td><input name="categoryname" type="text" class="input_text_200"  value="<?php echo $this->_vars['category']['categoryname']; ?>
" maxlength=""/></td>
        </tr>
        <tr>
          <td align="right">鎺掑簭锛�</td>
          <td><input name="category_order" type="text" style="width:30px; font-size:12px;"   value="<?php echo $this->_vars['category']['category_order']; ?>
" maxlength="3" class="input_text_200" /></td>
        </tr>
        <tr>
          <td align="right">title锛�</td>
          <td><input name="title" type="text" class="input_text_200"  maxlength="30" value="<?php echo $this->_vars['category']['title']; ?>
"/>
            涓嶅～鍒欎负鍒嗙被鍚嶇О</td>
        </tr>
        <tr>
          <td align="right">description锛�</td>
          <td><textarea name="description" class="input_text_400" style="height:50px;"><?php echo $this->_vars['category']['description']; ?>
</textarea></td>
        </tr>
        <tr>
          <td align="right">keywords锛�</td>
          <td><textarea name="keywords" class="input_text_400" style="height:50px;"><?php echo $this->_vars['category']['keywords']; ?>
</textarea></td>
        </tr>
		 </table>
		<table width="100%" border="0" cellpadding="3" cellspacing="5">
        <tr>
          <td width="120" align="right">&nbsp;</td>
          <td >
		  <input name="id" type="hidden" value="<?php echo $this->_vars['category']['id']; ?>
" />
		  <input type="submit" name="addsave" value="淇敼" class="admin_submit" />
		  <input name="submit22" type="button" class="admin_submit"    value="杩� 鍥�" onclick="history.go(-1)"/>
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