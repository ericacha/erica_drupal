<?php function Untitled_slider_1() { 
?>
   <div id="carousel-1" class=" bd-slider-1 carousel slide">
    

    

    
        <div class=" bd-sliderindicators-3"><ol class=" bd-indicators">
    
        <li class=" bd-menuitem-12 
 active"><a href="#" data-target="#carousel-1" data-slide-to="0"></a></li>
        <li class=" bd-menuitem-12 "><a href="#" data-target="#carousel-1" data-slide-to="1"></a></li>
</ol></div>

    <div class="bd-slides carousel-inner">
        <div class=" bd-slide-1 item">
    <div class="bd-container-inner">
        <?php Untitled_render_template_from_includes('textblock_1', array()); ?>
	
		<?php Untitled_render_template_from_includes('imagelink_5', array()); ?>
	
		<?php Untitled_render_template_from_includes('drupalregion_1'); ?>
    </div>
</div>
	
		<div class=" bd-slide-2 item">
    <div class="bd-container-inner">
        <?php Untitled_render_template_from_includes('textblock_2', array()); ?>
	
		<?php Untitled_render_template_from_includes('imagelink_2', array()); ?>
    </div>
</div>
    </div>

    

    

    
        <div class="left-button">
    <a class=" bd-carousel-3" href="#">
        <span class=" bd-icon-10"></span>
    </a>
</div>

<div class="right-button">
    <a class=" bd-carousel-3" href="#">
        <span class=" bd-icon-10"></span>
    </a>
</div>

    <script>
        if ('undefined' !== typeof initSlider){
            initSlider('.bd-slider-1', 'left-button', 'right-button', '.bd-carousel-3', '.bd-indicators', 3000, "hover", true, true);
        }
    </script>
</div><?php }