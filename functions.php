<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/custom-post-types.php',                // Load custom post types.
	'/acf.php',                // Load custom post types.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


function splot_get_wild_examples(){
	    global $post;
		$search_criteria = array(
	    'status'        => 'active',
	    'field_filters' => array(
	        array(
	            'key'   => '4',
	            'value' => $post->ID,
	        )
	    )
	);
	$entries = GFAPI::get_entries( 1, $search_criteria );
	$html = '<ul>';
	foreach ($entries as $key => $entry) {
		$title = $entry[1];
		$url = $entry[2];
		$html .= '<li><a href="' . $url . '">' . $title . '</a></li>';
	}
	return $html . '</ul>';
}


//happy little logging function
	if ( ! function_exists('write_log')) {
	   function write_log ( $log )  {
	      if ( is_array( $log ) || is_object( $log ) ) {
	         error_log( print_r( $log, true ) );
	      } else {
	         error_log( $log );
	      }
	   }
	}