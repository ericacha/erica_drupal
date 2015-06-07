<?php
function Untitled_preview_commentmetadata_10() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class="data-control-id-572126 bd-commentmetadata-10 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }