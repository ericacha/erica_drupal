<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', ' bd-blogpagination-3'); 
variable_set('pager_id', 8);
variable_set('pager_classNames', ' bd-pagination-8 pagination');
variable_set('pager_ItemClassNames', ' bd-paginationitem-8');

function Untitled_blogpagination_3() {
?>
    <?php print theme('pager', array('pager_id' => 8, 'classNames' => ' bd-pagination-8 pagination', 'pagerItemClassNames' => ' bd-paginationitem-8')); ?>
<?php
}