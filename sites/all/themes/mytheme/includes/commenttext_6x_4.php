<?php
function Untitled_commenttext_6x_4() {
    global $bdcomment_content, $bdcomment_title, $bdcomment_new, $bdcomment_comment, $bdcomment_signature;
?>
    <div class=" bd-commenttext-4">
        <h3><?php print $bdcomment_title ?></h3>
        <?php if ($bdcomment_comment->new): ?>
            <span class="new"><?php print $bdcomment_new ?></span>
        <?php endif; ?>
        
        <div class="content">
            <?php print render($bdcomment_content); ?>
            <?php if ($bdcomment_signature): ?>
                <div class="user-signature clear-block">
                    <?php print $bdcomment_signature ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php }