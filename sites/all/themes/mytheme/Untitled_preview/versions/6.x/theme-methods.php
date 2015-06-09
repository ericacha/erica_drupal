<?php

define('Untitled_preview_DEFAULT', '-default');
define('Untitled_preview_EXPORT_VERSION', 6);

function Untitled_preview_preprocess_page(&$variables) {
    if (Untitled_preview_EXPORT_VERSION !== Untitled_preview_get_major_version()) {
        drupal_set_message(t('Theme version is not compatible with Drupal 6.x. and should be replaced.'), 'error');
    }

    $node = isset($variables['node']) ? $variables['node'] : null;
    Untitled_preview_set_template($variables, $node, 'page');

    $variables['tabs'] = menu_primary_local_tasks();
    $variables['tabs2'] = menu_secondary_local_tasks();
    
    
}

function Untitled_preview_preprocess_block(&$variables) {
    $variables['template_files'][] = 'block' . Untitled_preview_DEFAULT;
    $variables['template_files'][] = 'block-' . $variables['block']->region;
    $variables['template_files'][] = 'block-' . $variables['block']->module;
    $variables['template_files'][] = 'block-' . $variables['block']->module . '-' . $variables['block']->delta;
    
}

function Untitled_preview_preprocess_node(&$variables) {
    // Comments not working with for a while - only from theme root only
    $variables['template_files'][] = 'node' . Untitled_preview_DEFAULT;
    $variables['template_files'][] = 'node-' . $variables['node']->type;
}

function Untitled_preview_set_template(&$variables, $node, $base_name) {
    $variables['template_files'][] = $base_name. Untitled_preview_DEFAULT;
    $arg0 = arg(0);
    $arg1 = arg(1);
    $arg2 = arg(2);
    if (isset($node) && isset($node->nid) && (!isset($arg2) || ($arg2 !== 'edit'))) {
        // if there is no page template file for $node->type page-node template will be using
        $variables['template_files'][] = $base_name . '-node';
        if (isset($node->type) && !empty($node->type)) {
            $variables['template_files'][] = $base_name . '-node-' . $node->type;
        }
    }
    if (count($variables['template_files']) < 3 && 
        in_array($base_name . '-node', $variables['template_files']) &&
        in_array($base_name . Untitled_preview_DEFAULT, $variables['template_files'])) {
        $variables['template_files'][] = $base_name . '-blog';
    }
    if (drupal_is_front_page()) {
        $variables['template_files'][] = $base_name .'-front';
    }
    $header = drupal_get_headers();
    if (strpos($header, '403 Forbidden') !== FALSE || strpos($header, '404 Not Found') !== FALSE) {
        $variables['template_files'][] = $base_name . '-template404';
    }
    if (isset($arg0) && ($arg0 === 'notemplate') && isset($arg1)) {
        $variables['notemplate'] = $arg1;
        $variables['template_files'][] = $base_name . '-notemplate';
    }
}

function Untitled_preview_feed_icon($url, $title) {
    if ($image = theme('image', 'misc/feed.png', t('Syndicate content'), $title)) {
        return '<a href="' . check_url($url) . '" class="feed-icon">' . $image . '</a>';
    }
}

function Untitled_preview_breadcrumb($breadcrumb) {
    return $breadcrumb;
}

function Untitled_preview_button($element) {
  // Make sure not to overwrite classes.
  if (isset($element['#attributes']['class'])) { // Billion Themler button must have empty class attribute 
    unset($element['#attributes']['class']); // = 'form-' . $element['#button_type'] . ' ' . $element['#attributes']['class'];
  }
  /*else {
    $element['#attributes']['class'] = 'form-' . $element['#button_type'];
  }*/

  return '<input type="submit" ' . (empty($element['#name']) ? '' : 'name="' . $element['#name'] . '" ') . 'id="' . $element['#id'] . '" value="' . check_plain($element['#value']) . '" ' . drupal_attributes($element['#attributes']) . " />\n";
}

function Untitled_preview_preprocess_search_theme_form(&$vars, $hook) {
    Untitled_preview_set_themler_classes($vars);
}

function Untitled_preview_preprocess_search_block_form(&$vars, $hook)  {
    Untitled_preview_set_themler_classes($vars, true);
}

function Untitled_preview_form($element) {
    // Anonymous div to satisfy XHTML compliance.
    $action = $element['#action'] ? 'action="'. check_url($element['#action']) .'" ' : '';
    if (isset($element['search_block_form'])) {
        $element['#attributes'] = array('class' => variable_get('search_block_form_class', null));
        return '<form '. $action .' accept-charset="UTF-8" method="'. $element['#method'] .'" id="'. $element['#id'] .'"'. drupal_attributes($element['#attributes']) .">\n". $element['#children'] ."\n</form>\n";
    }
    return '<form '. $action .' accept-charset="UTF-8" method="'. $element['#method'] .'" id="'. $element['#id'] .'"'. drupal_attributes($element['#attributes']) .">\n<div>". $element['#children'] ."\n</div></form>\n";
}

function Untitled_preview_status_messages($display = NULL) {
    $output = '';
    foreach (drupal_get_messages($display) as $type => $messages) {
        $output .= '<div class="' . variable_get($type.'_class', null) . "\">\n";
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

function Untitled_preview_set_themler_classes(&$vars, $is_widget = false) {
    $name = $is_widget ? 'search_block_form' : 'search_theme_form';
    unset($vars['form']['#printed']);
    // Remove the "Search this site" label from the form.
    $vars['form'][$name]['#title'] = t('');
    // Add a custom class and placeholder text to the search box.
    $vars['form'][$name]['#attributes'] = array('class' => variable_get($name.'_input_class', null), 'placeholder' => variable_get($name.'_input_placeholder', null));
    // Change the text on the submit button
    //$vars['form']['submit']['#value'] = t('Go');
    // Rebuild the rendered version (search form only, rest remains unchanged)
    unset($vars['form'][$name]['#printed']);
    $vars['search'][$name] = drupal_render($vars['form'][$name]);
    $vars['form']['submit']['#attributes'] = array('class' => variable_get($name.'_button_class', null));
    // Rebuild the rendered version (submit button, rest remains unchanged)
    unset($vars['form']['submit']['#printed']);
    $vars['search']['submit'] = drupal_render($vars['form']['submit']);
    // Remove wrappers for Themler from input text field
    $pattern = '/(.*?<div.*?>)(.*?)(<\/div>)/si';
    $vars['search'][$name] = preg_replace($pattern, '$2', $vars['search'][$name]);

    variable_set($name.'_input', $vars['search'][$name]);
    variable_set($name.'_submit', $vars['search']['submit']);
    variable_set($name.'_hidden', $vars['search']['hidden']);

    // Collect all form elements to make it easier to print the whole form.
    $vars['search_form'] = implode($vars['search']);
}

function Untitled_preview_get_terms($node) {
    $result = '';
    if (isset($node->taxonomy) && sizeof($node->taxonomy) > 0) {
        $terms = $node->taxonomy;
        $links = array();
        foreach ($terms as $term) {
            $links[] = l($term->name, taxonomy_term_path($term), array('rel' => 'tag', 'title' => strip_tags($term->description)));
        }
        $result = t('Tags: ') . implode(', ', $links);
    }
    return $result;
}

function Untitled_preview_get_links($links, $is_comment = false, $is_readmore = false, $add_class = '') {
    $output = '';

    if (!empty($links)) {
        $num_links = count($links);
        $index = 0;

        foreach ($links as $key => $link) {
            // Add first and last classes to the list of links to help out themers.
            $extra_class = $add_class ;
            if (!$index) {
                $extra_class .= ' first ';
            }
            if ($index == $num_links) {
                $extra_class .= ' last ';
            }
            // Automatically add a class to each link and also to each LI
            if (isset($link['attributes']) && isset($link['attributes']['class'])) {
                $link['attributes']['class'] .= ' ' . $key . $extra_class;
            }
            else {
                $link['attributes']['class'] = $key . $extra_class;
            }

            $link_output = Untitled_preview_get_link_output($link);
            // Comments or Readmore link output
            $to_render = ($is_comment && (strpos ($key, "comment") !== FALSE)) ||
                         ($is_readmore && (strpos ($key, "read_more") !== FALSE));
            if ($to_render) {
                return $link_output;
            }

            if (!empty($link_output) && 
                !$is_comment && (strpos ($key, "comment") === FALSE) && 
                !$is_readmore && (strpos ($key, "read_more") === FALSE)) {
                $output .= $link_output;
                $index++;
            }
        }
    }

    return $output;
}

function Untitled_preview_get_link_output($link) {
    $output = '';
    // Is the title HTML?
    $html = isset($link['html']) ? $link['html'] : NULL;

    // Initialize fragment and query variables.
    $link['query'] = isset($link['query']) ? $link['query'] : NULL;
    $link['fragment'] = isset($link['fragment']) ? $link['fragment'] : NULL;

    if (isset($link['href'])) {
        $output = l($link['title'], $link['href'], array('language' => $link['language'], 'attributes'=>$link['attributes'], 'query'=>$link['query'], 'fragment'=>$link['fragment'], 'absolute'=>FALSE, 'html'=>$html));
    }
    else if ($link['title']) {
        if (!$html) {
            $link['title'] = check_plain($link['title']);
        }
        $output = $link['title'];
    }

    return $output;
}

function Untitled_preview_is_links_set($links) {
    $size = sizeof($links);
    if ($size == 0) {
        return FALSE;
    }

    //check if there's "Read more" in node links only  
    $read_more_link = $links['node_read_more'];
    if ($read_more_link != NULL && $size == 1) {
        return FALSE;
    }

    return TRUE;
}

function Untitled_preview_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
    $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
    if (!empty($extra_class)) {
        $class .= ' ' . $extra_class;
    }
    if ($in_active_trail) {
        $class .= ' active-trail';
    }
    $output = Untitled_preview_add_span_to_link($link);
    return '<li class="' . $class . '">' . $output . $menu . "</li>\n";
}