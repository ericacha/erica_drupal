<?php
function Untitled_preview_postimage_7x_10() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class="data-control-id-572077 bd-postimage-10">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}