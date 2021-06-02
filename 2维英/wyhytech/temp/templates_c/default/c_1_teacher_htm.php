<?php require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.train_list.php'); $this->register_function("train_list", "tpl_function_train_list",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-12 14:42 �й���׼ʱ�� */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>教育培训中心师资-教育培训中心-<?php echo $this->_vars['SYS']['site_name']; ?>
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
        <!--导航结束-->
        <div style="height: 88px;"></div>
       <!--banner-->
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:trainbanner,列表名:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<img src="<?php echo $this->_vars['SYS']['site_dir'];  echo $this->_vars['list']['imgurl']; ?>
"  class="img-responsive center-block" >
			<?php endforeach; endif; ?>
        </header>
        <!--banner结束-->

        <!--资质认证开始-->
           <section>
           	 <div class="container">
           	 	<div class="row peixun" align="center">
					<?php echo tpl_function_train_list(array('set' => "列表名:train,培训小类:GET[id],分页显示:1,显示数目:10,标题长度:16,排序:train_order>desc"), $this);?>
					<?php if (count((array)$this->_vars['train'])): foreach ((array)$this->_vars['train'] as $this->_vars['list']): ?>
           	 		<div class="col-lg-2 col-md-2 col-sm-5 col-xs-12 peixun-img">
           	 				<a href="#">
           	 					<img src="<?php echo $this->_vars['list']['img']; ?>
" class="img-responsive" width="100%">
           	 				<p><?php echo $this->_vars['list']['title']; ?>
</p>
           	 				</a>
           	 		</div>
					<?php endforeach; endif; ?>

           	 	</div>
           	 	<div class="fanye">
           			<?php echo $this->_vars['page']; ?>

           		</div>
           	 </div>
           </section>
        <!--底部-->
        <?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('foot.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
        
	</body>
</html>
