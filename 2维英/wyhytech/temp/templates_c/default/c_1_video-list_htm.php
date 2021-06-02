<?php require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.onlineschool_list.php'); $this->register_function("onlineschool_list", "tpl_function_onlineschool_list",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-11 10:49 �й���׼ʱ�� */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>线上学堂-<?php echo $this->_vars['SYS']['site_name']; ?>
</title>
		<link href="<?php echo $this->_vars['SYS']['site_template']; ?>
css/bootstrap.css" rel="stylesheet" type="text/css"/>
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
           	 <div class="container">
           	 	<div class="row zizhi" align="center">
					<?php echo tpl_function_onlineschool_list(array('set' => "列表名:online,学堂小类:GET[id],分页显示:1,显示数目:10,标题长度:16,排序:onlineschool_order>desc"), $this);?>
					<?php if (count((array)$this->_vars['online'])): foreach ((array)$this->_vars['online'] as $this->_vars['list']): ?>
           	 		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 kecheng-img video">
           	 				<div class="video-img">
								<video src="<?php echo $this->_vars['list']['bimg']; ?>
" width="100%" height="auto" controls="controls">
								</video>
           	 				</div>
           	 				<p>教学视频</p>
           	 		</div>
					<?php endforeach; endif; ?>
           	 	</div>
           	 	<div class="fanye">
           			<?php echo $this->_vars['page']; ?>

           		</div>
           	 </div>
           </section>
        <!--底部-->
        <footer>
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 med">
        		        <div class="content tag-cloud friend-links footnav">
        		            <a href="#" >首页 &nbsp;| &nbsp;</a>
        		            <a href="#">产品展示&nbsp; | &nbsp;</a>
        		            <a href="#">下载中心&nbsp; | &nbsp;</a>
        		            <a href="#">教育培训中心&nbsp; | &nbsp;</a>
        		            <a href="#">植牙培训&nbsp; | &nbsp;</a>
        		            <a href="#">临床病例报告&nbsp; | &nbsp;</a>
        		            <a href="#">关于我们</a>
        	            </div>
        	            <div class="content tag-cloud friend-links">
        		            ©Copyright 1998-2016, Alliance. All rights reserved.
        	            </div>
        	            <div class="content tag-cloud friend-links">
        		            互联网药品信息服务资格证书编号：（沪）- 非经营性 - 2011-0128
        	            </div>
        	        </div>
        	        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" align="center">
        	        	<img src="images/index_61.jpg">
        	        </div>
        	    </div>
        	</div>
        </footer>
        
	</body>
</html>
