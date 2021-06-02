<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2016-12-23 17:09 中国标准时间 */ ?>

<div class="topnav">
    <a href="admin_products.php?act=list" <?php if ($this->_vars['act'] == 'list'): ?>class="select"<?php endif; ?>><u>浜у搧鍒楄〃</u></a>
    <a href="admin_products.php?act=products_add" <?php if ($this->_vars['act'] == 'products_add'): ?>class="select"<?php endif; ?>><u>娣诲姞浜у搧</u></a>
    <a href="?act=category" <?php if ($this->_vars['act'] == "category" || $this->_vars['act'] == "category_add" || $this->_vars['act'] == "edit_category"): ?>class="select"<?php endif; ?>><u>浜у搧鍒嗙被</u></a>
<div class="clear"></div>
</div>