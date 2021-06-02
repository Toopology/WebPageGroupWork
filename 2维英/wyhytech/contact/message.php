<?php
/*
* 关于我们单页
* ============================================================================
*/

require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(ROOT_PATH.'include/mysql.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if ($act=='message_save')
{

    $setsqlarr['name']=$_POST['name'];
    $setsqlarr['content']=trim($_POST['content'])?trim($_POST['content']):showmsg("请填写内容！",1);
    $setsqlarr['phone']=$_POST['phone'];
    $setsqlarr['email']=$_POST['email'];
    $setsqlarr['addtime']=$timestamp;
    $link[0]['text'] = "返回上一页";
    $link[0]['href'] = '?';
    if(inserttable(table('message'),$setsqlarr)){

        $txt="姓名:<strong>".$setsqlarr['name']."</strong><br />";
        $txt.="电话:<strong>".$setsqlarr['phone']."</strong><br />";
        $txt.="邮箱:<strong>".$setsqlarr['email']."</strong><br />";
        $txt.="内容:<strong>".$setsqlarr['content']."</strong><br />";
        smtp_mail('liukaiqian@hhkg.com.cn',"在线留言",$txt);
        showmsg("添加成功！",2,$link);
    }else{
        showmsg("添加失败！",0);
    }
}


$smarty->display('message.htm');
$db->close();
unset($smarty);
?>