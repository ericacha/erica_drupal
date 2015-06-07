<?php

variable_set('tab_item_class', ' bd-menuitem-5');
function Untitled_tabsmenu_2($tabs, $tabs2) {
    if ($tabs) :
?>
    <div class=" bd-tabsmenu-21 tabbable">
    <ul class=" bd-menu-5 clearfix nav nav-tabs">
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
    <div class=" bd-tabsmenu-21 tabbable">
    <ul class=" bd-menu-5 clearfix nav nav-tabs">
    <?php print render($tabs); ?>
</ul>
    <!-- Themler has no Drupal content here -->
</div>
<?php
    endif;
}