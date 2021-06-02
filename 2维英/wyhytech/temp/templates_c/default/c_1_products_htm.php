<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-16 15:19 �й���׼ʱ�� */ ?>

﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>产品中心-<?php echo $this->_vars['SYS']['site_name']; ?>
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
		<script src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/jquery.validate.min.js" type='text/javascript' language="javascript"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maxmum-scale=1.0,minimum-scale=1.0">
	</head>
	<script type="text/javascript">
		//验证
		$(document).ready(function() {
			jQuery.validator.addMethod("email", function(value, element) {

				var email = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]w+)*$/;
				return this.optional(element) || (email.test(value));
			}, "邮箱格式错误");
			jQuery.validator.addMethod("phone", function(value, element) {
				var length = value.length;
				var phone = /^(((1[3,5,8]{1}[0-9]{1})|(15[0-9]{1}))+\d{8})$/;
				return this.optional(element) || (length == 11 && phone.test(value));
			}, "手机号码格式错误");

			$("#Form1").validate({
				rules:{
					name:{
						required: true
					},
					phone:{
						required: true,
						phone:true
					},
					email:{
						required: true,
						email:true
					},
					check:{
						required: true
					}
				},
				messages: {
					name:{
						required: "请输入姓名"
					},
					phone:{
						required: "请输入手机号码",
						phone:"手机号码格式错误"
					},
					email:{
						required: "请输入邮箱",
						email:"邮箱填写错误"
					},
					check:{
						required: "请选中阅读用户协议"
					}
				},
				errorPlacement: function(error, element) {
					if ( element.is(":radio") )
						error.appendTo( element.parent().next().next() );
					else if ( element.is(":checkbox") )
						error.appendTo ( element.next());
					else
						error.appendTo(element.parent());
				}
			});

		});
	</script>
	<body>
		<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('header.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
		<!--banner-->
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:productsbanner,列表名:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['item']): ?>
			<!--<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['item']['imgurl']; ?>
"  class="img-responsive center-block datu" >-->
			<div class="bantu datu" style="background: url(<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['item']['imgurl']; ?>
) no-repeat center center;"></div>
			<?php endforeach; endif; ?>
        </header>
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:productsbanner,列表名:ad"), $this);?>
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
					<?php if (count((array)$this->_vars['list1'])): foreach ((array)$this->_vars['list1'] as $this->_vars['list']): ?>
        			<li <?php if ($this->_vars['pid'] == $this->_vars['list']['id'] || $this->_vars['products']['id'] == $this->_vars['list']['id']): ?> class="ding"<?php endif; ?>><a href="<?php echo $this->_run_modifier("productslist," . $this->_vars['list']['type_id'] . "," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a></li>
					<?php endforeach; endif; ?>
        		</ul>
        	</div>
        </div>
         <!--banner下导航结束-->
         <!--易估通开始-->
        <?php echo $this->_vars['products']['content']; ?>

		<!--<?php if ($this->_vars['products']['id'] == '4'): ?>
		<section>
			<div class="container product" style="border:none;">

		<div class="row">
			<div class="product-h2"><h2>4.其他功能定制</h2>
			</div>
			<div class="top-con1">
				<p>根据客户需求可以按需求定制各项功能（如：历史价格统计、价格曲线趋势和价格相关要素搜索等）</p>
			</div>
			<div class="product-h2" style="font-size:24px;margin-bottom:20px;"><h2 style="font-size:24px;">网页版测试账号申请</h2>
			</div>
			<form class="form-horizontal forto" id="Form1" method="post" action="products.php?act=need_save" role="form">   <div class="form-group">
				<label for="name" class="col-sm-1 col-xs-1 control-label lab">*</label>     <div class="col-sm-11 col-xs-11">
				<input class="form-control" id="name" name="name" placeholder="姓名" type="text" />     </div>
			</div>
				<div class="form-group">
					<label for="phone" class="col-sm-1 col-xs-1 control-label lab">*</label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="phone" id="phone" placeholder="手机号码" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="company_name" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="company_name" id="company_name" placeholder="公司名称" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="office" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="office" id="office" placeholder="部门" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="job" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" id="job" name="job" placeholder="职务" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-1 col-xs-1 control-label lab">*</label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="email" id="email" placeholder="Email" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="content" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11 neirong">
					<textarea class="form-control" id="content" name="content" placeholder="内容"></textarea></div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-1 col-xs-offset-1 col-sm-11 col-xs-11">
						<div class="checkbox">
							<label>           <input style="margin-top:-15px;" type="checkbox" /> <a href="products.php?act=xieyi" target="_blank"><span style="color:#FD6D00;vertical-align:top;">《已阅读用户协议》</span></a>         </label>       </div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-1 col-xs-offset-1 col-sm-11 col-xs-11">
						<button type="submit" class="btn btn-default tijiao">提交</button>     </div>
				</div>
			</form></div>
				</div>
		</section>
		<?php endif; ?>-->
         <!--底部开始-->
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

