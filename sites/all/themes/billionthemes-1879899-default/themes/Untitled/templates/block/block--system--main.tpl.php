<?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
<?php endif;?>
<?php print render($title_suffix); ?>
<!-- Drupal block classes and id_attributes were removed from here to support Themler functionality such as DnD and Blog layout-->
<?php if ($content): ?><?php print $content ?><?php endif;?>