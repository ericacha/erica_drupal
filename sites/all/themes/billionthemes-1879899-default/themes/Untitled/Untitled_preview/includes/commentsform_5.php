<?php
function Untitled_preview_commentsform_5($content) {
    if ($content['comment_form']):
?>
    <div  class="data-control-id-572067 bd-commentsform-5">
        <div class="data-control-id-572060 bd-container-52 bd-tagstyles">
            <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
        </div>
        <?php print render($content['comment_form']); ?>
    </div>
<?php 
    endif;
}