<?php
function Untitled_preview_posticoncomments_6x_13() {
    global $bdnode_node;
    if (!Untitled_preview_is_links_set($bdnode_node->links))
        return;
    $links = Untitled_preview_get_links($bdnode_node->links, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-2352 bd-posticoncomments-13">
        <span class="data-control-id-2351 bd-icon-70"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}