<?php
function Untitled_commentmetadata_1() {
    global $bdcomment_permalink, $bdcomment_submitted;
?>
    <div class=" bd-commentmetadata-1 submitted">
        <?php print $bdcomment_submitted; ?>
        <?php if (isset($bdcomment_permalink)) print $bdcomment_permalink; ?>
    </div>
<?php }