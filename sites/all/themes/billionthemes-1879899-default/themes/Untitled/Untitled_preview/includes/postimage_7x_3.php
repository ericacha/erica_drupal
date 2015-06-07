<?php
function Untitled_preview_postimage_7x_3() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-2211 bd-postimage-3">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}