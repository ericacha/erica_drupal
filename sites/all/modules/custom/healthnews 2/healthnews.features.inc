<?php
/**
 * @file
 * healthnews.features.inc
 */

/**
 * Implements hook_views_api().
 */
function healthnews_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function healthnews_node_info() {
  $items = array(
    'health' => array(
      'name' => t('Health'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
