<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-11-01 17:00 CST */ ?>

<div class="topnav">
<a href="?act=list" <?php if ($this->_vars['navlabel'] == 'list'): ?>class="select"<?php endif; ?>><u>导航菜单</u></a>
<a href="?act=site_navigation_add" <?php if ($this->_vars['navlabel'] == 'add'): ?>class="select"<?php endif; ?>><u>添加导航栏目</u></a>
<a href="?act=site_navigation_category" <?php if ($this->_vars['navlabel'] == 'category'): ?>class="select"<?php endif; ?>><u>导航分类</u></a>
<div class="clear"></div>
</div>