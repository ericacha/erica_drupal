<?php
    $vars = get_defined_vars();
    Untitled_preview_generate_globals($vars, 'bdnode_');

    $article_id = variable_get('article_id', null);
    if (isset($article_id) && !empty($article_id)) {
        $method = 'article_'.Untitled_preview_EXPORT_VERSION.'x_'.$article_id;
        Untitled_preview_render_template_from_includes($method);
    } else {
        drupal_set_message('Article ID does not exist', 'error');
    }
?>