<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-27 17:10 中国标准时间 */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script  charset="utf-8" src="kindeditor/kindeditor.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
	siteurl='<?php echo $this->_vars['siteurl']; ?>
';
	showmenu("#type_id_cn","#menu1","#type_id");
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("about/admin_about_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptit">淇敼</div>
  <form action="?act=editsave" method="post" enctype="multipart/form-data" name="FormData" id="FormData" >
  <?php echo $this->_vars['inputtoken']; ?>


    <table width="100%" border="0" cellpadding="3" cellspacing="0"  class="admin_table">
      <tr>
        <td width="100" align="right"  style=" border-top:0px">鏍囬锛�</td>
        <td width="400" style=" border-top:0px"><input name="title" type="text"  class="input_text_400"  value="<?php echo $this->_vars['edit_about']['title']; ?>
"/></td>
        <td style=" border-top:0px">
		<!--<div class="color_layer">
		<div id="color_box" onclick="color_box_display()" ></div><input type="hidden" name="tit_color" id="tit_color" >
		<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_select_color.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
		</div>
		-->
		</td>
      </tr>
      <tr>
        <td align="right" >鍒嗙被锛�</td>
        <td colspan="2" >		
		<div>		
		<input type="text" value="<?php if (count((array)$this->_vars['about_category'])): foreach ((array)$this->_vars['about_category'] as $this->_vars['list']):  if ($this->_vars['edit_about']['type_id'] == $this->_vars['list']['id']):  echo $this->_vars['list']['categoryname'];  endif;  endforeach; endif; ?>"  readonly="readonly" name="type_id_cn" id="type_id_cn" class="input_text_200 input_text_selsect"/>
		<input name="type_id" id="type_id" type="hidden" value="<?php echo $this->_vars['edit_about']['type_id']; ?>
" />
		<div id="menu1" class="menu">
			<ul>	
			<?php if (count((array)$this->_vars['about_category'])): foreach ((array)$this->_vars['about_category'] as $this->_vars['list']): ?>
			<li id="<?php echo $this->_vars['list']['id']; ?>
" title="<?php echo $this->_vars['list']['categoryname']; ?>
" ><?php echo $this->_vars['list']['categoryname']; ?>
</li>
			<?php endforeach; endif; ?>
			</ul>
		</div>
		  </div>
		  </td>
      </tr>
		<tr >
			<td align="right" valign="top">鍥剧墖锛�</td>
			<td colspan="2" class="ftype_upload" >
				<div class="fbox">
					<input
							name="imgurl"
							type="text"
							data-upload-type="doupimg"
							data-upload-many="1"
							value="<?php echo $this->_vars['edit_about']['imgurl']; ?>
"
					/>
				</div>
			</td>
		</tr>

		<script src="js/sea.js"></script>
    </table>

    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="admin_table">
      <tr>
        <td width="100" align="right" >鏄惁鏄剧ず锛�</td>
        <td width="200" >
<label><input name="is_display" type="radio" value="1" checked="checked"  <?php if ($this->_vars['edit_about']['is_display'] == "1"): ?>checked="checked"  <?php endif; ?>/>鏄剧ず</label>
<label><input type="radio" name="is_display" value="0" <?php if ($this->_vars['edit_about']['is_display'] == "0"): ?>checked="checked"  <?php endif; ?>/> 涓嶆樉绀�</label>

</td>
        <td width="100" align="right" >鎺掑簭锛�</td>
        <td ><input name="about_order" type="text"  class="input_text_150" id="about_order" style="width:50px;" maxlength="8" onkeyup="if(event.keyCode !=37 && event.keyCode != 39) value=value.replace(/\D/g,'');"onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))" value="<?php echo $this->_vars['edit_about']['about_order']; ?>
"/>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;鏁板瓧瓒婂ぇ瓒婇潬鍓�</span></td>
        <td width="250" >&nbsp;</td>
      </tr>



      <tr>
        <td align="right" > 
      
        keywords锛�</td>
        <td colspan="4" ><input name="seo_keywords" type="text" class="input_text_400" id="keywords" value="<?php echo $this->_vars['edit_about']['seo_keywords']; ?>
" maxlength="30"   /></td>
      </tr>
      <tr>
        <td align="right" valign="top" >description锛�</td>
        <td colspan="4" ><textarea name="seo_description" class="input_textarea_400" id="description"><?php echo $this->_vars['edit_about']['seo_description']; ?>
</textarea></td>
      </tr>
    </table>
	  <table width="100%" border="0" cellpadding="3" cellspacing="0">
		  <tr>
			  <td width="100px" align="right" valign="top">鍐呭锛�</td>
			  <td ><textarea id="content" name="content" style="width:700px;height:300px;visibility:hidden;"><?php echo $this->_vars['edit_about']['content']; ?>
</textarea>
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
							  KE.event.add(KE.$('FormData'), 'submit', function() {
								  KE.util.setData(id);
							  });
						  }
					  });
				  </script>
			  </td>
		  </tr>

		  <tr>
			  <td></td>
			  <td height="50" align="left" >
				  <input name="id" id="sub_id" type="hidden" value="<?php echo $this->_vars['edit_about']['id']; ?>
" />
				  <input type="submit" name="Submit" value="纭畾鎻愪氦" class="admin_submit"   />

				  <input type="reset" name="Submit2" value="閲嶇疆琛ㄥ崟" class="admin_submit"   /></td>
		  </tr>
	  </table>
  </form>
</div>
<?php if ($this->_vars['edit_about']['tit_color']): ?>
<script type="text/javascript" >
var rgb="<?php echo $this->_vars['edit_about']['tit_color']; ?>
";
document.FormData.tit_color.value= rgb;
document.getElementById('tit_color').style.background=rgb;
document.getElementById('color_box').style.background=rgb;
</script>
<?php endif; ?>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>