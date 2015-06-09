<?php
function Untitled_preview_article_6x_5() {
    global $bdnode_node, $bdnode_sticky, $bdnode_status;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="node<?php if (isset($sticky) && $sticky) { print ' sticky'; } ?><?php if (isset($status) &&  !$status) { print ' node-unpublished'; } ?> clear-block data-control-id-40062 bd-article-5 clearfix">
        <?php 
    $method = 'postheader_'.Untitled_preview_EXPORT_VERSION.'x_10';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<div class="data-control-id-65809 bd-layoutcontainer-38">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-65811 
 col-md-4">
    <div class="bd-layoutcolumn-95"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'postimage_'.Untitled_preview_EXPORT_VERSION.'x_9';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class="data-control-id-65813 
 col-md-20">
    <div class="bd-layoutcolumn-96"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'postcontent_'.Untitled_preview_EXPORT_VERSION.'x_8';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<div class="data-control-id-40147 bd-layoutcontainer-35">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-40149 
 col-md-17">
    <div class="bd-layoutcolumn-86"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'posticondate_'.Untitled_preview_EXPORT_VERSION.'x_28';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class="data-control-id-40160 
 col-md-4">
    <div class="bd-layoutcolumn-87"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'posticonauthor_'.Untitled_preview_EXPORT_VERSION.'x_29';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class="data-control-id-40171 
 col-md-3">
    <div class="bd-layoutcolumn-88"><div class="bd-vertical-align-wrapper"></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<?php 
    $method = 'postreadmore_'.Untitled_preview_EXPORT_VERSION.'x_4';
    Untitled_preview_render_template_from_includes($method);
?>
    </article>
    
<?php
}

?>