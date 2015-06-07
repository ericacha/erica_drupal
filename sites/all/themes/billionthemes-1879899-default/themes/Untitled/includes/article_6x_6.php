<?php
function Untitled_article_6x_6() {
    global $bdnode_node, $bdnode_sticky, $bdnode_status;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="node<?php if (isset($sticky) && $sticky) { print ' sticky'; } ?><?php if (isset($status) &&  !$status) { print ' node-unpublished'; } ?> clear-block  bd-article-6 clearfix">
        <?php 
    $method = 'postheader_'.Untitled_EXPORT_VERSION.'x_11';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postimage_'.Untitled_EXPORT_VERSION.'x_10';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postcontent_'.Untitled_EXPORT_VERSION.'x_13';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postreadmore_'.Untitled_EXPORT_VERSION.'x_5';
    Untitled_render_template_from_includes($method);
?>
    </article>
    
<?php
}

?>