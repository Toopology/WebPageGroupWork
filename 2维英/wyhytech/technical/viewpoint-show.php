<?php
/*
* 网站首页
* ============================================================================
*/
$alias="viewpointshow";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
require_once(ROOT_PATH.'include/page.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'':$_GET['id'];

$view='';
if($id!=''){
    $view=$db->getone("select * from ".table('technical')." where id=$id");
}else{
    $view=$db->getone("select * from ".table('technical')." type_id=2 limit 1");
}


$shang=$db->getone("select * from ".table('technical')." WHERE  addtime>".$view['addtime'] ." AND type_id=".$view['type_id']." AND  is_display=1 order by addtime asc LIMIT 1");
$xia=$db->getone("select * from ".table('technical')." WHERE  addtime<".$view['addtime']." AND type_id=".$view['type_id']." AND  is_display=1 order by addtime desc LIMIT 1");
if(empty($shang)){
    $view['shang']="暂无";
}else{
    $view['shang']="<a href='viewpoint-show.php?id=".$shang['id']."'>".$shang['title']."</a>";
}
if(empty($xia)){
    $view['xia']="暂无";
}else{
    $view['xia']="<a href='viewpoint-show.php?id=".$xia['id']."'>".$xia['title']."</a>";
}
$smarty->assign('view',$view);
$smarty->assign('id',$view['type_id']);
unset($dbhost,$dbuser,$dbpass,$dbname);
$smarty->display($mypage['tpl'],$cached_id);
unset($smarty);
?>