<?php

function Untitled_preview_vmenu_output($id, $classes, $attributes, $subject, $title_prefix, $title_suffix, $content) {
?>

<div class="data-control-id-712605 bd-vmenu-3 <?php if (isset($classes)) print $classes; ?>" id="<?php if (isset($id)) print $id; ?>"<?php
    if (isset($attributes)) print $attributes; ?> data-responsive-menu="true" data-responsive-levels="">
    <div class="data-control-id-712604 bd-block">
        <?php if (!empty($subject)): ?>
            <div class="data-control-id-715223 bd-container-24 bd-tagstyles">
                <?php if (isset($title_prefix)) print render($title_prefix); ?>
                <h4><?php print $subject; ?></h4>
                <?php if (isset($title_suffix)) print render($title_suffix); ?>
            </div>
        <?php endif;?>
        <div class="data-control-id-715255 bd-container-21 bd-tagstyles shape-only">
            
            <div class="data-control-id-712603 bd-verticalmenu">
                <div class="bd-container-inner">
                    <?php
    $menu_id = 'nav-pills-45';
    $menu_class = 'data-control-id-715119 bd-menu-45 nav nav-pills';
?>
<?php $menu_item_class = 'data-control-id-715120 bd-menuitem-40'; ?>
                    <?php 
    $submenu_popup = "bd-menu-43-popup";
    $submenu_class = 'data-control-id-715138 bd-menu-43';
?>
<?php 
    $submenu_item_class = 'data-control-id-715139 bd-menuitem-41';
?>
                    <?php
                        $show_all='';
                        $show_all_responsive='';
                        $show_submenus = $show_all !== 'one level' || $show_all_responsive !== 'one level';
                        print Untitled_preview_menu_worker($content, $menu_id, $menu_class, $menu_item_class, $submenu_class, $submenu_item_class, $submenu_popup, $show_submenus);
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
}
?>