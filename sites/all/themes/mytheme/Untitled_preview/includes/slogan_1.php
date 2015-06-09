<?php

function Untitled_preview_slogan_1() {
    $site_slogan = variable_get('site_slogan', null);
    if ($site_slogan) {
?>
    
    <div class="data-control-id-1235 bd-slogan-1">
        <div class="bd-container-inner">
            <?php print $site_slogan; ?>
        </div>
    </div>
      
<?php
    }
}