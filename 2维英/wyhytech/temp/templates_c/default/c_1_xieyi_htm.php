<?php require_once('D:\website\wyhytech\include\template_lite\plugins\function.picture_ad.php'); $this->register_function("picture_ad", "tpl_function_picture_ad",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2017-06-21 09:09 中国标准时间 */ ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>鐢ㄦ埛鍗忚-<?php echo $this->_vars['SYS']['site_name']; ?>
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

	<!--<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('header.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
		-->
		<!--banner-->
	<!--<header>
		<?php echo tpl_function_picture_ad(array('set' => "鏄剧ず鏁扮洰:1,璋冪敤鍚嶇О:productsbanner,鍒楄〃鍚�:ad"), $this);?>
		<?php if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['item']): ?>
		&lt;!&ndash;<img src="<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['item']['imgurl']; ?>
"  class="img-responsive center-block datu" >&ndash;&gt;
		<div class="bantu datu" style="background: url(<?php echo $this->_vars['SYS']['upfiles_dir'];  echo $this->_vars['item']['imgurl']; ?>
) no-repeat center center;"></div>
		<?php endforeach; endif; ?>
	</header>-->
        <!--banner缁撴潫-->
        <section style="margin-bottom: 50px;">
        	<div class="container">
        		<div class="newsxq-conbot">
					<h4 style="color: #FC6F03; font-size:30px;text-align: center">鐢ㄦ埛鍗忚</h4>
        		<div class="xq-text">
        			<p>灏婃暚鐨勫鎴凤紝娆㈣繋鎮ㄨ瘯鐢ㄢ�滄槗浼伴�氭埧鍦颁骇璇勪及绯荤粺鈥濓紙浠ヤ笅绠�绉帮細鏄撲及閫氾級锛岃鍦ㄦ敞鍐屼箣鍓嶏紝璇锋偍浠旂粏闃呰浠ヤ笅鏉℃銆傜敤鎴峰繀椤婚伒瀹堜互涓嬫墍鏈夌浉鍏宠姹傦紝骞跺悓鎰忓悇椤圭害瀹氬悗鏂硅兘鍦ㄨ瀹氱殑璇曠敤鏈熷唴鍏嶈垂浣跨敤鏈郴缁熴��</p>
<h4 style="color: #FC6F03; font-size: 16px; margin-top: 20px;">涓�銆佸０鏄�</h4>
<p>锛�1锛� 鏄撲及閫氭槸鐢变笂娴风淮鑻辨亽涓氱鎶�鏈夐檺鍏徃鑷富鐮斿彂鐨勫湪绾胯瘎浼扮郴缁熴�傝绯荤粺杩愮敤淇℃伅鎶�鏈紝灏嗘埧鍦颁骇浼颁环鎶�鏈笌浼颁环甯堢殑缁忛獙鍏呭垎鎻夊悎锛屽埄鐢ㄥ厛杩涚殑缃戠粶骞冲彴锛屼负鎴垮湴浜ф湇鍔′笟鍔＄殑寮�灞曟彁渚涚嫭绔嬬殑绗笁鏂硅鐐广�傛湰绯荤粺鎵�鎻愪緵鐨勮瘎浼颁环鏍肩粨鏋滀粎渚涚敤鎴峰弬鑰冧娇鐢紝涓嶆瀯鎴愪换浣曞疄闄呬氦鏄撴壙璇猴紝鏈叕鍙镐笉鎵挎媴鐢辨閫犳垚鎹熷け鍜岀籂绾风殑浠讳綍娉曞緥璐ｄ换銆�</p>
 
