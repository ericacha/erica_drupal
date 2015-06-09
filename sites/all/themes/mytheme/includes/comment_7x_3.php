<?php
function Untitled_comment_7x_3() {
    global $bdcomment_classes, $bdcomment_attributes, $bdcomment_title_prefix, $bdcomment_title_suffix, $bdcomment_content;
?>
    <div class=" bd-comment-3 <?php print $bdcomment_classes; ?> clearfix"<?php print $bdcomment_attributes; ?>>
        <div class=" bd-layoutcontainer-34">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-md-4">
    <div class="bd-layoutcolumn-84"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'commentavatar_'.Untitled_EXPORT_VERSION.'x_8';
    Untitled_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class=" 
 col-md-20">
    <div class="bd-layoutcolumn-85"><div class="bd-vertical-align-wrapper"><?php Untitled_render_template_from_includes('commentmetadata_8'); ?>
	
		<?php 
    $method = 'commenttext_'.Untitled_EXPORT_VERSION.'x_8';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'commentreply_'.Untitled_EXPORT_VERSION.'x_8';
    Untitled_render_template_from_includes($method);
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
<?php }