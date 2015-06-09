<?php
function Untitled_comment_6x_4() {
    global $bdcomment_comment, $bdcomment_status, $bdcomment_content;
?>
    <div class=" bd-comment-4 comment<?php print ($bdcomment_comment->new) ? ' comment-new' : ''; print ' '. $status ?> clear-block">
        <div class=" bd-layoutcontainer-36">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-md-2">
    <div class="bd-layoutcolumn-89"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'commentavatar_'.Untitled_EXPORT_VERSION.'x_9';
    Untitled_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class=" 
 col-md-22">
    <div class="bd-layoutcolumn-90"><div class="bd-vertical-align-wrapper"><?php Untitled_render_template_from_includes('commentmetadata_9'); ?>
	
		<?php 
    $method = 'commenttext_'.Untitled_EXPORT_VERSION.'x_9';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'commentreply_'.Untitled_EXPORT_VERSION.'x_9';
    Untitled_render_template_from_includes($method);
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
<?php }