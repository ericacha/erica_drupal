<?php
function Untitled_preview_postimage_7x_5() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-2544 bd-postimage-5">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}