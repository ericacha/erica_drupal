<?php
function Untitled_article_7x_2() {
    global $bdnode_node, $bdnode_classes, $bdnode_attributes;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="<?php print $bdnode_classes; ?>  bd-article-2 clearfix"<?php print $bdnode_attributes; ?>>
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