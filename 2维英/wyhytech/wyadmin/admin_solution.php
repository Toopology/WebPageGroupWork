<?php
/*
* 产品页面
* ============================================================================
*/
define('ADMIN_PATH_WEB', str_replace('admin_solution.php', '', str_replace('\\', '/', __FILE__)));
define('PATH_WEB', dirname(ADMIN_PATH_WEB).'/');
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
require_once(ADMIN_ROOT_PATH.'include/admin_solution_fun.php');

$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'list';
$smarty->assign('act',$act);
$smarty->assign('siteurl',$upfiles_dir);
if($act == 'list')
{
	check_permissions($_SESSION['admin_purview'],"solution_show");
	require_once(ROOT_PATH.'include/page.class.php');
	$key=isset($_GET['key'])?trim($_GET['key']):"";
	$key_type=isset($_GET['key_type'])?intval($_GET['key_type']):"";
	$oederbysql=" order BY a.solution_order DESC,a.id DESC";
	if ($key && $key_type>0)
	{

		if     ($key_type===1)$wheresql=" WHERE a.title like '%{$key}%'";
		elseif ($key_type===2)$wheresql=" WHERE a.id =".intval($key);
	}
	!empty($_GET['parentid'])? $wheresqlarr['a.parentid']=intval($_GET['parentid']):'';
	!empty($_GET['type_id'])? $wheresqlarr['a.type_id']=intval($_GET['type_id']):'';
	!empty($_GET['focos'])?$wheresqlarr['a.focos']=intval($_GET['focos']):'';
	if (!empty($wheresqlarr)) $wheresql=wheresql($wheresqlarr);
	if (!empty($_GET['settr']))
	{
		$settr=strtotime("-".intval($_GET['settr'])." day");
		$wheresql=empty($wheresql)?" WHERE a.addtime> ".$settr:$wheresql." AND a.addtime> ".$settr;
		$oederbysql=" order BY a.addtime DESC";
	}
	$joinsql=" LEFT JOIN ".table('solution_category')." AS c ON a.type_id=c.id  ";
	$total_sql="SELECT COUNT(*) AS num FROM ".table('solution')." AS a ".$joinsql.$wheresql;
	$page = new page(array('total'=>$db->get_total($total_sql), 'perpage'=>$perpage));
	$currenpage=$page->nowindex;
	$offset=($currenpage-1)*$perpage;
	$solution = get_solution($offset, $perpage,$joinsql.$wheresql.$oederbysql);
	$smarty->assign('solution',$solution);
	$smarty->assign('page',$page->show(3));
	$smarty->assign('pageheader',"解决方案");
	get_token();
	$smarty->display('solution/admin_solution.htm');
}
elseif($act =='migrate_solution')
{
	$id=$_REQUEST['id'];
	if (empty($id)) adminmsg("请选择项目！",1);
	check_token();
	check_permissions($_SESSION['admin_purview'],"solution_del");
	if (del_solution($id))
	{
		adminmsg("删除成功！",2);
	}
}
elseif($act == 'solution_add')
{
	check_permissions($_SESSION['admin_purview'],"solution_add");
	$smarty->assign('solution_category',get_solution_category());
	$smarty->assign('pageheader',"解决方案");
	get_token();
	$smarty->display('solution/admin_solution_add.htm');
}
elseif($act == 'addsave')
{
	check_permissions($_SESSION['admin_purview'],"solution_add");
	check_token();
	$setsqlarr['title']=trim($_POST['title'])?trim($_POST['title']):adminmsg('您没有填写标题！',1);
	$setsqlarr['type_id']=!empty($_POST['type_id'])?intval($_POST['type_id']):adminmsg('您没有选择分类！',1);
	$setsqlarr['content']=$_POST['content'];
	$setsqlarr['is_display']=intval($_POST['is_display']);

	$setsqlarr['imgurl']=$_POST['imgurl'];
	form_imglist($setsqlarr['imgurl'],124,124,2,$thumb_dir.date('Ymd/'));
	$setsqlarr['seo_keywords']=$_POST['seo_keywords'];
	$setsqlarr['seo_description']=$_POST['seo_description'];
	$setsqlarr['solution_order']=intval($_POST['solution_order']);
	/*$setsqlarr['small_imgurl']=form_imglist($setsqlarr['imgurl']);*/
	$setsqlarr['addtime']=$timestamp;
	$setsqlarr['parentid']=get_solution_parentid($setsqlarr['type_id']);
	$link[0]['text'] = "继续添加";
	$link[0]['href'] = '?act=solution_add&type_id_cn='.trim($_POST['type_id_cn'])."&type_id=".$_POST['type_id'];
	$link[1]['text'] = "返回列表";
	$link[1]['href'] = '?act=list';
	!inserttable(table('solution'),$setsqlarr)?adminmsg("添加失败！",0):adminmsg("添加成功！",2,$link);
}
elseif($act == 'solution_edit')
{
	check_permissions($_SESSION['admin_purview'],"solution_edit");
	$id=intval($_GET['id']);
	$sql = "select * from ".table('solution')." where id=".intval($id)." LIMIT 1";
	$edit_solution=$db->getone($sql);

	$smarty->assign('edit_solution',$edit_solution);
	$smarty->assign('upfiles_dir',$upfiles_dir);
	$smarty->assign('thumb_dir',$thumb_dir);
	$smarty->assign('solution_category',get_solution_category());

	$smarty->assign('pageheader',"解决方案");
	get_token();
	$smarty->display('solution/admin_solution_edit.htm');
}
elseif($act == 'editsave')
{
	check_permissions($_SESSION['admin_purview'],"solution_edit");
	check_token();
	$id=intval($_POST['id']);
	$setsqlarr['title']=trim($_POST['title'])?trim($_POST['title']):adminmsg('您没有填写标题！',1);
	$setsqlarr['type_id']=trim($_POST['type_id'])?intval($_POST['type_id']):0;
	$setsqlarr['content']=$_POST['content'];
	$setsqlarr['is_display']=intval($_POST['is_display']);

	$setsqlarr['seo_keywords']=$_POST['seo_keywords'];
	$setsqlarr['seo_description']=$_POST['seo_description'];
	$setsqlarr['solution_order']=intval($_POST['solution_order']);
	$setsqlarr['parentid']=get_solution_parentid($setsqlarr['type_id']);
	$setsqlarr['imgurl']=$_POST['imgurl'];
	form_imglist($setsqlarr['imgurl'],124,124,2,$thumb_dir.date('Ymd/'));
	$setsqlarr['addtime']=$timestamp;
	//$setsqlarr['small_imgurl']=form_imglist($setsqlarr['imgurl']);
	$link[0]['text'] = "返回列表";
	$link[0]['href'] = '?act=list';
	$link[1]['text'] = "查看已修改";
	$link[1]['href'] = "?act=solution_edit&id=".$id;
	!updatetable(table('solution'),$setsqlarr," id=".$id."")?adminmsg("修改失败！",0):adminmsg("修改成功！",2,$link);
}

