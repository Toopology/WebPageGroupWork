<?php
/*
* 共用配置文件
*/
session_start();
define('ROOT_PATH',dirname(dirname(__FILE__)).'/');
error_reporting(E_ERROR);
require_once(ROOT_PATH.'configs/config.php');
header("Content-Type:text/html;charset=".SYS_CHARSET);
require_once(ROOT_PATH.'include/common.fun.php');
$QSstarttime=exectime();
if (!empty($_GET))
{
	$_GET  = addslashes_deep($_GET);

}
if (!empty($_POST))
{
	$_POST = addslashes_deep($_POST);
}
$_COOKIE   = addslashes_deep($_COOKIE);
$_REQUEST  = addslashes_deep($_REQUEST);
date_default_timezone_set("PRC");
$timestamp = time();
$online_ip=getip();
$_NAV=get_cache('nav');
$_PAGE=get_cache('page');
$_CFG=get_cache('config');

$_CFG['web_logo']=$_CFG['web_logo']?$_CFG['web_logo']:'logo.gif';
$_CFG['upfiles_dir']=$_CFG['site_dir'].$_CFG['updir_images']."/";
$_CFG['thumb_dir']=$_CFG['site_dir'].$_CFG['updir_thumb']."/";
$_CFG['upfiles_dir1']=$_CFG['site_dir'].$_CFG['updir_file']."/";

subsiteinfo($_CFG);
$_CFG['site_template']=$_CFG['site_dir'].'templates/'.$_CFG['template_dir'];
$mypage=$_PAGE[$alias];
$mypage['tag']?$page_select=$mypage['tag']:'';
require_once(ROOT_PATH.'include/tpl.inc.php');
if ($_CFG['isclose'])
{
	$smarty->assign('info',$_CFG['close_reason']=$_CFG['close_reason']?$_CFG['close_reason']:'站点暂时关闭...');
	$smarty->display('warning.htm');
	exit();
}
if ($_CFG['filter_ip'] && check_word($_CFG['filter_ip'],$online_ip))
{
	$smarty->assign('info',$_CFG['filter_ip_tips']);
	$smarty->display('warning.htm');
	exit();
}
?>