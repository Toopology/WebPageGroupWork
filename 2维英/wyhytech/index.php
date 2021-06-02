<?php
/*
* 网站首页
* ============================================================================
*/
$alias="index";
require_once(dirname(__FILE__).'/include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');

$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);

//关于我们
$about=$db->getone("select * from ".table('about')." where type_id=1");
$smarty->assign('about',$about);

//最新动态
$news=alla('about',' and type_id=4'," order by addtime desc"," limit 0,2");
$smarty->assign('news',$news);


$technical=$db->getone("select * from ".table('technical')." where type_id=2 order by addtime desc");
$smarty->assign('technical',$technical);

//易估通简介
$ygt=$db->getone("select * from ".table('products')." where id=1 ");
$smarty->assign('ygt',$ygt);
$imgs=$ygt['imgurl'];
$imgs=explode('|',$imgs);
$smarty->assign('imgs',$imgs);
//解决方案
$solution=alla('solution',' '," order by solution_order desc"," ");
$smarty->assign('solution',$solution);
unset($dbhost,$dbuser,$dbpass,$dbname);
$smarty->display($mypage['tpl'],$cached_id);

unset($smarty);
?>