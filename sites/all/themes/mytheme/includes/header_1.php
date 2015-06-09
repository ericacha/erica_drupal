<?php function Untitled_header_1() { 
?>
   <div class="container  bd-containereffect-11"><header class=" bd-header-1">
    <div class="bd-container-inner">
        <?php Untitled_render_template_from_includes('headline_1'); ?>
	
		<?php Untitled_render_template_from_includes('slogan_1', array()); ?>
	
		<?php 
    $method = 'search_'.Untitled_EXPORT_VERSION.'x_1';
    Untitled_render_template_from_includes($method);
?>
    </div>
</header>
</div><?php }