<?php
function Untitled_preview_comment_7x_4() {
    global $bdcomment_classes, $bdcomment_attributes, $bdcomment_title_prefix, $bdcomment_title_suffix, $bdcomment_content;
?>
    <div class="data-control-id-40096 bd-comment-4 <?php print $bdcomment_classes; ?> clearfix"<?php print $bdcomment_attributes; ?>>
        <div class="data-control-id-40187 bd-layoutcontainer-36">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-40189 
 col-md-2">
    <div class="bd-layoutcolumn-89"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'commentavatar_'.Untitled_preview_EXPORT_VERSION.'x_9';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class="data-control-id-40193 
 col-md-22">
    <div class="bd-layoutcolumn-90"><div class="bd-vertical-align-wrapper"><?php Untitled_preview_render_template_from_includes('commentmetadata_9'); ?>
	
		<?php 
    $method = 'commenttext_'.Untitled_preview_EXPORT_VERSION.'x_9';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'commentreply_'.Untitled_preview_EXPORT_VERSION.'x_9';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
<?php }