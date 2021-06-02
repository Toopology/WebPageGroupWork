<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 17:26 中国标准时间 */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#selectAll").click(function()
	{	
		$("form :checkbox").attr("checked",true);
		setbg();
	});
	$("#uncheckAll").click(function()
	{	
		$("form :checkbox").attr("checked",false);
		setbg();
	});
	$("#opposite").click(function()
	{	
		$("form :checkbox").each(function()
		{
		$(this).attr("checked")?$(this).attr("checked",false):$(this).attr("checked",true);
		});
		setbg();
	});	
});
</script>
<?php if ($this->_vars['admin_purview'] <> "all"): ?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#form1 :checkbox").attr("disabled","false");
});
</script>
<?php endif; ?>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"><?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("users/admin_users_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
<h2>鎻愮ず锛�</h2>
<p>
閫氳繃绠＄悊鍛樿缃紝鎮ㄥ彲浠ヨ繘琛岀紪杈戠鐞嗗憳璧勬枡銆佹潈闄愩�佸瘑鐮佷互鍙婂垹闄ょ鐞嗗憳绛夋搷浣滐紱
</p>
</div> 
<div class="toptit">绠＄悊鍛樻潈闄�
<span style="color: #FF3300">(<?php echo $this->_vars['account']['admin_name']; ?>
)</span>
	  <?php if ($this->_vars['admin_purview'] == "all"): ?>
	  &nbsp;&nbsp;&nbsp;
	  <span id="selectAll" style="color:#0066CC; cursor:pointer">[鍏ㄩ�塢</span>
	  &nbsp;&nbsp;&nbsp;
	  <span id="uncheckAll" style="color:#0066CC; cursor:pointer">[鍏ㄤ笉閫塢</span>
	  &nbsp;&nbsp;&nbsp;
	  <span id="opposite" style="color:#0066CC; cursor:pointer">[鍙嶉�塢</span>
	  <?php endif; ?>
</div>
  <?php if ($this->_vars['account']['purview'] == "all"): ?>
  <div  style="color:#009900; padding:24px;">绯荤粺瓒呯骇绠＄悊鍛樻潈闄愪笉鍏佽淇敼锛�</div>
    <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
    <tr>
      <td bgcolor="#FFFFFF"  style="padding-left:24px;" > 
      <input name="submit22" type="button" class="admin_submit"    value="杩斿洖涓婁竴姝�" onclick="Javascript:window.history.go(-1)"/></td>
    </tr>
  </table>
  <?php else: ?>
    <form id="form1" name="form1" method="post" action="?act=users_set_save">
	<?php echo $this->_vars['inputtoken']; ?>

	  	<table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
        <tr>
          <td height="25" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed; padding-left:20px;"><strong>浜у搧涓績绠＄悊锛�</strong></td>
        </tr>
        <tr>
          <td  bgcolor="#FFFFFF" style="  padding-left:14px;">
		  <ul style="margin:0px; padding:3px; list-style:none">		  
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="products_show" <?php if ($this->_run_modifier("products_show", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鏌ョ湅浜у搧
</label>
</li>
<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="products_add" <?php if ($this->_run_modifier("products_add", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />娣诲姞淇℃伅
</label>
</li>
<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="products_edit" <?php if ($this->_run_modifier("products_edit", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />淇敼淇℃伅
</label>
</li>
<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="products_del" <?php if ($this->_run_modifier("products_del", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鍒犻櫎淇℃伅
</label>
</li>

<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="products_category" <?php if ($this->_run_modifier("products_category", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />璁剧疆鍒嗙被
</label>
</li>

<!-- -->
<!-- -->
<li class="clear" style="list-style:none; display:none"></li>
</ul>	
</td>
</tr>
      </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
            <tr>
                <td height="25" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed; padding-left:20px;"><strong>瑙ｅ喅鏂规绠＄悊锛�</strong></td>
            </tr>
            <tr>
                <td  bgcolor="#FFFFFF" style="  padding-left:14px;">
                    <ul style="margin:0px; padding:3px; list-style:none">
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="solution_show" <?php if ($this->_run_modifier("solution_show", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鏌ョ湅淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="solution_add" <?php if ($this->_run_modifier("solution_add", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />娣诲姞淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="solution_edit" <?php if ($this->_run_modifier("solution_edit", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />淇敼淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="solution_del" <?php if ($this->_run_modifier("solution_del", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鍒犻櫎淇℃伅
                            </label>
                        </li>

                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="solution_category" <?php if ($this->_run_modifier("solution_category", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />璁剧疆鍒嗙被
                            </label>
                        </li>

                        <!-- -->
                        <!-- -->
                        <li class="clear" style="list-style:none; display:none"></li>
                    </ul>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
            <tr>
                <td height="25" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed; padding-left:20px;"><strong>鎶�鏈敮鎸佺鐞嗭細</strong></td>
            </tr>
            <tr>
                <td  bgcolor="#FFFFFF" style="  padding-left:14px;">
                    <ul style="margin:0px; padding:3px; list-style:none">
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="technical_show" <?php if ($this->_run_modifier("technical_show", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鏌ョ湅淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="technical_add" <?php if ($this->_run_modifier("technical_add", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />娣诲姞淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="technical_edit" <?php if ($this->_run_modifier("technical_edit", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />淇敼淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="technical_del" <?php if ($this->_run_modifier("technical_del", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鍒犻櫎淇℃伅
                            </label>
                        </li>

                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="technical_category" <?php if ($this->_run_modifier("technical_category", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />璁剧疆淇℃伅鍒嗙被
                            </label>
                        </li>

                        <!-- -->
                        <!-- -->
                        <li class="clear" style="list-style:none; display:none"></li>
                    </ul>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
            <tr>
                <td height="25" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed; padding-left:20px;"><strong>鍏充簬鎴戜滑绠＄悊锛�</strong></td>
            </tr>
            <tr>
                <td  bgcolor="#FFFFFF" style="  padding-left:14px;">
                    <ul style="margin:0px; padding:3px; list-style:none">
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="about_show" <?php if ($this->_run_modifier("about_show", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鏌ョ湅淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="about_add" <?php if ($this->_run_modifier("about_add", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />娣诲姞淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="about_edit" <?php if ($this->_run_modifier("about_edit", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />淇敼淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="about_del" <?php if ($this->_run_modifier("about_del", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鍒犻櫎淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="about_category" <?php if ($this->_run_modifier("about_category", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />璁剧疆鍒嗙被
                            </label>
                        </li>
                        <li class="clear" style="list-style:none; display:none"></li>
                    </ul>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
            <tr>
                <td height="25" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed; padding-left:20px;"><strong>鑱旂郴鎴戜滑绠＄悊锛�</strong></td>
            </tr>
            <tr>
                <td  bgcolor="#FFFFFF" style="  padding-left:14px;">
                    <ul style="margin:0px; padding:3px; list-style:none">
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="contact_show" <?php if ($this->_run_modifier("contact_show", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鏌ョ湅淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="contact_add" <?php if ($this->_run_modifier("contact_add", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />娣诲姞淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="contact_edit" <?php if ($this->_run_modifier("contact_edit", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />淇敼淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="contact_del" <?php if ($this->_run_modifier("contact_del", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鍒犻櫎淇℃伅
                            </label>
                        </li>
                        <!-- -->
                        <li  class="user_box_li">
                            <label>
                                <input name="purview[]" type="checkbox"  value="contact_category" <?php if ($this->_run_modifier("contact_category", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />璁剧疆鍒嗙被
                            </label>
                        </li>
                        <li class="clear" style="list-style:none; display:none"></li>
                    </ul>
                </td>
            </tr>
        </table>
	    <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
        <tr>
          <td height="25" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed; padding-left:20px;"><strong>鍥剧墖閾炬帴绠＄悊锛�</strong></td>
        </tr>
        <tr>
          <td  bgcolor="#FFFFFF" style="  padding-left:14px;">
		  <ul style="margin:0px; padding:3px; list-style:none">		  
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="ad_show" <?php if ($this->_run_modifier("ad_show", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鏌ョ湅鍥剧墖閾炬帴
</label>
</li>
<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="ad_add" <?php if ($this->_run_modifier("ad_add", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />娣诲姞鍥剧墖閾炬帴
</label>
</li>
<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="ad_edit" <?php if ($this->_run_modifier("ad_edit", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />淇敼鍥剧墖閾炬帴
</label>
</li>
<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="ad_del" <?php if ($this->_run_modifier("ad_del", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鍒犻櫎鍥剧墖閾炬帴
</label>
</li>
<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="ad_category" <?php if ($this->_run_modifier("ad_category", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />鍥剧墖閾炬帴绠＄悊
</label>
</li>
<!-- -->
<li class="clear" style="list-style:none; display:none"></li>
</ul>	
</td>
  </tr>
      </table>


	  	<table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >
        <tr>
          <td height="25" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed; padding-left:20px;"><strong>缃戠珯閰嶇疆锛�</strong></td>
        </tr>
        <tr>
          <td  bgcolor="#FFFFFF" style="  padding-left:14px;">
		  <ul style="margin:0px; padding:3px; list-style:none">
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="site_set" <?php if ($this->_run_modifier("site_set", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />缃戠珯閰嶇疆 
</label>
</li>

<!-- -->
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="site_mail" <?php if ($this->_run_modifier("site_mail", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />閭欢閰嶇疆
</label>
</li>


<!--&lt;!&ndash; &ndash;&gt;
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="site_page" <?php if ($this->_run_modifier("site_page", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />椤甸潰绠＄悊
</label>
</li>
&lt;!&ndash; &ndash;&gt;
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="site_navigation" <?php if ($this->_run_modifier("site_navigation", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />瀵艰埅璁剧疆 
</label>
</li>
<li  class="user_box_li">
<label>
<input name="purview[]" type="checkbox"  value="site_category" <?php if ($this->_run_modifier("site_category", 'in_array', 'PHP', 1, $this->_vars['admin_set'])): ?>checked="checked"<?php endif; ?> />绯荤粺鍒嗙被璁剧疆  
</label>
</li>-->


<li class="clear" style="list-style:none; display:none"></li>
</ul>	
</td>
  </tr>
      </table>

	                    <table width="100%" border="0" cellpadding="4" cellspacing="0" bgcolor="#FFFFFF"  >

                          <tr>
                            <td height="50" bgcolor="#FFFFFF" style=" border-top:1px #CCCCCC dashed; padding-left:20px;">
							<?php if ($this->_vars['admin_purview'] == "all"): ?>
							<input name="id" type="hidden" value="<?php echo $this->_vars['account']['admin_id']; ?>
" />
                              <input name="submit3" type="submit" class="admin_submit"    value="淇敼"/>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <?php endif; ?>
                              <input name="submit222" type="button" class="admin_submit"    value="杩斿洖" onclick="Javascript:window.history.go(-1)"/>
                                   </td>
                          </tr>
                        </table>
    </form>
  <?php endif; ?> 
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>