<?php
function Untitled_postimage_6x_6() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class=" bd-postimage-6">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}