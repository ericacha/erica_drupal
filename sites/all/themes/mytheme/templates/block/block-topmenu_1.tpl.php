<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class=" bd-topmenu-1 block-<?php print $block->module ?>">
    <?php $content = $block->content; ?>
    
        <div class="bd-horizontalmenu collapse-button clearfix">
    <ul class="bd-menu-39">
        <li class="bd-menuitem-33">
            <a  data-toggle="collapse"
                data-target=".bd-topmenu-1 .collapse-button + .navbar-collapse"
                href="#">
                
                    <span class=" bd-icon-19"></span>
                
                
            </a>
        </li>
    </ul>
</div>
        <div class="navbar-collapse collapse">
        
        <div class=" bd-horizontalmenu clearfix">
            <div class="bd-container-inner">
                <?php 
    $menu_item_class = ' bd-menuitem-33';
    // TODO: use effects in menu parser
    $item_head = <<<EOT

EOT;
    $item_tail = <<<EOT

EOT;
?>
<?php
    $menu_id = 'nav-pills-39';
    $menu_class = ' bd-menu-39 nav nav-pills navbar-left';
    print Untitled_menu_worker($content, $menu_id, $menu_class, $menu_item_class);
?>
            </div>
        </div>
        
    
        </div>
</div>