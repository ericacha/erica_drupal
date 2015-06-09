<?php
    $show_label      = false;
    $show_arrow      = true;
    $text_type       = 'full';
    $show_submenus   = true;
    $menu_item_class = ''; // Don't use active class for first level <li> in this menu
?>
<div class=" bd-language-2 <?php if (isset($classes)) print $classes; elseif (isset($block->module)) print "clear-block block-$block->module"; ?>" id="<?php if (isset($block_html_id)) print $block_html_id; else print "block-$block->module-$block->delta"; ?>"<?php if (isset($attributes)) print $attributes; ?>
     data-responsive-menu="false" data-responsive-levels="">
    <div class=" bd-horizontalmenu clearfix">
        <div class="bd-container-inner">
            <?php 
    $menu_id = 'nav-pills-39';
    $menu_class = ' bd-menu-39 nav nav-pills navbar-left';
    $output = ob_start();
?>

<ul class=" bd-menu-39 nav nav-pills">
    <li class=" bd-menuitem-33">
    <a class="dropdown-toggle" href="#">
        <span>
            <?php if ($show_label && !empty($block->subject)): ?>
                <?php print $block->subject ?>: 
            <?php endif;?>
            <?php print Untitled_get_language($text_type); ?>
        </span>
        <?php if ($show_arrow): ?><span class="caret"></span><?php endif; ?>
    </a>
    <?php if (isset($content)) print $content; elseif (isset($block->content)) print $block->content; ?>
</li>
</ul>

<?php $output = ob_get_clean();?>
            <?php 
    $submenu_popup = "bd-menu-37-popup";
    $submenu_class = ' bd-menu-37';
?>
<?php $submenu_item_class = ' bd-menuitem-34'; ?>
            <?php
                print Untitled_menu_worker($output, $menu_id, $menu_class, $menu_item_class, $submenu_class, $submenu_item_class, $submenu_popup, $show_submenus);
            ?>
        </div>
    </div>
</div>