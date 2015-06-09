<?php

function Untitled_preview_breadcrumbs_1() {
    global $bdpage_breadcrumb;
?>
    
    <div class="data-control-id-1393 bd-breadcrumbs-1">
        <div class="bd-container-inner">
            <ol class="breadcrumb">
                <?php 
                if (!empty($bdpage_breadcrumb)) {
                    foreach($bdpage_breadcrumb as $value) { ?>
                        <li><?php echo Untitled_preview_render_template_from_includes('breadcrumbs_link_1', array('link' => $value)); ?></li>
                    <?php } 
                    $title = drupal_get_title();
                    if (!empty($title)) { ?>
                        <li class="active"><?php echo Untitled_preview_render_template_from_includes('breadcrumbs_text_1', array('text' => $title)); ?></li>
                <?php }
                } else { 
                    $home = l(t('Home'), ''); ?>
                    <li><?php echo Untitled_preview_render_template_from_includes('breadcrumbs_link_1', array('link' => $home)); ?></li>
                <?php } 
                ?>
            </ol>
        </div>
    </div>
       
<?php
}