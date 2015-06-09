<?php
function Untitled_preview_postimage_6x_10() {
    global $bdnode_picture;
    if (isset($bdnode_picture) && !empty($bdnode_picture)) :
?>
    
    <div class="data-control-id-572077 bd-postimage-10">
        <?php print $bdnode_picture; ?>
    </div>
    
<?php
    endif;
}