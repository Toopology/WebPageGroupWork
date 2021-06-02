<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:17 �й���׼ʱ�� */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<!--<link rel="shortcut icon" href="<?php echo $this->_vars['QISHI']['site_dir']; ?>
favicon.ico" />-->
<title>网站后台管理中心</title>
<link href="css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
function imgcaptcha(inputID,imgdiv)
{
	$(inputID).focus(function(){
		if ($(inputID).val()=="点击获取验证码")
		{
		$(inputID).val("");
		$(inputID).css("color","#333333");
		}
		$(inputID).parent("div").css("position","relative");
		//设置验证码DIV
		$(imgdiv).css({ position: "absolute", left:  $(inputID).width(), "bottom": "0px" , "z-index": "10", "background-color": "#FFFFFF", "border": "1px #A3C8DC solid","display": "none","margin-left": "15px"});
		$(imgdiv).show();
		if ($(imgdiv).html()=='')
		{
		$(imgdiv).append("<img src=\"../include/imagecaptcha.php?t=<?php echo $this->_vars['random']; ?>
\" id=\"getcode\" align=\"absmiddle\"  style=\"cursor:pointer; margin:3px;\" title=\"看不请验证码？点击更换一张\"  border=\"0\"/>");
		}
		$(imgdiv+" img").click(function()
		{
			$(imgdiv+" img").attr("src",$(imgdiv+" img").attr("src")+"1");
		});
		$(document).unbind().click(function(event)
		{
			var clickid=$(event.target).attr("id");
			if (clickid!="getcode" &&  clickid!="postcaptcha")
			{
			$(imgdiv).hide();
			$(inputID).parent("div").css("position","");
			$(document).unbind();
			}
		});
	});
}
imgcaptcha("#postcaptcha","#imgdiv");
});
</script>
</head>
<body>
<div class="login_top" ></div>
  <form id="form1" name="form1" method="post" action="login.php">
  <!--<?php echo $this->_vars['inputtoken']; ?>
-->
    <table width="530" border="0" align="center" cellpadding="0" cellspacing="0"  class="link_lan">
      <tr>
        <td valign="top"><table width="230" border="0"  >
            <tr>
                <td><img src="images/login_logo.png" /></td>
            </tr>

        </table></td>
        <td width="300"><table width="100%" border="0" cellpadding="0" cellspacing="4">
          <tr>
            <td width="75" height="26" align="right">用户名：</td>
            <td ><input name="admin_name" type="text" maxlength="16" id="admin_name"  class="login_box_input"/></td>
          </tr>
          <tr>
            <td height="26" align="right">密&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
            <td ><input name="admin_pwd" type="password" id="admin_pwd" value="" class="login_box_input"/></td>
          </tr>
			<?php if ($this->_vars['verify_adminlogin'] == "1"): ?>
          <tr>
            <td height="26" align="right">验证码：</td>
            <td>
			<div>
			<input  class="login_box_input" name="postcaptcha" id="postcaptcha" type="text" value="点击获取验证码" style="color:#999999" />
			<div id="imgdiv"></div>
			</div>

			   </td>
          </tr>
			<?php endif; ?>
          <tr>
            <td height="30">&nbsp;</td>
            <td >
			<div style="position:relative; padding-bottom:5px; padding-top:5px;">
			<input class="login_box_rig_an" type="submit" name="Submit" value="登录" />&nbsp;&nbsp;&nbsp;&nbsp;<label>
              <input name="rememberme" class="login_box_rememberme"   type="checkbox" id="rememberme" value="1" />
记住我</label></div>
<input type="hidden" name="act" value="do_login" />

</td>
          </tr>
		  <?php if ($_GET['err']): ?>
          <tr>
            <td height="30">&nbsp;</td>
            <td  >
			<div style="border:1px #FF6600 solid; font-size:12px; color:#FF3300; background-color:#FFFFCC; padding:5px; width:150px; text-align:center"><?php echo $_GET['err']; ?>
</div>
			</td>
          </tr>
		  <?php endif; ?>
        </table></td>
      </tr>
    </table>
  </form>
<script language ="javascript">
function init(){
var ctrl=document.getElementById("admin_name");
ctrl.focus();
}
init();
</script>
</body>
</html>
