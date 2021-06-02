<?php require_once('D:\website\wyhytech\include\template_lite\plugins\function.contact_category.php'); $this->register_function("contact_category", "tpl_function_contact_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.about_category.php'); $this->register_function("about_category", "tpl_function_about_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.technical_category.php'); $this->register_function("technical_category", "tpl_function_technical_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.solution_category.php'); $this->register_function("solution_category", "tpl_function_solution_category",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2018-03-19 16:47 �й���׼ʱ�� */ ?>

﻿<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <img src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_13.png">
                <ul class="fenxiang bdsharebuttonbox">
                    <li><img href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/index_16.png" class="img-responsive"></li>
                    <li><img href="#"  class="bds_tsina" data-cmd="tsina" title="分享到新浪微博" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/index_18.png" class="img-responsive"></li>
                    <li><img href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_20.png" class="img-responsive"></li>
                    <li><img href="#" title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_22.png" class="img-responsive"></li>
                    <li><img href="#" id="more" class="bds_more" data-cmd="more" src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/foot_24.png" class="img-responsive"></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>解决方案</h5></li>
                    <?php echo tpl_function_solution_category(array('set' => "列表名:category,解决方案大类:0"), $this);?>
                    <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                    <li><a href="<?php echo $this->_run_modifier("solutionlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a></li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>产品中心</h5></li>

                    <li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
products/products.php?id=1">易估通</a></li>
                    <li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
products/products.php?id=2">评估管理系统</a></li>
                    <li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
products/products.php?id=3">拍卖业务管理</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 fir">
                <ul>
                    <li><h5>技术支持</h5></li>
                    <?php echo tpl_function_technical_category(array('set' => "列表名:category,技术支持大类:0"), $this);?>
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
                    <li><h5>关于我们</h5></li>
                    <?php echo tpl_function_about_category(array('set' => "列表名:category,关于我们大类:0"), $this);?>
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
                    <li><h5>联系我们</h5></li>
                    <?php echo tpl_function_contact_category(array('set' => "列表名:category,联系我们大类:0"), $this);?>
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
contact/message.php">在线留言</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="foot">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-7 col-xs-12 foot-di">沪ICP备16045609号 &nbsp;&nbsp;&nbsp;Copyright ©上海维英恒业科技有限公司.All Rights Reserved.</div>
		<div class="col-lg-2 col-md-2 col-sm-5 col-xs-12 foot-di footdi"><a href="#0" class="cd-top" style="color: #898989;">返回顶部</a></div>
		<div style="width:300px;margin:0 auto; padding:20px 0;">
		 		<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010902002423" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="images/beian.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">沪公网安备 31010902002423号</p></a>
		 	</div>
			
            </div>
        </div>
    </div>

</footer>