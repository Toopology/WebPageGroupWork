<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-19 11:09 中国标准时间 */ ?>

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
	//鍥剧墖
	$("#sub2").click(function()
	{
	 if ($("#title").val()==""){alert ("璇峰～鍐欐爣棰�"); return false;}
	 if ($("#img_file").val()==""){alert ("璇蜂笂浼犲浘鐗�");return false;}
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
	<h2>鎻愮ず锛�</h2>
	<p>
涓婁紶澶ф枃浠跺缓璁�氳繃FTP涓婁紶
鍦ㄥ～鍐欒矾寰勭殑鏃跺�欙紝寤鸿浣跨敤鈥�/鈥濇垨鈥渉ttp:// 鈥�  寮�澶寸殑缁濆璺緞銆�
</p>
</div>
<div class="toptit">淇敼 <span style="color:#0033CC"><?php echo $this->_vars['ad']['title']; ?>
 </span></div>
<form action="?act=ad_edit_save" method="post" enctype="multipart/form-data"  name="FormData" id="FormData" >
<input name="id" type="hidden" value="<?php echo $this->_vars['ad']['id']; ?>
" /><input name="url" type="hidden" value="<?php echo $this->_vars['url']; ?>
" />
<table width="100%" border="0" cellpadding="3" cellspacing="3">
              <tr>
                <td width="100" align="right">鏍囬(蹇呭～)锛�</td>
                <td><input name="title" type="text" class="input_text_400" id="title" maxlength="100"  value="<?php echo $this->_vars['ad']['title']; ?>
"/> <span class="admin_note">骞垮憡鏍囬鍙负璇嗗埆杈ㄨ涓嶅悓骞垮憡鏉＄洰涔嬬敤锛屽苟涓嶅湪骞垮憡涓樉绀�</span></td>
              </tr>
			  <tr>
                <td align="right">鏄剧ず鐘舵�侊細</td>
                <td>
				<label>
                  <input name="is_display" type="radio" value="1" <?php if ($this->_vars['ad']['is_display'] == "1"): ?>checked="checked"<?php endif; ?>/>
                  姝ｅ父</label>&nbsp;&nbsp;&nbsp;&nbsp;<label>
                  <input type="radio" name="is_display" value="0" <?php if ($this->_vars['ad']['is_display'] == "0"): ?>checked="checked"<?php endif; ?> />
鍋滄 </label></td>
              </tr>
              <tr>
                <td align="right">閫夋嫨鍒嗙被锛�</td>
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
                <td align="right">鏄剧ず椤哄簭锛�</td>
                <td><input name="show_order" type="text" class="input_text_200" id="show_order"  value="<?php echo $this->_vars['ad']['show_order']; ?>
" maxlength="3" />                   <span class="admin_note">鏁板瓧瓒婂ぇ瓒婇潬鍓�</span></td>
              </tr>
    </table>

<div class="adshow" id="show1">
	<table width="100%" border="0" cellpadding="3" cellspacing="3">
	
				<tr>
        <td width="100" align="right" valign="top">PC鍥剧墖锛�</td>
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
            <td width="100" align="right" valign="top">WAP鍥剧墖锛�</td>
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
                  <td align="right">鍥剧墖閾炬帴锛�</td>
                  <td><input name="img_url" type="text" class="input_text_200" id="img_url" maxlength="250"  value="<?php echo $this->_vars['ad']['img_url']; ?>
"/><span class="admin_note">濡�:http://寮�澶�</span></td>
                </tr>
                <tr>
                  <td align="right">鍥剧墖璇存槑鏂囧瓧锛�</td>
                  <td><input name="img_explain" type="text" class="input_text_200" id="img_explain" maxlength="250" value="<?php echo $this->_vars['ad']['img_explain']; ?>
"/></td>
                </tr>

      </table>
		  <div style="padding-left:110px; padding-top:10px;">
		  <input type="button"  id="sub2" value="纭畾鎻愪氦" class="admin_submit"   />
		  <input name="submit22" type="button" class="admin_submit"    value="杩� 鍥�" onclick="Javascript:window.history.go(-1)"/>
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