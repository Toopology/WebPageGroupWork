<?php require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.onlineschool_list.php'); $this->register_function("onlineschool_list", "tpl_function_onlineschool_list",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-12 14:38 �й���׼ʱ�� */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>产品手册-线上学堂-<?php echo $this->_vars['SYS']['site_name']; ?>
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
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:onlinebanner,列表名:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<img src="<?php echo $this->_vars['SYS']['site_dir'];  echo $this->_vars['list']['imgurl']; ?>
"  class="img-responsive center-block" >
			<?php endforeach; endif; ?>
        </header>
        <!--banner结束-->

        <!--资质认证开始-->
           <section>
           	 <div class="container shouce">
           	 	<div class="row shouce-dow" align="center">
           	 		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 xian">名称</div>
           	 		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 xian">说明</div>
           	 		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 xian">大小</div>
           	 		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 xian">更新时间</div>
           	 		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 xian">下载</div>
           	 	</div>

				 <?php echo tpl_function_onlineschool_list(array('set' => "列表名:online,学堂小类:GET[id],显示数目:10,标题长度:16,排序:onlineschool_order>desc"), $this);?>
				 <?php if (count((array)$this->_vars['online'])): foreach ((array)$this->_vars['online'] as $this->_vars['list']): ?>
				 <div class="row shouce-dow" align="center">
           	 		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 xian"><?php echo $this->_vars['list']['title']; ?>
</div>
           	 		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 xian"><?php echo $this->_vars['list']['note']; ?>
</div>
           	 		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 xian"><?php echo $this->_vars['list']['size']; ?>
</div>
           	 		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 xian"><?php echo $this->_run_modifier($this->_vars['list']['addtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
</div>
           	 		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 xian"><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
chuli.php?url=<?php echo $this->_vars['list']['imgurl']; ?>
"><img src="../images/xiazai_06.jpg"></a></div>
           	 	</div>
				 <?php endforeach; endif; ?>

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
