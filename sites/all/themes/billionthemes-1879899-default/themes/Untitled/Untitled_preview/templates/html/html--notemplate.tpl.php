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
<body>
    <?php print $page; ?>
</body>
</html>