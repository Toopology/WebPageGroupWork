<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-19 11:09 �й���׼ʱ�� */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<link href="css/date_input.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.date_input.js" type='text/javascript' language="javascript"></script>
<script type="text/javascript" >
$(document).ready(function()
{
	//图片
	$("#sub2").click(function()
	{
	 if ($("#title").val()==""){alert ("请填写标题"); return false;}
	 if ($("#img_file").val()==""){alert ("请上传图片");return false;}
	 $("#FormData").submit();
	});
}); 
</script>
<script type="text/javascript" >
$(document).ready(function()
{
    siteurl='<?php echo $this->_vars['siteurl']; ?>
';
	selChange("<?php echo $this->_vars['ad']['category_id']; ?>
,<?php echo $this->_vars['ad']['alias']; ?>
");
	$("#category").change(function(){
	 selChange($(this).val());
	});
	function selChange(obj)
	{
	var str=obj.split(",");
	$("#category_id").val(str[0]);
	$("#alias").val(str[1]);

	}
});
</script>
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
	<h2>提示：</h2>
	<p>
上传大文件建议通过FTP上传
在填写路径的时候，建议使用“/”或“http:// ”  开头的绝对路径。
</p>
</div>
<div class="toptit">修改 <span style="color:#0033CC"><?php echo $this->_vars['ad']['title']; ?>
 </span></div>
<form action="?act=ad_edit_save" method="post" enctype="multipart/form-data"  name="FormData" id="FormData" >
<input name="id" type="hidden" value="<?php echo $this->_vars['ad']['id']; ?>
" /><input name="url" type="hidden" value="<?php echo $this->_vars['url']; ?>
" />
<table width="100%" border="0" cellpadding="3" cellspacing="3">
              <tr>
                <td width="100" align="right">标题(必填)：</td>
                <td><input name="title" type="text" class="input_text_400" id="title" maxlength="100"  value="<?php echo $this->_vars['ad']['title']; ?>
"/> <span class="admin_note">广告标题只为识别辨认不同广告条目之用，并不在广告中显示</span></td>
              </tr>
			  <tr>
                <td align="right">显示状态：</td>
                <td>
				<label>
                  <input name="is_display" type="radio" value="1" <?php if ($this->_vars['ad']['is_display'] == "1"): ?>checked="checked"<?php endif; ?>/>
                  正常</label>&nbsp;&nbsp;&nbsp;&nbsp;<label>
                  <input type="radio" name="is_display" value="0" <?php if ($this->_vars['ad']['is_display'] == "0"): ?>checked="checked"<?php endif; ?> />
停止 </label></td>
              </tr>
              <tr>
                <td align="right">选择分类：</td>
                <td><select name="category"   id="category"  >           
  					<?php if (count((array)$this->_vars['ad_category'])): foreach ((array)$this->_vars['ad_category'] as $this->_vars['li']): ?>		
                  <option value="<?php echo $this->_vars['li']['id']; ?>
,<?php echo $this->_vars['li']['alias']; ?>
"  <?php if ($this->_vars['li']['id'] == $this->_vars['ad']['category_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_vars['li']['categoryname']; ?>
</option>
				 <?php endforeach; endif; ?>
                </select>
				<input name="category_id" id="category_id" type="hidden" value="<?php echo $this->_vars['ad']['category_id']; ?>
" />
				<input name="alias" id="alias" type="hidden" value="<?php echo $this->_vars['ad']['alias']; ?>
" />				</td>
              </tr>
              <tr>
                <td align="right">显示顺序：</td>
                <td><input name="show_order" type="text" class="input_text_200" id="show_order"  value="<?php echo $this->_vars['ad']['show_order']; ?>
" maxlength="3" />                   <span class="admin_note">数字越大越靠前</span></td>
              </tr>
    </table>

<div class="adshow" id="show1">
	<table width="100%" border="0" cellpadding="3" cellspacing="3">
	
				<tr>
        <td width="100" align="right" valign="top">PC图片：</td>
        <td class="ftype_upload" >
            <div class="fbox">
                <input
                        name="imgurl"
                        type="text"
                        data-upload-type="doupimg"
                        data-upload-many="1"
                        value="<?php echo $this->_vars['ad']['imgurl']; ?>
"
                />
            </div>
        </td>
    </tr>
        <tr>
            <td width="100" align="right" valign="top">WAP图片：</td>
            <td class="ftype_upload" >
                <div class="fbox">
                    <input
                            name="simgurl"
                            type="text"
                            data-upload-type="doupimg"
                            data-upload-many="1"
                            value="<?php echo $this->_vars['ad']['simgurl']; ?>
"
                    />
                </div>
            </td>
        </tr>
        <script src="js/sea.js"></script>
                <tr>
                  <td align="right">图片链接：</td>
                  <td><input name="img_url" type="text" class="input_text_200" id="img_url" maxlength="250"  value="<?php echo $this->_vars['ad']['img_url']; ?>
"/><span class="admin_note">如:http://开头</span></td>
                </tr>
                <tr>
                  <td align="right">图片说明文字：</td>
                  <td><input name="img_explain" type="text" class="input_text_200" id="img_explain" maxlength="250" value="<?php echo $this->_vars['ad']['img_explain']; ?>
"/></td>
                </tr>

      </table>
		  <div style="padding-left:110px; padding-top:10px;">
		  <input type="button"  id="sub2" value="确定提交" class="admin_submit"   />
		  <input name="submit22" type="button" class="admin_submit"    value="返 回" onclick="Javascript:window.history.go(-1)"/>
		  </div>
	</div>
</form>
</div>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>