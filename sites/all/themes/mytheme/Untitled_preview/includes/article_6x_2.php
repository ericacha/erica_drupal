<?php
function Untitled_preview_article_6x_2() {
    global $bdnode_node, $bdnode_sticky, $bdnode_status;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="node<?php if (isset($sticky) && $sticky) { print ' sticky'; } ?><?php if (isset($status) &&  !$status) { print ' node-unpublished'; } ?> clear-block data-control-id-25389 bd-article-2 clearfix">
        <?php 
    $method = 'postheader_'.Untitled_preview_EXPORT_VERSION.'x_7';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postimage_'.Untitled_preview_EXPORT_VERSION.'x_6';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<div class="data-control-id-1076558 bd-layoutbox-16 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticondate_'.Untitled_preview_EXPORT_VERSION.'x_19';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'posticonauthor_'.Untitled_preview_EXPORT_VERSION.'x_20';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
	
		<?php 
    $method = 'postreadmore_'.Untitled_preview_EXPORT_VERSION.'x_1';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<div class="data-control-id-1076695 bd-layoutbox-18 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'postcontent_'.Untitled_preview_EXPORT_VERSION.'x_10';
    Untitled_preview_render_template_from_includes($method);
?>
    </div>
</div>
    </article>
    
<?php
}

?>