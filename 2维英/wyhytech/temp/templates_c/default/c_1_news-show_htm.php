<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.about_category.php'); $this->register_function("about_category", "tpl_function_about_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-28 14:48 �й���׼ʱ�� */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $this->_vars['news']['title']; ?>
-<?php echo $this->_vars['SYS']['site_name']; ?>
</title>
		<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>-->
		<link href="<?php echo $this->_vars['SYS']['site_template']; ?>
css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link data-turbolinks-track="true" href="<?php echo $this->_vars['SYS']['site_template']; ?>
css/banner.css" media="all" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo $this->_vars['SYS']['site_template']; ?>
css/ionicons.min.css">
		<link href="<?php echo $this->_vars['SYS']['site_template']; ?>
css/css.css" rel="stylesheet" type="text/css"/>
		<script src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/jquery-1.8.3.min.js"></script>
		<script src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/megamenu.js"></script>
		<script src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=nCNVt6pF7y0tEIzd1TrViKWt"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maxmum-scale=1.0,minimum-scale=1.0">
	</head>
	<body>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('header.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
		
		<!--banner-->
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:aboutbanner,列表名:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<!--<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
"  class="img-responsive center-block datu" >-->
			<div class="bantu datu" style="background: url(<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
) no-repeat center center;"></div>
			<?php endforeach; endif; ?>
        </header>
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:aboutbanner,列表名:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<?php if ($this->_vars['list']['simgurl'] != ''): ?><img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['simgurl']; ?>
" class="img-responsive center-block xiaotu"><?php else: ?>
				<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
" class="img-responsive center-block xiaotu"><?php endif; ?>

			
			<?php endforeach; endif; ?>

        </header>
        <!--banner结束-->
        <!--banner下导航开始-->
        <div class="con-nav">
        	<div class="container connav">
        		<ul>
					<?php echo tpl_function_about_category(array('set' => "列表名:category,关于我们大类:0"), $this);?>
					<?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
					<?php if ($this->_vars['list']['id'] == 1 || $this->_vars['list']['id'] == 2): ?>
					<li <?php if ($this->_vars['list']['id'] == $this->_vars['id']): ?> class="ding"<?php endif; ?>>
					<a  href="<?php echo $this->_run_modifier("about," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

					</a>
					</li>
					<?php elseif ($this->_vars['list']['id'] == 3): ?>
					<li <?php if ($this->_vars['list']['id'] == $this->_vars['id']): ?> class="ding"<?php endif; ?>>
					<a  href="<?php echo $this->_run_modifier("clientlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

					</a>
					</li>
					<?php else: ?>
					<li <?php if ($this->_vars['list']['id'] == $this->_vars['id']): ?> class="ding"<?php endif; ?>>
					<a  href="<?php echo $this->_run_modifier("newslist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

					</a>
					</li>
					<?php endif; ?>
					<?php endforeach; endif; ?>
        		</ul>
        	</div>
        </div>
         <!--banner下导航结束--> 
        <section style="margin-bottom: 50px;">
        	<div class="container">
        		<div class="newsxq-conbot">
        		<div class="xq-top">
        			<h1><?php echo $this->_vars['news']['title']; ?>
</h1>
        			<p><?php echo $this->_run_modifier($this->_vars['news']['addtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
 发布：维英科技</p>
        		</div>
        		<div class="xq-text">
        			<?php echo $this->_vars['news']['content']; ?>

        		</div>
        		<div class="xq-bot">
        			<div class="xq-botleft">上一篇：<?php echo $this->_vars['news']['shang']; ?>
</div>
        			<div class="xq-botright">下一篇：<?php echo $this->_vars['news']['xia']; ?>
</div>
        		</div>
        	</div>
        	</div>
        </section>
         
         <!--底部开始-->
        <?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('footer.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
         <script type="text/javascript" src="js/slick.js" ></script>
<script type="text/javascript" src="js/js.js" ></script>
 
	</body>
</html>