<p>锛�2锛夋湰鍗忚鍙屾柟涓鸿瘯鐢ㄧ敤鎴蜂笌涓婃捣缁磋嫳鎭掍笟绉戞妧鏈夐檺鍏徃锛屾湰鍗忚鍏锋湁鍚堝悓鏁堝姏銆傚湪纭鏈崗璁悗锛屾湰鍗忚鍗充骇鐢熸硶寰嬫晥鍔涖�傝鎮ㄥ姟蹇呭湪娉ㄥ唽涔嬪墠璁ょ湡闃呰鏈崗璁叏閮ㄥ唴瀹癸紝濡傛湁浠讳綍鐤戦棶锛屽彲鍚戜笂娴风淮鑻辨亽涓氱鎶�鏈夐檺鍏徃鍜ㄨ銆傚湪鐢ㄦ埛鐐瑰嚮鈥滄垜宸查槄璇诲苟涓斿悓鎰忚瘯鐢ㄥ崗璁�濇寜閽苟鎸夋祦绋嬮�氳繃瀹℃牳鎴愬姛娉ㄥ唽涓鸿瘯鐢ㄧ敤鎴风殑锛屽嵆瑙嗕负鎺ュ彈鏈崗璁強鍚勭被瑙勫垯锛屽苟鍚屾剰鍙楀叾绾︽潫銆傚鏋滃彂鐢熺籂绾凤紝璇曠敤鐢ㄦ埛涓嶅緱浠ユ湭浠旂粏闃呰涓虹敱杩涜鎶楄京銆�</p>

<p>锛�3锛夋湰鍏徃灏婇噸骞朵繚鎶ゆ墍鏈夋敞鍐岀敤鎴风殑涓汉闅愮鏉冿紝鐢ㄦ埛娉ㄥ唽鐨勫鍚嶃�佹墜鏈哄彿鐮侊紝鍗曚綅鍚嶇О锛岃亴鍔″強鐢靛瓙閭欢鍦板潃绛夎祫鏂欙紝闈炵粡鏈汉璁稿彲鎴栨牴鎹浉鍏虫硶寰嬨�佹硶瑙勭殑寮哄埗鎬ц瀹氾紝鏈叕鍙镐笉浼氫富鍔ㄥ湴娉勯湶缁欑涓夋柟銆傚悓鏃讹紝鎮ㄦ湁涔夊姟濡ュ杽淇濈濂芥偍鐨勮处鍙峰強鐧诲綍瀵嗙爜锛屽惁鍒欙紝鐢辨閫犳垚鐨勪竴鍒囧悗鏋滃皢鐢辩敤鎴锋湰浜烘壙鎷呫��</p>

<p>锛�4锛夎纭繚鎮ㄦ彁渚涚殑鐩稿叧淇℃伅瀹屽叏鍑嗙‘锛屽惁鍒欐湁鍙兘浼氬鑷存偍鐨勮处鎴风敵璇锋棤娉曡幏寰楅�氳繃銆�</p> 

<p>锛�5锛夎瘯鐢ㄧ敤鎴蜂釜浜哄缃戠粶鏈嶅姟鐨勪娇鐢ㄦ壙鎷呴闄╋紝鏈叕鍙镐笉鍋氫换浣曞舰寮忕殑鎷呬繚锛屼笉璁烘槸鏄庣‘鎴栨槸闅愬惈鐨勩�備笉淇濊瘉鏈嶅姟涓嶄腑鏂紝瀵规湇鍔＄殑瀹夊叏鎬с�佹纭�с�侀�傜敤鎬у拰鏁堟灉鍧囦笉鍋氫换浣曚繚璇併�傚洜缃戠粶鐘跺喌銆侀�氳绾胯矾绛変换浣曟妧鏈師鍥犺�屽鑷存偍涓嶈兘姝ｅ父浣跨敤锛屾湰鍏徃涓嶆壙鎷呬换浣曟硶寰嬭矗浠汇��</p>

<p>锛�6锛夋敞鍐屾垚鍔熺殑璇曠敤鐢ㄦ埛椤诲Ε鍠勭鐞嗚嚜宸辩殑璐︽埛鍙婂瘑鐮侊紝涓嶅緱璧犱笌銆佸�熺敤銆佺鐢ㄣ�佽浆璁╂垨鑰呭敭鍗栫粰浠讳綍绗笁鏂广�傝嫢鍑轰簬璇曠敤鐢ㄦ埛鐨勫師鍥犲鑷磋处鎴锋垨瀵嗙爜娉勯湶锛岀敤鎴烽渶鑷鎵挎媴鐩稿簲鐨勪竴鍒囪矗浠伙紝涓庢湰鍏徃鏃犲叧銆�</p>

