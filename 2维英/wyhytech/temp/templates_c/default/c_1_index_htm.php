<?php require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-13 16:32 中国标准时间 */ ?>

锘�<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $this->_vars['SYS']['site_name']; ?>
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
		
      <script data-turbolinks-track="true" src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/banner.js"></script>
<screta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maxmum-scale=1.0,minimum-scale=1.0">
	</head>
	<body>
		<div data="null" id="user-data"></div>
	<div data="{&quot;id&quot;:9217043,&quot;created_at&quot;:&quot;2016-10-09T05:02:47.000Z&quot;,&quot;updated_at&quot;:&quot;2016-10-01T05:02:47.000Z&quot;,&quot;item_ids&quot;:[],&quot;productsTotal&quot;:0.0,&quot;utensilsTotal&quot;:0,&quot;earliestDeliveryDate&quot;:null,&quot;undeliverDate&quot;:{&quot;1&quot;:[],&quot;2&quot;:[],&quot;3&quot;:[],&quot;4&quot;:[]}}" id="shopping-cart-data"></div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('header.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
		<!--banner-->
        <!--<div class="swiper-container pc-slideshows-swiper swiper-container-horizontal " id="front-page-carousel">
			<div class="swiper-wrapper " style="transition-duration: 0ms; transform: translate3d(-3166px, 0px, 0px);">
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:3,璋冪敤鍚嶇О:indexfocus,鍒楄〃鍚�:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<div class="swiper-slide" style="width: 100%;">
				<a href="<?php echo $this->_vars['list']['img_url']; ?>
">
					<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
">
				</a>
			</div>
			<?php endforeach; endif; ?>

		</div>
		<div class="swiper-pagination pc-swiper-pagination swiper-pagination-clickable">
			<span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
			<span class="swiper-pagination-bullet "></span>
			<span class="swiper-pagination-bullet"></span>
		</div>
	</div>-->
	<!--pc banner-->
	<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:3,璋冪敤鍚嶇О:indexfocus,鍒楄〃鍚�:ad"), $this);?>
		<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
    	<div class="photo" rel="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
"></div>
	<?php endforeach; endif; ?>
	
<div class="bans">
		        <ul>
		        	
		        	
		        </ul>
		        <ol >
		        </ol>
		        <i class="left"></i><i class="right"></i>
		   </div>
		   <!--pc banner-->
	<div class="swiper-container mobile-slideshows-swiper swiper-container-horizontal" id="mobile-front-page-carousel">
		<div class="swiper-wrapper" style="transition-duration: 300ms; transform: translate3d(0px, 0px, 0px);">
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:3,璋冪敤鍚嶇О:indexfocus,鍒楄〃鍚�:ad"), $this);?>
			<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
			<div class="swiper-slide" style="width: 703px">
				<a href="<?php echo $this->_vars['list']['img_url']; ?>
">
					<?php if ($this->_vars['list']['simgurl'] != ''): ?><img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['simgurl']; ?>
"><?php else: ?><img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
"><?php endif; ?>
				</a>
			</div>
			<?php endforeach; endif; ?>
		</div>
		<div class="swiper-pagination mobile-swiper-pagination swiper-pagination-clickable">
			<span class="swiper-pagination-bullet"></span>
			<span class="swiper-pagination-bullet"></span>
			<span class="swiper-pagination-bullet"></span>
		</div>
	</div>

 <script type="text/javascript" async="" src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/r.js"></script><script>
  $(document).ready(function(){
    Pantrysbest.SwiperPantry.init();
  });
</script>

        <!--banner缁撴潫-->
        <!--鍏充簬鎴戜滑-->
        <section>
        	<div class="container">
        		<div class="abouts">
        		    <div class="about-title">
        		    	<h3>鍏充簬鎴戜滑</h3>
        		    	<p><?php echo $this->_vars['about']['seo_description']; ?>
</p>
        		    </div>
        		    <div class="row about-lei">
        		    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 row-about">
        		    		<img src="images/index_09.jpg">
        		    		<span>鎶�鏈爺鍙�</span>
        		    	</div>
        		    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 row-about">
        		    		<img src="images/index_11.jpg">
        		    		<span>浜у搧鐮旂┒</span>
        		    	</div>
        		    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 row-about">
        		    		<img src="images/index_13.jpg">
        		    		<span>鍜ㄨ椤鹃棶</span>
        		    	</div>
        		    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 row-about">
        		    		<img src="images/index_15.jpg">
        		    		<span>瀹氬埗鏈嶅姟</span>
        		    	</div>
        		    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 row-about">
        		    		<img src="images/index_17.jpg">
        		    		<span>鎶曡祫绠＄悊</span>
        		    	</div>
        		    </div>
        	    </div>
        	</div>
        </section>
         <!--鍏充簬鎴戜滑缁撴潫-->
         <!--鏄撲及閫氫粙缁�-->
         <section style="background-color: #f8f8f8; margin-top: 50px; padding-bottom: 50px;">
         	<div class="container">
         		<div class="about-title">
        		    	<h3>鏄撲及閫氫粙缁�</h3>
        		    	<p><?php echo $this->_vars['ygt']['seo_description']; ?>
</p>
        		    </div>
        		    <div class="slider center">
						<?php if (count((array)$this->_vars['imgs'])): foreach ((array)$this->_vars['imgs'] as $this->_vars['list']): ?>
						<div><img src="<?php echo $this->_vars['SYS']['thumb_dir'];  echo $this->_vars['list']; ?>
" class="img-responsive"></div>
						<?php endforeach; endif; ?>
				</div>
				

         	</div>
         </section>
         <!--鏄撲及閫氫粙缁嶇粨鏉�-->
         <!--鏂伴椈鍔ㄦ�佸紑濮�-->
         <section>
         	<div class="container">
         		<div class="about-title">
        		    	<h3>鏈�鏂板姩鎬�</h3>       		    	
        		</div>
         		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li class="" data-target="#myCarousel" data-slide-to="1"></li>
        <li class="" data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
		<?php if (count((array)$this->_vars['news'])): foreach ((array)$this->_vars['news'] as $this->_vars['list']): ?>
        <div <?php if ($this->_vars['list']['num'] == 1): ?> class="item active"<?php else: ?> class="item"<?php endif; ?> >
            <a href="/about/news-show.php?id=<?php echo $this->_vars['list']['id']; ?>
">
              <h4><?php echo $this->_vars['list']['title']; ?>
</h4>
              <p><?php echo $this->_vars['list']['seo_description']; ?>
</p>
            </a>
        </div>
		<?php endforeach; endif; ?>
		<div class="item">
		<a href="/technical/viewpoint-show.php?id=<?php echo $this->_vars['technical']['id']; ?>
">
			<h4><?php echo $this->_vars['technical']['title']; ?>
</h4>
			<p><?php echo $this->_vars['technical']['seo_description']; ?>
</p>
		</a>
		</div>
    </div>
    
</div>
         	</div>
         	<style>
         	 @media (max-width:1366px){
         	 	.swiper-wrapper{transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);}
         	 }
         		.carousel-inner .item{ height: auto; background: none; width: 80%; text-align: center; margin: 0 auto; margin-bottom: 70px;}
         		.carousel-inner .item a h4{ color: #000; font-size: 22px; font-weight: normal; margin-top: 40px;}
         		.carousel-inner .item a p{ color: #666; margin: 0 auto; margin-top: 20px; line-height: 30px;width: 90%;}
         		.carousel-inner .item a:hover{ text-decoration: none;}
         		.carousel-indicators{ text-align: center; }
         		.carousel-indicators li{ border-radius:0px; background-color: #b3b3b3; border: none;}
         		.carousel-indicators li.active{ background-color: #333333;border: none;}
         		@media (min-width:1200px) {
         			
	             .carousel-inner .item{min-height: auto;}
                }
                @media (max-width:960px) {
         			
	             .carousel-inner .item{min-height: auto;}
                }
                @media  screen(min-width:768px) and (max-width: 960px) {
                  .menu-container {
                     .carousel-inner .item{min-height: auto;}
                    }
                    
                }
                
                @media (max-width:480px) {
         			
	             .carousel-inner .item{min-height: auto;width: 90%;}
                }
         	</style>
         </section>
         <!--鏂伴椈鍔ㄦ�佺粨鏉�-->
         <!--瑙ｅ喅鏂规寮�濮�-->
         <section style="background-color: #f8f8f8; margin-top: 50px; padding-bottom: 50px;">
         	<div class="container">
         		<div class="about-title">
        		    	<h3>瑙ｅ喅鏂规</h3>       		    	
        		</div>
        		<div class="slider autoplay">
					<?php if (count((array)$this->_vars['solution'])): foreach ((array)$this->_vars['solution'] as $this->_vars['list']): ?>
					<div>
						<div class="su-fan">
							<div class="su-img"></div>
						<h3></h3>
						<h4><?php echo $this->_vars['list']['title']; ?>
</h4>
						<p><?php echo $this->_vars['list']['seo_description']; ?>
</p>
						</div>
					</div>
					<?php endforeach; endif; ?>

				</div>
         	</div>
         </section>
         <!--瑙ｅ喅鏂规缁撴潫-->
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
<script type="text/javascript">
		$(function(){ //椤甸潰鍔犺浇瀹屾瘯鎵嶆墽琛�

            //=========璁剧疆鍙傛暟==========
            //鍥剧墖缁熶竴楂樺害锛�
            var images_height = '500px';
            //鍥剧墖璺緞/閾炬帴(鏁扮粍褰㈠紡):
            var images_url=Array();
            $(".photo").each(function(i){
            	images_url[i]=$(this).attr("rel");
            })
            
            var images_count = images_url.length;
           
            //console.log(images_count);

            //鍒涘缓鑺傜偣
            //鍥剧墖鍒楄〃鑺傜偣
            for(var j=0;j<images_count+1;j++){
            	
                $('.bans ul').append('<li></li>')
            }
            //杞挱鍦嗙偣鎸夐挳鑺傜偣
            for(var j=0;j<images_count;j++){
                if(j==0){
                    $('.bans ol').append('<li class="current"></li>')
                }else{
                    $('.bans ol').append('<li></li>')
                }
            }

            //杞藉叆鍥剧墖
            $('.bans ul li').css('background-image','url('+images_url[0]+')');
            $.each(images_url,function(key,value){
                $('.bans ul li').eq(key).css('background-image','url('+value+')');
            });

            $('.bans').css('height',images_height);

            $('.bans ul').css('width',(images_count+1)*100+'%');

            $('.bans ol').css('width',images_count*30+'px');
            $('.bans ol').css('margin-left',-images_count*20*0.5-10+'px');

            //=========================

            var num = 0;
            //鑾峰彇绐楀彛瀹藉害
            var window_width = $(window).width();
            $(window).resize(function(){
                window_width = $(window).width();
                $('.bans ul li').css({width:window_width});
                clearInterval(timer);
                nextPlay();
                timer = setInterval(nextPlay,40000);
            });
            //console.log(window_width);
            $('.bans ul li').width(window_width);
            //杞挱鍦嗙偣
            $('.bans ol li').mouseover(function(){//鐢╤over鐨勮瘽浼氭湁涓や釜浜嬩欢(榧犳爣杩涘叆鍜岀寮�)
                $(this).addClass('current').siblings().removeClass('current');
                //绗竴寮犲浘锛� 0 * window_width
                //绗簩寮犲浘锛� 1 * window_width
                //绗笁寮犲浘锛� 2 * window_width
                //鑾峰彇褰撳墠缂栧彿
                var i = $(this).index();
                //console.log(i);
                $('.bans ul').stop().animate({left:-i*window_width},1000);
                num = i;
            });
            //鑷姩鎾斁
            var timer = null;
            function prevPlay(){
                num--;
                if(num<0){
                    //鎮勬倓鎶婂浘鐗囪烦鍒版渶鍚庝竴寮犲浘(澶嶅埗椤�,涓庣涓�寮犲浘鐩稿悓),鐒跺悗鍋氬嚭鍥剧墖鎾斁鍔ㄧ敾锛宭eft鍙傛暟鏄畾浣嶈�屼笉鏄Щ鍔ㄧ殑闀垮害
                    $('.bans ul').css({left:-window_width*images_count}).stop().animate({left:-window_width*(images_count-1)},10000);
                    num=images_count-1;
                }else{
                    //console.log(num);
                    $('.bans ul').stop().animate({left:-num*window_width},20000);
                }
                if(num==images_count-1){
                    $('.bans ol li').eq(images_count-1).addClass('current').siblings().removeClass('current');
                }else{
                    $('.bans ol li').eq(num).addClass('current').siblings().removeClass('current');

                }
            }
            function nextPlay(){
                num++;
                if(num>images_count){
                    //鎾斁鍒版渶鍚庝竴寮�(澶嶅埗椤�)鍚�,鎮勬倓鍦版妸鍥剧墖璺冲埌绗竴寮�,鍥犱负鍜岀涓�寮犵浉鍚�,鎵�浠ラ毦浠ュ彂瑙�,
                    $('.bans ul').css({left:0}).stop().animate({left:-window_width},1000);
                    //css({left:0})鏄洿鎺ユ倓鎮勬敼鍙樹綅缃紝animate({left:-window_width},500)鏄仛鍑虹Щ鍔ㄥ姩鐢�
                    //闅忓悗瑕佹妸鎸囬拡鎸囧悜绗簩寮犲浘鐗�,琛ㄧず宸茬粡鎾斁鑷崇浜屽紶浜嗐��
                    num=1;
                }else{
                    //鍦ㄦ渶鍚庨潰鍔犲叆涓�寮犲拰绗竴寮犵浉鍚岀殑鍥剧墖锛屽鏋滄挱鏀惧埌鏈�鍚庝竴寮狅紝缁х画寰�涓嬫挱锛屾倓鎮勫洖鍒扮涓�寮�(鑲夌溂鐪嬩笉瑙�)锛屼粠绗竴寮犳挱鏀惧埌绗簩寮�
                    //console.log(num);
                    $('.bans ul').stop().animate({left:-num*window_width},1000);
                }
                if(num==images_count){
                    $('.bans ol li').eq(0).addClass('current').siblings().removeClass('current');
                }else{
                    $('.bans ol li').eq(num).addClass('current').siblings().removeClass('current');

                }
            }
            timer = setInterval(nextPlay,5000);
            //榧犳爣缁忚繃banner锛屽仠姝㈠畾鏃跺櫒,绂诲紑鍒欑户缁挱鏀�
            $('.bans').mouseenter(function(){
                clearInterval(timer);
                //宸﹀彸绠ご鏄剧ず(娣″叆)
                $('.bans i').fadeIn();
            }).mouseleave(function(){
                timer = setInterval(nextPlay,5000);
                //宸﹀彸绠ご闅愯棌(娣″嚭)
                $('.bans i').fadeOut();
            });
            //鎾斁涓嬩竴寮�
            $('.bans .right').click(function(){
                nextPlay();
            });
            //杩斿洖涓婁竴寮�
            $('.bans .left').click(function(){
                prevPlay();
            });
        });
	</script>
	</body>
</html>