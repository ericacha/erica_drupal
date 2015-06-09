<?php
    function Untitled_layoutposition_4($region) {
?>
    <div class=" bd-drupalregion-4 clearfix"<?php if (isset($_GET["theme"]) && !empty($_GET["theme"])): ?> data-position="footerRegion1"<?php endif; ?>>
        <?php echo render($region); ?>
    </div>
<?php
    }
?>