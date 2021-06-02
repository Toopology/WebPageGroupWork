<?php
/*
*  资讯详细页面
* ============================================================================
*/

$alias="newsshow";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
require_once(ROOT_PATH.'include/page.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'':$_GET['id'];

$news='';
if($id!=''){
	$news=$db->getone("select * from ".table('about')." where id=$id");
}else{
	$news=$db->getone("select * from ".table('about')." type_id=4 limit 1");
}


$shang=$db->getone("select * from ".table('about')." WHERE  addtime>".$news['addtime'] ." AND type_id=".$news['type_id']." AND  is_display=1 order by addtime asc LIMIT 1");
$xia=$db->getone("select * from ".table('about')." WHERE  addtime<".$news['addtime']." AND type_id=".$news['type_id']." AND  is_display=1 order by addtime desc LIMIT 1");
if(empty($shang)){
	$news['shang']="暂无";
}else{
	$news['shang']="<a href='news-show.php?id=".$shang['id']."'>".$shang['title']."</a>";
}
if(empty($xia)){
	$news['xia']="暂无";
}else{
	$news['xia']="<a href='news-show.php?id=".$xia['id']."'>".$xia['title']."</a>";
}
$smarty->assign('news',$news);
$smarty->assign('id',$news['type_id']);
unset($dbhost,$dbuser,$dbpass,$dbname);
$smarty->display($mypage['tpl'],$cached_id);
unset($smarty);
?>