<?php

variable_set('tab_item_class', 'data-control-id-34400 bd-menuitem-4');
function Untitled_preview_tabsmenu_3($tabs, $tabs2) {
    if ($tabs) :
?>
    <div class="data-control-id-34441 bd-tabsmenu-20 tabbable">
    <ul class="data-control-id-34408 bd-menu-4 clearfix nav nav-tabs">
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
    <div class="data-control-id-34441 bd-tabsmenu-20 tabbable">
    <ul class="data-control-id-34408 bd-menu-4 clearfix nav nav-tabs">
    <?php print render($tabs); ?>
</ul>
    <!-- Themler has no Drupal content here -->
</div>
<?php
    endif;
}