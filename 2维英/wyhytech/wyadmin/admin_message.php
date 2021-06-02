<?php
/*
* 在线留言页面
* ============================================================================
*/
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
require_once(ADMIN_ROOT_PATH.'include/admin_message_fun.php');

$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'list';
$smarty->assign('act',$act);

if($act == 'list')
{
	check_permissions($_SESSION['admin_purview'],"message_show");
	require_once(ROOT_PATH.'include/page.class.php');

	$oederbysql=" order BY id DESC";


	if (!empty($_GET['settr']))
	{
		$settr=strtotime("-".intval($_GET['settr'])." day");
		$wheresql=empty($wheresql)?" WHERE addtime> ".$settr:$wheresql." AND addtime> ".$settr;
		$oederbysql=" order BY addtime DESC";
	}

	$total_sql="SELECT COUNT(*) AS num FROM ".table('message').$wheresql;
	$page = new page(array('total'=>$db->get_total($total_sql), 'perpage'=>$perpage));
	$currenpage=$page->nowindex;
	$offset=($currenpage-1)*$perpage;
	$message = get_message($offset, $perpage,$wheresql.$oederbysql);
	$smarty->assign('message',$message);
	$smarty->assign('page',$page->show(3));
	$smarty->assign('pageheader',"在线留言");
	get_token();
	$smarty->display('message/admin_message.htm');
}
elseif($act =='migrate_message')
{
	$id=$_REQUEST['id'];
	if (empty($id)) adminmsg("请选择项目！",1);
	check_token();
	check_permissions($_SESSION['admin_purview'],"message_del");
	if (del_message($id))
	{
		adminmsg("删除成功！",2);
	}
}

elseif($act == 'message_edit')
{
	check_permissions($_SESSION['admin_purview'],"message_edit");
	$id=intval($_GET['id']);
	$sql = "select * from ".table('message')." where id=".intval($id)." LIMIT 1";
	$edit_message=$db->getone($sql);

	$smarty->assign('edit_message',$edit_message);

	$smarty->assign('pageheader',"在线留言");
	get_token();
	$smarty->display('message/admin_message_edit.htm');
}

?>