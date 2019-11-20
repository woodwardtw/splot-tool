<?php
/**
 * ACF things
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


if (class_exists('ACF')) {
 add_filter('acf/settings/save_json', 'splot_acf_json_save_point');
   
  function splot_acf_json_save_point( $path ) {
      // update path
      $path = get_stylesheet_directory() . '/acf-json';
      // return
      return $path;
  }

  add_filter('acf/settings/load_json', 'splot_acf_json_load_point');

  function splot_acf_json_load_point( $paths ) {
      // remove original path (optional)
      unset($paths[0]);
      // append path
      $paths[] = get_stylesheet_directory() . '/acf-json';    
      // return
      return $paths;
      
  }

}