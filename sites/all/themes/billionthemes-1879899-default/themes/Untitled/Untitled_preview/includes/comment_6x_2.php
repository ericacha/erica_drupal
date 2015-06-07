<?php
function Untitled_preview_comment_6x_2() {
    global $bdcomment_comment, $bdcomment_status, $bdcomment_content;
?>
    <div class="data-control-id-33918 bd-comment-2 comment<?php print ($bdcomment_comment->new) ? ' comment-new' : ''; print ' '. $status ?> clear-block">
        <div class="data-control-id-34009 bd-layoutcontainer-32">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-34011 
 col-md-2">
    <div class="bd-layoutcolumn-79"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'commentavatar_'.Untitled_preview_EXPORT_VERSION.'x_7';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class="data-control-id-34015 
 col-md-22">
    <div class="bd-layoutcolumn-80"><div class="bd-vertical-align-wrapper"><?php Untitled_preview_render_template_from_includes('commentmetadata_7'); ?>
	
		<?php 
    $method = 'commenttext_'.Untitled_preview_EXPORT_VERSION.'x_7';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'commentreply_'.Untitled_preview_EXPORT_VERSION.'x_7';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
<?php }