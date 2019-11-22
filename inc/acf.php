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

	function splot_handle_form_submission( $form, $fields, $args ) {
    	$data = $fields;    
    	write_log($data); 
    	write_log($form);    
    	$title = $data[0]['value'];
    	$url = $data[1]['value'];
    	$text = $data[2]['value'];
    	$cats = $data[3]['value'];
    	$image = $data[4]['value']['ID'];
    	$content = $text . '<a class="btn btn-primary" href="'. $url .'">See the SPLOT in Action</a>';


    	$args = array(
            'post_title' => wp_strip_all_tags($title),
            //'post_content' => $content,
            'post_category' =>  $cats,
            'post_status'   => 'publish',
            'post_type' => 'splot',
        );
        $post_id = wp_insert_post($args);
        set_post_thumbnail($post_id, $image);
        update_field('splot_title', $title, $post_id);
        update_field('url', $url, $post_id);
        update_field('description', $text, $post_id);

	}
	 
	add_action( 'af/form/submission', 'splot_handle_form_submission', 10, 3 );
	 
	function splot_get_field($field_name){
		$value = get_field($field_name);
		return $value;
	} 


}