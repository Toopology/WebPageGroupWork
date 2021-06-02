<?php
/*
* 系统设置
* ============================================================================
*/
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
$act = !empty($_GET['act']) ? trim($_GET['act']) : 'set';
check_permissions($_SESSION['admin_purview'],"site_set");
$smarty->assign('pageheader',"网站配置");
if($act == 'set')
{
	get_token();
	$smarty->assign('rand',rand(1,100));
	$smarty->assign('upfiles_dir',$upfiles_dir);
	$smarty->assign('config',get_cache('config'));
	$smarty->assign('navlabel',"set");
	$smarty->display('set/admin_set_config.htm');
}
elseif($act == 'site_setsave')
{
	check_token();
	/*require_once(ADMIN_ROOT_PATH.'include/upload.php');
	if($_FILES['web_logo']['name'])
	{
		$web_logo=_asUpFiles($upfiles_dir, "web_logo", 1024*2, 'jpg/gif/png',"logo");
		!$db->query("UPDATE ".table('config')." SET value='$web_logo' WHERE name='web_logo'")?adminmsg('更新站点设置失败', 1):"";
	}*/
	foreach($_POST as $k => $v)
	{
		!$db->query("UPDATE ".table('config')." SET value='{$v}' WHERE name='{$k}'")?adminmsg('更新站点设置失败', 1):"";
	}
	refresh_cache('config');
	adminmsg("保存成功！",2);
}
elseif($act == 'map')
{
	get_token();
	$smarty->assign('config',$_CFG);
	$smarty->assign('navlabel',"map");
	$smarty->display('set/admin_set_map.htm');
}
elseif($act == 'agreement')
{
	get_token();
	$smarty->assign('config',$_CFG);
	$smarty->assign('text',get_cache('text'));
	$smarty->assign('navlabel',"agreement");
	$smarty->display('set/admin_set_agreement.htm');
}
elseif($act == 'set_save')
{
	check_token();
	check_permissions($_SESSION['admin_purview'],"mb_set");
	foreach($_POST as $k => $v)
	{
		!$db->query("UPDATE ".table('config')." SET value='{$v}' WHERE name='{$k}'")?adminmsg('更新设置失败', 1):"";
	}
	foreach($_POST as $k => $v)
	{
		!$db->query("UPDATE ".table('text')." SET value='{$v}' WHERE name='{$k}'")?adminmsg('更新设置失败', 1):"";
	}
	refresh_cache('config');
	refresh_cache('text');
	adminmsg("保存成功！",2);
}
?>