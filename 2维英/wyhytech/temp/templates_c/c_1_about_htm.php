<?php require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-12 10:02 中国标准时间 */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>鍏徃绠�浠�-鍏充簬鎴戜滑-<?php echo $this->_vars['SYS']['site_name']; ?>
</title>

		<link href="<?php echo $this->_vars['SYS']['site_template']; ?>
css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo $this->_vars['SYS']['site_template']; ?>
css/css.css" rel="stylesheet" type="text/css"/>
		<script src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/jquery-1.11.3.min.js" ></script>
		<script src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/bootstrap.min.js" ></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maxmum-scale=1.0,minimum-scale=1.0">
	</head>
	<body>
		<div class="ltop"></div>
		<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('head.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
        <!--瀵艰埅缁撴潫-->
        <div style="height: 88px;"></div>
       <!--banner-->
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:aboutbanner,鍒楄〃鍚�:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<img src="<?php echo $this->_vars['SYS']['site_dir'];  echo $this->_vars['list']['imgurl']; ?>
"  class="img-responsive center-block" >
			<?php endforeach; endif; ?>

        </header>
        <!--banner缁撴潫-->

        <!--鍏充簬鎴戜滑寮�濮�-->
        <?php echo $this->_vars['jianjie']['content']; ?>

        
        
        <!--搴曢儴-->
        <?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('foot.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
	</body>
</html>
