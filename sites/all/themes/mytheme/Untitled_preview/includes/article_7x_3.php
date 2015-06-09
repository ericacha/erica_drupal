<?php
function Untitled_preview_article_7x_3() {
    global $bdnode_node, $bdnode_classes, $bdnode_attributes;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="<?php print $bdnode_classes; ?> data-control-id-33884 bd-article-3 clearfix"<?php print $bdnode_attributes; ?>>
        <?php 
    $method = 'postheader_'.Untitled_preview_EXPORT_VERSION.'x_8';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<div class="data-control-id-1075727 bd-layoutbox-2 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticondate_'.Untitled_preview_EXPORT_VERSION.'x_22';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'posticonauthor_'.Untitled_preview_EXPORT_VERSION.'x_31';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class="data-control-id-1075833 bd-layoutbox-4 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'postcontent_'.Untitled_preview_EXPORT_VERSION.'x_7';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class="data-control-id-1076003 bd-layoutbox-8 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticontags_'.Untitled_preview_EXPORT_VERSION.'x_30';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
	
		<?php 
    $method = 'postreadmore_'.Untitled_preview_EXPORT_VERSION.'x_2';
    Untitled_preview_render_template_from_includes($method);
?>
    </article>
    
<?php
}