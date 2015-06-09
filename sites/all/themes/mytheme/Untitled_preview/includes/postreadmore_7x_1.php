<?php
function Untitled_preview_postreadmore_7x_1() {
    global $bdnode_content;
    $class = 'bd-postreadmore-1 bd-button data-control-id-25512';
    $readmore = Untitled_preview_get_links($bdnode_content, false, true, $class);
    if (!empty($readmore)) :
?>
    
        <?php echo $readmore; ?>
    
<?php
    endif;
}