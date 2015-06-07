<?php
function Untitled_preview_commentmetadata_2() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-2187 bd-commentmetadata-2 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }