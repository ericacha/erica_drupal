<?php
function Untitled_postimage_6x_8() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class=" bd-postimage-8">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}