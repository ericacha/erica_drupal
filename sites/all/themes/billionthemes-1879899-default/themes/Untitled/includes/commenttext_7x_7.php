<?php
function Untitled_commenttext_7x_7() {
    global $bdcomment_content, $bdcomment_title_prefix, $bdcomment_title_attributes, $bdcomment_title_suffix, $bdcomment_title, $bdcomment_new, $bdcomment_content_attributes, $bdcomment_signature;
?>
    <div class=" bd-commenttext-7">
        <?php print render($bdcomment_title_prefix); ?>
            <h3<?php print $bdcomment_title_attributes; ?>><?php print $bdcomment_title ?></h3>
        <?php print render($bdcomment_title_suffix); ?>
        <?php if ($bdcomment_new): ?>
            <span class="new"><?php print $bdcomment_new ?></span>
        <?php endif; ?>
        <div class="content"<?php print $bdcomment_content_attributes; ?>>
            <?php
                // We hide the comments and links now so that we can render them later.
                hide($bdcomment_content['links']);
                print render($bdcomment_content);
            ?>
            <?php if ($bdcomment_signature): ?>
                <div class="user-signature clearfix">
                    <?php print $bdcomment_signature ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php }