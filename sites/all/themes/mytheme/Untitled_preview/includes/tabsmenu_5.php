<?php

variable_set('tab_item_class', 'data-control-id-1515 bd-menuitem-15');
function Untitled_preview_tabsmenu_5($tabs, $tabs2) {
    if ($tabs) :
?>
    <div class="data-control-id-1556 bd-tabsmenu-6 tabbable">
    <ul class="data-control-id-1523 bd-menu-15 clearfix nav nav-tabs">
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
    <div class="data-control-id-1556 bd-tabsmenu-6 tabbable">
    <ul class="data-control-id-1523 bd-menu-15 clearfix nav nav-tabs">
    <?php print render($tabs); ?>
</ul>
    <!-- Themler has no Drupal content here -->
</div>
<?php
    endif;
}