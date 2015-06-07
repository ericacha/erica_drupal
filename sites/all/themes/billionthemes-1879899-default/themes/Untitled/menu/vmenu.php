<?php

function Untitled_vmenu_output($id, $classes, $attributes, $subject, $title_prefix, $title_suffix, $content) {
?>

<div class=" bd-vmenu-3 <?php if (isset($classes)) print $classes; ?>" id="<?php if (isset($id)) print $id; ?>"<?php
    if (isset($attributes)) print $attributes; ?> data-responsive-menu="true" data-responsive-levels="">
    <div class=" bd-block">
        <?php if (!empty($subject)): ?>
            <div class=" bd-container-24 bd-tagstyles">
                <?php if (isset($title_prefix)) print render($title_prefix); ?>
                <h4><?php print $subject; ?></h4>
                <?php if (isset($title_suffix)) print render($title_suffix); ?>
            </div>
        <?php endif;?>
        <div class=" bd-container-21 bd-tagstyles shape-only">
            
            <div class=" bd-verticalmenu">
                <div class="bd-container-inner">
                    <?php
    $menu_id = 'nav-pills-45';
    $menu_class = ' bd-menu-45 nav nav-pills';
?>
<?php $menu_item_class = ' bd-menuitem-40'; ?>
                    <?php 
    $submenu_popup = "bd-menu-43-popup";
    $submenu_class = ' bd-menu-43';
?>
<?php 
    $submenu_item_class = ' bd-menuitem-41';
?>
                    <?php
                        $show_all='';
                        $show_all_responsive='';
                        $show_submenus = $show_all !== 'one level' || $show_all_responsive !== 'one level';
                        print Untitled_menu_worker($content, $menu_id, $menu_class, $menu_item_class, $submenu_class, $submenu_item_class, $submenu_popup, $show_submenus);
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
}
?>