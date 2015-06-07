<?php
function Untitled_preview_postimage_6x_2() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-2092 bd-postimage-2">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}