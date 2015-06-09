<?php

function Untitled_settings($saved_settings) {
    if (!function_exists('themler_show') || // Themler module installed
        !file_exists(realpath(drupal_get_path('theme', 'Untitled')).'/project/project.json')) // has project file
        return;

    $form = array();
    $form['themler']  = array(
        '#type' => 'fieldset',
        '#title' => t('Billion Themler')
    );
      
    $form['themler']['edit_theme'] = array(
        '#type' => 'submit',
        '#value' => t('Edit theme')
    );
    $form['themler']['edit_theme']['#submit'][] = 'Untitled_D6_edit_theme_submit';
    return $form;
}

function Untitled_D6_edit_theme_submit($form, &$form_state) {
    $form_state['redirect'] = array('admin/settings/themler', array('theme' => 'Untitled'));
}

// Drupal 7
function Untitled_form_system_theme_settings_alter(&$form, &$form_state) {
    if (!function_exists('themler_show') || // Themler module installed
        !file_exists(DRUPAL_ROOT.'/'.drupal_get_path('theme', 'Untitled').'/project/project.json')) // has project file
        return;

    $form['themler']  = array(
        '#type' => 'fieldset',
        '#title' => t('Billion Themler')
    );
      
    $form['themler']['edit_theme'] = array(
        '#type' => 'submit',
        '#value' => t('Edit theme')
    );
    $form['themler']['edit_theme']['#submit'][] = 'Untitled_D7_edit_theme_submit';
}

function Untitled_D7_edit_theme_submit($form, &$form_state) {
    $form_state['redirect'] = array('admin/config/content/themler', array('query' => array('theme' => 'Untitled')));
}