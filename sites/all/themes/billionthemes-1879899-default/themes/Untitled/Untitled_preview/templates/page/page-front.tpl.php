<!DOCTYPE html>
<html lang="<?php print Untitled_preview_get_language(); ?>" dir="<?php print Untitled_preview_get_direction(); ?>">
<head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>
    <?php
        $base_path = base_path() . $directory;
        $version = '?' . Untitled_preview_build_version_parameter();
    ?>
    <script>
    var themeHasJQuery = !!window.jQuery;
</script>
<script type="text/javascript" src="<?php echo $base_path . '/js/jquery.js' . $version; ?>"></script>
<script>
    window._$ = jQuery.noConflict(themeHasJQuery);
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo Untitled_preview_get_style_uri('bootstrap'); ?>" media="screen" />
<script type="text/javascript" src="<?php echo $base_path . '/js/bootstrap.min.js' . $version; ?>"></script>
<link class="data-control-id-9" href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic&subset=latin' rel='stylesheet' type='text/css'>
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo Untitled_preview_get_style_uri('style'); ?>" media="all" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_path . '/css/style.ie.css'; ?>" />
    <![endif]-->
    <script type="text/javascript" src="<?php echo $base_path . '/js/script.js' . $version; ?>"></script>
    <script>
        var themeParam = '<?php if (Untitled_preview_has_url_param('theme')) { print 'theme='.$_GET["theme"]; } ?>';
    </script>
    <script type="text/javascript" src="<?php echo $base_path . '/js/preview.js'; ?>"></script>
</head>
<body class="<?php if (isset($body_classes) && !empty($body_classes)) { print $body_classes; } if (isset($classes) && !empty($classes)) { print $classes; } ?> bootstrap bd-body-1 data-control-id-13 bd-pagebackground" <?php if (isset($attributes) && !empty($attributes)) { print $attributes; } ?>>
    <?php
        $vars = get_defined_vars();
        Untitled_preview_generate_globals($vars, 'bdpage_');
        if (isset($page)) {
            Untitled_preview_generate_globals($page, 'bdpage_');
        }
    ?>
    <header class="data-control-id-1022692 bd-headerarea-1">
        <?php Untitled_preview_render_template_from_includes('hmenu_1'); ?>
	
		<div class="data-control-id-1292 bd-boxcontrol-1">
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <?php Untitled_preview_render_template_from_includes('headline_1'); ?>
	
		<?php Untitled_preview_render_template_from_includes('slogan_1', array()); ?>
	
		<?php 
    $method = 'search_'.Untitled_preview_EXPORT_VERSION.'x_1';
    Untitled_preview_render_template_from_includes($method);
?>
        </div>
    </div>
</div>
</header>
	
		<div id="carousel-1" class="data-control-id-1380 bd-slider-1 carousel slide">
    

    

    
        <div class="data-control-id-843180 bd-sliderindicators-3"><ol class="data-control-id-843179 bd-indicators">
    
        <li class="data-control-id-847335 bd-menuitem-12 
 active"><a href="#" data-target="#carousel-1" data-slide-to="0"></a></li>
        <li class="data-control-id-847335 bd-menuitem-12 "><a href="#" data-target="#carousel-1" data-slide-to="1"></a></li>
</ol></div>

    <div class="bd-slides carousel-inner">
        <div class="data-control-id-1366 bd-slide-1 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class="data-control-id-1127315 bd-animation-4 animated" style="display:none"data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class="data-control-id-1127305 bd-animation-3 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"><div class="data-control-id-1327 bd-textblock-26 bd-tagstyles">
    <p>Enjoy DESIGN,</p><p>while THEMLER codes!</p>
</div></div>
</div>
	
		<div class="data-control-id-1127262 bd-animation-2 animated" style="display:none"data-animation-name="fadeInLeft"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class="data-control-id-1127250 bd-animation-1 animated" data-animation-name="fadeOutLeft"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<img class="bd-imagestyles-5 bd-imagelink-5 hidden-xs   data-control-id-270689" src="<?php echo theme_get_image_path('../images/4682c8188cc0cc8aed88f18f7269bc23default_image.png'); ?>"></div>
</div>
	
		<?php 
    $current_region_content = Untitled_preview_render_template_from_includes('drupalregion_1');
?>
        </div>
    </div>
