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
<body class="<?php if (isset($body_classes) && !empty($body_classes)) { print $body_classes; } if (isset($classes) && !empty($classes)) { print $classes; } ?> bootstrap bd-body-5 data-control-id-31 bd-pagebackground" <?php if (isset($attributes) && !empty($attributes)) { print $attributes; } ?>>
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
	
		<div class="data-control-id-1187528 bd-stretchtobottom-3 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-5"><div class="bd-sheetstyles bd-contentlayout-5 data-control-id-888">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical">
            
 <?php Untitled_preview_render_template_from_includes('sidebar_area_6'); ?>
            <div class="bd-flex-horizontal bd-flex-wide">
                
 <?php Untitled_preview_render_template_from_includes('sidebar_area_5'); ?>
                <div class="bd-flex-vertical bd-flex-wide">
                    
                    <div class="data-control-id-1121299 bd-layoutitemsbox-13 bd-flex-wide">
    <div class="data-control-id-34287 bd-content-12 clearfix">
    <div class="bd-container-inner">
        <?php global $bdpage_messages, $bdpage_action_links; print $bdpage_messages; ?>
        <?php if ($bdpage_action_links): ?><ul class="action-links"><?php print render($bdpage_action_links); ?></ul><?php endif; ?>
        
 <?php Untitled_preview_render_template_from_includes('blog_3'); ?>
    </div>
</div>
</div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div></div>
	
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
	
		<div data-animation-time="250" class="data-control-id-744770 bd-smoothscroll-3"><a href="#" class="data-control-id-3140 bd-backtotop-1">
    <span class="data-control-id-3139 bd-icon-80"></span>
</a></div>
    <?php if (isset($vars['closure'])) { print render($vars['closure']); } ?>
</body>
</html>