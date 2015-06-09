<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', 'data-control-id-571956 bd-blogpagination-5'); 
variable_set('pager_id', 4);
variable_set('pager_classNames', 'data-control-id-571951 bd-pagination-4 pagination');
variable_set('pager_ItemClassNames', 'data-control-id-571952 bd-paginationitem-4');

function Untitled_preview_blogpagination_5() {
?>
    <?php print theme('pager', array('pager_id' => 4, 'classNames' => 'data-control-id-571951 bd-pagination-4 pagination', 'pagerItemClassNames' => 'data-control-id-571952 bd-paginationitem-4')); ?>
<?php
}