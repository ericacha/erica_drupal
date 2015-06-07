<?php
function Untitled_preview_posticoncomments_6x_18() {
    global $bdnode_node;
    if (!Untitled_preview_is_links_set($bdnode_node->links))
        return;
    $links = Untitled_preview_get_links($bdnode_node->links, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-2658 bd-posticoncomments-18">
        <span class="data-control-id-2657 bd-icon-78"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}