<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', ' bd-blogpagination-5'); 
variable_set('pager_id', 4);
variable_set('pager_classNames', ' bd-pagination-4 pagination');
variable_set('pager_ItemClassNames', ' bd-paginationitem-4');

function Untitled_blogpagination_5() {
?>
    <?php print theme('pager', array('pager_id' => 4, 'classNames' => ' bd-pagination-4 pagination', 'pagerItemClassNames' => ' bd-paginationitem-4')); ?>
<?php
}