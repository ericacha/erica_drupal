<?php
function Untitled_preview_comments_7x_4() {
    global $bdcomment_classes, $bdcomment_node, $bdcomment_attributes, $bdcomment_title_prefix, $bdcomment_title_suffix, $bdcomment_content;
?>
    <div id="comments" class="data-control-id-40136 bd-comments-4 <?php print $bdcomment_classes; ?>"<?php print $bdcomment_attributes; ?>>
        <?php if ($bdcomment_content['comments'] && $bdcomment_node->type != 'forum'): ?>
            <?php print render($bdcomment_title_prefix); ?>
            <div class="data-control-id-40094 bd-container-45 bd-tagstyles">
                <h2 class="title"><?php print t('Comments'); ?></h2>
            </div>
            <?php print render($bdcomment_title_suffix); ?>
        <?php endif; ?>

        <?php print render($bdcomment_content['comments']); ?>

        <?php Untitled_preview_render_template_from_includes('commentsform_4', array('content' => $bdcomment_content)); ?>
    </div>
<?php }