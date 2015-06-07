<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', 'data-control-id-33846 bd-blogpagination-2'); 
variable_set('pager_id', 10);
variable_set('pager_classNames', 'data-control-id-33841 bd-pagination-10 pagination');
variable_set('pager_ItemClassNames', 'data-control-id-33842 bd-paginationitem-10');

function Untitled_preview_blogpagination_2() {
?>
    <?php print theme('pager', array('pager_id' => 10, 'classNames' => 'data-control-id-33841 bd-pagination-10 pagination', 'pagerItemClassNames' => 'data-control-id-33842 bd-paginationitem-10')); ?>
<?php
}