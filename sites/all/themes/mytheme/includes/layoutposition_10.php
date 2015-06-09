<?php
    function Untitled_layoutposition_10($region) {
?>
    <div class=" bd-drupalregion-10 clearfix"<?php if (isset($_GET["theme"]) && !empty($_GET["theme"])): ?> data-position="footerRegion4"<?php endif; ?>>
        <?php echo render($region); ?>
    </div>
<?php
    }
?>