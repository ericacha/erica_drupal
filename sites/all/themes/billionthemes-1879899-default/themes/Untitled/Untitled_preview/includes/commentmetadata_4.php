<?php
function Untitled_preview_commentmetadata_4() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-2362 bd-commentmetadata-4 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }