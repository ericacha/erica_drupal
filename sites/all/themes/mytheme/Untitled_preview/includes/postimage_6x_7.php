<?php
function Untitled_preview_postimage_6x_7() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-33967 bd-postimage-7">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}