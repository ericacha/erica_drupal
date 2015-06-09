<?php
    function Untitled_layoutposition_8($region) {
?>
    <div class=" bd-drupalregion-8 clearfix"<?php if (isset($_GET["theme"]) && !empty($_GET["theme"])): ?> data-position="footerRegion3"<?php endif; ?>>
        <?php echo render($region); ?>
    </div>
<?php
    }
?>