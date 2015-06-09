<nav class="data-control-id-1288 bd-hmenu-1 <?php if (isset($classes)) print $classes; ?>" id="<?php print $block_html_id; ?>"<?php print
    $attributes; ?> data-responsive-menu="true" data-responsive-levels="">
    
        <div class="data-control-id-1081962 bd-menuitem-11 collapse-button">
    <a  data-toggle="collapse"
        data-target=".bd-hmenu-1 .collapse-button + .navbar-collapse"
        href="#" onclick="return false;">
            <span>Menu</span>
    </a>
</div>
        <div class="navbar-collapse collapse">
        <div class="data-control-id-5147 bd-horizontalmenu-1 clearfix">
            <div class="bd-container-inner">
                <?php
                    $show_all='';
                    $show_all_responsive='';
                    $show_submenus = $show_all !== 'one level' || $show_all_responsive !== 'one level';
                ?>
                <?php 
    $submenu_popup = "bd-menu-5-popup";
    $submenu_class = 'data-control-id-5167 bd-menu-5';
    // TODO: use effects in menu parser
    $submenu_head = <<<EOT

EOT;
    $submenu_tail = <<<EOT

EOT;
?>
<?php 
    $submenu_item_class = 'data-control-id-5168 bd-menuitem-5';
    // TODO: use effects in menu parser
    $subitem_head = <<<EOT

EOT;
    $subitem_tail = <<<EOT

EOT;
?>
                <?php 
    $menu_item_class = 'data-control-id-5149 bd-menuitem-2';
    // TODO: use effects in menu parser
    $item_head = <<<EOT

EOT;
    $item_tail = <<<EOT

EOT;
?>
<?php
    $menu_id = 'nav-pills-2';
    $menu_class = 'data-control-id-5148 bd-menu-2 nav nav-pills navbar-left';
    print Untitled_preview_menu_worker($content, $menu_id, $menu_class, $menu_item_class, $submenu_class, $submenu_item_class, $submenu_popup, $show_submenus);
?>
            </div>
        </div>
    
        </div>
</nav>