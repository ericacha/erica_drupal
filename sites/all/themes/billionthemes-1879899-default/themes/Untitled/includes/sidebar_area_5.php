<?php
    function Untitled_sidebar_area_5() {
        ob_start();
?>
        <?php 
    $current_region_content = Untitled_render_template_from_includes('drupalregion_11');
?>
    <?php
        $show_column = true;
        $additional_classes = '';
        $is_preview = Untitled_has_url_param('theme');
        // 
        /* show sidebar if it has non empty region or has any other items apart of region */
        $show_column &= (!isset($current_region_content) || !empty($current_region_content));
        //
        $area_content = ob_get_clean();
        $show_column &= 0 < strlen(trim(preg_replace('/<!-- empty::begin -->[\s\S]*?<!-- empty::end -->/', '', $area_content)));

        if ($is_preview && !$show_column) {
            $show_column = true;
            $additional_classes = 'hidden bd-hidden-sidebar';
        }
    ?>
        <?php if ($show_column): ?>
            <div class="bd-sidebararea-5-column  bd-flex-vertical bd-flex-fixed <?php echo $additional_classes ?>">
                <div class="bd-sidebararea-5 bd-flex-wide">
                    <?php echo $area_content ?>
                </div>
            </div>
        <?php endif; ?>
<?php
    }
?>