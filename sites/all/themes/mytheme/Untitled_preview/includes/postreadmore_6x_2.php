<?php
function Untitled_preview_postreadmore_6x_2() {
    global $bdnode_node;
    if (!Untitled_preview_is_links_set($bdnode_node->links))
        return;
    $class = 'bd-postreadmore-2 bd-button data-control-id-34007';
    $readmore = Untitled_preview_get_links($bdnode_node->links, false, true, $class);
    if (!empty($readmore)) :
?>
    
        <?php echo $readmore; ?>
    
<?php
    endif;
}