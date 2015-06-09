<?php

variable_set('tab_item_class', 'data-control-id-34077 bd-menuitem-1');
function Untitled_preview_tabsmenu_1($tabs, $tabs2) {
    if ($tabs) :
?>
    <div class="data-control-id-34118 bd-tabsmenu-18 tabbable">
    <ul class="data-control-id-34085 bd-menu-1 clearfix nav nav-tabs">
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
    <div class="data-control-id-34118 bd-tabsmenu-18 tabbable">
    <ul class="data-control-id-34085 bd-menu-1 clearfix nav nav-tabs">
    <?php print render($tabs); ?>
</ul>
    <!-- Themler has no Drupal content here -->
</div>
<?php
    endif;
}