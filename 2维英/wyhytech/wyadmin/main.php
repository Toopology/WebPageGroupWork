<?php
/*
* 管理中心首页
*/
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
$act=!empty($_REQUEST['act']) ? trim($_REQUEST['act']) : '';

if($act=='')
{
	$smarty->display('sys/admin_index.htm');
}
elseif($act=='top')
{

	$admininfo=get_admin_one($_SESSION['admin_name']);
	$smarty->assign('admin_rank', $admininfo['rank']);
	$smarty->assign('admin_name', $_SESSION['admin_name']);
	$smarty->display('sys/admin_top.htm');
}
elseif($act=='left')
{

	$smarty->display('sys/admin_left.htm');
}
elseif($act == 'main')
{
	$admin_register_globals=ini_get('register_globals')?'您的php.ini中register_globals为On，强烈建议你设为Off，否则将会出现严重的安全隐患和数据错乱！':null;
	$system_info = array();

	$system_info['os'] = PHP_OS;
	$system_info['web_server'] = $_SERVER['SERVER_SOFTWARE'];
	$system_info['php_ver'] = PHP_VERSION;
	$system_info['mysql_ver'] = $db->dbversion();
	$system_info['max_filesize'] = ini_get('upload_max_filesize');
	$smarty->assign('site_domain',$_SERVER['SERVER_NAME']);
	$smarty->assign('system_info',$system_info);
	$smarty->assign('random',mt_rand());
	$smarty->assign('admin_register_globals',$admin_register_globals);
	$smarty->assign('pageheader',"管理中心 - 后台管理首页");
	$smarty->display('sys/admin_main.htm');
}
?>