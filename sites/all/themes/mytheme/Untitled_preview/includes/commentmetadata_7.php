<?php
function Untitled_preview_commentmetadata_7() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-34016 bd-commentmetadata-7 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }