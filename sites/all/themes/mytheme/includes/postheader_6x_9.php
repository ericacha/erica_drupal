<?php
function Untitled_postheader_6x_9() {
    global $bdnode_page, $bdnode_node_url, $bdnode_title;
?>
    
    <?php if (!$bdnode_page): ?>
        <h2 class=" bd-postheader-9"<?php print $bdnode_title_attributes; ?>>
            <div class="bd-container-inner">
                <a href="<?php print $bdnode_node_url; ?>"><?php print $bdnode_title; ?></a>
            </div>
        </h2>
    <?php endif; ?>
    
<?php
}