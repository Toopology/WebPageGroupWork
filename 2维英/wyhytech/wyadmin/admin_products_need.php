<?php
/*
* 客户需求页面
* ============================================================================
*/
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
require_once(ADMIN_ROOT_PATH.'include/admin_products_need_fun.php');

$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'list';
$smarty->assign('act',$act);

if($act == 'list')
{
	check_permissions($_SESSION['admin_purview'],"products_need_show");
	require_once(ROOT_PATH.'include/page.class.php');

	$oederbysql=" order BY id DESC";


	if (!empty($_GET['settr']))
	{
		$settr=strtotime("-".intval($_GET['settr'])." day");
		$wheresql=empty($wheresql)?" WHERE addtime> ".$settr:$wheresql." AND addtime> ".$settr;
		$oederbysql=" order BY addtime DESC";
	}

	$total_sql="SELECT COUNT(*) AS num FROM ".table('products_need').$wheresql;
	$page = new page(array('total'=>$db->get_total($total_sql), 'perpage'=>$perpage));
	$currenpage=$page->nowindex;
	$offset=($currenpage-1)*$perpage;
	$products_need = get_products_need($offset, $perpage,$wheresql.$oederbysql);
	$smarty->assign('products_need',$products_need);
	$smarty->assign('page',$page->show(3));
	$smarty->assign('pageheader',"客户需求");
	get_token();
	$smarty->display('products/admin_products_need.htm');
}
elseif($act =='migrate_products_need')
{
	$id=$_REQUEST['id'];
	if (empty($id)) adminmsg("请选择项目！",1);
	check_token();
	check_permissions($_SESSION['admin_purview'],"products_need_del");
	if (del_products_need($id))
	{
		adminmsg("删除成功！",2);
	}
}

elseif($act == 'products_need_edit')
{
	check_permissions($_SESSION['admin_purview'],"products_need_edit");
	$id=intval($_GET['id']);
	$sql = "select * from ".table('products_need')." where id=".intval($id)." LIMIT 1";
	$edit_products_need=$db->getone($sql);

	$smarty->assign('edit_products_need',$edit_products_need);

	$smarty->assign('pageheader',"客户需求");
	get_token();
	$smarty->display('products/admin_products_need_edit.htm');
}

?>