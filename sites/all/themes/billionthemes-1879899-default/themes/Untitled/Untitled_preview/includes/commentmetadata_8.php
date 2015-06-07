<?php
function Untitled_preview_commentmetadata_8() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-34339 bd-commentmetadata-8 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }