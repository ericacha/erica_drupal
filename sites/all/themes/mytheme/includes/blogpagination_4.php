<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', ' bd-blogpagination-4'); 
variable_set('pager_id', 6);
variable_set('pager_classNames', ' bd-pagination-6 pagination');
variable_set('pager_ItemClassNames', ' bd-paginationitem-6');

function Untitled_blogpagination_4() {
?>
    <?php print theme('pager', array('pager_id' => 6, 'classNames' => ' bd-pagination-6 pagination', 'pagerItemClassNames' => ' bd-paginationitem-6')); ?>
<?php
}