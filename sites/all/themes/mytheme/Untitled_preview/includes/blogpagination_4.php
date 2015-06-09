<?php

// use variable_set because of unavailable GLOBAL['blogpager_id'] in theme_pager method when blog is unavailable in template
variable_set('blogpager_classNames', 'data-control-id-40024 bd-blogpagination-4'); 
variable_set('pager_id', 6);
variable_set('pager_classNames', 'data-control-id-40019 bd-pagination-6 pagination');
variable_set('pager_ItemClassNames', 'data-control-id-40020 bd-paginationitem-6');

function Untitled_preview_blogpagination_4() {
?>
    <?php print theme('pager', array('pager_id' => 6, 'classNames' => 'data-control-id-40019 bd-pagination-6 pagination', 'pagerItemClassNames' => 'data-control-id-40020 bd-paginationitem-6')); ?>
<?php
}