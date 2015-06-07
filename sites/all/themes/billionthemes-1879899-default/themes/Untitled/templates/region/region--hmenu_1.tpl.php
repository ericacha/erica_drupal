<?php if ($content): ?>
    <?php if (Untitled_has_url_param('theme')): ?>
        <?php print $content; ?>
    <?php else: ?>
        <div class="<?php print $classes; ?>">
            <?php print $content; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>