</div>
	
		<div class="data-control-id-1368 bd-slide-2 item"
    
    
    >
    <div class="bd-container-inner">
        <div class="bd-container-inner-wrapper">
            <div class="data-control-id-1127379 bd-animation-6 animated" style="display:none"data-animation-name="fadeInLeft"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class="data-control-id-1127369 bd-animation-5 animated" data-animation-name="fadeOutLeft"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false"><div class="data-control-id-1363 bd-textblock-27 bd-tagstyles">
    <p>Think about DESIGN,<br>not CODE!</p>
</div></div>
</div>
	
		<div class="data-control-id-1127437 bd-animation-8 animated" style="display:none"data-animation-name="fadeInRight"
                                    data-animation-event="slidein"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<div class="data-control-id-1127427 bd-animation-7 animated" data-animation-name="fadeOutRight"
                                    data-animation-event="slideout"
                                    data-animation-duration="1000ms"
                                    data-animation-delay="0ms"
                                    data-animation-infinited="false">
<img class="bd-imagestyles-6 bd-imagelink-2 hidden-xs   data-control-id-1331" src="<?php echo theme_get_image_path('../images/c8b40a0acbc0768cf7dbc80848234209default_image.png'); ?>"></div>
</div>
        </div>
    </div>
</div>
    </div>

    

    

    
        <div class="left-button">
    <a class="data-control-id-1377 bd-carousel-3" href="#">
        <span class="data-control-id-1376 bd-icon-10"></span>
    </a>
</div>

<div class="right-button">
    <a class="data-control-id-1377 bd-carousel-3" href="#">
        <span class="data-control-id-1376 bd-icon-10"></span>
    </a>
</div>

    <script>
        if ('undefined' !== typeof initSlider){
            initSlider('.bd-slider-1', 'left-button', 'right-button', '.bd-carousel-3', '.bd-indicators', 3000, "hover", true, true);
        }
    </script>
</div>
	
		<div class="data-control-id-1187492 bd-stretchtobottom-1 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-1"><div class="bd-sheetstyles bd-contentlayout-1 data-control-id-840">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical">
            
            <div class="bd-flex-horizontal bd-flex-wide">
                
 <?php Untitled_preview_render_template_from_includes('sidebar_area_5'); ?>
                <div class="bd-flex-vertical bd-flex-wide">
                    
                    <div class="data-control-id-1121249 bd-layoutitemsbox-11 bd-flex-wide">
    <div class="data-control-id-33964 bd-content-10 clearfix">
    <div class="bd-container-inner">
        <?php global $bdpage_messages, $bdpage_action_links; print $bdpage_messages; ?>
        <?php if ($bdpage_action_links): ?><ul class="action-links"><?php print render($bdpage_action_links); ?></ul><?php endif; ?>
        
 <?php Untitled_preview_render_template_from_includes('blog_2'); ?>
    </div>
</div>
	
		<?php global $bdpage_tabs, $bdpage_tabs2;
Untitled_preview_render_template_from_includes('tabsmenu_1', array('tabs' => $bdpage_tabs, 'tabs2' => $bdpage_tabs2)); ?>
</div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div></div>
	
		<div data-animation-time="250" class="data-control-id-744770 bd-smoothscroll-3"><a href="#" class="data-control-id-3140 bd-backtotop-1">
    <span class="data-control-id-3139 bd-icon-80"></span>
</a></div>
	
		<footer class="data-control-id-1022699 bd-footerarea-1">
        <div class="data-control-id-3125 bd-layoutcontainer-28">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-3117 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-67"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_preview_render_template_from_includes('drupalregion_3');
?></div></div>
</div>
	
		<div class="data-control-id-3119 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-68"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_preview_render_template_from_includes('drupalregion_5');
?></div></div>
</div>
	
		<div class="data-control-id-3121 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-69"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_preview_render_template_from_includes('drupalregion_7');
?></div></div>
</div>
	
		<div class="data-control-id-3123 
 col-md-6
 col-sm-6
 col-xs-24">
    <div class="bd-layoutcolumn-70"><div class="bd-vertical-align-wrapper"><?php 
    $current_region_content = Untitled_preview_render_template_from_includes('drupalregion_9');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
	
		<?php Untitled_preview_render_template_from_includes('page_footer_1'); ?>
</footer>
    <?php if (isset($vars['closure'])) { print render($vars['closure']); } ?>
</body>
</html>