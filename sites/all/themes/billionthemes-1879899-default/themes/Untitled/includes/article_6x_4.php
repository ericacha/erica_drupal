<?php
function Untitled_article_6x_4() {
    global $bdnode_node, $bdnode_sticky, $bdnode_status;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="node<?php if (isset($sticky) && $sticky) { print ' sticky'; } ?><?php if (isset($status) &&  !$status) { print ' node-unpublished'; } ?> clear-block  bd-article-4 clearfix">
        <?php 
    $method = 'postheader_'.Untitled_EXPORT_VERSION.'x_9';
    Untitled_render_template_from_includes($method);
?>
	
		<div class=" bd-layoutbox-10 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticondate_'.Untitled_EXPORT_VERSION.'x_25';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'posticonauthor_'.Untitled_EXPORT_VERSION.'x_26';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class=" bd-layoutbox-12 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'postcontent_'.Untitled_EXPORT_VERSION.'x_12';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postreadmore_'.Untitled_EXPORT_VERSION.'x_3';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
	
		<div class=" bd-layoutbox-14 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticontags_'.Untitled_EXPORT_VERSION.'x_33';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
	
		<?php 
    $method = 'posticoncomments_'.Untitled_EXPORT_VERSION.'x_36';
    Untitled_render_template_from_includes($method);
?>
    </article>
    
<?php
}

?>