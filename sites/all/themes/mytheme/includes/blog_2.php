<?php

function Untitled_blog_2() {
    global $bdpage_title, $bdpage_title_prefix, $bdpage_title_suffix, $bdpage_content;

    variable_set('blogpager_id', 2);
    variable_set('article_id', 3);
    variable_set('comments_id', 2);

    $content = render($bdpage_content);
    $nodes = null;
    if (!empty($bdpage_content) && !empty($bdpage_content['system_main']) && !empty($bdpage_content['system_main']['nodes'])) {
        $nodes   = $bdpage_content['system_main']['nodes'];
        $output  = render($nodes);
    }
    //unset($bdpage_content['system_main']['nodes']);
    
    //$nodes = render($nodes);
?>
    <div class=" bd-blog-2">
        <div class="bd-container-inner">
            
                <?php if ($bdpage_title): ?>
    <?php if (isset($bdpage_title_prefix)) print render($bdpage_title_prefix); ?>
    <h2 class=" bd-container-26 bd-tagstyles"><?php print $bdpage_title; ?></h2>
    <?php if (isset($bdpage_title_suffix)) print render($bdpage_title_suffix); ?>
<?php endif; ?>
            <?php Untitled_render_template_from_includes('blogpagination_2'); ?>
            <div class=" bd-grid-8">
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
                    
                    <div class="separated-item-14 col-md-24 ">
                    
                        <div class="bd-griditem-14">
                            <?php print render($node); ?>
                        </div>
                    </div>
                <?php 
                            $nodes_out .= ob_get_clean();
                        }
                        print str_replace($output, $nodes_out, $content);
                    } else {
                ?>
                    
                    <div class="separated-item-14 col-md-24 ">
                    
                        <div class="bd-griditem-14">
                            <?php print $content; ?>
                        </div>
                    </div>
                <?php 
                    }
                ?>
                </div>
              </div>
            </div>
            <?php Untitled_render_template_from_includes('blogpagination_2'); ?>
        </div>
    </div>
<?php }