<?php require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-11 09:06 �й���׼ʱ�� */ ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 med">
                <div class="content tag-cloud friend-links footnav">
                    <a href="#">首页 &nbsp;| &nbsp;</a>
                    <a href="<?php echo $this->_run_modifier("productslist,1", 'url', 'plugin', 1); ?>
">产品展示&nbsp; | &nbsp;</a>
                    <a href="<?php echo $this->_run_modifier("manuallist,1", 'url', 'plugin', 1); ?>
">线上学堂&nbsp; | &nbsp;</a>
                    <a href="<?php echo $this->_run_modifier("teacherlist,1", 'url', 'plugin', 1); ?>
">教育培训中心&nbsp; | &nbsp;</a>
                    <a href="<?php echo $this->_run_modifier("trainlist,3", 'url', 'plugin', 1); ?>
">海外培训&nbsp; | &nbsp;</a>
                    <a href="<?php echo $this->_run_modifier("caselist,4", 'url', 'plugin', 1); ?>
">临床病例报告&nbsp; | &nbsp;</a>
                    <a href="<?php echo $this->_run_modifier("about,1", 'url', 'plugin', 1); ?>
">关于我们</a>
                </div>
                <div class="content tag-cloud friend-links">
                    ©Copyright 1998-2016, Alliance. All rights reserved.
                </div>
                <div class="content tag-cloud friend-links">
                    互联网药品信息服务资格证书编号：（沪）- 非经营性 - 2011-0128
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" align="center">
                <img src="<?php echo $this->_vars['SYS']['site_template']; ?>
images/index_61.jpg">
            </div>
        </div>
    </div>
</footer>