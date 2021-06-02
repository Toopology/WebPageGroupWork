<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:17 中国标准时间 */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<link rel="shortcut icon" href="<?php echo $this->_vars['SYS']['site_dir']; ?>
favicon.ico" />
	<title> </title>
	<link href="css/common.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$(".admin_top_nav>a").click(function(){
				$(".admin_top_nav>a").removeClass("select");
				$(this).addClass("select");
				$(this).blur();
				window.parent.frames["leftFrame"].location.href =  "admin_left.php?act="+$(this).attr("id");
			})
		})
	</script>
</head>
<body>
<div class="admin_top_bg">
	<table width="980" height="70" border="0" cellpadding="0" cellspacing="0">
		<tr><td width="200" rowspan="2" align="right" valign="middle" ><div><span style="width: 160px;text-align:left;height:25px;line-height: 25px;display: block;font-size: 20px;">缃戠珯鍚庡彴绠＄悊</span></div>
		</td>
			<td height="39" align="right" valign="middle" class="link_w">
				<?php if ($this->_vars['QISHI']['subsite'] == "1" && $this->_vars['QISHI']['subsite_id'] != "0"): ?>
				<span style="color:#FFFF00">[<?php echo $this->_vars['QISHI']['subsite_districtname']; ?>
绔欑鐞嗗钩鍙癩</span>&nbsp;&nbsp;&nbsp;&nbsp;
				<?php endif; ?>
				娆㈣繋<?php echo $this->_vars['admin_rank']; ?>
锛�<strong style="color: #99FF00"><?php echo $this->_vars['admin_name']; ?>
</strong>&nbsp; 鐧诲綍&nbsp;&nbsp;&nbsp;&nbsp;  <a href="login.php?act=logout" target="_top">[閫�鍑篯</a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <a href="../" target="_blank">缃戠珯棣栭〉</a> </td>
		</tr>
		<tr>
			<td height="31" valign="bottom" class="admin_top_nav">
				<a href="main.php?act=main" class="select" target="mainFrame" id="index">棣栭〉</a>
				<a href="admin_products.php" target="mainFrame" id="products">浜у搧涓績</a>
				<a href="admin_solution.php" target="mainFrame" id="solution">瑙ｅ喅鏂规</a>
				<a href="admin_technical.php" target="mainFrame" id="technical">鎶�鏈敮鎸�</a>
				<a href="admin_about.php" target="mainFrame" id="about">鍏充簬鎴戜滑</a>
				<a href="admin_contact.php" target="mainFrame" id="contact">鑱旂郴鎴戜滑</a>
				<a href="admin_ad.php?act=list" target="mainFrame" id="ad">鍥剧墖閾炬帴绠＄悊</a>
				<a href="admin_users.php" target="mainFrame" id="users">绠＄悊鍛�</a>
				<a href="admin_set.php" target="mainFrame" id="set">绯荤粺</a>
				<div class="clear"></div>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
