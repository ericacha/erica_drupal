<?php
function Untitled_preview_commentsform_4($content) {
    if ($content['comment_form']):
?>
    <div  class="data-control-id-40135 bd-commentsform-4">
        <div class="data-control-id-40128 bd-container-46 bd-tagstyles">
            <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
        </div>
        <?php print render($content['comment_form']); ?>
    </div>
<?php 
    endif;
}