<?php
function Untitled_commentsform_4($content) {
    if ($content['comment_form']):
?>
    <div  class=" bd-commentsform-4">
        <div class=" bd-container-46 bd-tagstyles">
            <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
        </div>
        <?php print render($content['comment_form']); ?>
    </div>
<?php 
    endif;
}