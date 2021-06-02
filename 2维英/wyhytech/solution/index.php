<?php
/*
* 网站首页
* ============================================================================
*/
$alias="solutionlist";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
require_once(ROOT_PATH.'include/page.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'1':$_GET['id'];
$smarty->assign('id',$id);
$solution=get_category_one('solution_category',$id);
$smarty->assign('solution',$solution);
$list=page_list('solution','10',$id,' where type_id='.$id,' order by solution_order desc','solutionlist',$alias);

$smarty->assign('list1',$list['list']);

unset($dbhost,$dbuser,$dbpass,$dbname);
$smarty->display($mypage['tpl'],$cached_id);
unset($smarty);
?>