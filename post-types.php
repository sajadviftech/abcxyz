<?php

function thb_create_post_type_portfolios() {
	$slug = function_exists('ot_get_option') ? sanitize_title(ot_get_option('portfolio_slug','portfolio')) : 'portfolio';
	$labels = array(
		'name' => esc_html__( 'Portfolio','revolution'),
		'singular_name' => esc_html__( 'Portfolio','revolution' ),
		'rewrite' => array('slug' => esc_html__( 'portfolios','revolution' )),
		'add_new' => _x('Add New', 'portfolio', 'revolution'),
		'add_new_item' => esc_html__('Add New Portfolio','revolution'),
		'edit_item' => esc_html__('Edit Portfolio','revolution'),
		'new_item' => esc_html__('New Portfolio','revolution'),
		'view_item' => esc_html__('View Portfolio','revolution'),
		'search_items' => esc_html__('Search Portfolio','revolution'),
		'not_found' =>  esc_html__('No portfolios found','revolution'),
		'not_found_in_trash' => esc_html__('No portfolios found in Trash','revolution'), 
		'parent_item_colon' => ''
  );
  
  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-schedule',
		'query_var' => true,
		'taxonomies' => array( 'post_tag' ),
		'rewrite' => array('slug' => $slug, 'with_front' => false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor', 'excerpt', 'thumbnail', 'comments', 'revisions')
  ); 
  
  register_post_type('portfolio',$args);
  flush_rewrite_rules();
  
  $category_labels = array(
  	'name' => esc_html__( 'Portfolio Categories', 'revolution'),
  	'singular_name' => esc_html__( 'Portfolio Category', 'revolution'),
  	'search_items' =>  esc_html__( 'Search Portfolio Categories', 'revolution'),
  	'all_items' => esc_html__( 'All Portfolio Categories', 'revolution'),
  	'parent_item' => esc_html__( 'Parent Portfolio Category', 'revolution'),
  	'edit_item' => esc_html__( 'Edit Portfolio Category', 'revolution'),
  	'update_item' => esc_html__( 'Update Portfolio Category', 'revolution'),
  	'add_new_item' => esc_html__( 'Add New Portfolio Category', 'revolution'),
    'menu_name' => esc_html__( 'Portfolio Categories', 'revolution')
  ); 	
  
  register_taxonomy("portfolio-category", 
  		array("portfolio"), 
  		array("hierarchical" => true, 
  				'labels' => $category_labels,
  				'show_ui' => true,
      		'query_var' => true,
  				'rewrite' => array( 'slug' => 'portfolio-category' )
  ));
}
/* Initialize post types */
add_action( 'init', 'thb_create_post_type_portfolios', 10 );
?>