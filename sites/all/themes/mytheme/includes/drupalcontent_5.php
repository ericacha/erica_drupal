<?php
    function Untitled_drupalcontent_5() {
        global $bdpage_content, $bdpage_messages, $bdpage_action_links;
?>
    <div class=" bd-drupalcontent-5 clearfix">
        <div class="bd-container-inner">
            <?php print $bdpage_messages; ?>
            <?php if ($bdpage_action_links): ?><ul class="action-links"><?php print render($bdpage_action_links); ?></ul><?php endif; ?>
            <?php Untitled_render_template_from_includes('blog_2'); ?>
        </div>
    </div>
<?php
    }