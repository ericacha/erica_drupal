<?php

function Untitled_preview_hmenu_1() {
    global $bdpage_hmenu_1;
    if (!empty($bdpage_hmenu_1)) {
        echo render($bdpage_hmenu_1);
    }
    elseif (Untitled_preview_has_url_param('theme')) {
        echo '<nav class="data-control-id-1288 bd-hmenu-1">Region \'Horizontal Menu 1\' is empty.</nav>';
    }
}