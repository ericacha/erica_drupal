<?php
function Untitled_preview_commentmetadata_5() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-2668 bd-commentmetadata-5 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }