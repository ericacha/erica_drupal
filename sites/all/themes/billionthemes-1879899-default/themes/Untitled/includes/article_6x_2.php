<?php
function Untitled_article_6x_2() {
    global $bdnode_node, $bdnode_sticky, $bdnode_status;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="node<?php if (isset($sticky) && $sticky) { print ' sticky'; } ?><?php if (isset($status) &&  !$status) { print ' node-unpublished'; } ?> clear-block  bd-article-2 clearfix">
        <?php 
    $method = 'postheader_'.Untitled_EXPORT_VERSION.'x_7';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postimage_'.Untitled_EXPORT_VERSION.'x_6';
    Untitled_render_template_from_includes($method);
?>
	
		<div class=" bd-layoutbox-16 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'posticondate_'.Untitled_EXPORT_VERSION.'x_19';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'posticonauthor_'.Untitled_EXPORT_VERSION.'x_20';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
	
		<?php 
    $method = 'postreadmore_'.Untitled_EXPORT_VERSION.'x_1';
    Untitled_render_template_from_includes($method);
?>
	
		<div class=" bd-layoutbox-18 clearfix">
    <div class="bd-container-inner">
        <?php 
    $method = 'postcontent_'.Untitled_EXPORT_VERSION.'x_10';
    Untitled_render_template_from_includes($method);
?>
    </div>
</div>
    </article>
    
<?php
}

?>