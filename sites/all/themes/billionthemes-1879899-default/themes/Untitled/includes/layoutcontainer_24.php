<?php function Untitled_layoutcontainer_24() { 
?>
   
<div class=" bd-layoutcontainer-24 container-fluid">
    <div class="bd-container-inner">
        <div class="row ">
	        <div class=" 
 col-md-2">
    <div class="bd-layoutcolumn-58"><div class="bd-vertical-align-wrapper"><?php 
    $method = 'commentavatar_'.Untitled_EXPORT_VERSION.'x_4';
    Untitled_render_template_from_includes($method);
?></div></div>
</div>
	
		<div class=" 
 col-md-22">
    <div class="bd-layoutcolumn-59"><div class="bd-vertical-align-wrapper"><?php Untitled_render_template_from_includes('commentmetadata_4'); ?>
	
		<?php 
    $method = 'commenttext_'.Untitled_EXPORT_VERSION.'x_4';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'commentreply_'.Untitled_EXPORT_VERSION.'x_4';
    Untitled_render_template_from_includes($method);
?></div></div>
</div>
        </div>
    </div>
</div><?php }