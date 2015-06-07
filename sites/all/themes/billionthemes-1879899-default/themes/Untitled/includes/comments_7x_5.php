<?php
function Untitled_comments_7x_5() {
    global $bdcomment_classes, $bdcomment_node, $bdcomment_attributes, $bdcomment_title_prefix, $bdcomment_title_suffix, $bdcomment_content;
?>
    <div id="comments" class=" bd-comments-5 <?php print $bdcomment_classes; ?>"<?php print $bdcomment_attributes; ?>>
        <?php if ($bdcomment_content['comments'] && $bdcomment_node->type != 'forum'): ?>
            <?php print render($bdcomment_title_prefix); ?>
            <div class=" bd-container-51 bd-tagstyles">
                <h2 class="title"><?php print t('Comments'); ?></h2>
            </div>
            <?php print render($bdcomment_title_suffix); ?>
        <?php endif; ?>

        <?php print render($bdcomment_content['comments']); ?>

        <?php Untitled_render_template_from_includes('commentsform_5', array('content' => $bdcomment_content)); ?>
    </div>
<?php }