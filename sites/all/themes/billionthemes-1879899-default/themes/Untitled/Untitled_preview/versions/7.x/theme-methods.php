<?php

define('Untitled_preview_DEFAULT', '__default');
define('Untitled_preview_EXPORT_VERSION', 7);

function Untitled_preview_preprocess_html(&$variables) {
    if (Untitled_preview_has_url_param('theme') &&
        isset($variables['page']) && isset($variables['page']['page_top']) && isset($variables['page']['page_top']['toolbar'])) {
        unset($variables['page']['page_top']['toolbar']);
    }
    $node = menu_get_object();
    Untitled_preview_set_template($variables, $node, 'html');
    
}

function Untitled_preview_preprocess_block(&$variables) {
    $variables['theme_hook_suggestions'][] = 'block' . Untitled_preview_DEFAULT;
    $variables['theme_hook_suggestions'][] = 'block__' . $variables['block']->region;
    $variables['theme_hook_suggestions'][] = 'block__' . $variables['block']->module;
    $variables['theme_hook_suggestions'][] = 'block__' . $variables['block']->module . '__' . strtr($variables['block']->delta, '-', '_');
}

function Untitled_preview_preprocess_node(&$variables) {
    $variables['theme_hook_suggestions'][] = 'node' . Untitled_preview_DEFAULT;
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type;
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->nid;
}

function Untitled_preview_preprocess_page(&$variables) {
    $node = isset($variables['node']) ? $variables['node'] : null;
    Untitled_preview_set_template($variables, $node, 'page');

    $variables['tabs'] = menu_primary_local_tasks();
    $variables['tabs2'] = menu_secondary_local_tasks();
    
    $variables['search_box'] = NULL;
    if (function_exists('search_box_form_submit')) {
        $variables['search_box'] = drupal_get_form('search_form');
    }
}

function Untitled_preview_set_template(&$variables, $node, $base_name) {
    $variables['theme_hook_suggestions'][] =  $base_name . Untitled_preview_DEFAULT;
    $header = drupal_get_http_header('status');
    $arg0 = arg(0);
    $arg1 = arg(1);
    $arg2 = arg(2);
    if (isset($node) && isset($node->nid) && (!isset($arg2) || ($arg2 !== 'edit'))) {
        // if there is no page template file for $node->type page--node template will be using
        $variables['theme_hook_suggestions'][] =  $base_name . '__node';
        if (isset($node->type) && !empty($node->type)) {
            $variables['theme_hook_suggestions'][] =  $base_name . '__node__' . $node->type;
        }
    }
    if ((count($variables['theme_hook_suggestions']) < 3) &&
        (in_array($base_name . '__node', $variables['theme_hook_suggestions'])) && 
        (in_array($base_name . Untitled_preview_DEFAULT, $variables['theme_hook_suggestions']))) {
        $variables['theme_hook_suggestions'][] =  $base_name .'__blog';
    }
    if (drupal_is_front_page()) {
        $variables['theme_hook_suggestions'][] =  $base_name .'__front';
    }
    if($header === '404 Not Found') {
        $variables['theme_hook_suggestions'][] = $base_name . '__template404';
    }
    if (isset($arg0) && ($arg0 === 'notemplate') && isset($arg1)) {
        $variables['notemplate'] = $arg1;
        $variables['theme_hook_suggestions'][] = $base_name . '__notemplate';
    }
}

function Untitled_preview_feed_icon($variables) {
    $text = t('Subscribe to !feed-title', array('!feed-title' => $variables['title']));
    if ($image = theme('image', array('path' => 'misc/feed.png', 'width' => 16, 'height' => 16, 'alt' => $text))) {
        return l($image, $variables['url'], array('html' => TRUE, 'attributes' => array('class' => array('feed-icon'), 'title' => $text)));
    }
}

