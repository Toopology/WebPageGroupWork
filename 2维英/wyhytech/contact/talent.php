<?php
/*
* 师资列表页
* ============================================================================
*/
$alias="talent";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
require_once(ROOT_PATH.'include/page.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'':$_GET['id'];
$smarty->assign('id',$id);
$list=page_list('contact','10',$id,' where is_display=1 and type_id='.$id,' order by contact_order desc','talent',$alias);
$smarty->assign('talent',$list['list']);
$smarty->assign('page',$list['page']);
$smarty->display($mypage['tpl'],$cached_id);
$db->close();
unset($smarty);
?>