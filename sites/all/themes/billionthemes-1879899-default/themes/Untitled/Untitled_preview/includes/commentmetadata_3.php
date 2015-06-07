<?php
function Untitled_preview_commentmetadata_3() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-2245 bd-commentmetadata-3 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }