<?php
function Untitled_preview_commentsform_3($content) {
    if ($content['comment_form']):
?>
    <div  class="data-control-id-34280 bd-commentsform-3">
        <div class="data-control-id-34273 bd-container-43 bd-tagstyles">
            <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
        </div>
        <?php print render($content['comment_form']); ?>
    </div>
<?php 
    endif;
}