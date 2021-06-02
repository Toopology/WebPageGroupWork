<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-11-01 17:00 CST */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
 
	$(":radio[name='urltype']").click(function(){
ckurltype();
	})
	ckurltype();
	function ckurltype()
	{
		if ($(":radio[name='urltype'][checked]").val()=="0")
	{
		$(".sys").show();
		$(".http").hide();
	}
	else
	{
		$(".sys").hide();
		$(".http").show();
	}
 
	}
})
</script>
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
如果是本站的网址，可缩写为与根目录相对地址，如 index.php<br />
</p>
</div>
<div class="toptit">修改</div>
  <form action="?act=site_navigation_edit_save" method="post"   name="FormData" id="FormData">
  <?php echo $this->_vars['inputtoken']; ?>

<table border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
		<tr>
            <td width="100" align="right">类型：</td>
            <td><label>
            <input name="urltype" type="radio" value="0"     <?php if ($this->_vars['show']['urltype'] == "0"): ?>checked="checked"<?php endif; ?>/>
系统内容</label>
&nbsp;&nbsp;&nbsp;&nbsp;
<label>
<input name="urltype" type="radio" value="1"    <?php if ($this->_vars['show']['urltype'] == "1"): ?>checked="checked"<?php endif; ?> />
其他链接</label></td>
		</tr>
          <tr>
            <td width="100" align="right">栏目名称(必填)：</td>
            <td><input name="title" type="text"  class="input_text_200" id="title" value="<?php echo $this->_vars['show']['title']; ?>
" maxlength="30"/></td>
          </tr>
          <tr class="http">
            <td align="right">链接地址：</td>
            <td><input name="url" type="text"  class="input_text_200" id="url" value="<?php echo $this->_vars['show']['url']; ?>
" maxlength="180"/>
     </td>
          </tr>
		  <tr  class="sys">
            <td align="right">系统内容：</td>
            <td>
			<select name="systemalias" style="width:205px; font-size:12px;"  onchange="selChangesystemalias(this.value)">
			 <?php if (count((array)$this->_vars['syspage'])): foreach ((array)$this->_vars['syspage'] as $this->_vars['systemalias']): ?>
			  <option value="<?php echo $this->_vars['systemalias']['alias']; ?>
,<?php echo $this->_vars['systemalias']['tag']; ?>
"  <?php if ($this->_vars['show']['pagealias'] == $this->_vars['systemalias']['alias']): ?>selected="selected"<?php endif; ?>><?php echo $this->_vars['systemalias']['pname']; ?>
</option>
			  <?php endforeach; endif; ?>

			</select>
			</td>
          </tr>
		  <tr  class="sys">
            <td align="right">链接页面：</td>
            <td><input name="pagealias" type="text" value="<?php echo $this->_vars['show']['pagealias']; ?>
" class="input_text_200" /></td>
          </tr>
		   <tr  class="sys">
            <td align="right">分类ID：</td>
            <td><input name="list_id" type="text" value="<?php echo $this->_vars['show']['list_id']; ?>
" class="input_text_200" /> 如该栏目为信息列表页则需要填写分类ID</td>
          </tr>
		  <tr >
            <td align="right">类别：</td>
            <td>
			<?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
			<label>
              <input name="alias" type="radio" value="<?php echo $this->_vars['list']['alias']; ?>
" <?php if ($this->_vars['show']['alias'] == $this->_vars['list']['alias']): ?> checked="checked" <?php endif; ?>/>
              <?php echo $this->_vars['list']['categoryname']; ?>
</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
			   <?php endforeach; endif; ?>
			</td>
          </tr>
          <tr>
            <td align="right">打开方式：</td>
            <td><label>
              <input name="target" type="radio" value="_blank"   <?php if ($this->_vars['show']['target'] == "_blank"): ?>checked="checked"<?php endif; ?> />
              新窗口</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                <input name="target" type="radio" value="_self" <?php if ($this->_vars['show']['target'] == "_self"): ?>checked="checked"<?php endif; ?>>
                当前窗口</label></td>
          </tr>
          <tr>
            <td align="right">显示顺序：</td>
            <td><input name="navigationorder" type="text"  class="input_text_200" id="navigationorder" value="<?php echo $this->_vars['show']['navigationorder']; ?>
" maxlength="3"   />
			 </td>
          </tr>
          <tr>
            <td align="right">是否显示：</td>
            <td><label>
              <input name="display" type="radio" value="1"  <?php if ($this->_vars['show']['display'] == "1"): ?>checked="checked"<?php endif; ?>/>
              显示</label>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                <input name="display" type="radio" value="0" <?php if ($this->_vars['show']['display'] == "0"): ?>checked="checked"<?php endif; ?>>
                隐藏</label>            </td>
          </tr>
		       <tr>
            <td align="right">显示颜色：</td>
            <td>
			<div class="color_layer">	
			<input type="text" name="tit_color" id="tit_color"  style="display:none">
			<div id="color_box" onclick="color_box_display()" ></div>
			<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_select_color.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
			  </div>
			</td>
          </tr>
		  <tr>
            <td align="right">导航关联标记：</td>
            <td>
 <input name="tag" type="text"  class="input_text_200" id="tag" value="<?php echo $this->_vars['show']['tag']; ?>
" maxlength="30"/>
			</td>
          </tr>
          <tr>
            <td align="right"><input name="id" type="hidden" id="id"  value="<?php echo $this->_vars['show']['id']; ?>
"/></td>
            <td height="80">
			<input type="submit" name="Submit3" value="确定提交" class="admin_submit"   />
<input name="submit222" type="button" class="admin_submit"    value="返 回" onclick="Javascript:window.history.go(-1)"/>
</td>
          </tr>
        </table>
  </form>
</div>
<script>
/////---------------------------------
function selChangesystemalias(obj)
{
var str=obj.split(",");
//alert (str[0]);
document.getElementById("pagealias").value=str[0];
document.getElementById("tag").value=str[1];
//alert(obj);
}
//selChangesystemalias("<?php echo $this->_vars['show']['pagealias']; ?>
,<?php echo $this->_vars['show']['tag']; ?>
");
//////-----
</script>
<script type="text/javascript" >
var rgb="<?php echo $this->_vars['show']['color']; ?>
";
document.FormData.tit_color.value= rgb;
document.getElementById('tit_color').style.background=rgb;
if (rgb)
{
document.getElementById('color_box').style.background=rgb;
}
</script>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>