
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
	
		<div class="data-control-id-1187510 bd-stretchtobottom-2 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-7"><div class="bd-sheetstyles bd-contentlayout-7 data-control-id-912">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical">
            
 <?php Untitled_preview_render_template_from_includes('sidebar_area_6'); ?>
            <div class="bd-flex-horizontal bd-flex-wide">
                
                <div class="bd-flex-vertical bd-flex-wide">
                    
                    <div class="data-control-id-1121319 bd-layoutitemsbox-15 bd-flex-wide">
    <div class="data-control-id-572074 bd-content-5 clearfix">
    <div class="bd-container-inner">
        <?php global $bdpage_messages, $bdpage_action_links; print $bdpage_messages; ?>
        <?php if ($bdpage_action_links): ?><ul class="action-links"><?php print render($bdpage_action_links); ?></ul><?php endif; ?>
        
 <?php Untitled_preview_render_template_from_includes('blog_5'); ?>
    </div>
</div>
</div>
                    
                </div>
                
            </div>
            
 <?php Untitled_preview_render_template_from_includes('sidebar_area_16'); ?>
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
