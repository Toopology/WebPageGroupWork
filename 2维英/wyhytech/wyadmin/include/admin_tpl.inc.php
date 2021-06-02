<?php
include_once(ROOT_PATH.'include/template_lite/class.template.php');
$smarty = new Template_Lite();
$smarty -> compile_dir =  ROOT_PATH.'temp/templates_c';
$smarty -> template_dir = ADMIN_ROOT_PATH."templates/default/";
$smarty -> cache_dir = ROOT_PATH.'temp/caches';
$smarty -> reserved_template_varname = "smarty";
$smarty -> cache = false;
$smarty -> left_delimiter = "{#";
$smarty -> right_delimiter = "#}";
$smarty -> force_compile = false;
$smarty -> assign('SYS',$_CFG);
?>