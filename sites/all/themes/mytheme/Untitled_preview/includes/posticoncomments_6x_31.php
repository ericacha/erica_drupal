<?php
function Untitled_preview_posticoncomments_6x_31() {
    global $bdnode_node;
    if (!Untitled_preview_is_links_set($bdnode_node->links))
        return;
    $links = Untitled_preview_get_links($bdnode_node->links, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-77824 bd-posticoncomments-31">
        <span class="data-control-id-77823 bd-icon-15"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}