<?php require_once('D:\website\wyhytech\include\template_lite\plugins\function.contact_category.php'); $this->register_function("contact_category", "tpl_function_contact_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.about_category.php'); $this->register_function("about_category", "tpl_function_about_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.technical_category.php'); $this->register_function("technical_category", "tpl_function_technical_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.solution_category.php'); $this->register_function("solution_category", "tpl_function_solution_category",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-19 16:47 中国标准时间 */ ?>

锘�<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <img src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_13.png">
                <ul class="fenxiang bdsharebuttonbox">
                    <li><img href="#" class="bds_weixin" data-cmd="weixin" title="鍒嗕韩鍒板井淇�" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/index_16.png" class="img-responsive"></li>
                    <li><img href="#"  class="bds_tsina" data-cmd="tsina" title="鍒嗕韩鍒版柊娴井鍗�" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/index_18.png" class="img-responsive"></li>
                    <li><img href="#" class="bds_sqq" data-cmd="sqq" title="鍒嗕韩鍒癚Q濂藉弸" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_20.png" class="img-responsive"></li>
                    <li><img href="#" title="鍒嗕韩鍒拌吘璁井鍗�" href="#" class="bds_tqq" data-cmd="tqq" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_22.png" class="img-responsive"></li>
                    <li><img href="#" id="more" class="bds_more" data-cmd="more" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_24.png" class="img-responsive"></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>瑙ｅ喅鏂规</h5></li>
                    <?php echo tpl_function_solution_category(array('set' => "鍒楄〃鍚�:category,瑙ｅ喅鏂规澶х被:0"), $this);?>
                    <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                    <li><a href="<?php echo $this->_run_modifier("solutionlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a></li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>浜у搧涓績</h5></li>

                    <li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
products/products.php?id=1">鏄撲及閫�</a></li>
                    <li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
products/products.php?id=2">璇勪及绠＄悊绯荤粺</a></li>
                    <li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
products/products.php?id=3">鎷嶅崠涓氬姟绠＄悊</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>鎶�鏈敮鎸�</h5></li>
                    <?php echo tpl_function_technical_category(array('set' => "鍒楄〃鍚�:category,鎶�鏈敮鎸佸ぇ绫�:0"), $this);?>
                    <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                    <?php if ($this->_vars['list']['id'] == 1): ?>
                    <li>
                    <a  href="<?php echo $this->_run_modifier("downlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                    </a>
                    </li>
                    <?php else: ?>
                    <li>
                    <a  href="<?php echo $this->_run_modifier("viewpointlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                    </a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>鍏充簬鎴戜滑</h5></li>
                    <?php echo tpl_function_about_category(array('set' => "鍒楄〃鍚�:category,鍏充簬鎴戜滑澶х被:0"), $this);?>
                    <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                    <?php if ($this->_vars['list']['id'] == 1 || $this->_vars['list']['id'] == 2): ?>
                    <li>
                    <a  href="<?php echo $this->_run_modifier("about," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                    </a>
                    </li>
                    <?php elseif ($this->_vars['list']['id'] == 3): ?>
                    <li>
                    <a  href="<?php echo $this->_run_modifier("clientlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                    </a>
                    </li>
                    <?php else: ?>
                    <li>
                    <a  href="<?php echo $this->_run_modifier("newslist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                    </a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>鑱旂郴鎴戜滑</h5></li>
                    <?php echo tpl_function_contact_category(array('set' => "鍒楄〃鍚�:category,鑱旂郴鎴戜滑澶х被:0"), $this);?>
                    <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                    <?php if ($this->_vars['list']['id'] == 1): ?>
                    <li >
                    <a  href="<?php echo $this->_run_modifier("contact," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                    </a>
                    </li>
                    <?php else: ?>
                    <li >
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
    </div>
    <div class="foot">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-7 col-xs-12 foot-di">娌狪CP澶�16045609鍙� &nbsp;&nbsp;&nbsp;Copyright 漏涓婃捣缁磋嫳鎭掍笟绉戞妧鏈夐檺鍏徃.All Rights Reserved.</div>
		<div class="col-lg-2 col-md-2 col-sm-5 col-xs-12 foot-di footdi"><a href="#0" class="cd-top" style="color: #898989;">杩斿洖椤堕儴</a></div>
		<div style="width:300px;margin:0 auto; padding:20px 0;">
		 		<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010902002423" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="images/beian.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">娌叕缃戝畨澶� 31010902002423鍙�</p></a>
		 	</div>
			
            </div>
        </div>
    </div>

</footer>