function Untitled_preview_button($variables) {
    $element = $variables['element'];
    $element['#attributes']['type'] = 'submit';
    element_set_attributes($element, array('id', 'name', 'value'));

    // Billion Themler button must have empty class attribute
    // $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
    if (!empty($element['#attributes']['disabled'])) {
        $element['#attributes']['class'][] = 'form-button-disabled';
    }

    return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

function Untitled_preview_process_html(&$variables) {
    if (Untitled_preview_EXPORT_VERSION !== Untitled_preview_get_major_version()) {
        drupal_set_message(t('Theme version is not compatible with Drupal 7.x. and should be replaced.'), 'error');
    }
}

function Untitled_preview_status_messages($variables) {
    $display = $variables['display'];
    $output = '';

    $status_heading = array(
        'status' => t('Status message'),
        'error' => t('Error message'),
        'warning' => t('Warning message'),
    );
    foreach (drupal_get_messages($display) as $type => $messages) {
        $output .= '<div class="' . variable_get($type.'_class', null) . "\">\n";
        if (!empty($status_heading[$type])) {
            $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
        }
        $output .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        if (count($messages) > 1) {
            $output .= " <ul>\n";
            foreach ($messages as $message) {
                $output .= '  <li>' . $message . "</li>\n";
            }
            $output .= " </ul>\n";
        }
        else {
            $output .= $messages[0];
        }
        $output .= "</div>\n";
    }
    return $output;
}

function Untitled_preview_breadcrumb($variables) {
    return $variables['breadcrumb'];
}

function Untitled_preview_menu_local_task($variables) {
    $link = $variables['element']['#link'];
    $link_text = $link['title'];
    $class = variable_get('tab_item_class', null);
    if (!empty($variables['element']['#active'])) {
        $class .= ' active';
        // Add text to indicate active tab for non-visual users.
        $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

        // If the link does not contain HTML already, check_plain() it now.
        // After we set 'html'=TRUE the link will not be sanitized by l().
        if (empty($link['localized_options']['html'])) {
            $link['title'] = check_plain($link['title']);
        }
        $link['localized_options']['html'] = TRUE;
        $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
    }

    $link['localized_options']['attributes'] = array('class' => array());

    return '<li class="'.$class.'">'.l($link_text, $link['href'], $link['localized_options'])."</li>\n";
}

function Untitled_preview_get_terms($content) {
    $result = array();
    $output = '';
    foreach (array_keys($content) as $name)	{
        $$name = & $content[$name];
        $field_type = NULL;
        if (is_array($content[$name])) {
            if (isset($content[$name]['#field_type']))
                $field_type = $content[$name]['#field_type'];
        } else if (is_object($content[$name])) {
            if (isset($content[$name]->field_type))
                $field_type = $content[$name]->field_type;
        }
        if ($field_type == NULL || $field_type != "taxonomy_term_reference") continue;
        $result[] = $content[$name];
    }
    return $result;
}

function Untitled_preview_display_terms($content) {
    $output = '';
    $terms = Untitled_preview_get_terms($content);
    $index = 0;
    foreach ($terms as $t) {
        $output .= render($t) . ($index < sizeof($terms) - 1 ? ', ' : '');
        $index++;
    }
    return $output;
}

function Untitled_preview_get_links($content, $is_comment = false, $is_readmore = false, $class = '') {
    $result = '';
    if (!isset($content['links'])) return $result;
    foreach (array_keys($content['links']) as $name) {
        $$name = & $content['links'][$name];
        if (isset($content['links'][$name]['#links'])) {
            $links = $content['links'][$name]['#links'];
            if (is_array($links)) {
                $output = Untitled_preview_get_links_output($links, $is_comment, $is_readmore, $class);
                if (!empty($output)) {
                    $result .= (empty($result)) ? $output : '&nbsp;|&nbsp;' . $output;
                }
            }
        }
    }

    return $result;  
}

function Untitled_preview_get_links_output($links, $is_comment = false, $is_readmore = false, $add_class = '') {
    $output = '';
    $num_links = count($links);
    $index = 0;

    foreach ($links as $key => $link) {
        $class = array($key);
        $class[] = $add_class;
        // Add first, last and active classes to the list of links to help out themers.
        if (!$index) {
            $class[] = 'first';
        }
        if ($index == $num_links) {
            $class[] = 'last';
        }
        if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language_url->language)) {
            $class[] = 'active';
        }
        $link['attributes'] = array('class' => $class);
        $link_output = '';

        if (isset($link['href'])) {
            // Pass in $link as $options, they share the same keys.
            $link_output = l($link['title'], $link['href'], $link);
        }
        elseif (!empty($link['title'])) {
            // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
            if (empty($link['html'])) {
                $link['title'] = check_plain($link['title']);
            }
            $span_attributes = '';
            if (isset($link['attributes'])) {
                $span_attributes = drupal_attributes($link['attributes']);
            }
            $link_output = '<span' . $span_attributes . '>' . $link['title'] . '</span>';
        }

        // Comments or Readmore link output
        $to_render = ($is_comment && (strpos ($key, "comment") !== FALSE)) ||
                     ($is_readmore && (strpos ($key, "readmore") !== FALSE));
        if ($to_render) {
            return $link_output;
        }

        if (!empty($link_output) && 
            !$is_comment && (strpos ($key, "comment") === FALSE) && 
            !$is_readmore && (strpos ($key, "readmore") === FALSE)) {
            $output .= $link_output;
            $index++;
        }
    }
    return $output;
}

