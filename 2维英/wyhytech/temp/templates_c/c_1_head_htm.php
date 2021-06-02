<?php require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.about_category.php'); $this->register_function("about_category", "tpl_function_about_category",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.train_category.php'); $this->register_function("train_category", "tpl_function_train_category",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.onlineschool_category.php'); $this->register_function("onlineschool_category", "tpl_function_onlineschool_category",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.products_category.php'); $this->register_function("products_category", "tpl_function_products_category",false);  require_once('E:\wamp\www\lianzhi\include\template_lite\plugins\function.nav.php'); $this->register_function("nav", "tpl_function_nav",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-10-12 10:02 �й���׼ʱ�� */ ?>

<div class="navs">
    <div class="container">
        <!-- 响应式导航 -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
"><img src="<?php echo $this->_vars['SYS']['site_template']; ?>
images/index_03.jpg" style="height: 46px; margin-top: 20px;"></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div style="height: auto;" class="collapse navbar-collapse in navbar-right" id="example-navbar-collapse">
                <ul class="nav navbar-nav " id="erji">
                    <?php echo tpl_function_nav(array('set' => "调用名称:SYS_top,列表名:list"), $this);?>
                    <?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['list']): ?>
                    <?php if ($this->_vars['list']['tag'] == 'homepage'): ?>
                    <li><a href="<?php echo $this->_vars['list']['url']; ?>
" target="<?php echo $this->_vars['list']['target']; ?>
" <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><?php echo $this->_vars['list']['title']; ?>
</a></li>
                    <?php elseif ($this->_vars['list']['tag'] == 'products'): ?>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_vars['list']['url']; ?>
" target="<?php echo $this->_vars['list']['target']; ?>
" <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><?php echo $this->_vars['list']['title']; ?>
</a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <?php echo tpl_function_products_category(array('set' => "列表名:category,产品大类:0"), $this);?>
                            <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                            <li>
                                <a  href="<?php echo $this->_run_modifier("productslist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                                </a>
                            </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </li>
                    <?php elseif ($this->_vars['list']['tag'] == 'onlineschool'): ?>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_vars['list']['url']; ?>
" target="<?php echo $this->_vars['list']['target']; ?>
" <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><?php echo $this->_vars['list']['title']; ?>
</a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <?php echo tpl_function_onlineschool_category(array('set' => "列表名:category,学堂大类:0"), $this);?>
                            <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                            <?php if ($this->_vars['list']['id'] == '1'): ?>
                            <li >
                                <a  href="<?php echo $this->_run_modifier("manuallist,1", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php elseif ($this->_vars['list']['id'] == '2'): ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("videodown,2", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php else: ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("videolist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; endif; ?>
                        </ul>
                    </li>
                    <?php elseif ($this->_vars['list']['tag'] == 'train'): ?>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_vars['list']['url']; ?>
" target="<?php echo $this->_vars['list']['target']; ?>
" <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><?php echo $this->_vars['list']['title']; ?>
</a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <?php echo tpl_function_train_category(array('set' => "列表名:category,培训大类:0"), $this);?>
                            <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                            <?php if ($this->_vars['list']['id'] == '1'): ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("teacherlist,1", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php elseif ($this->_vars['list']['id'] == '2'): ?>
                            <li >
                                <a  href="<?php echo $this->_run_modifier("courselist,2", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php elseif ($this->_vars['list']['id'] == '3'): ?>
                            <li>
                                <a  href="<?php echo $this->_run_modifier("trainlist,3", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php else: ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("caselist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; endif; ?>
                        </ul>
                    </li>
                    <?php elseif ($this->_vars['list']['tag'] == 'about'): ?>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $this->_vars['list']['url']; ?>
" target="<?php echo $this->_vars['list']['target']; ?>
" <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><?php echo $this->_vars['list']['title']; ?>
</a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <?php echo tpl_function_about_category(array('set' => "列表名:category,关于我们大类:0"), $this);?>
                            <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                            <?php if ($this->_vars['list']['id'] == '1'): ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("about,1", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php elseif ($this->_vars['list']['id'] == '2'): ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("newslist,2", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php elseif ($this->_vars['list']['id'] == '3'): ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("honour,3", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php elseif ($this->_vars['list']['id'] == '4'): ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("talent,4", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php else: ?>
                            <li>
                                <a href="<?php echo $this->_run_modifier("contact," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; endif; ?>
                    <li><img onclick="javascript:location.href='<?php echo $this->_vars['SYS']['site_domain'];  echo $this->_vars['SYS']['site_dir']; ?>
search/search.php'" src="<?php echo $this->_vars['SYS']['site_template']; ?>
images/index_06.jpg"></li>
                </ul>
            </div>
        </nav>
    </div>
</div>