<?php function Untitled_layoutcontainer_34() { 
?>
   
<div class=" bd-layoutcontainer-34 container-fluid">
    <div class="bd-container-inner">
        <div class="row ">
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
</div><?php }