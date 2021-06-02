<?php
 /*
 * 图片链接管理
 * ============================================================================
*/
define('ADMIN_PATH_WEB', str_replace('admin_train.php', '', str_replace('\\', '/', __FILE__)));
define('PATH_WEB', dirname(ADMIN_PATH_WEB).'/');
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
require_once(ADMIN_ROOT_PATH.'include/admin_ad_fun.php');
require_once(ADMIN_ROOT_PATH.'include/upload.php');

$smarty->assign('siteurl',$upfiles_dir);
$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'list';
if($act == 'list')
{
	get_token();
	check_permissions($_SESSION['admin_purview'],"ad_show");
	require_once(ROOT_PATH.'include/page.class.php');
	$key=isset($_GET['key'])?trim($_GET['key']):"";
	$key_type=isset($_GET['key_type'])?intval($_GET['key_type']):"";
	if ($key && $key_type>0)
	{
		
		if     ($key_type===1)$wheresql=" WHERE a.title like '%{$key}%'";
	}
	else
	{
		$category_id=isset($_GET['category_id'])?intval($_GET['category_id']):"";
		if ($category_id>0)
		{
		$wheresql=empty($wheresql)?" WHERE a.category_id= ".$category_id:$wheresql." AND a.category_id= ".$category_id;
		}
		$is_display=isset($_GET['is_display'])?$_GET['is_display']:"";
		if ($is_display<>'')
		{
		$is_display=intval($is_display);
		$wheresql=empty($wheresql)?" WHERE a.is_display= ".$is_display:$wheresql." AND a.is_display= ".$is_display;
		}
	}
	$joinsql=" LEFT JOIN  ".table('ad_category')." AS c ON  a.category_id=c.id ";
	$total_sql="SELECT COUNT(*) AS num FROM ".table('ad')." AS a " .$joinsql.$wheresql;
	$total_val=$db->get_total($total_sql);
	$page = new page(array('total'=>$total_val, 'perpage'=>$perpage));
	$currenpage=$page->nowindex;
	$offset=($currenpage-1)*$perpage;
	$smarty->assign('list',get_ad_list($offset,$perpage,$joinsql.$wheresql));
	$smarty->assign('ad_category',get_ad_category());
	$smarty->assign('page',$page->show(3));
	$smarty->assign('total',$total_val);
	$smarty->assign('pageheader',"图片链接管理");	
	$smarty->display('ads/admin_ad_list.htm');
}
//添加图片链接
elseif($act == 'ad_add')
{
	check_permissions($_SESSION['admin_purview'],"ad_add");
	$smarty->assign('datefm',convert_datefm(time(),1));
	$smarty->assign('ad_category',get_ad_category());
	$smarty->assign('pageheader',"图片链接管理");
	get_token();
	$smarty->display('ads/admin_ad_add.htm');
}
//保存添加
elseif($act == 'ad_add_save')
{
	check_token();
	check_permissions($_SESSION['admin_purview'],"ad_add");
	$setsqlarr['title']=trim($_POST['title'])?trim($_POST['title']):adminmsg('您没有填写标题！',1);
	$setsqlarr['is_display']=trim($_POST['is_display'])?trim($_POST['is_display']):0;
	$setsqlarr['category_id']=trim($_POST['category_id'])?trim($_POST['category_id']):adminmsg('您没有填写分类！',1);
	$setsqlarr['alias']=trim($_POST['alias'])?trim($_POST['alias']):adminmsg('参数错误，调用ID不存在！',1);
	$setsqlarr['show_order']=intval($_POST['show_order']);
	$setsqlarr['imgurl']=trim($_POST['imgurl']);
	$setsqlarr['simgurl']=trim($_POST['simgurl']);
	$setsqlarr['img_url']=trim($_POST['img_url']);
	//$setsqlarr['small_imgurl']=form_imglist($setsqlarr['imgurl']);
	$setsqlarr['img_explain']=trim($_POST['img_explain']);
	$setsqlarr['addtime']=$timestamp;
	$link[0]['text'] = "继续添加";
	$link[0]['href'] ="?act=ad_add&category_id=".$_POST['category_id']."&alias=".$_POST['alias'];
	$link[1]['text'] = "返回列表";
	$link[1]['href'] ="?act=";
	!inserttable(table('ad'),$setsqlarr)?adminmsg("添加失败！",0):adminmsg("添加成功！",2,$link);
}
//修改
elseif($act == 'edit_ad')
{
	get_token();
	check_permissions($_SESSION['admin_purview'],"ad_edit");
	$id=!empty($_GET['id'])?intval($_GET['id']):adminmsg('没有id！',1);
	$ad=get_ad_one($id);
	$smarty->assign('ad',$ad);
	$smarty->assign('ad_category',get_ad_category());//位分类列表
	$smarty->assign('url',$_SERVER['HTTP_REFERER']);
	$smarty->assign('pageheader',"图片链接管理");
	$smarty->display('ads/admin_ad_edit.htm');
	 
}
//保存:修改
elseif($act == 'ad_edit_save')
{
	check_token();
	check_permissions($_SESSION['admin_purview'],"ad_edit");
	$setsqlarr['title']=trim($_POST['title'])?trim($_POST['title']):adminmsg('您没有填写标题！',1);
	$setsqlarr['is_display']=trim($_POST['is_display'])?trim($_POST['is_display']):0;
	$setsqlarr['category_id']=trim($_POST['category_id'])?trim($_POST['category_id']):adminmsg('您没有填写分类！',1);
	$setsqlarr['alias']=trim($_POST['alias'])?trim($_POST['alias']):adminmsg('参数错误，调用ID不存在！',1);
	$setsqlarr['show_order']=intval($_POST['show_order']);
	$setsqlarr['imgurl']=trim($_POST['imgurl']);
	$setsqlarr['simgurl']=trim($_POST['simgurl']);
	$setsqlarr['img_url']=trim($_POST['img_url']);
	$setsqlarr['img_explain']=trim($_POST['img_explain']);
	$setsqlarr['addtime']=$timestamp;
	$link[0]['text'] = "返回列表";
	$link[0]['href'] =trim($_POST['url']);
	$wheresql=" id='".intval($_POST['id'])."' "; 
	!updatetable(table('ad'),$setsqlarr,$wheresql)?adminmsg("修改失败！",0):adminmsg("修改成功！",2,$link);
}
//删除
elseif($act=='del_ad')
{
	$id=$_REQUEST['id'];
	check_token();
	if (empty($id)) adminmsg("请选择项目！",0);
	check_permissions($_SESSION['admin_purview'],"ad_del");
	if ($num=del_ad($id))
	{
	adminmsg("删除成功！共删除".$num."行",2);
	}
	else
	{
	adminmsg("删除失败！".$num,1);
	}
}
//分类管理
elseif($act=='ad_category')
{
	check_permissions($_SESSION['admin_purview'],"ad_category");
	$smarty->assign('act',$act);//标签ID
	$smarty->assign('list',get_ad_category());
	$smarty->assign('pageheader',"图片链接管理");
	get_token();
	$smarty->display('ads/admin_ad_category.htm');
}
//添加分类
elseif($act=='ad_category_add')
{
	get_token();
	check_permissions($_SESSION['admin_purview'],"ad_category");
	$smarty->assign('pageheader',"添加分类");
	$smarty->display('ads/admin_ad_category_add.htm');
}
//保存添加分类
elseif($act=='ad_category_add_save')
{
	check_permissions($_SESSION['admin_purview'],"ad_category");
	check_token();
	$link[0]['text'] = "返回上一页";
	$link[0]['href'] ="?act=ad_category";
	$setsqlarr['categoryname']=$_POST['categoryname']?trim($_POST['categoryname']):adminmsg('您没有位名称！',1);
	$setsqlarr['alias']=$_POST['alias']?trim($_POST['alias']):adminmsg('您没有填写调用名称！',1);
	ck_category_alias($setsqlarr['alias'])?adminmsg('调用名称已经存在，请换一个调用名称！',1):'';
	!inserttable(table('ad_category'),$setsqlarr)?adminmsg("添加失败！",0):adminmsg("添加成功！",2,$link);
}
//修改分类
elseif($act=='edit_ad_category')
{
	check_permissions($_SESSION['admin_purview'],"ad_category");
	$smarty->assign('ad_category',get_ad_category_one($_GET['id']));
	$smarty->assign('pageheader',"图片链接管理");
	get_token();
	$smarty->display('ads/admin_ad_category_edit.htm');
}
//保存 修改的分类
elseif($act=='ad_category_edit_save')
{
	check_permissions($_SESSION['admin_purview'],"ad_category");
	check_token();
	$link[0]['text'] = "返回位列表";
	$link[0]['href'] ="?act=ad_category";
	$setsqlarr['categoryname']=trim($_POST['categoryname'])?trim($_POST['categoryname']):adminmsg('您没有位名称！',1);
	$setsqlarr['alias']=trim($_POST['alias'])?trim($_POST['alias']):adminmsg('您没有填写调用名称！',1);
	ck_category_alias($setsqlarr['alias'],$_POST['id'])?adminmsg('调用名称已经存在，请换一个调用名称！',1):'';
	$wheresql=" id='".intval($_POST['id'])."' AND admin_set<>'1'";
		if (updatetable(table('ad_category'),$setsqlarr,$wheresql))
		{
			$adaliasarr['alias']=$setsqlarr['alias'];//同时修改此分类下所有的alias
			$wheresql=" category_id='".intval($_POST['id'])."'";
			updatetable(table('ad'),$adaliasarr,$wheresql);
		adminmsg("修改成功！",2,$link);
		}
		else
		{
		adminmsg("修改失败！",0);
		}
}
//删除位
elseif($act=='del_ad_category')
{
	check_permissions($_SESSION['admin_purview'],"ad_category");
	check_token();
	$id=!empty($_GET['id'])?$_GET['id']:adminmsg("你没有选择分类！",1);
		if ($id)
		{
			!del_ad_category($id)?adminmsg("删除失败！",0):adminmsg("删除成功！",2);
		}
}
?>