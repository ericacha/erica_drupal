<?php
function Untitled_preview_comment_6x_5() {
    global $bdcomment_comment, $bdcomment_status, $bdcomment_content;
?>
    <div class="data-control-id-572028 bd-comment-5 comment<?php print ($bdcomment_comment->new) ? ' comment-new' : ''; print ' '. $status ?> clear-block">
        <div class="data-control-id-572119 bd-layoutcontainer-42">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-572121 
 col-md-2">
    <div class="bd-layoutcolumn-99"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'commentavatar_'.Untitled_preview_EXPORT_VERSION.'x_10';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class="data-control-id-572125 
 col-md-22">
    <div class="bd-layoutcolumn-100"><div class="bd-vertical-align-wrapper"><?php Untitled_preview_render_template_from_includes('commentmetadata_10'); ?>
	
		<?php 
    $method = 'commenttext_'.Untitled_preview_EXPORT_VERSION.'x_10';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'commentreply_'.Untitled_preview_EXPORT_VERSION.'x_10';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
<?php }