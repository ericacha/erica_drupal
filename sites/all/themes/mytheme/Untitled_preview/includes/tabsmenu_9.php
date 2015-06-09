<?php

variable_set('tab_item_class', 'data-control-id-1625 bd-menuitem-17');
function Untitled_preview_tabsmenu_9($tabs, $tabs2) {
    if ($tabs) :
?>
    <div class="data-control-id-1666 bd-tabsmenu-10 tabbable">
    <ul class="data-control-id-1633 bd-menu-17 clearfix nav nav-tabs">
    <?php print render($tabs); ?>
</ul>
    <!-- Themler has no Drupal content here -->
</div>
<?php
    endif;
    if ($tabs2) :
        $tabs = $tabs2;
?>
    <br/>
    <div class="data-control-id-1666 bd-tabsmenu-10 tabbable">
    <ul class="data-control-id-1633 bd-menu-17 clearfix nav nav-tabs">
    <?php print render($tabs); ?>
</ul>
    <!-- Themler has no Drupal content here -->
</div>
<?php
    endif;
}