<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-17 13:12 中国标准时间 */ ?>

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
	<h2>鎻愮ず锛�</h2>
	<p>
鍦ㄨ缃互涓嬪唴瀹规椂锛岃矾寰勫潎鏄互缃戠珯瀹夎鐩綍涓哄熀纭�鐨勮矾寰勩��<br />
          鑻ヨ缃簡浼潤鎬侊紝鍚屾椂璇峰湪鏈嶅姟鍣ㄤ吉闈欐�佽鍒欐枃浠朵腑澧炲姞瀵瑰簲瑙勫垯銆�<br />
          鑻ヨ缃簡HTML鐢熸垚锛岃璁剧疆瀵瑰簲鏂囦欢澶硅鍐欐潈闄愩��</p>
</div>
<div class="toptit">鍩虹璁剧疆</div>
  <form action="?act=add_page_save" method="post"   name="form1" id="form1">
  <?php echo $this->_vars['inputtoken']; ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td style=" line-height:220%; color:#666666;"><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
            <tr>
              <td width="150" align="right">椤甸潰绫诲瀷锛�</td>
              <td> 鑷畾涔夐〉闈�</td>
            </tr>
            <tr>
              <td width="150" align="right">璋冪敤ID锛�</td>
              <td><input name="alias" type="text"  class="input_text_200" id="alias" value="" maxlength="30">
			  鑷畾涔夐〉闈㈣皟鐢ㄥ悕绉颁笉鍙互鐢� "QS_" 寮�澶�
			  </td>
            </tr>
            <tr>
              <td width="150" align="right">椤甸潰鍚嶇О锛�</td>
              <td><input name="pname" type="text"  class="input_text_200" id="title" value="" maxlength="60"></td>
            </tr>
            <tr>
              <td width="150" align="right">瀵艰埅鍏宠仈鏍囪锛�</td>
              <td><input name="tag" type="text"  class="input_text_200" id="tag" value="" maxlength="60"></td>
            </tr>
            <tr>
              <td align="right">閾炬帴浼樺寲锛�</td>
              <td><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="120"><label >
                      <input name="url" type="radio" value="0" checked="checked"  />
                      鍘熷閾炬帴 </label></td>
                    <td width="120"><label >
                      <input type="radio" name="url" value="2"   />
                      鐢熸垚HTML</label></td>
                    <td><label >
                      <input type="radio" name="url" value="1"  />
                      浼潤鎬�</label></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="right">椤甸潰绫诲瀷锛�</td>
              <td><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="120"><label >
                      <input name="pagetpye" type="radio" value="1" checked="checked"  onclick="show_seo('seo');"/>
                      棣栭〉鎴栭閬撻椤� </label></td>
                    <td width="120"><label >
                      <input type="radio" name="pagetpye" value="2"    onclick="show_seo('seo');"/>
                      淇℃伅鍒楄〃椤� </label>
                    </td>
                    <td><label >
                      <input type="radio" name="pagetpye" value="3"   onclick="show_seo('seo');" />
                      淇℃伅鍐呭椤�</label></td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
	  </table>
	  <div class="toptit">椤甸潰璁剧疆</div>
	  <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td  ><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
            <tr>
              <td width="150" align="right">鏂囦欢璺緞锛�</td>
              <td width="210"><input name="file" type="text"  class="input_text_200" id="file" value="" maxlength="80"/></td>
              <td><span style="color:#666666">(绯荤粺浼氳嚜鍔ㄧ敓鎴愭鏂囦欢)</span>&nbsp;</td>
            </tr>
            <tr>
              <td width="150" align="right">妯℃澘璺緞锛�</td>
              <td><input name="tpl" type="text"  class="input_text_200" id="tpl" value="" maxlength="80"/></td>
              <td><span style="color:#666666">(娣诲姞鍚庤澧炲姞姝ゆā鏉匡紝鍚﹀垯椤甸潰鏃犳硶璁块棶)</span>&nbsp;</td>
            </tr>
            <tr>
              <td width="150" align="right">浼潤鎬佽鍒欙細</td>
              <td><input name="rewrite" type="text"  class="input_text_200" id="rewrite" value="" maxlength="80"/></td>
              <td><span style="color:#666666">(澧炲姞鍚庤鍦ㄦ湇鍔″櫒浼潤鎬侀厤缃枃浠跺鍔犲搴旇鍒�)</span>&nbsp;</td>
            </tr>
            <tr>
              <td align="right"><a href="javascript:isdisplay('html_help');">(?)</a>&nbsp;&nbsp;鐢熸垚HTML瑙勫垯锛�</td>
              <td><input name="html" type="text"  class="input_text_200" id="html" value="" maxlength="80"/></td>
              <td><span style="color:#666666">
                <label>
                <input name="mkdir" type="checkbox" value="y" checked="checked" />
                濡傛灉鐩綍涓嶅瓨鍦ㄥ垯鑷姩寤虹珛</label>
              </span></td>
            </tr>
            <tr>
              <td align="right"><a  href="javascript:isdisplay('caching_help')" >(?)</a>&nbsp;&nbsp;缂撳瓨鏃堕棿锛�</td>
              <td><input name="caching" type="text"  class="input_text_200" id="caching" value="0" maxlength="30"/></td>
              <td>鍒嗛挓 <span style="color:#666666">(0涓轰笉缂撳瓨) </span></td>
            </tr>
          </table>
            <table width="100%" border="0" cellpadding="0" style="line-height:180%; padding-left:15px; display:none" id="caching_help">
              <tr>
                <td><span style="color:#666666"> <strong style="color:#003399">缂撳瓨璇存槑</strong><br />
                  缂撳瓨鏄綋鏌ヨ鏁版嵁鏃讹紝浼氭妸缁撴灉搴忓垪鍖栧悗淇濆瓨鍒版枃浠朵腑锛屼互鍚庡悓鏍风殑鏌ヨ灏变笉鐢ㄦ煡璇㈡暟鎹簱锛岃�屾槸浠庣紦瀛樹腑鑾峰緱銆傝繖涓�鏀硅繘浣垮緱绋嬪簭閫熷害寰椾互澶箙搴︽彁鍗囥��<br />
                  缂撳瓨鏃堕棿鏄紦瀛橀噸鏂板姞杞藉懆鏈燂紝鍛ㄦ湡瓒婇暱锛屾暟鎹簱鐨勮礋鑽疯秺灏忥紝缂撳瓨鍛ㄦ湡鍋囪涓�50绉掞紝鍒欐瘡50绉掑埛鏂扮紦瀛樹竴娆°��</span><br /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellpadding="0" style="line-height:180%; padding-left:15px; display:none" id="html_help">
              <tr>
                <td><span style="color:#666666"> <strong  style="color:#003399">鐢熸垚HTML璇存槑</strong><br />
                  UNIX闇�璁剧疆瀵瑰簲鏂囦欢澶规潈闄�<br />
                  濡傝缃负锛氱┖锛屽垯鐢熸垚璺緞涓猴細<?php echo $this->_vars['QISHI']['site_dir']; ?>
