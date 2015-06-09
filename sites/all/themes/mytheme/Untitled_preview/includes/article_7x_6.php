<?php
function Untitled_preview_article_7x_6() {
    global $bdnode_node, $bdnode_classes, $bdnode_attributes;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="<?php print $bdnode_classes; ?> data-control-id-571994 bd-article-6 clearfix"<?php print $bdnode_attributes; ?>>
        <?php 
    $method = 'postheader_'.Untitled_preview_EXPORT_VERSION.'x_11';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postimage_'.Untitled_preview_EXPORT_VERSION.'x_10';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postcontent_'.Untitled_preview_EXPORT_VERSION.'x_13';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postreadmore_'.Untitled_preview_EXPORT_VERSION.'x_5';
    Untitled_preview_render_template_from_includes($method);
?>
    </article>
    
<?php
}