<?php
/*
* 产品列表页
* ============================================================================
*/
$alias="productslist";
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
require_once(ROOT_PATH.'include/page.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$id=empty($_GET['id'])?'1':$_GET['id'];
$pid=empty($_GET['pid'])?'':$_GET['pid'];
$smarty->assign('id',$id);
$smarty->assign('pid',$pid);

$list1=alla('products',' and type_id='.$id,' order by products_order desc');
$smarty->assign('list1',$list1);


if($pid!=''){
    $products=$db->getone("select * from ".table('products')." where id=$pid limit 1");
}else{
    $products=$db->getone("select * from ".table('products')." where type_id=$id order by products_order desc limit 1");
}

$smarty->assign('products',$products);
unset($dbhost,$dbuser,$dbpass,$dbname);
$smarty->display($mypage['tpl'],$cached_id);
unset($smarty);
?>