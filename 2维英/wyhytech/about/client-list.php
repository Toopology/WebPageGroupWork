<?php
/*
* 师资列表页
* ============================================================================
*/
$alias="clientlist";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
require_once(ROOT_PATH.'include/page.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'':$_GET['id'];
$smarty->assign('id',$id);
$list=page_list('about','99',$id,' where is_display=1 and type_id='.$id,' order by about_order desc','clientlist',$alias);
$smarty->assign('client',$list['list']);

$smarty->display($mypage['tpl'],$cached_id);
$db->close();
unset($smarty);
?>