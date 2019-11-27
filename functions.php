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

//GRAVITY FORM LOOP for SPLOT EXAMPLES
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
	if ($entries){
		$html = '<ul>';
		foreach ($entries as $key => $entry) {
			$title = $entry[1];
			$url = $entry[2];
			$desc = $entry[3];
			$html .= '<li><a href="' . $url . '">' . $title . '</a><div class="splot-desc">' . $desc . '</div></li>';
		}
		return $html . '</ul>';
	} else {
		return 'No examples of this SPLOT yet.';
	}
}

//get the splots
function splot_display_splots(){
  $html = "";
  $args = array(
      'posts_per_page' => 30,
      'post_type'   => 'splot', 
      'post_status' => 'publish', 
      'nopaging' => false,
      'orderby'        => 'rand',
                    );
    $i = 0;
    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post();
                      global $post;
                      $clean_title = sanitize_title(get_the_title());                            
                      $html .= '<div class="col-md-6 d-flex align-items-stretch"><a href="'.get_the_permalink().'"><div class="card splot-card">';
                      $html .= '<div class="splot-thumb" class="img-fluid" style="background-image:url(';
                      if (has_post_thumbnail()){
                      	$html .= get_the_post_thumbnail_url($post->ID,'medium');
                  		} else {
                  		 $html .= get_stylesheet_directory_uri() . '/imgs/no-thumb.png';
                  		}
                  	  $html .= ')"></div>';
                      $html .= '<div class="card-body"><h2>' . get_the_title() . '</h2>';
                      $html .= '</div></a></div></div>';         
                       endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return '<div class="row splot-wrapper">' . $html . '</div>';
}

add_shortcode( 'show-splots', 'splot_display_splots' );

//TIMELINE FIX DATE
function special_timeline_update($entry, $form){
    $time = rgar($entry, '1');//assumes the gform date field is field 1 if not change it
    $post = get_post( $entry['post_id'] );
    $post->post_date = $time;
    $post->post_date_gmt = get_gmt_from_date( $time );
    wp_update_post($post);
}
 
add_action( 'gform_after_submission_2', 'special_timeline_update', 10, 2 );//set to run off form 5 if not 


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

