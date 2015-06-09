<?php
function Untitled_preview_posticoncomments_6x_36() {
    global $bdnode_node;
    if (!Untitled_preview_is_links_set($bdnode_node->links))
        return;
    $links = Untitled_preview_get_links($bdnode_node->links, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-639357 bd-posticoncomments-36">
        <span class="data-control-id-639356 bd-icon-81"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}