index.html<br />
                  濡傝缃负锛�123.html锛屽垯鐢熸垚璺緞涓猴細<?php echo $this->_vars['QISHI']['site_dir']; ?>
123.html<br />
                  濡傝缃负锛歯ews/锛屽垯鐢熸垚璺緞涓猴細<?php echo $this->_vars['QISHI']['site_dir']; ?>
news/index.html<br />
                  濡傝缃负锛歯ews/abc.html锛屽垯鐢熸垚璺緞涓猴細<?php echo $this->_vars['QISHI']['site_dir']; ?>
news/abc.html<br />
                  鍚勪釜椤甸潰鐢熸垚璺緞涓嶈兘閲嶅锛屽惁鍒欑敓鎴怘TML鍚庡皢浼氳瑕嗙洊銆�</span></td>
              </tr>
          </table></td>
      </tr>
    </table>
	<div id="seo">
	<div class="toptit">鎼滅储寮曟搸浼樺寲(SEO)</div>
	  <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
  
      <tr>
        <td style=" line-height:220%; color:#666666;"><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
		<tr>
              <td width="150" align="right">鍙敤鏍囩锛�</td>
              <td>
			    <div id="{sitename}" class="sellabel">缃戠珯鍚嶇О</div>
				<div id="{domain}" class="sellabel">缃戠珯鍩熷悕</div>
				<div id="{district}" class="sellabel">鍦板尯(浠呭湪鍒嗙珯妯″紡涓嬫湁鏁�)</div>
				<div class="clear"></div>
				</td>
            </tr>
            <tr>
              <td width="150" align="right">title锛�</td>
              <td><input name="title" type="text"  class="input_text_400" id="labtitle" value="" /></td>
            </tr>
            <tr>
              <td width="150" align="right">keywords锛�</td>
              <td><textarea name="keywords" class="input_text_400" id="labkeywords" style="height:60px;"></textarea></td>
            </tr>
            <tr>
              <td width="150" align="right">description锛�</td>
              <td><textarea name="description" class="input_text_400" id="labdescription" style="height:60px;"></textarea></td>
            </tr>
        </table></td>
      </tr>
    </table>
	</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td height="80"  style=" padding-left:170px;"  >
		<input type="submit" name="Submi1t2" value="娣诲姞" class="admin_submit"   />
 
          <input name="submit222" type="button" class="admin_submit"    value="杩� 鍥�" onclick="location.href='?'"/>
        </td>
      </tr>
    </table>
	
  </form>
</div>
<script>
//鑾峰彇鍗曢�夌殑鍊�
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