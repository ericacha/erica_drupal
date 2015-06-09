<?php
function Untitled_preview_postimage_7x_8() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-34290 bd-postimage-8">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}