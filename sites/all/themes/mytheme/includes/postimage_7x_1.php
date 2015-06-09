<?php
function Untitled_postimage_7x_1() {
    global $bdnode_user_picture;
    if (isset($bdnode_user_picture) && !empty($bdnode_user_picture)) :
?>
    
    <div class=" bd-postimage-1">
        <?php print $bdnode_user_picture; ?>
    </div>
    
<?php
    endif;
}