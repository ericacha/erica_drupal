<?php
function Untitled_commentsform_2($content) {
    if ($content['comment_form']):
?>
    <div  class=" bd-commentsform-2">
        <div class=" bd-container-39 bd-tagstyles">
            <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
        </div>
        <?php print render($content['comment_form']); ?>
    </div>
<?php 
    endif;
}