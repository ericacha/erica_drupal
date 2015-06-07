<?php
function Untitled_preview_postreadmore_7x_2() {
    global $bdnode_content;
    $class = 'bd-postreadmore-2 bd-button data-control-id-34007';
    $readmore = Untitled_preview_get_links($bdnode_content, false, true, $class);
    if (!empty($readmore)) :
?>
    
        <?php echo $readmore; ?>
    
<?php
    endif;
}