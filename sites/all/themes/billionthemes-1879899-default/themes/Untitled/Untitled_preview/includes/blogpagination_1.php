<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', 'data-control-id-25351 bd-blogpagination-1'); 
variable_set('pager_id', 12);
variable_set('pager_classNames', 'data-control-id-25346 bd-pagination-12 pagination');
variable_set('pager_ItemClassNames', 'data-control-id-25347 bd-paginationitem-12');

function Untitled_preview_blogpagination_1() {
?>
    <?php print theme('pager', array('pager_id' => 12, 'classNames' => 'data-control-id-25346 bd-pagination-12 pagination', 'pagerItemClassNames' => 'data-control-id-25347 bd-paginationitem-12')); ?>
<?php
}