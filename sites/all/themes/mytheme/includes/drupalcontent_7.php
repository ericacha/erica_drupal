<?php
    function Untitled_drupalcontent_7() {
        global $bdpage_content, $bdpage_messages, $bdpage_action_links;
?>
    <div class=" bd-drupalcontent-7 clearfix">
        <div class="bd-container-inner">
            <?php print $bdpage_messages; ?>
            <?php if ($bdpage_action_links): ?><ul class="action-links"><?php print render($bdpage_action_links); ?></ul><?php endif; ?>
            <?php global $bdpage_tabs, $bdpage_tabs2;
Untitled_render_template_from_includes('tabsmenu_1', array('tabs' => $bdpage_tabs, 'tabs2' => $bdpage_tabs2)); ?>
	
		<?php Untitled_render_template_from_includes('blog_4'); ?>
        </div>
    </div>
<?php
    }