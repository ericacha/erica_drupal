<?php
    function Untitled_drupalcontent_3() {
        global $bdpage_content, $bdpage_messages, $bdpage_action_links;
?>
    <div class=" bd-drupalcontent-3 clearfix">
        <div class="bd-container-inner">
            <?php print $bdpage_messages; ?>
            <?php if ($bdpage_action_links): ?><ul class="action-links"><?php print render($bdpage_action_links); ?></ul><?php endif; ?>
            
        </div>
    </div>
<?php
    }