<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-16 15:19 中国标准时间 */ ?>

锘�<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>浜у搧涓績-<?php echo $this->_vars['SYS']['site_name']; ?>
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
		//楠岃瘉
		$(document).ready(function() {
			jQuery.validator.addMethod("email", function(value, element) {

				var email = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]w+)*$/;
				return this.optional(element) || (email.test(value));
			}, "閭鏍煎紡閿欒");
			jQuery.validator.addMethod("phone", function(value, element) {
				var length = value.length;
				var phone = /^(((1[3,5,8]{1}[0-9]{1})|(15[0-9]{1}))+\d{8})$/;
				return this.optional(element) || (length == 11 && phone.test(value));
			}, "鎵嬫満鍙风爜鏍煎紡閿欒");

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
						required: "璇疯緭鍏ュ鍚�"
					},
					phone:{
						required: "璇疯緭鍏ユ墜鏈哄彿鐮�",
						phone:"鎵嬫満鍙风爜鏍煎紡閿欒"
					},
					email:{
						required: "璇疯緭鍏ラ偖绠�",
						email:"閭濉啓閿欒"
					},
					check:{
						required: "璇烽�変腑闃呰鐢ㄦ埛鍗忚"
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
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:productsbanner,鍒楄〃鍚�:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['item']): ?>
			<!--<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['item']['imgurl']; ?>
"  class="img-responsive center-block datu" >-->
			<div class="bantu datu" style="background: url(<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['item']['imgurl']; ?>
) no-repeat center center;"></div>
			<?php endforeach; endif; ?>
        </header>
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:productsbanner,鍒楄〃鍚�:ad"), $this);?>
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
					<?php if (count((array)$this->_vars['list1'])): foreach ((array)$this->_vars['list1'] as $this->_vars['list']): ?>
        			<li <?php if ($this->_vars['pid'] == $this->_vars['list']['id'] || $this->_vars['products']['id'] == $this->_vars['list']['id']): ?> class="ding"<?php endif; ?>><a href="<?php echo $this->_run_modifier("productslist," . $this->_vars['list']['type_id'] . "," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['title']; ?>
</a></li>
					<?php endforeach; endif; ?>
        		</ul>
        	</div>
        </div>
         <!--banner涓嬪鑸粨鏉�-->
         <!--鏄撲及閫氬紑濮�-->
        <?php echo $this->_vars['products']['content']; ?>

		<!--<?php if ($this->_vars['products']['id'] == '4'): ?>
		<section>
			<div class="container product" style="border:none;">

		<div class="row">
			<div class="product-h2"><h2>4.鍏朵粬鍔熻兘瀹氬埗</h2>
			</div>
			<div class="top-con1">
				<p>鏍规嵁瀹㈡埛闇�姹傚彲浠ユ寜闇�姹傚畾鍒跺悇椤瑰姛鑳斤紙濡傦細鍘嗗彶浠锋牸缁熻銆佷环鏍兼洸绾胯秼鍔垮拰浠锋牸鐩稿叧瑕佺礌鎼滅储绛夛級</p>
			</div>
			<div class="product-h2" style="font-size:24px;margin-bottom:20px;"><h2 style="font-size:24px;">缃戦〉鐗堟祴璇曡处鍙风敵璇�</h2>
			</div>
			<form class="form-horizontal forto" id="Form1" method="post" action="products.php?act=need_save" role="form">   <div class="form-group">
				<label for="name" class="col-sm-1 col-xs-1 control-label lab">*</label>     <div class="col-sm-11 col-xs-11">
				<input class="form-control" id="name" name="name" placeholder="濮撳悕" type="text" />     </div>
			</div>
				<div class="form-group">
					<label for="phone" class="col-sm-1 col-xs-1 control-label lab">*</label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="phone" id="phone" placeholder="鎵嬫満鍙风爜" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="company_name" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="company_name" id="company_name" placeholder="鍏徃鍚嶇О" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="office" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="office" id="office" placeholder="閮ㄩ棬" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="job" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" id="job" name="job" placeholder="鑱屽姟" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-1 col-xs-1 control-label lab">*</label>     <div class="col-sm-11 col-xs-11">
					<input class="form-control" name="email" id="email" placeholder="Email" type="text" />     </div>
				</div>
				<div class="form-group">
					<label for="content" class="col-sm-1 col-xs-1 control-label lab"></label>     <div class="col-sm-11 col-xs-11 neirong">
					<textarea class="form-control" id="content" name="content" placeholder="鍐呭"></textarea></div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-1 col-xs-offset-1 col-sm-11 col-xs-11">
						<div class="checkbox">
							<label>           <input style="margin-top:-15px;" type="checkbox" /> <a href="products.php?act=xieyi" target="_blank"><span style="color:#FD6D00;vertical-align:top;">銆婂凡闃呰鐢ㄦ埛鍗忚銆�</span></a>         </label>       </div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-1 col-xs-offset-1 col-sm-11 col-xs-11">
						<button type="submit" class="btn btn-default tijiao">鎻愪氦</button>     </div>
				</div>
			</form></div>
				</div>
		</section>
		<?php endif; ?>-->
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

