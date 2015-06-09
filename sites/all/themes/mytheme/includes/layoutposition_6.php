<?php
    function Untitled_layoutposition_6($region) {
?>
    <div class=" bd-drupalregion-6 clearfix"<?php if (isset($_GET["theme"]) && !empty($_GET["theme"])): ?> data-position="footerRegion2"<?php endif; ?>>
        <?php echo render($region); ?>
    </div>
<?php
    }
?>