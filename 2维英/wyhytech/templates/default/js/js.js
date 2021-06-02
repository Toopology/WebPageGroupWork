$(function(){
	$('.center').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 3
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 1
            }
        }]
    });
    
var Width=$("body").width();
if(Width<='480'){
	$('.autoplay').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 5000,

});
}else{
	$('.autoplay').slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 5000,

});
}


});


//全局变量，动态的文章ID
    var ShareURL = "";
    //绑定所有分享按钮所在A标签的鼠标移入事件，从而获取动态ID
    $(function () {
        $(".pro-fx img").mouseover(function () {
            ShareURL = $(this).attr("data-url");
        });
        $(".top").click(function(){
            $("html,body").animate({scrollTop: 0}, 600);
        });
    });

    /*
     * 动态设置百度分享URL的函数,具体参数
     * cmd为分享目标id,此id指的是插件中分析按钮的ID
     *，我们自己的文章ID要通过全局变量获取
     * config为当前设置，返回值为更新后的设置。
     */
    function SetShareUrl(cmd, config) {
        if (ShareURL) {
            config.bdUrl = ShareURL;
        }
        return config;
    }
    //获取URL地址
    var curWwwPath = window.document.location.href;

    //插件的配置部分，注意要记得设置onBeforeClick事件，主要用于获取动态的文章ID
    window._bd_share_config = {
        "common": {
            onBeforeClick: curWwwPath,bdUrl:curWwwPath, "bdSnsKey": {}, "bdText": "上海维英恒业科技有限公司"
            , "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "24"
        }, "share": {}
    };
    //插件的JS加载部分
    with (document) 0[(getElementsByTagName('head')[0] || body)
            .appendChild(createElement('script'))
            .src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='
            + ~(-new Date() / 36e5)];
 


//返回顶部
$(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 100,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 100,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 200,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	//www.sucaijiayuan.com
	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});
