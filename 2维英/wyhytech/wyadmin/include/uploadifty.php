<?php
define('ADMIN_ROOT_PATH', str_replace('include/uploadifty.php', '', str_replace('\\', '/', __FILE__)));
define('PATH_WEB', dirname(ADMIN_ROOT_PATH).'/');
require_once 'upfile.class.php';


$upfile=new upfile();

if(isset($_GET['type'])){
    $upfile->set_upfile();
    $back=$upfile->upload();
    if($back['error']){
        echo json_encode($back);
        exit();
    }
    $back['path'] = $back['path'];
    $back['append'] = 'false';

}else{
    $upfile->set_upimg();
    $back=$upfile->upload();

    if($back['error']){
        echo json_encode($back);
        exit();
    }
}


echo json_encode($back);
?>