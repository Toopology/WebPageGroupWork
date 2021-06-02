<?php require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.contact_category.php'); $this->register_function("contact_category", "tpl_function_contact_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2017-02-07 17:37 中国标准时间 */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>鑱旂郴鎴戜滑-<?php echo $this->_vars['SYS']['site_name']; ?>
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
            <?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:contactbanner,鍒楄〃鍚�:ad"), $this);?>
            <?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['list']): ?>
            <!--<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
"  class="img-responsive center-block datu" >-->
            <div class="bantu datu" style="background: url(<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['list']['imgurl']; ?>
) no-repeat center center;"></div>
            <?php endforeach; endif; ?>
        </header>
        
        <header>
			<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:contactbanner,鍒楄〃鍚�:ad"), $this);?>
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
					<?php echo tpl_function_contact_category(array('set' => "鍒楄〃鍚�:category,鑱旂郴鎴戜滑澶х被:0"), $this);?>
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
        			<li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
contact/message.php">鍦ㄧ嚎鐣欒█</a></li>
        		</ul>
        	</div>
        </div>
         <!--banner涓嬪鑸粨鏉�--> 
        <section>
        	<div class="container">
        		<div class="row dichan-zong" style="border:1px solid #e5e5e5;padding-bottom: 0px;">
        			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12  dichan">
        				<?php echo $this->_vars['contact']['content']; ?>

        			</div>
        			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        				<div style="width:100%;height:350px;" id="map"></div>
        			</div>
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
 <script type="text/javascript">
    //鍒涘缓鍜屽垵濮嬪寲鍦板浘鍑芥暟锛�
    function initMap(){
      createMap();//鍒涘缓鍦板浘
      setMapEvent();//璁剧疆鍦板浘浜嬩欢
      addMapControl();//鍚戝湴鍥炬坊鍔犳帶浠�
      addMapOverlay();//鍚戝湴鍥炬坊鍔犺鐩栫墿
    }
    function createMap(){ 
      map = new BMap.Map("map"); 
      map.centerAndZoom(new BMap.Point(121.49868,31.240598),13);
    }
    function setMapEvent(){
      map.enableScrollWheelZoom();
      map.enableKeyboard();
      map.enableDragging();
      map.enableDoubleClickZoom()
    }
    function addClickHandler(target,window){
      target.addEventListener("click",function(){
        target.openInfoWindow(window);
      });
    }
    function addMapOverlay(){
      var markers = [
        {content:"鍦板潃锛氫笂娴峰競榛勬郸璺�99鍙凤紙涓婃捣婊╁浗闄呭ぇ鍘︼級22妤� <br>閭紪锛�200080  <br>鐢佃瘽锛�021-63830089  <br>浼犵湡锛�021-63830322",title:"涓婃捣缁磋嫳鎭掍笟绉戞妧鏈夐檺鍏徃",imageOffset: {width:0,height:3},position:{lat:31.251651,lng:121.499111}}
      ];
      for(var index = 0; index < markers.length; index++ ){
        var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
        var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",new BMap.Size(20,25),{
          imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
        })});
        var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
        var opts = {
          width: 200,
          title: markers[index].title,
          enableMessage: false
        };
        var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
        marker.setLabel(label);
        addClickHandler(marker,infoWindow);
        map.addOverlay(marker);
      };
    }
    //鍚戝湴鍥炬坊鍔犳帶浠�
    function addMapControl(){
      var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
      scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
      map.addControl(scaleControl);
      var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
      map.addControl(navControl);
      var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:true});
      map.addControl(overviewControl);
    }
    var map;
      initMap();
  </script>
	</body>
</html>
