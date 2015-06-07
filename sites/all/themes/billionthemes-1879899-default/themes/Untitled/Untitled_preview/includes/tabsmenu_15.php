<?php

variable_set('tab_item_class', 'data-control-id-1789 bd-menuitem-20');
function Untitled_preview_tabsmenu_15($tabs, $tabs2) {
    if ($tabs) :
?>
    <div class="data-control-id-1830 bd-tabsmenu-16 tabbable">
    <ul class="data-control-id-1797 bd-menu-20 clearfix nav nav-tabs">
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
    <div class="data-control-id-1830 bd-tabsmenu-16 tabbable">
    <ul class="data-control-id-1797 bd-menu-20 clearfix nav nav-tabs">
    <?php print render($tabs); ?>
</ul>
    <!-- Themler has no Drupal content here -->
</div>
<?php
    endif;
}