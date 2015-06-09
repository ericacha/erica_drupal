<?php
function Untitled_preview_postheader_6x_5() {
    global $bdnode_page, $bdnode_node_url, $bdnode_title;
?>
    
    <?php if (!$bdnode_page): ?>
        <h2 class="data-control-id-2267 bd-postheader-5"<?php print $bdnode_title_attributes; ?>>
            <div class="bd-container-inner">
                <a href="<?php print $bdnode_node_url; ?>"><?php print $bdnode_title; ?></a>
            </div>
        </h2>
    <?php endif; ?>
    
<?php
}