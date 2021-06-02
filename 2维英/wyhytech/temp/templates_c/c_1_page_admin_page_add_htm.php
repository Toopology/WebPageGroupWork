<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-17 13:12 �й���׼ʱ�� */ ?>

<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div class="admin_main_nr_dbox">
<script>
function isdisplay(i)     
{      
if(document.getElementById(i).style.display=="")     
{     
 document.getElementById(i).style.display="none";     
}     
else     
{     
document.getElementById(i).style.display="";     
  
}     
 }
</script>
 <div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("page/admin_page_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>提示：</h2>
	<p>
在设置以下内容时，路径均是以网站安装目录为基础的路径。<br />
          若设置了伪静态，同时请在服务器伪静态规则文件中增加对应规则。<br />
          若设置了HTML生成，请设置对应文件夹读写权限。</p>
</div>
<div class="toptit">基础设置</div>
  <form action="?act=add_page_save" method="post"   name="form1" id="form1">
  <?php echo $this->_vars['inputtoken']; ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td style=" line-height:220%; color:#666666;"><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
            <tr>
              <td width="150" align="right">页面类型：</td>
              <td> 自定义页面</td>
            </tr>
            <tr>
              <td width="150" align="right">调用ID：</td>
              <td><input name="alias" type="text"  class="input_text_200" id="alias" value="" maxlength="30">
			  自定义页面调用名称不可以用 "QS_" 开头
			  </td>
            </tr>
            <tr>
              <td width="150" align="right">页面名称：</td>
              <td><input name="pname" type="text"  class="input_text_200" id="title" value="" maxlength="60"></td>
            </tr>
            <tr>
              <td width="150" align="right">导航关联标记：</td>
              <td><input name="tag" type="text"  class="input_text_200" id="tag" value="" maxlength="60"></td>
            </tr>
            <tr>
              <td align="right">链接优化：</td>
              <td><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="120"><label >
                      <input name="url" type="radio" value="0" checked="checked"  />
                      原始链接 </label></td>
                    <td width="120"><label >
                      <input type="radio" name="url" value="2"   />
                      生成HTML</label></td>
                    <td><label >
                      <input type="radio" name="url" value="1"  />
                      伪静态</label></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="right">页面类型：</td>
              <td><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="120"><label >
                      <input name="pagetpye" type="radio" value="1" checked="checked"  onclick="show_seo('seo');"/>
                      首页或频道首页 </label></td>
                    <td width="120"><label >
                      <input type="radio" name="pagetpye" value="2"    onclick="show_seo('seo');"/>
                      信息列表页 </label>
                    </td>
                    <td><label >
                      <input type="radio" name="pagetpye" value="3"   onclick="show_seo('seo');" />
                      信息内容页</label></td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
	  </table>
	  <div class="toptit">页面设置</div>
	  <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td  ><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
            <tr>
              <td width="150" align="right">文件路径：</td>
              <td width="210"><input name="file" type="text"  class="input_text_200" id="file" value="" maxlength="80"/></td>
              <td><span style="color:#666666">(系统会自动生成此文件)</span>&nbsp;</td>
            </tr>
            <tr>
              <td width="150" align="right">模板路径：</td>
              <td><input name="tpl" type="text"  class="input_text_200" id="tpl" value="" maxlength="80"/></td>
              <td><span style="color:#666666">(添加后请增加此模板，否则页面无法访问)</span>&nbsp;</td>
            </tr>
            <tr>
              <td width="150" align="right">伪静态规则：</td>
              <td><input name="rewrite" type="text"  class="input_text_200" id="rewrite" value="" maxlength="80"/></td>
              <td><span style="color:#666666">(增加后请在服务器伪静态配置文件增加对应规则)</span>&nbsp;</td>
            </tr>
            <tr>
              <td align="right"><a href="javascript:isdisplay('html_help');">(?)</a>&nbsp;&nbsp;生成HTML规则：</td>
              <td><input name="html" type="text"  class="input_text_200" id="html" value="" maxlength="80"/></td>
              <td><span style="color:#666666">
                <label>
                <input name="mkdir" type="checkbox" value="y" checked="checked" />
                如果目录不存在则自动建立</label>
              </span></td>
            </tr>
            <tr>
              <td align="right"><a  href="javascript:isdisplay('caching_help')" >(?)</a>&nbsp;&nbsp;缓存时间：</td>
              <td><input name="caching" type="text"  class="input_text_200" id="caching" value="0" maxlength="30"/></td>
              <td>分钟 <span style="color:#666666">(0为不缓存) </span></td>
            </tr>
          </table>
            <table width="100%" border="0" cellpadding="0" style="line-height:180%; padding-left:15px; display:none" id="caching_help">
              <tr>
                <td><span style="color:#666666"> <strong style="color:#003399">缓存说明</strong><br />
                  缓存是当查询数据时，会把结果序列化后保存到文件中，以后同样的查询就不用查询数据库，而是从缓存中获得。这一改进使得程序速度得以太幅度提升。<br />
                  缓存时间是缓存重新加载周期，周期越长，数据库的负荷越小，缓存周期假设为50秒，则每50秒刷新缓存一次。</span><br /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellpadding="0" style="line-height:180%; padding-left:15px; display:none" id="html_help">
              <tr>
                <td><span style="color:#666666"> <strong  style="color:#003399">生成HTML说明</strong><br />
                  UNIX需设置对应文件夹权限<br />
                  如设置为：空，则生成路径为：<?php echo $this->_vars['QISHI']['site_dir']; ?>
index.html<br />
                  如设置为：123.html，则生成路径为：<?php echo $this->_vars['QISHI']['site_dir']; ?>
123.html<br />
                  如设置为：news/，则生成路径为：<?php echo $this->_vars['QISHI']['site_dir']; ?>
news/index.html<br />
                  如设置为：news/abc.html，则生成路径为：<?php echo $this->_vars['QISHI']['site_dir']; ?>
news/abc.html<br />
                  各个页面生成路径不能重复，否则生成HTML后将会被覆盖。</span></td>
              </tr>
          </table></td>
      </tr>
    </table>
	<div id="seo">
	<div class="toptit">搜索引擎优化(SEO)</div>
	  <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
  
      <tr>
        <td style=" line-height:220%; color:#666666;"><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
		<tr>
              <td width="150" align="right">可用标签：</td>
              <td>
			    <div id="{sitename}" class="sellabel">网站名称</div>
				<div id="{domain}" class="sellabel">网站域名</div>
				<div id="{district}" class="sellabel">地区(仅在分站模式下有效)</div>
				<div class="clear"></div>
				</td>
            </tr>
            <tr>
              <td width="150" align="right">title：</td>
              <td><input name="title" type="text"  class="input_text_400" id="labtitle" value="" /></td>
            </tr>
            <tr>
              <td width="150" align="right">keywords：</td>
              <td><textarea name="keywords" class="input_text_400" id="labkeywords" style="height:60px;"></textarea></td>
            </tr>
            <tr>
              <td width="150" align="right">description：</td>
              <td><textarea name="description" class="input_text_400" id="labdescription" style="height:60px;"></textarea></td>
            </tr>
        </table></td>
      </tr>
    </table>
	</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td height="80"  style=" padding-left:170px;"  >
		<input type="submit" name="Submi1t2" value="添加" class="admin_submit"   />
 
          <input name="submit222" type="button" class="admin_submit"    value="返 回" onclick="location.href='?'"/>
        </td>
      </tr>
    </table>
	
  </form>
</div>
<script>
//获取单选的值
function radios_val(val)
    {
        var radios=document.getElementsByName(val);
        for(var i=0;i<radios.length;i++)
        {
            if(radios[i].checked==true)
            {
			return radios[i].value;
            break;
            }
        }
    }
show_seo("seo");
function show_seo(showid)
{
var caching_val=radios_val("pagetpye");
if (caching_val=="1")
{
 document.getElementById(showid).style.display="";   
}
else
{
document.getElementById(showid).style.display="none";   
}
}
</script>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript" src="js/jquery.caretInsert.js"></script>
<script language="JavaScript" type="text/javascript"> 
(function($)
{
	$(".sellabel").hover(function(){$(this).css("background-color","#ffffff");},function()	{$(this).css("background-color","#F4FAFF");});
	$("#labtitle").unbind().focus(function() {
		$('#labtitle').setCaret();
		 $('.sellabel').unbind("click").click(function(){ 
			 $('#labtitle').insertAtCaret($(this).attr("id"));
		 });
	});
	$("#labkeywords").unbind().focus(function() {
		$('#labkeywords').setCaret();
		 $('.sellabel').unbind("click").click(function(){ 
			 $('#labkeywords').insertAtCaret($(this).attr("id"));
		 });
	});
	$("#labdescription").unbind().focus(function() {
		$('#labdescription').setCaret();
		 $('.sellabel').unbind("click").click(function(){ 
			 $('#labdescription').insertAtCaret($(this).attr("id"));
		 });
	}); 
})($);   
</script>
</body>
</html>