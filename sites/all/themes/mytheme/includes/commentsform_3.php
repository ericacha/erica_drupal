<?php
function Untitled_commentsform_3($content) {
    if ($content['comment_form']):
?>
    <div  class=" bd-commentsform-3">
        <div class=" bd-container-43 bd-tagstyles">
            <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
        </div>
        <?php print render($content['comment_form']); ?>
    </div>
<?php 
    endif;
}