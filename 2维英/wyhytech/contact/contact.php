<?php
/*
* 关于我们单页
* ============================================================================
*/

$alias="contact";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'1':$_GET['id'];
$smarty->assign('id',$id);
$contact='';
$contact=$db->getone("select * from ".table('contact')." where type_id=$id");
$smarty->assign('contact',$contact);


$smarty->display($mypage['tpl'],$cached_id);
$db->close();
unset($smarty);
?>