<?php require_once('D:\website\wyhytech\include\template_lite\plugins\function.contact_category.php'); $this->register_function("contact_category", "tpl_function_contact_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.about_category.php'); $this->register_function("about_category", "tpl_function_about_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.technical_category.php'); $this->register_function("technical_category", "tpl_function_technical_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.solution_category.php'); $this->register_function("solution_category", "tpl_function_solution_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\modifier.url.php'); $this->register_modifier("url", "tpl_modifier_url",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.products_category.php'); $this->register_function("products_category", "tpl_function_products_category",false);  require_once('D:\website\wyhytech\include\template_lite\plugins\function.nav.php'); $this->register_function("nav", "tpl_function_nav",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2017-02-08 17:02 �й���׼ʱ�� */ ?>

<div class="navs">

    <div class="container">
        <div class="menu-container">
            <a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
"><img src="<?php echo $this->_vars['SYS']['site_dir']; ?>
images/banner_03.png" class="logo" style=" float: left; position: absolute;z-index: 1000;"></a>
            <div class="menu">
                <ul>
                	
                    <?php echo tpl_function_nav(array('set' => "调用名称:SYS_top,列表名:list"), $this);?>
                    <?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['list']): ?>
                    
                    <?php if ($this->_vars['list']['tag'] == 'products'): ?>
                    <li <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><a href="<?php echo $this->_vars['list']['url']; ?>
" ><?php echo $this->_vars['list']['title']; ?>
</a>
                        
                        <ul>
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
                    <?php elseif ($this->_vars['list']['tag'] == 'solution'): ?>
                    <li <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><a href="<?php echo $this->_vars['list']['url']; ?>
" ><?php echo $this->_vars['list']['title']; ?>
</a>

                    <ul>
                        <?php echo tpl_function_solution_category(array('set' => "列表名:category,产品大类:0"), $this);?>
                        <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                        <li>
                            <a  href="<?php echo $this->_run_modifier("solutionlist," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                            </a>
                        </li>
                        <?php endforeach; endif; ?>
                    </ul>

                    </li>
                    <?php elseif ($this->_vars['list']['tag'] == 'technical'): ?>
                    <li <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><a href="<?php echo $this->_vars['list']['url']; ?>
" ><?php echo $this->_vars['list']['title']; ?>
</a>

                    <ul>
                        <?php echo tpl_function_technical_category(array('set' => "列表名:category,产品大类:0"), $this);?>
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

                    </li>
                    <?php elseif ($this->_vars['list']['tag'] == 'about'): ?>
                    <li <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><a href="<?php echo $this->_vars['list']['url']; ?>
" ><?php echo $this->_vars['list']['title']; ?>
</a>

                    <ul>
                        <?php echo tpl_function_about_category(array('set' => "列表名:category,产品大类:0"), $this);?>
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

                    </li>
                    <?php elseif ($this->_vars['list']['tag'] == 'contact'): ?>
                    <li <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><a href="<?php echo $this->_vars['list']['url']; ?>
" ><?php echo $this->_vars['list']['title']; ?>
</a>

                    <ul>
                        <?php echo tpl_function_contact_category(array('set' => "列表名:category,产品大类:0"), $this);?>
                        <?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
                        <?php if ($this->_vars['list']['id'] == 1): ?>
                        <li>
                        <a  href="<?php echo $this->_run_modifier("contact," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                        </a>
                        </li>
                        <?php else: ?>
                        <li>
                        <a  href="<?php echo $this->_run_modifier("talent," . $this->_vars['list']['id'] . "", 'url', 'plugin', 1); ?>
"><?php echo $this->_vars['list']['categoryname']; ?>

                        </a>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; endif; ?>
                        <li><a href="<?php echo $this->_vars['SYS']['site_dir']; ?>
contact/message.php">在线留言</a></li>
                    </ul>

                    </li>
                    <?php elseif ($this->_vars['list']['tag'] != 'homepage'): ?>
                    <li <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><a href="<?php echo $this->_vars['list']['url']; ?>
" ><?php echo $this->_vars['list']['title']; ?>
</a></li>
                   <?php elseif ($this->_vars['list']['tag'] == 'homepage' && $this->_vars['page_select'] != 'homepage'): ?>
                    <li <?php if ($this->_vars['list']['tag'] == $this->_vars['page_select'] && $this->_vars['list']['tag'] != ""): ?>class="select"<?php endif; ?>><a href="<?php echo $this->_vars['list']['url']; ?>
" ><?php echo $this->_vars['list']['title']; ?>
</a></li>
                    <?php endif; ?>
                    <?php endforeach; endif; ?>

                </ul>
            </div>
        </div>
    </div>
</div>