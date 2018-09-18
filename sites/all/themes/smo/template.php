<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
function smo_preprocess_maintenance_page(&$variables, $hook) {
  smo_preprocess_html($variables, $hook);
  smo_preprocess_page($variables, $hook);
}


/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function smo_preprocess_html(&$variables, $hook) {
	$variables['classes_array'][] = 'new-class';
  if (drupal_is_front_page()) {
	  if ($key = array_search('two-sidebars', $variables['classes_array'])) {
		  unset($variables['classes_array'][$key]);	
		}
		if ($key = array_search('one-sidebar', $variables['classes_array'])) {
		  unset($variables['classes_array'][$key]);	
		}
		if ($key = array_search('sidebar-first', $variables['classes_array'])) {
		  unset($variables['classes_array'][$key]);	
		}
		if ($key = array_search('sidebar-second', $variables['classes_array'])) {
		  unset($variables['classes_array'][$key]);	
		}
		if ($key = array_search('one-sidebar sidebar-first', $variables['classes_array'])) {
		  unset($variables['classes_array'][$key]);	
		}
		
	}
}

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function smo_preprocess_page(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');
  //print_r($variables);
}


/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */

function smo_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
  if ($variables['node']->type == 'quote') {
    $variables['content']['field_quote_term_condition'][0]['#markup'] = 'Yes';
  }
}


/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
function smo_preprocess_comment(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');
}


/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */

function smo_preprocess_region(&$variables, $hook) {
  if (strpos($variables['region'], 'sidebar_') === 0) {
   $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  }
   //dsm($variables['region']);
  if (strpos($variables['region'], 'sidebar_') === 0 && drupal_is_front_page()) {
		
	}
}


/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */

function smo_preprocess_block(&$variables, $hook) {
}

/**
 * hook_theme()
 */
function smo_theme($existing, $type, $theme, $path) {
  $items = array();
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'smo') . '/templates',
    'template' => 'user-login',
    'preprocess functions' => array(
    'smo_preprocess_user_login'
  ),
 );
 $items['user_profile_form'] = array(
	 'render element' => 'form',
     'path' => drupal_get_path('theme', 'smo') . '/templates',
     'template' => 'user-profile-form',
   );
 return $items;
}

function smo_preprocess_user_login(&$vars) {
  $vars['intro_text'] = t('Take the next step to make your dream come true!');
}

/**
 * function template_preprocess_views_view
 */
function smo_preprocess_views_view(&$vars) {
  //~ global $base_path;
  //~ $view = $vars['view'];
  //~ if ($view->name == 'procedure_price') {
     //~ foreach ($view->result as $key => $result) {
       //~ $vars['view']->result[$key]->taxonomy_term_data_name = 'sss';
       //~ unset($vars['view']);
     //~ }
  //~ }
}

function smo_views_pre_render(&$view) {
  if ($view->name == 'procedure_price') {
    foreach ($view->result as $key => $result) {
      //$view->result[$key]->taxonomy_term_data_name = ' & ';
    }
  }
}
