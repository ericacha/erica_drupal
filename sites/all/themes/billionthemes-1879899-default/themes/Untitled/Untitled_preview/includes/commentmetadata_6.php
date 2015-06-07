<?php
function Untitled_preview_commentmetadata_6() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-25521 bd-commentmetadata-6 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }