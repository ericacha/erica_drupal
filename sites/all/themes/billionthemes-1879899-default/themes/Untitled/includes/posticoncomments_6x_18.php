<?php
function Untitled_posticoncomments_6x_18() {
    global $bdnode_node;
    if (!Untitled_is_links_set($bdnode_node->links))
        return;
    $links = Untitled_get_links($bdnode_node->links, true);
    if (!empty($links)) :
?>
    
    <div class=" bd-posticoncomments-18">
        <span class=" bd-icon-78"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}