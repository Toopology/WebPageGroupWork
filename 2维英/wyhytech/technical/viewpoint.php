<?php
/*
* 网站首页
* ============================================================================
*/
$alias="viewpointlist";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
require_once(ROOT_PATH.'include/page.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'1':$_GET['id'];
$smarty->assign('id',$id);

$download=page_list('technical','10',$id,' where is_display=1 and type_id='.$id,' order by addtime desc','viewpointshow',$alias);

$smarty->assign('down',$download['list']);
$smarty->assign('page',$download['page']);


unset($dbhost,$dbuser,$dbpass,$dbname);
$smarty->display($mypage['tpl'],$cached_id);
unset($smarty);
?>