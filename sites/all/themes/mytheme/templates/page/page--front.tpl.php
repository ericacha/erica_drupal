
    <?php
        $vars = get_defined_vars();
        Untitled_generate_globals($vars, 'bdpage_');
        if (isset($page)) {
            Untitled_generate_globals($page, 'bdpage_');
        }
    ?>
    <header class=" bd-headerarea-1">
        <?php Untitled_render_template_from_includes('hmenu_1'); ?>
	
		<div class=" bd-boxcontrol-1">
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <?php Untitled_render_template_from_includes('headline_1'); ?>
	
		<?php Untitled_render_template_from_includes('slogan_1', array()); ?>
	
		<?php 
    $method = 'search_'.Untitled_EXPORT_VERSION.'x_1';
    Untitled_render_template_from_includes($method);
?>
        </div>
    </div>
</div>
</header>
	
		<div id="carousel-1" class=" bd-slider-1 carousel slide">
    

    

    
        <div class=" bd-sliderindicators-3"><ol class=" bd-indicators">
    
        <li class=" bd-menuitem-12 
 active"><a href="#" data-target="#carousel-1" data-slide-to="0"></a></li>
        <li class=" bd-menuitem-12 "><a href="#" data-target="#carousel-1" data-slide-to="1"></a></li>
</ol></div>

    <div class="bd-slides carousel-inner">
        <div class=" bd-slide-1 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-4 animated" style="display:none"data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class=" bd-animation-3 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"><div class=" bd-textblock-26 bd-tagstyles">
    <p>Enjoy DESIGN,</p><p>while THEMLER codes!</p>
</div></div>
</div>
	
		<div class=" bd-animation-2 animated" style="display:none"data-animation-name="fadeInLeft"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class=" bd-animation-1 animated" data-animation-name="fadeOutLeft"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<img class="bd-imagestyles-5 bd-imagelink-5 hidden-xs   " src="<?php echo theme_get_image_path('../images/4682c8188cc0cc8aed88f18f7269bc23default_image.png'); ?>"></div>
</div>
	
		<?php 
    $current_region_content = Untitled_render_template_from_includes('drupalregion_1');
?>
        </div>
    </div>
</div>
	
		<div class=" bd-slide-2 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class=" bd-animation-6 animated" style="display:none"data-animation-name="fadeInLeft"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class=" bd-animation-5 animated" data-animation-name="fadeOutLeft"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"><div class=" bd-textblock-27 bd-tagstyles">
    <p>Think about DESIGN,<br>not CODE!</p>
</div></div>
</div>
	
		<div class=" bd-animation-8 animated" style="display:none"data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class=" bd-animation-7 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<img class="bd-imagestyles-6 bd-imagelink-2 hidden-xs   " src="<?php echo theme_get_image_path('../images/c8b40a0acbc0768cf7dbc80848234209default_image.png'); ?>"></div>
</div>
        </div>
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
</div>
	
		<div class=" bd-stretchtobottom-1 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-1"><div class="bd-sheetstyles bd-contentlayout-1 ">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical">
            
            <div class="bd-flex-horizontal bd-flex-wide">
                
 <?php Untitled_render_template_from_includes('sidebar_area_5'); ?>
                <div class="bd-flex-vertical bd-flex-wide">
                    
                    <div class=" bd-layoutitemsbox-11 bd-flex-wide">
    <div class=" bd-content-10 clearfix">
    <div class="bd-container-inner">
        <?php global $bdpage_messages, $bdpage_action_links; print $bdpage_messages; ?>
        <?php if ($bdpage_action_links): ?><ul class="action-links"><?php print render($bdpage_action_links); ?></ul><?php endif; ?>
        
 <?php Untitled_render_template_from_includes('blog_2'); ?>
    </div>
</div>
	
		<?php global $bdpage_tabs, $bdpage_tabs2;
Untitled_render_template_from_includes('tabsmenu_1', array('tabs' => $bdpage_tabs, 'tabs2' => $bdpage_tabs2)); ?>
</div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div></div>
	
		<div data-animation-time="250" class=" bd-smoothscroll-3"><a href="#" class=" bd-backtotop-1">
    <span class=" bd-icon-80"></span>
</a></div>
	
		<footer class=" bd-footerarea-1">
        <div class=" bd-layoutcontainer-28">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class=" 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-67"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_render_template_from_includes('drupalregion_3');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-68"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_render_template_from_includes('drupalregion_5');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-69"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_render_template_from_includes('drupalregion_7');
?></div></div>
</div>
	
		<div class=" 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-70"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_render_template_from_includes('drupalregion_9');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<?php Untitled_render_template_from_includes('page_footer_1'); ?>
</footer>
    <?php if (isset($vars['closure'])) { print render($vars['closure']); } ?>
