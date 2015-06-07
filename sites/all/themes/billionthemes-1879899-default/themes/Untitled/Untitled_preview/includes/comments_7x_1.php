<?php
function Untitled_preview_comments_7x_1() {
    global $bdcomment_classes, $bdcomment_node, $bdcomment_attributes, $bdcomment_title_prefix, $bdcomment_title_suffix, $bdcomment_content;
?>
    <div id="comments" class="data-control-id-25463 bd-comments-1 <?php print $bdcomment_classes; ?>"<?php print $bdcomment_attributes; ?>>
        <?php if ($bdcomment_content['comments'] && $bdcomment_node->type != 'forum'): ?>
            <?php print render($bdcomment_title_prefix); ?>
            <div class="data-control-id-25421 bd-container-36 bd-tagstyles">
                <h2 class="title"><?php print t('Comments'); ?></h2>
            </div>
            <?php print render($bdcomment_title_suffix); ?>
        <?php endif; ?>

        <?php print render($bdcomment_content['comments']); ?>

        <?php Untitled_preview_render_template_from_includes('commentsform_1', array('content' => $bdcomment_content)); ?>
    </div>
<?php }