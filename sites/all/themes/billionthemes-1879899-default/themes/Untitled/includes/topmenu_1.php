<?php

function Untitled_topmenu_1() {
    global $bdpage_topmenu_1;
    if (isset($bdpage_topmenu_1) && !empty($bdpage_topmenu_1)) {
        echo render($bdpage_topmenu_1);
    }
}