<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:01 �й���׼ʱ�� */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script  charset="utf-8" src="kindeditor/kindeditor.js"></script>
<div class="admin_main_nr_dbox">
 <div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("set/admin_set_config_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>提示：</h2>
	<p>
页面标题设置以及关键字设置等请在页面管理中设置。<br />

网站域名和网站安装目录填写错误可导致网站部分功能不能使用。
</p>
</div>
<div class="toptit">网站配置</div>
  <form action="admin_set.php?act=site_setsave" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <?php echo $this->_vars['inputtoken']; ?>

    <table width="100%" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td width="120" align="right">网站名称：</td>
      <td><input name="site_name" type="text"  class="input_text_200" id="site_name" value="<?php echo $this->_vars['config']['site_name']; ?>
" maxlength="30"/></td>
    </tr>
    <tr>
      <td align="right">网站域名：</td>
      <td><input name="site_domain" type="text"  class="input_text_200" id="site_domain" value="<?php echo $this->_vars['config']['site_domain']; ?>
" maxlength="100"/>
      结尾不要加 &quot; / &quot;</td>
    </tr>
    <tr>
      <td align="right">安装目录：</td>
      <td><input name="site_dir" type="text"  class="input_text_200" id="site_dir" value="<?php echo $this->_vars['config']['site_dir']; ?>
" maxlength="40"/>
      ( 以 &quot; / &quot; 开头和结尾, 如果安装在根目录，则为&quot; / &quot;)      </td>
    </tr>
    <tr>
      <td align="right" valign="top">网站关键词：</td>
      <td><textarea name="site_keywords" class="input_text_400" id="site_keywords" style="height:60px;"><?php echo $this->_vars['config']['site_keywords']; ?>
</textarea></td>
    </tr>
    <tr>
      <td align="right" valign="top">网站描述：</td>
      <td><textarea name="site_description" class="input_text_400" id="site_description" style="height:60px;"><?php echo $this->_vars['config']['site_description']; ?>
</textarea></td>
    </tr>

    <tr>
        <td width="120px" align="right" valign="top">版权信息：</td>
        <td ><textarea id="bottom_other" name="bottom_other" style="width:700px;height:300px;visibility:hidden;"></textarea>
            <script>
                KE.show({
                    id : 'bottom_other',
                    shadowMode : false,
                    autoSetDataMode: false,
                    allowPreviewEmoticons : false,
                    //skinType : 'tinymce',
                    urlType : 'absolute',
                    filterMode : true,
                    //allowFileManager : true,
                    afterCreate : function(id) {
                        KE.event.add(KE.$('form1'), 'submit', function() {
                            KE.util.setData(id);
                        });
                    }
                });
            </script>
        </td>
    </tr>
    <tr>
        <td align="right">&nbsp;</td>
        <td height="50">
            <input name="submit" type="submit" class="admin_submit"    value="保存修改"/>
        </td>
    </tr>
  </table>
  </form>
</div>
</body>
</html>