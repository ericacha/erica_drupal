<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', ' bd-blogpagination-1'); 
variable_set('pager_id', 12);
variable_set('pager_classNames', ' bd-pagination-12 pagination');
variable_set('pager_ItemClassNames', ' bd-paginationitem-12');

function Untitled_blogpagination_1() {
?>
    <?php print theme('pager', array('pager_id' => 12, 'classNames' => ' bd-pagination-12 pagination', 'pagerItemClassNames' => ' bd-paginationitem-12')); ?>
<?php
}