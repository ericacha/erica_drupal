<?php
function Untitled_preview_postreadmore_6x_4() {
    global $bdnode_node;
    if (!Untitled_preview_is_links_set($bdnode_node->links))
        return;
    $class = 'bd-postreadmore-4 bd-button data-control-id-40185';
    $readmore = Untitled_preview_get_links($bdnode_node->links, false, true, $class);
    if (!empty($readmore)) :
?>
    
        <?php echo $readmore; ?>
    
<?php
    endif;
}