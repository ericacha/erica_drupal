<?php

function Untitled_language_1() {
    global $bdpage_language_1;
    if (isset($bdpage_language_1) && !empty($bdpage_language_1)) {
        echo render($bdpage_language_1);
    }
}