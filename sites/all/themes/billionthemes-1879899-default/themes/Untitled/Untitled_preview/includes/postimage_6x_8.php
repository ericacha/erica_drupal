<?php
function Untitled_preview_postimage_6x_8() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-34290 bd-postimage-8">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}