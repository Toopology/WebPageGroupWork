<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.technical_category.php'); $this->register_function("technical_category", "tpl_function_technical_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 13:59 中国标准时间 */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>鏉冨▉瑙傜偣-鎶�鏈敮鎸�-<?php echo $this->_vars['SYS']['site_name']; ?>
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
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:technicalbanner,鍒楄〃鍚�:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<!--<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
"  class="img-responsive center-block datu" >-->
			<div class="bantu datu" style="background: url(<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
) no-repeat center center;"></div>
			<?php endforeach; endif; ?>
        </header>
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:technicalbanner,鍒楄〃鍚�:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<?php if ($this->_vars['list']['simgurl'] != ''): ?><img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['simgurl']; ?>
" class="img-responsive center-block xiaotu"><?php else: ?>
				<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
" class="img-responsive center-block xiaotu"><?php endif; ?>

			
			<?php endforeach; endif; ?>

        </header>
        <!--banner缁撴潫-->
        <!--banner涓嬪鑸紑濮�-->
        <div class="con-nav">
        	<div class="container connav">
				<ul>
					<?php echo tpl_function_technical_category(array('set' => "鍒楄〃鍚�:category,鎶�鏈敮鎸佸ぇ绫�:0"), $this);?>
					<?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
					<?php if ($this->_vars['list']['id'] == 1): ?>
					<li <?php if ($this->_vars['list']['id'] == $this->_vars['id']): ?> class="ding"<?php endif; ?>>
					<a  href="<?php echo $this->_run_modifier("downlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

					</a>
					</li>
					<?php else: ?>
					<li <?php if ($this->_vars['list']['id'] == $this->_vars['id']): ?> class="ding"<?php endif; ?>>
					<a  href="<?php echo $this->_run_modifier("viewpointlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

					</a>
					</li>
					<?php endif; ?>
					<?php endforeach; endif; ?>
				</ul>
        	</div>
        </div>
         <!--banner涓嬪鑸粨鏉�--> 
        <section class="new">
           	<div class="container xinwen">
           		<div class="row fisrt-new">
					<?php if (count((array)$this->_vars['down'])): foreach ((array)$this->_vars['down'] as $this->_vars['list']): ?>
					<?php if ($this->_vars['list']['num'] == 1): ?>
           			<div class="col-lg-4 col-md-4 col-sm-12 col-sx-12 first-img">
           				<img src="<?php echo $this->_vars['list']['img']; ?>
" class="img-responsive" align="center" width="90%" >
           			</div>
           			<div class="col-lg-8 col-md-8 col-sm-12 col-sx-12 new-text">
           				<h4><a href="<?php echo $this->_vars['list']['url']; ?>
"><?php echo $this->_vars['list']['title']; ?>
</a> <span><?php echo $this->_run_modifier($this->_vars['list']['addtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
</span></h4>
           				<p>
							<?php echo $this->_vars['list']['seo_description']; ?>
</p>
           			</div>
					<?php endif; ?>
					<?php endforeach; endif; ?>
           		</div>
				<div class="new-xq">
					<?php if (count((array)$this->_vars['down'])): foreach ((array)$this->_vars['down'] as $this->_vars['list']): ?>
					<?php if ($this->_vars['list']['num'] != 1): ?>
					<div class="relcent"><a href="<?php echo $this->_vars['list']['url']; ?>
"><?php echo $this->_vars['list']['title']; ?>
</a><span><?php echo $this->_run_modifier($this->_vars['list']['addtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
</span></div>
					<?php endif; ?>
					<?php endforeach; endif; ?>

				</div>
           		<div class="fanye">
           			<?php echo $this->_vars['page']; ?>

           		</div>
           	</div>
           </section>
         
         <!--搴曢儴寮�濮�-->
         <?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('footer.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
         <script type="text/javascript" src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/slick.js" ></script>
<script type="text/javascript" src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/js.js" ></script>
	</body>
</html>
