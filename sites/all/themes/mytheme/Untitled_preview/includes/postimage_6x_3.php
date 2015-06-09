<?php
function Untitled_preview_postimage_6x_3() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-2211 bd-postimage-3">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}