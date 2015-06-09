<?php
function Untitled_preview_postimage_7x_7() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-33967 bd-postimage-7">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}