<div class="data-control-id-3046 bd-block-6 <?php if (isset($classes)) print $classes; elseif (isset($block->module)) print "clear-block block block-$block->module"; ?>" id="<?php if (isset($block_html_id)) print $block_html_id; else print "block-$block->module-$block->delta"; ?>"<?php if (isset($attributes)) print $attributes; ?>>
    <div class="bd-layoutcontainerinner">
        <?php if (!empty($block->subject)): ?>
    
    <div class="data-control-id-3013 bd-container-55 bd-tagstyles">
        <?php if (isset($title_prefix)) print render($title_prefix); ?>
        <h4><?php print $block->subject; ?></h4>
        <?php if (isset($title_suffix)) print render($title_suffix); ?>
    </div>
    
<?php endif;?>
        <div class="data-control-id-3045 bd-container-56 bd-tagstyles content">
    <?php if (isset($content)) print $content; elseif (isset($block->content)) print $block->content; ?>
</div>
    </div>
</div>