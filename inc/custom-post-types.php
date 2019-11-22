<?php
/**
 * Custom post type things
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//splot custom post type

// Register Custom Post Type splot
// Post Type Key: splot

function create_splot_cpt() {

  $labels = array(
    'name' => __( 'Splots', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Splot', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Splot', 'textdomain' ),
    'name_admin_bar' => __( 'Splot', 'textdomain' ),
    'archives' => __( 'Splot Archives', 'textdomain' ),
    'attributes' => __( 'Splot Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Splot:', 'textdomain' ),
    'all_items' => __( 'All Splots', 'textdomain' ),
    'add_new_item' => __( 'Add New Splot', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Splot', 'textdomain' ),
    'edit_item' => __( 'Edit Splot', 'textdomain' ),
    'update_item' => __( 'Update Splot', 'textdomain' ),
    'view_item' => __( 'View Splot', 'textdomain' ),
    'view_items' => __( 'View Splots', 'textdomain' ),
    'search_items' => __( 'Search Splots', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into splot', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this splot', 'textdomain' ),
    'items_list' => __( 'Splot list', 'textdomain' ),
    'items_list_navigation' => __( 'Splot list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Splot list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'splot', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'tags'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 4,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-hammer',
  );
  register_post_type( 'splot', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_splot_cpt', 0 );




//review custom post type

// Register Custom Post Type review
// Post Type Key: review

function create_review_cpt() {

  $labels = array(
    'name' => __( 'Reviews', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Review', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Review', 'textdomain' ),
    'name_admin_bar' => __( 'Review', 'textdomain' ),
    'archives' => __( 'Review Archives', 'textdomain' ),
    'attributes' => __( 'Review Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Review:', 'textdomain' ),
    'all_items' => __( 'All Reviews', 'textdomain' ),
    'add_new_item' => __( 'Add New Review', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Review', 'textdomain' ),
    'edit_item' => __( 'Edit Review', 'textdomain' ),
    'update_item' => __( 'Update Review', 'textdomain' ),
    'view_item' => __( 'View Review', 'textdomain' ),
    'view_items' => __( 'View Reviews', 'textdomain' ),
    'search_items' => __( 'Search Reviews', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into review', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this review', 'textdomain' ),
    'items_list' => __( 'Review list', 'textdomain' ),
    'items_list_navigation' => __( 'Review list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Review list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'review', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'custom-fields',),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-comments',
  );
  register_post_type( 'review', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_review_cpt', 0 );



// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_splot_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_splot_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Type', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Types', 'textdomain' ),
        'all_items'         => __( 'All Types', 'textdomain' ),
        'parent_item'       => __( 'Parent Type', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
        'edit_item'         => __( 'Edit Type', 'textdomain' ),
        'update_item'       => __( 'Update Type', 'textdomain' ),
        'add_new_item'      => __( 'Add New Type', 'textdomain' ),
        'new_item_name'     => __( 'New Type Name', 'textdomain' ),
        'menu_name'         => __( 'Type', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'type' ),
    );

    register_taxonomy( 'type', array( 'splot' ), $args );
}