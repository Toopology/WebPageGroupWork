<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 14:17 �й���׼ʱ�� */ ?>

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
		<tr><td width="200" rowspan="2" align="right" valign="middle" ><div><span style="width: 160px;text-align:left;height:25px;line-height: 25px;display: block;font-size: 20px;">网站后台管理</span></div>
		</td>
			<td height="39" align="right" valign="middle" class="link_w">
				<?php if ($this->_vars['QISHI']['subsite'] == "1" && $this->_vars['QISHI']['subsite_id'] != "0"): ?>
				<span style="color:#FFFF00">[<?php echo $this->_vars['QISHI']['subsite_districtname']; ?>
站管理平台]</span>&nbsp;&nbsp;&nbsp;&nbsp;
				<?php endif; ?>
				欢迎<?php echo $this->_vars['admin_rank']; ?>
：<strong style="color: #99FF00"><?php echo $this->_vars['admin_name']; ?>
</strong>&nbsp; 登录&nbsp;&nbsp;&nbsp;&nbsp;  <a href="login.php?act=logout" target="_top">[退出]</a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <a href="../" target="_blank">网站首页</a> </td>
		</tr>
		<tr>
			<td height="31" valign="bottom" class="admin_top_nav">
				<a href="main.php?act=main" class="select" target="mainFrame" id="index">首页</a>
				<a href="admin_products.php" target="mainFrame" id="products">产品中心</a>
				<a href="admin_solution.php" target="mainFrame" id="solution">解决方案</a>
				<a href="admin_technical.php" target="mainFrame" id="technical">技术支持</a>
				<a href="admin_about.php" target="mainFrame" id="about">关于我们</a>
				<a href="admin_contact.php" target="mainFrame" id="contact">联系我们</a>
				<a href="admin_ad.php?act=list" target="mainFrame" id="ad">图片链接管理</a>
				<a href="admin_users.php" target="mainFrame" id="users">管理员</a>
				<a href="admin_set.php" target="mainFrame" id="set">系统</a>
				<div class="clear"></div>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
