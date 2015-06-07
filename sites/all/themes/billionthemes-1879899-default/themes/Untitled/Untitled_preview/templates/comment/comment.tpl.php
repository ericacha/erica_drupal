<?php
    $vars = get_defined_vars();
    Untitled_preview_generate_globals($vars, 'bdcomment_');

    $comments_id = variable_get('comments_id', null);
    $method = 'comment_'.Untitled_preview_EXPORT_VERSION.'x_'.$comments_id;
    Untitled_preview_render_template_from_includes($method);
?>