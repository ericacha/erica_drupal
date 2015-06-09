<?php
function Untitled_preview_postimage_6x_9() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-40145 bd-postimage-9">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}