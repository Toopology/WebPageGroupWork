<?php
/*
* 管理中心左侧
*/
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
$act=!empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'index';
if($act)
{
	$smarty->display("sys/admin_left_{$act}.htm");
}
?>