<?php
function Untitled_preview_article_7x_4() {
    global $bdnode_node, $bdnode_classes, $bdnode_attributes;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="<?php print $bdnode_classes; ?> data-control-id-34207 bd-article-4 clearfix"<?php print $bdnode_attributes; ?>>
        <?php 
    $method = 'postheader_'.Untitled_preview_EXPORT_VERSION.'x_9';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<div class="data-control-id-1076154 bd-layoutbox-10 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticondate_'.Untitled_preview_EXPORT_VERSION.'x_25';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'posticonauthor_'.Untitled_preview_EXPORT_VERSION.'x_26';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class="data-control-id-1076296 bd-layoutbox-12 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'postcontent_'.Untitled_preview_EXPORT_VERSION.'x_12';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postreadmore_'.Untitled_preview_EXPORT_VERSION.'x_3';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class="data-control-id-1076385 bd-layoutbox-14 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticontags_'.Untitled_preview_EXPORT_VERSION.'x_33';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
	
		<?php 
    $method = 'posticoncomments_'.Untitled_preview_EXPORT_VERSION.'x_36';
    Untitled_preview_render_template_from_includes($method);
?>
    </article>
    
<?php
}