<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', ' bd-blogpagination-2'); 
variable_set('pager_id', 10);
variable_set('pager_classNames', ' bd-pagination-10 pagination');
variable_set('pager_ItemClassNames', ' bd-paginationitem-10');

function Untitled_blogpagination_2() {
?>
    <?php print theme('pager', array('pager_id' => 10, 'classNames' => ' bd-pagination-10 pagination', 'pagerItemClassNames' => ' bd-paginationitem-10')); ?>
<?php
}