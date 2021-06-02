<?php require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-11 11:03 �й���׼ʱ�� */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $this->_vars['SYS']['site_name']; ?>
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

        <!--新闻开始-->
           <section>
           	<div class="container">
           		<div class="form-content" style="margin-top: 40px;">
		<form action="<?php echo $this->_vars['SYS']['site_dir']; ?>
search/search.php" method="post">
      <div class="input-group">

        <input id="edit-search-block-form--2" class="form-control inptu" name="search" placeholder="Enter Search Term" type="text">

        <span class="input-group-btn">
          <button class="btn action-button default-button so" type="submit" value="Search">搜索 </button>
        </span>

      </div>
		</form>
    </div>
    <div class="soudao">
		<?php if ($this->_vars['post'] == '1'): ?>
    	<ul>

			<?php if ($this->_vars['list']): ?>
			<?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['list']): ?>
			<?php if ($this->_vars['list']['type'] == 'products'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("productslist," . $this->_vars['list']['parentid'] . "," . $this->_vars['list']['type_id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type'] == 'onlineschool'): ?>
			<?php if ($this->_vars['list']['type_id'] == '1'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("manuallist,1", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '2'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("videodown,2", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php else: ?>
			<li>
				<a href="<?php echo $this->_run_modifier("videolist," . $this->_vars['list']['type_id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php endif; ?>
			<?php elseif ($this->_vars['list']['type'] == 'train'): ?>
			<?php if ($this->_vars['list']['type_id'] == '1'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("teacherlist," . $this->_vars['list']['type_id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '2'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("courselist,2", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '3'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("trainlist,3", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '4'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("caselist,4", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php endif; ?>
			<?php elseif ($this->_vars['list']['type'] == 'about'): ?>
			<?php if ($this->_vars['list']['type_id'] == '1'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("about,1", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '2'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("newsshow," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '3'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("honour," . $this->_vars['list']['type_id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '4'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("talent," . $this->_vars['list']['type_id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php elseif ($this->_vars['list']['type_id'] == '5'): ?>
			<li>
				<a href="<?php echo $this->_run_modifier("contact," . $this->_vars['list']['type_id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
				<P><?php echo $this->_vars['list']['content']; ?>
</P>
			</li>
			<?php endif; ?>
			<?php endif; ?>
			<?php endforeach; endif; ?>
			<?php else: ?>
			<li>没有相关信息</li>
			<?php endif; ?>
		</ul>
		<div class="fanye">
			<?php echo $this->_vars['page']; ?>

		</div>
		<?php endif; ?>
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
