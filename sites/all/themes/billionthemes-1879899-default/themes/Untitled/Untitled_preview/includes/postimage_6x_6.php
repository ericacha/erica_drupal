<?php
function Untitled_preview_postimage_6x_6() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-25472 bd-postimage-6">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}