elseif($act == 'property'){
	check_permissions($_SESSION['admin_purview'],"solution_property");
	$smarty->assign('pageheader',"解决方案");
	get_token();
	$smarty->display('solution/admin_solution_property.htm');
}

elseif($act == 'category')
{
	check_permissions($_SESSION['admin_purview'],"solution_category");
	$smarty->assign('pageheader',"解决方案");
	get_token();
	$smarty->display('solution/admin_solution_category.htm');
}
elseif($act == 'category_add')
{
	check_permissions($_SESSION['admin_purview'],"solution_category");
	$parentid = !empty($_GET['parentid']) ? intval($_GET['parentid']) : '0';
	$smarty->assign('pageheader',"解决方案");
	get_token();
	$smarty->display('solution/admin_solution_category_add.htm');
}
elseif($act == 'add_category_save')
{
	check_permissions($_SESSION['admin_purview'],"solution_category");
	check_token();
	$num=0;
	if (is_array($_POST['categoryname']) && count($_POST['categoryname'])>0)
	{
		for ($i =0; $i <count($_POST['categoryname']);$i++){
			if (!empty($_POST['categoryname'][$i]))
			{
				$setsqlarr['categoryname']=trim($_POST['categoryname'][$i]);
				$setsqlarr['parentid']=intval($_POST['parentid'][$i]);
				$setsqlarr['category_order']=intval($_POST['category_order'][$i]);
				$setsqlarr['title']=$_POST['title'][$i];
				$setsqlarr['content']=$_POST['content'][$i];
				$setsqlarr['description']=$_POST['description'][$i];
				$setsqlarr['keywords']=$_POST['keywords'][$i];
				!inserttable(table('solution_category'),$setsqlarr)?adminmsg("添加失败！",0):"";
				$num=$num+$db->affected_rows();
			}

		}

	}
	if ($num==0)
	{
		adminmsg("添加失败,数据不完整",1);
	}
	else
	{
		$link[0]['text'] = "返回分类管理";
		$link[0]['href'] = '?act=category';
		$link[1]['text'] = "继续添加分类";
		$link[1]['href'] = "?act=category_add";
		adminmsg("添加成功！共添加".$num."个分类",2,$link);
	}
}
elseif($act == 'del_category')
{
	check_permissions($_SESSION['admin_purview'],"solution_category");
	check_token();
	$id=$_REQUEST['id'];
	if ($num=del_category($id))
	{
		adminmsg("删除成功！共删除".$num."个分类",2);
	}
	else
	{
		adminmsg("删除失败！",1);
	}
}
elseif($act == 'edit_category')
{
	check_permissions($_SESSION['admin_purview'],"solution_category");
	$id=intval($_GET['id']);
	$smarty->assign('category',get_solution_category_one($id));
	$smarty->assign('pageheader',"解决方案");
	get_token();
	$smarty->display('solution/admin_solution_category_edit.htm');
}
elseif($act == 'edit_category_save')
{
	check_permissions($_SESSION['admin_purview'],"solution_category");
	check_token();
	$id=intval($_POST['id']);
	$setsqlarr['parentid']=trim($_POST['parentid'])?intval($_POST['parentid']):0;
	$setsqlarr['categoryname']=trim($_POST['categoryname'])?trim($_POST['categoryname']):adminmsg('请填写分类名称！',1);
	$setsqlarr['category_order']=!empty($_POST['category_order'])?intval($_POST['category_order']):0;
	$setsqlarr['title']=$_POST['title'];
	$setsqlarr['content']=$_POST['content'];
	$setsqlarr['description']=$_POST['description'];
	$setsqlarr['keywords']=$_POST['keywords'];
	$link[0]['text'] = "查看修改结果";
	$link[0]['href'] = '?act=edit_category&id='.$id;
	$link[1]['text'] = "返回分类管理";
	$link[1]['href'] = '?act=category';
	!updatetable(table('solution_category'),$setsqlarr," id='".$id."'")?adminmsg("修改失败！",0):adminmsg("修改成功！",2,$link);
}
?>