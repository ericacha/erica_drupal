<?php
function Untitled_posticoncategory_6x_16() {
    global $bdnode_node;
    if (!Untitled_is_links_set($bdnode_node->links))
        return;
    $links = Untitled_get_links($bdnode_node->links);
    if (!empty($links)) :
?>
        
        <div class=" bd-posticoncategory-16">
            <span class=" bd-icon-76"></span>
            <?php echo $links; ?>
        </div>
        
<?php
    endif;
}