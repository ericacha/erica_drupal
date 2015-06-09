<?php
function Untitled_postimage_6x_5() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class=" bd-postimage-5">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}