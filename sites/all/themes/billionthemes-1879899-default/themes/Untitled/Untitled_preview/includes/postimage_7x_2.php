<?php
function Untitled_preview_postimage_7x_2() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-2092 bd-postimage-2">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}