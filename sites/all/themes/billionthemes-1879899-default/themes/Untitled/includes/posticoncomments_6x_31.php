<?php
function Untitled_posticoncomments_6x_31() {
    global $bdnode_node;
    if (!Untitled_is_links_set($bdnode_node->links))
        return;
    $links = Untitled_get_links($bdnode_node->links, true);
    if (!empty($links)) :
?>
    
    <div class=" bd-posticoncomments-31">
        <span class=" bd-icon-15"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}