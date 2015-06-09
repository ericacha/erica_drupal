<?php

function Untitled_preview_blog_5() {
    global $bdpage_title, $bdpage_title_prefix, $bdpage_title_suffix, $bdpage_content;

    variable_set('blogpager_id', 5);
    variable_set('article_id', 6);
    variable_set('comments_id', 5);

    $content = render($bdpage_content);
    $nodes = null;
    if (!empty($bdpage_content) && !empty($bdpage_content['system_main']) && !empty($bdpage_content['system_main']['nodes'])) {
        $nodes   = $bdpage_content['system_main']['nodes'];
        $output  = render($nodes);
    }
    //unset($bdpage_content['system_main']['nodes']);
    
    //$nodes = render($nodes);
?>
    <div class="data-control-id-572073 bd-blog-5">
        <div class="bd-container-inner">
            
                <?php if ($bdpage_title): ?>
    <?php if (isset($bdpage_title_prefix)) print render($bdpage_title_prefix); ?>
    <h2 class="data-control-id-571950 bd-container-48 bd-tagstyles"><?php print $bdpage_title; ?></h2>
    <?php if (isset($bdpage_title_suffix)) print render($bdpage_title_suffix); ?>
<?php endif; ?>
            <?php Untitled_preview_render_template_from_includes('blogpagination_5'); ?>
            <div class="data-control-id-571918 bd-grid-11">
              <div class="container-fluid">
                <div class="separated-grid row">
                <?php
                    if (isset($nodes)) {
                        $nodes_out = '';
                        foreach ($nodes as $node) {
                            if (!is_array($node))
                                continue;
                            ob_start();
                ?>
                    
                    <div class="separated-item-33 col-md-24 ">
                    
                        <div class="bd-griditem-33">
                            <?php print render($node); ?>
                        </div>
                    </div>
                <?php 
                            $nodes_out .= ob_get_clean();
                        }
                        print str_replace($output, $nodes_out, $content);
                    } else {
                ?>
                    
                    <div class="separated-item-33 col-md-24 ">
                    
                        <div class="bd-griditem-33">
                            <?php print $content; ?>
                        </div>
                    </div>
                <?php 
                    }
                ?>
                </div>
              </div>
            </div>
            <?php Untitled_preview_render_template_from_includes('blogpagination_5'); ?>
        </div>
    </div>
<?php }