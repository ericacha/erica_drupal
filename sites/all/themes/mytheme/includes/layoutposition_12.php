<?php
    function Untitled_layoutposition_12($region) {
?>
    <div class=" bd-drupalregion-12 clearfix"<?php if (isset($_GET["theme"]) && !empty($_GET["theme"])): ?> data-position="Drupal Region 1"<?php endif; ?>>
        <?php echo render($region); ?>
    </div>
<?php
    }
?>