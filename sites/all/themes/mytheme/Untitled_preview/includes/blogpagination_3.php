<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', 'data-control-id-34169 bd-blogpagination-3'); 
variable_set('pager_id', 8);
variable_set('pager_classNames', 'data-control-id-34164 bd-pagination-8 pagination');
variable_set('pager_ItemClassNames', 'data-control-id-34165 bd-paginationitem-8');

function Untitled_preview_blogpagination_3() {
?>
    <?php print theme('pager', array('pager_id' => 8, 'classNames' => 'data-control-id-34164 bd-pagination-8 pagination', 'pagerItemClassNames' => 'data-control-id-34165 bd-paginationitem-8')); ?>
<?php
}