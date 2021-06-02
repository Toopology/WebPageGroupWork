<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.contact_category.php'); $this->register_function("contact_category", "tpl_function_contact_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2017-02-07 17:38 �й���׼ʱ�� */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>在线留言-<?php echo $this->_vars['SYS']['site_name']; ?>
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
			$("#Form1").validate({
				rules:{
					name:{
						required: true
					},
					phone:{
						required: true
					},
					email:{
						required: true,
						email:true
					},
					content:{
						required: true,
						minlength:10,
						maxlength:600
					}
				},
				messages: {
					name:{
						required: "请输入姓名"
					},
					phone:{
						required: "请输入电话"
					},
					email:{
						required: "请输入邮箱",
						email:"邮箱填写错误"
					},
					content: {
						required: "请输入具体内容",
						minlength: jQuery.format("内容不能小于{0}个字符"),
						maxlength: jQuery.format("内容不能大于{0}个字符")
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
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:contactbanner,列表名:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<!--<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
"  class="img-responsive center-block datu" >-->
			<div class="bantu datu" style="background: url(<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
) no-repeat center center;"></div>
			<?php endforeach; endif; ?>
        </header>
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "显示数目:1,调用名称:contactbanner,列表名:ad"), $this);?>
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
					<?php echo tpl_function_contact_category(array('set' => "列表名:category,联系我们大类:0"), $this);?>
					<?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
					<?php if ($this->_vars['list']['id'] == 1): ?>
					<li <?php if ($this->_vars['list']['id'] == $this->_vars['id']): ?> class="ding"<?php endif; ?>>
					<a  href="<?php echo $this->_run_modifier("contact," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

					</a>
					</li>
					<?php else: ?>
					<li <?php if ($this->_vars['list']['id'] == $this->_vars['id']): ?> class="ding"<?php endif; ?>>
					<a  href="<?php echo $this->_run_modifier("talent," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

					</a>
					</li>
					<?php endif; ?>
					<?php endforeach; endif; ?>
					<li class="ding"><a  href="<?php echo $this->_vars['SYS']['site_dir']; ?>
contact/message.php">在线留言</a></li>
        		</ul>
        	</div>
        </div>
         <!--banner下导航结束--> 
        <section style="margin: 50px 0px;">
        	<div class="container">
				<form id="Form1" action="message.php?act=message_save" method="post">
        		<div class="row contact-liuyan">
                    <div class="col-xs-5 col-md-5 col-sm-5 col-xs-10 col-lg-offset-1 col-xs-offset-1 ppu">
                        <input type="text" id="name" name="name" class="form-control" placeholder="姓名">
                    </div>
                    <div class="col-xs-5 col-md-5 col-sm-5 col-xs-10  ppu ppus">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="电话">
                    </div>
                    
                </div>
                <div class="row contact-liuyan">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1  col-lg-offset-1">
                        <input id="email" name="email" type="text" class="form-control" placeholder="邮箱">
                    </div>
                    
                </div>
                <div class="row contact-liuyan">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
                        <textarea id="content" name="content" class="form-control" placeholder="内容"></textarea>
                    </div>
                    
                </div>
                <div class="row contact-liuyan">
                    <div class="col-xs-10 col-lg-offset-1 col-xs-offset-1">
                        <div class="form-group tijao">
      <button type="submit" class="btn btn-default tijiao">提交</button>
  </div>
                    </div>
                    
                </div>
				</form>
        	</div>
        </section>
         
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
