<?php
    $vars = get_defined_vars();
    Untitled_generate_globals($vars, 'bdcomment_');

    $comments_id = variable_get('comments_id', null);
    $method = 'comments_'.Untitled_EXPORT_VERSION.'x_'.$comments_id;
    Untitled_render_template_from_includes($method);
?>