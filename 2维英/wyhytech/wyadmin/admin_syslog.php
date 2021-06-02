<?php
 /*
 * 系统日志
*/
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
require_once(ADMIN_ROOT_PATH.'include/admin_syslog_fun.php');
$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'list';
check_permissions($_SESSION['admin_purview'],"syslog");
$smarty->assign('pageheader',"系统日志");
if($act == 'list')
{
	get_token();
	require_once(ROOT_PATH.'include/page.class.php');
	$wheresql="";
	$oederbysql=" order BY l_id DESC ";
	if (isset($_GET['l_type']) && !empty($_GET['l_type']))
	{
		$wheresql=" WHERE l_type='".intval($_GET['l_type'])."'";
	}
	if (isset($_GET['settr']) && !empty($_GET['settr']))
	{
		$settr=strtotime("-".intval($_GET['settr'])." day");
		$wheresql=empty($wheresql)?" WHERE l_time> ".$settr:$wheresql." AND l_time> ".$settr;
	}
	$total_sql="SELECT COUNT(*) AS num FROM ".table('syslog').$wheresql;
	$total_val=$db->get_total($total_sql);
	$page = new page(array('total'=>$total_val, 'perpage'=>$perpage));
	$currenpage=$page->nowindex;
	$offset=($currenpage-1)*$perpage;
	$list = get_syslog_list($offset,$perpage,$wheresql.$oederbysql);
	$smarty->assign('list',$list);
	$smarty->assign('page',$page->show(3));
	$smarty->display('syslog/admin_syslog_list.htm');
}
elseif($act == 'del_syslog')
{
	check_token();
	$id=$_REQUEST['id'];
	$dnum=del_syslog($id);
	if ($dnum>0)
	{
	adminmsg("删除成功！共删除".$dnum."行",2);
	}
	else
	{
	adminmsg("删除失败！",0);
	}
}
?>