<p>锛�7锛夌敤鎴峰湪璇曠敤杩囩▼涓紝瀵逛簬鎺ヨЕ鎴栦簡瑙ｅ埌鐨勬湁鍏虫槗浼伴�氱殑涓�鍒囦俊鎭強璧勬枡锛屽潎璐熸湁淇濆瘑涔夊姟銆傞潪缁忔湰鍏徃鐨勪功闈㈠悓鎰忥紝涓嶅緱鍚戜换浣曠涓夋柟鎶湶浠讳綍淇濆瘑淇℃伅銆傚鎮ㄨ繚鍙嶄互涓婁换涓�瑙勫畾锛屼竴缁忓彂鐜帮紝鏈叕鍙稿皢绔嬪嵆鏆傚仠瀵硅璐︽埛鐨勭浉鍏虫湇鍔★紝骞朵繚鐣欏璇ユ偍杩涜娉曞緥杩藉伩鐨勬潈鍒┿��</p>

<p>锛�8锛夌敤鎴峰湪璇曠敤鏄撲及閫氱殑杩囩▼涓紝搴旈伒瀹堝浗瀹舵湁鍏虫硶寰嬫硶瑙勪互鍙婅绔犲埗搴︾殑瑙勫畾锛屼笉寰楀埄鐢ㄦ槗浼伴�氫粠浜嬩换浣曡繚娉曘�佽繚瑙勭殑娲诲姩銆�</p>

<h4 style="color: #FC6F03; font-size: 16px; margin-top: 20px;">浜屻�佷娇鐢ㄦ湡闄�</h4>
<p>锛�1锛夊厤璐硅瘯鐢ㄦ湡闄愪负鑷偍娉ㄥ唽鎴愬姛涔嬫棩璧风殑7涓嚜鐒舵棩锛堝寘鍚紤鎭棩鍙婃硶瀹氳妭鍋囨棩锛夛紝鍦ㄦ鏈熼棿锛屾槗浼伴�氫笉鏀跺彇浠讳綍璐圭敤銆�</p>

<p>锛�2锛夊厤璐硅瘯鐢ㄦ湡缁撴潫鍚庡闇�缁х画浣跨敤鏄撲及閫氱郴缁燂紝璇峰悜鏈叕鍙告彁鍑虹敵璇枫�傚叧浜庢垚涓烘寮忕敤鎴风殑鏈夊叧浜嬪疁锛屽弻鏂瑰彲閫氳繃鍙嬪ソ鍗忓晢骞跺彟琛岀璁㈣ˉ鍏呭崗璁��</p>

<h4 style="color: #FC6F03; font-size: 16px; margin-top: 20px;">涓夈�佸叾浠�</h4>
<p>锛�1锛夋湰鍗忚鐨勮绔嬨�佹墽琛屽拰瑙ｉ噴鍙婁簤璁殑瑙ｅ喅鍧囧簲閫傜敤涓崕浜烘皯鍏卞拰鍥芥硶寰嬨�傚鍙戠敓鏈崗璁笌閫傜敤涔嬫硶寰嬬浉鎶佃Е鏃讹紝鍒欒繖浜涙潯娆惧皢瀹屽叏鎸夋硶寰嬭瀹氶噸鏂拌В閲婏紝鑰屽叾浠栨湁鏁堟潯娆惧皢缁х画鏈夋晥銆�</p>
<p>锛�2锛夋湰鍗忚瑙ｉ噴鏉冨強淇鏉冨綊涓婃捣缁磋嫳鎭掍笟绉戞妧鏈夐檺鍏徃鎵�鏈夈��</p>
</p>
        			
        		</div>
        		
        	</div>
        	</div>
        </section>
         
         <!--搴曢儴寮�濮�-->
	<!--<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include('footer.htm', array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
	<script type="text/javascript" src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/slick.js" ></script>
	<script type="text/javascript" src="<?php echo $this->_vars['SYS']['site_template']; ?>
js/js.js" ></script>-->
 
	</body>
</html>
