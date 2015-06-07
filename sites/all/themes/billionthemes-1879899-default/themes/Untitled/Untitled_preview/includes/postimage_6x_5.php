<?php
function Untitled_preview_postimage_6x_5() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-2544 bd-postimage-5">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}