<?php
function Untitled_preview_postimage_7x_9() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-40145 bd-postimage-9">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}