<?php
function Untitled_article_6x_3() {
    global $bdnode_node, $bdnode_sticky, $bdnode_status;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="node<?php if (isset($sticky) && $sticky) { print ' sticky'; } ?><?php if (isset($status) &&  !$status) { print ' node-unpublished'; } ?> clear-block  bd-article-3 clearfix">
        <?php 
    $method = 'postheader_'.Untitled_EXPORT_VERSION.'x_8';
    Untitled_render_template_from_includes($method);
?>
	
		<div class=" bd-layoutbox-2 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticondate_'.Untitled_EXPORT_VERSION.'x_22';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'posticonauthor_'.Untitled_EXPORT_VERSION.'x_31';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class=" bd-layoutbox-4 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'postcontent_'.Untitled_EXPORT_VERSION.'x_7';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class=" bd-layoutbox-8 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticontags_'.Untitled_EXPORT_VERSION.'x_30';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
	
		<?php 
    $method = 'postreadmore_'.Untitled_EXPORT_VERSION.'x_2';
    Untitled_render_template_from_includes($method);
?>
    </article>
    
<?php
}

?>