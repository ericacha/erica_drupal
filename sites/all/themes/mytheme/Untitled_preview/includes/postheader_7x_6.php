<?php
function Untitled_preview_postheader_7x_6() {
    global $bdnode_page, $bdnode_title_prefix, $bdnode_title_suffix, $bdnode_title_attributes, $bdnode_node_url, $bdnode_title;
?>
    
    <?php print render($bdnode_title_prefix); ?>
    <?php if (!$bdnode_page): ?>
        <h2 class="data-control-id-2542 bd-postheader-6"<?php print $bdnode_title_attributes; ?>>
            <div class="bd-container-inner">
                <a href="<?php print $bdnode_node_url; ?>"><?php print $bdnode_title; ?></a>
            </div>
        </h2>
    <?php endif; ?>
    <?php print render($bdnode_title_suffix); ?>
    
<?php
}