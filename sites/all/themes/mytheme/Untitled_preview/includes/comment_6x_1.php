<?php
function Untitled_preview_comment_6x_1() {
    global $bdcomment_comment, $bdcomment_status, $bdcomment_content;
?>
    <div class="data-control-id-25423 bd-comment-1 comment<?php print ($bdcomment_comment->new) ? ' comment-new' : ''; print ' '. $status ?> clear-block">
        <div class="data-control-id-25514 bd-layoutcontainer-30">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
 bd-collapsed-gutter
                ">
                <div class="data-control-id-25520 
 col-md-24">
    <div class="bd-layoutcolumn-75"><div class="bd-vertical-align-wrapper"><?php Untitled_preview_render_template_from_includes('commentmetadata_6'); ?>
	
		<?php 
    $method = 'commenttext_'.Untitled_preview_EXPORT_VERSION.'x_6';
    Untitled_preview_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'commentreply_'.Untitled_preview_EXPORT_VERSION.'x_6';
    Untitled_preview_render_template_from_includes($method);
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
<?php }