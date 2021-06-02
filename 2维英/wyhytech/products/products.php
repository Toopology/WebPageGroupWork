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
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if ($act=='need_save')
{

    $setsqlarr['name']=$_POST['name'];
    $setsqlarr['content']=trim($_POST['content']);
    $setsqlarr['phone']=$_POST['phone'];
    $setsqlarr['company_name']=$_POST['company_name'];
    $setsqlarr['office']=$_POST['office'];
    $setsqlarr['job']=$_POST['job'];
    $setsqlarr['email']=$_POST['email'];
    $setsqlarr['addtime']=$timestamp;
    $link[0]['text'] = "返回上一页";
    $link[0]['href'] = '/products/products-1-4.htm';
    if(inserttable(table('products_need'),$setsqlarr)){

        $txt="姓名:<strong>".$setsqlarr['name']."</strong><br />";
        $txt.="手机号码:<strong>".$setsqlarr['phone']."</strong><br />";
        $txt.="公司名称:<strong>".$setsqlarr['company_name']."</strong><br />";
        $txt.="部门:<strong>".$setsqlarr['office']."</strong><br />";
        $txt.="职务:<strong>".$setsqlarr['job']."</strong><br />";
        $txt.="邮箱:<strong>".$setsqlarr['email']."</strong><br />";
        $txt.="内容:<strong>".$setsqlarr['content']."</strong><br />";
        smtp_mail('liukaiqian@hhkg.com.cn',"网页版测试账号申请",$txt);
        showmsg("添加成功！",2,$link);
    }else{
        showmsg("添加失败！",0);
    }
}
elseif($act=='xieyi'){
    $smarty->display('xieyi.htm');
    exit();
}
$id=empty($_GET['id'])?'':$_GET['id'];
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