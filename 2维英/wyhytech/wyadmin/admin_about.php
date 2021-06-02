<?php
/*
* 关于我们页面
* ============================================================================
*/
define('ADMIN_PATH_WEB', str_replace('admin_about.php', '', str_replace('\\', '/', __FILE__)));
define('PATH_WEB', dirname(ADMIN_PATH_WEB).'/');
require_once(dirname(__FILE__).'/../configs/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
require_once(ADMIN_ROOT_PATH.'include/admin_about_fun.php');


$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'list';
$smarty->assign('act',$act);

$smarty->assign('siteurl',$upfiles_dir);


if($act == 'list')
{
	check_permissions($_SESSION['admin_purview'],"about_show");
	require_once(ROOT_PATH.'include/page.class.php');

	$key=isset($_GET['key'])?trim($_GET['key']):"";

	$key_type=isset($_GET['key_type'])?intval($_GET['key_type']):"";

	$oederbysql=" order BY a.about_order DESC,a.id DESC";
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
	if ($_CFG['subsite']=="1" && $_CFG['subsite_filter_news']=="1")
	{
		$wheresql.=empty($wheresql)?" WHERE ":" AND ";
		$wheresql.=" (a.subsite_id=0 OR a.subsite_id=".intval($_CFG['subsite_id']).") ";
	}
	$joinsql=" LEFT JOIN ".table('about_category')." AS c ON a.type_id=c.id  ";
	$total_sql="SELECT COUNT(*) AS num FROM ".table('about')." AS a ".$joinsql.$wheresql;
	$page = new page(array('total'=>$db->get_total($total_sql), 'perpage'=>$perpage));
	$currenpage=$page->nowindex;
	$offset=($currenpage-1)*$perpage;
	$about = get_about($offset, $perpage,$joinsql.$wheresql.$oederbysql);
	$smarty->assign('about',$about);
	$smarty->assign('page',$page->show(3));
	$smarty->assign('pageheader',"关于我们");
	get_token();
	$smarty->display('about/admin_about.htm');
}
elseif($act =='migrate_about')
{
	$id=$_REQUEST['id'];
	if (empty($id)) adminmsg("请选择项目！",1);
	check_token();
	check_permissions($_SESSION['admin_purview'],"about_del");
	if (del_about($id))
	{
		adminmsg("删除成功！",2);
	}
}
elseif($act == 'about_add')
{
	check_permissions($_SESSION['admin_purview'],"about_add");
	$smarty->assign('about_category',get_about_category());
	$smarty->assign('pageheader',"关于我们");
	get_token();
	$smarty->display('about/admin_about_add.htm');
}
elseif($act == 'addsave')
{
	check_permissions($_SESSION['admin_purview'],"about_add");
	check_token();
	$setsqlarr['title']=trim($_POST['title'])?trim($_POST['title']):adminmsg('您没有填写标题！',1);
	$setsqlarr['type_id']=!empty($_POST['type_id'])?intval($_POST['type_id']):adminmsg('您没有选择分类！',1);
	$setsqlarr['content']=$_POST['content'];
	$setsqlarr['is_display']=intval($_POST['is_display']);
	$setsqlarr['imgurl']=$_POST['imgurl'];
	$setsqlarr['seo_keywords']=$_POST['seo_keywords'];
	$setsqlarr['seo_description']=$_POST['seo_description'];
	$setsqlarr['about_order']=intval($_POST['about_order']);
	form_imglist($setsqlarr['imgurl'],273,172,2,$thumb_dir.date('Ymd/'));
	$setsqlarr['addtime']=$timestamp;
	$setsqlarr['parentid']=get_about_parentid($setsqlarr['type_id']);
	$link[0]['text'] = "继续添加";
	$link[0]['href'] = '?act=about_add&type_id_cn='.trim($_POST['type_id_cn'])."&type_id=".$_POST['type_id'];
	$link[1]['text'] = "返回列表";
	$link[1]['href'] = '?act=list';
	!inserttable(table('about'),$setsqlarr)?adminmsg("添加失败！",0):adminmsg("添加成功！",2,$link);
}
elseif($act == 'about_edit')
{
	check_permissions($_SESSION['admin_purview'],"about_edit");
	$id=intval($_GET['id']);
	$sql = "select * from ".table('about')." where id=".intval($id)." LIMIT 1";
	$edit_about=$db->getone($sql);

	$smarty->assign('edit_about',$edit_about);
	$smarty->assign('upfiles_dir',$upfiles_dir);
	$smarty->assign('thumb_dir',$thumb_dir);
	$smarty->assign('about_category',get_about_category());

	$smarty->assign('pageheader',"关于我们");
	get_token();
	$smarty->display('about/admin_about_edit.htm');
}
elseif($act == 'editsave')
{
	check_permissions($_SESSION['admin_purview'],"about_edit");
	check_token();
	$id=intval($_POST['id']);
	$setsqlarr['title']=trim($_POST['title'])?trim($_POST['title']):adminmsg('您没有填写标题！',1);
	$setsqlarr['type_id']=trim($_POST['type_id'])?intval($_POST['type_id']):0;
	$setsqlarr['content']=$_POST['content'];
	$setsqlarr['is_display']=intval($_POST['is_display']);
	$setsqlarr['seo_keywords']=$_POST['seo_keywords'];
	$setsqlarr['seo_description']=$_POST['seo_description'];
	$setsqlarr['about_order']=intval($_POST['about_order']);
	$setsqlarr['parentid']=get_about_parentid($setsqlarr['type_id']);
	$setsqlarr['imgurl']=$_POST['imgurl'];
	$setsqlarr['addtime']=$timestamp;
	form_imglist($setsqlarr['imgurl'],273,172,2,$thumb_dir.date('Ymd/'));

	$link[0]['text'] = "返回列表";
	$link[0]['href'] = '?act=list';
	$link[1]['text'] = "查看已修改";
	$link[1]['href'] = "?act=about_edit&id=".$id;
	!updatetable(table('about'),$setsqlarr," id=".$id."")?adminmsg("修改失败！",0):adminmsg("修改成功！",2,$link);
}

elseif($act == 'property'){
	check_permissions($_SESSION['admin_purview'],"about_property");
	$smarty->assign('pageheader',"关于我们");
	get_token();
	$smarty->display('about/admin_about_property.htm');
}

elseif($act == 'category')
{
	check_permissions($_SESSION['admin_purview'],"about_category");
	$smarty->assign('pageheader',"关于我们");
	get_token();
	$smarty->display('about/admin_about_category.htm');
}
elseif($act == 'category_add')
{
	check_permissions($_SESSION['admin_purview'],"about_category");
	$parentid = !empty($_GET['parentid']) ? intval($_GET['parentid']) : '0';
	$smarty->assign('pageheader',"关于我们");
	get_token();
	$smarty->display('about/admin_about_category_add.htm');
}
elseif($act == 'add_category_save')
{
	check_permissions($_SESSION['admin_purview'],"about_category");
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
				$setsqlarr['description']=$_POST['description'][$i];
				$setsqlarr['keywords']=$_POST['keywords'][$i];
				!inserttable(table('about_category'),$setsqlarr)?adminmsg("添加失败！",0):"";
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
	check_permissions($_SESSION['admin_purview'],"about_category");
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
	check_permissions($_SESSION['admin_purview'],"about_category");
	$id=intval($_GET['id']);
	$smarty->assign('category',get_about_category_one($id));
	$smarty->assign('pageheader',"关于我们");
	get_token();
	$smarty->display('about/admin_about_category_edit.htm');
}
elseif($act == 'edit_category_save')
{
	check_permissions($_SESSION['admin_purview'],"about_category");
	check_token();
	$id=intval($_POST['id']);
	$setsqlarr['parentid']=trim($_POST['parentid'])?intval($_POST['parentid']):0;
	$setsqlarr['categoryname']=trim($_POST['categoryname'])?trim($_POST['categoryname']):adminmsg('请填写分类名称！',1);
	$setsqlarr['category_order']=!empty($_POST['category_order'])?intval($_POST['category_order']):0;
	$setsqlarr['title']=$_POST['title'];
	$setsqlarr['description']=$_POST['description'];
	$setsqlarr['keywords']=$_POST['keywords'];
	$link[0]['text'] = "查看修改结果";
	$link[0]['href'] = '?act=edit_category&id='.$id;
	$link[1]['text'] = "返回分类管理";
	$link[1]['href'] = '?act=category';
	!updatetable(table('about_category'),$setsqlarr," id='".$id."'")?adminmsg("修改失败！",0):adminmsg("修改成功！",2,$link);
}
?>