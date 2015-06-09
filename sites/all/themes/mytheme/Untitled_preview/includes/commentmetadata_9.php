<?php
function Untitled_preview_commentmetadata_9() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-40194 bd-commentmetadata-9 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }