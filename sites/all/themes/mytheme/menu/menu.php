<?php

function Untitled_menu_worker($content, $menu_id, $menu_class, $menu_item_class, $sub_menu_class='', $sub_item_class='', $submenu_popup = '',$show_sub_menus = false) {
    if (!isset($content) || empty($content) || !class_exists('DOMDocument') ) {
        return $content;
    }

    $pattern = '/(.*?<ul.*?class=[\'"])(.*?)([\'"])/i';
    $output = preg_replace($pattern, '$1'.$menu_class.' $2$3', $content);
    $output = Untitled_menu_xml_parcer($output, $menu_id, $menu_class, $menu_item_class, $sub_menu_class, $sub_item_class, $submenu_popup, $show_sub_menus);
    /* Support Block Edit Link module */
    $result = str_replace('<!DOCTYPE root>', '', $output);
    return $result;
}

function Untitled_menu_xml_parcer($content, $menu_id, $menu_class, $menu_item_class, $sub_menu_class, $sub_item_class, $submenu_popup, $show_sub_menus) {
    $parent_id = $menu_id . '-id';

    $doc = Untitled_xml_document_creator($content, $parent_id);
    if ($doc === FALSE) {
        return $content; // An error occurred while reading XML content
    }

    $parent = $doc->documentElement;
    $elements = $parent->childNodes;
    $ul_elements = $doc->getElementsByTagName("ul");
    if ($ul_elements == NULL || !$ul_elements->length)
        return $content;

    $ul = NULL;
    foreach($ul_elements as $ul) {
        // First ul element with css-class art-hmenu or art-vmenu
        if (strpos($ul->getAttribute('class'), $menu_class) !== FALSE)
            break;
        continue;
    }

    if (!isset($ul))
        $ul = $ul_elements->item(0);

    if (!empty($menu_item_class)) { // Don't use active class for first level <li> in Language menu etc.
        Untitled_menu_set_active($doc, $menu_class);
    }
    Untitled_menu_style_parcer($doc, $ul->childNodes, $menu_item_class, $sub_menu_class, $sub_item_class, $submenu_popup, $show_sub_menus);

    $parent->appendChild($ul);
    while ($ul->previousSibling)
        $parent->removeChild($ul->previousSibling);

    $children = $parent->childNodes;
    $inner_HTML = '';
    foreach ($children as $child) {
        $tmp_doc = new DOMDocument();
        $tmp_doc->appendChild($tmp_doc->importNode($child,true));       
        $inner_HTML .= $tmp_doc->saveHTML();
    }

    return html_entity_decode($inner_HTML, ENT_NOQUOTES, "UTF-8");
}

function Untitled_xml_document_creator($content, $parent_id) {
    $old_error_handler = set_error_handler('Untitled_handle_xml_error');
    $dom = new DOMDocument();
    /* Support Block Edit Link module */
    $doc_content = <<< XML
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE root [
<!ENTITY nbsp "&#160;">
]>
<div class="$parent_id">$content</div>
XML;
 
    @$dom->loadXml($doc_content);   
    restore_error_handler();
    return $dom;
}

function Untitled_handle_xml_error($errno, $errstr, $errfile, $errline) {
    if ($errno==E_WARNING && (substr_count($errstr,"DOMDocument::loadXML()")>0))
        return false; // An error occurred while reading XML content
    else 
        return true; // Successful
}

function Untitled_menu_style_parcer($doc, $elements, $menu_item_class, $sub_menu_class, $sub_item_class, $submenu_popup, $show_sub_menus) {
    $to_delete = array();

    foreach ($elements as $element) {
        if (is_a($element, "DOMElement") && ($element->tagName == "li")) {
            $liClass = $element->getAttribute('class');
            $element->setAttribute('class', $menu_item_class . ' ' . $liClass);
            $children = $element->childNodes;

            foreach ($children as $child) {
                if (is_a($child, "DOMElement") && ($child->tagName == "a")) {
                    $caption = $child->nodeValue;
                    if (empty($caption)) {
                        $to_delete[] = $child;
                        $to_delete[] = $element;
                        break;
                    }
                }
                elseif ($show_sub_menus && is_a($child, "DOMElement") && ($child->tagName == "ul")) {
                    //submenus
                    $child->setAttribute('class', $sub_menu_class);
                    Untitled_menu_style_parcer($doc, $child->childNodes, $sub_item_class, $sub_menu_class, $sub_item_class, $submenu_popup, $show_sub_menus);
                    
                    $div_popup = $doc->createElement('div');
                    $div_popup->setAttribute('class', $submenu_popup);
                    $div_popup->appendChild($child);
                    $element->appendChild($div_popup);
                    $to_delete = $child;
                }
                elseif (!$show_sub_menus) {
                    $to_delete[] = $child;
                }
            }
        }
    }

    Untitled_remove_elements($to_delete);
    return $elements;
}

function Untitled_menu_set_active($doc, $menu_class) {
    $xpath = new DOMXPath($doc);
    $query = "//ul[contains(concat(' ',@class,' '), ' $menu_class ')]//a[contains(concat(' ',@class,' '), ' active ')]";
    $items = $xpath->query($query, $doc);
    if ($items->length == 0) return;

    $active_a = $items->item(0);
    //$query = "ancestor::li[contains(concat(' ',@class,' '), ' active-trail ')]";
    $query = "ancestor::li";
    $items = $xpath->query($query, $active_a);

    foreach ($items as $item) {
        $class_attr = $item->getAttribute("class");
        /*if (strpos(' '.$class_attr.' ', ' active ') === FALSE) { // DR-12140
            $item->setAttribute("class", $class_attr.' active');
        }*/

        $children = $item->childNodes;
        foreach($children as $child) {
            if (is_a($child, "DOMElement")) {
                $class_attr = $child->getAttribute("class");
                if (strpos(' '.$class_attr.' ', ' active ') === FALSE) {
                    $child->setAttribute("class", $class_attr.' active');
                }
            }
        }
    }
}

function Untitled_remove_elements($elements_to_delete) {
    if (!isset($elements_to_delete))
        return;
    foreach($elements_to_delete as $element) {
        if ($element != null) {
            $element->parentNode->removeChild($element);
        }
    }
}