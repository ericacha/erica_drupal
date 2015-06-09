<?php
function Untitled_preview_postimage_7x_6() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-25472 bd-postimage-6">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}