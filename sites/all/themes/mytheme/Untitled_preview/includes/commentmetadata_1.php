<?php
function Untitled_preview_commentmetadata_1() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-2068 bd-commentmetadata-1 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }