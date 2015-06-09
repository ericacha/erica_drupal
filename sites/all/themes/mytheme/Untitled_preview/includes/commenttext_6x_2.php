<?php
function Untitled_preview_commenttext_6x_2() {
    global $bdcomment_content, $bdcomment_title, $bdcomment_new, $bdcomment_comment, $bdcomment_signature;
?>
    <div class="data-control-id-2197 bd-commenttext-2">
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