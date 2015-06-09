<?php
    $search_block_button = variable_get('search_block_form_submit', null); // drupal 6
    $search_block_input  = variable_get('search_block_form_input', null);
    if (Untitled_EXPORT_VERSION > 6) { // drupal 7
        if (isset($variables['form'])) {
            if (isset($variables['form']['actions']) && isset($variables['form']['actions']['submit'])) {
                $search_block_button = $variables['form']['actions']['submit'];
            }
            if (isset($variables['form']['search_block_form']['#theme_wrappers'])) {
                unset($variables['form']['search_block_form']['#theme_wrappers']);
            }
            $search_block_input = $variables['form']['search_block_form'];
        }
    }
?>
<div class="bd-container-inner">
    <?php if (empty($form['#block']->subject)): ?>
        <h2 class="element-invisible hidden"><?php print t('Search form'); ?></h2>
    <?php endif; ?>
    <?php print $search['hidden']; ?>
    <div class="bd-search-wrapper">
        
            
            <div class="bd-input-wrapper">
                <?php print render($search_block_input) ?>
            </div>
            
            <div class="bd-button-wrapper">
                <?php print render($search_block_button) ?>
            </div>
    </div>
</div>
<script>
    jQuery('.bd-searchwidget-2 .bd-icon-6').bind('click', function (e) {
        e.preventDefault();
        jQuery('#<?php print $variables['form']['#id'] ?>').submit();
    });
</script>