function Untitled_preview_form_alter(&$form, &$form_state, $form_id) {
    if (Untitled_preview_has_url_param('theme')) {
        $action = $form["#action"];
        $flag = empty($action) || (strpos ($action, "theme=") !== FALSE) ||
            ((strpos($action, '#') !== FALSE) && (strpos($action, '/') === FALSE)); // Anchors with the id attribute
        if (!$flag) {
            $action = explode('?', $action);
            $action[0] =  $action[0] . '?theme=' . $_GET["theme"] . (sizeof($action) > 1 ? '&' : '');
            $form["#action"] = implode($action);
        }
    }
    if ($form_id === 'search_block_form') {
        $form['#attributes'] = array('class' => variable_get('search_block_form_class', null));
        $form['actions']['submit']['#attributes'] = array('class' => array(variable_get('search_block_form_button_class', null)));
        $form['search_block_form']['#attributes']['class'] = array(variable_get('search_block_form_input_class', null));
        $form['search_block_form']['#attributes']['placeholder'] = array(variable_get('search_block_form_input_placeholder', null));
    } elseif ($form_id === 'search_form' && (arg(0) != 'search' || $form['#id'] !== 'search-form')) { // do not stylize MAIN search form on the search result page
        $form['#attributes'] = array('class' => variable_get('search_theme_form_class', null));
        $form['basic']['submit']['#attributes'] = array('class' => array(variable_get('search_theme_form_button_class', null)));
        $form['basic']['keys']['#attributes'] = array('class' => array(variable_get('search_theme_form_input_class', null)), 'size' => '');
        $form['basic']['keys']['#attributes']['placeholder'] = array(variable_get('search_theme_form_input_placeholder', null));
    }
}

function Untitled_preview_pager($variables) {
    $pager_id = variable_get('pager_id', null);
    $pager_ItemClassNames = variable_get('pager_ItemClassNames', null);
    $pager_classNames = variable_get('pager_classNames', null);
    $blogpager_classNames = variable_get('blogpager_classNames', null);
    if (!isset($variables['pager_id']) || empty($variables['pager_id'])) {
        // we have pager in themler blog in any case, so we could output it in other place;
        $blogpager_id = variable_get('blogpager_id', null);
        if (isset($blogpager_id) && !empty($blogpager_id))
            return;
        return theme_pager($variables);
    }

    $tags = $variables['tags'];
    $element = $variables['element'];
    $parameters = $variables['parameters'];
    $quantity = $variables['quantity'];
    global $pager_page_array, $pager_total;

    // Calculate various markers within this pager piece:
    // Middle is used to "center" pages around the current page.
    $pager_middle = ceil($quantity / 2);
    // current is the page we are currently paged to
    $pager_current = $pager_page_array[$element] + 1;
    // first is the first page listed by this pager piece (re quantity)
    $pager_first = $pager_current - $pager_middle + 1;
    // last is the last page listed by this pager piece (re quantity)
    $pager_last = $pager_current + $quantity - $pager_middle;
    // max is the maximum page number
    $pager_max = $pager_total[$element];
    // End of marker calculations.

    // Prepare for generation loop.
    $i = $pager_first;
    if ($pager_last > $pager_max) {
        // Adjust "center" if at end of query.
        $i = $i + ($pager_max - $pager_last);
        $pager_last = $pager_max;
    }
    if ($i <= 0) {
        // Adjust "center" if at start of query.
        $pager_last = $pager_last + (1 - $i);
        $i = 1;
    }
    // End of generation loop preparation.

    $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
    $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
    $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
    $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

    if ($pager_total[$element] > 1) {
        if ($li_first) {
            $items[] = array(
                'class' => array($pager_ItemClassNames),
                'data' => $li_first,
            );
        }
        if ($li_previous) {
            $items[] = array(
                'class' => array($pager_ItemClassNames),
                'data' => $li_previous,
            );
        }

        // When there is more than one page, create the pager list.
        if ($i != $pager_max) {
            if ($i > 1) {
                $items[] = array(
                    'class' => array($pager_ItemClassNames),
                    'data' => '<span>…</span>',
                );
            }
            // Now generate the actual pager piece.
            for (; $i <= $pager_last && $i <= $pager_max; $i++) {
                if ($i < $pager_current) {
                    $items[] = array(
                        'class' => array($pager_ItemClassNames),
                        'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
                    );
                }
                if ($i == $pager_current) {
                    $items[] = array(
                        'class' => array('active', $pager_ItemClassNames),
                        'data' => "<span>$i</span>",
                    );
                }
                if ($i > $pager_current) {
                    $items[] = array(
                        'class' => array($pager_ItemClassNames),
                        'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
                    );
                }
            }
            if ($i < $pager_max) {
                $items[] = array(
                    'class' => array($pager_ItemClassNames),
                    'data' => '<span>…</span>',
                );
            }
        }
        // End generation.
        if ($li_next) {
            $items[] = array(
                'class' => array($pager_ItemClassNames),
                'data' => $li_next,
            );
        }
        if ($li_last) {
            $items[] = array(
                'class' => array($pager_ItemClassNames),
                'data' => $li_last,
            );
        }
        return '<div class="'.$blogpager_classNames.'"><h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
              'items' => $items,
              'attributes' => array('class' => array($pager_classNames)),
        )).'</div>';
    }
}

function Untitled_preview_menu_link(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    $output = Untitled_preview_add_span_to_link($output);
    
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}