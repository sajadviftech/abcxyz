<?php
require Theme_Config::$vif_theme_directory . 'inc/widgets/twitter-widget.php';
require Theme_Config::$vif_theme_directory .'inc/widgets/latest-posts-images.php';

/* Widget Filter */
add_filter( 'widget_nav_menu_args', 'vif_nav_menu_filter', 3, 4 );

function vif_nav_menu_filter($nav_menu_args, $nav_menu, $args, $instance) {
	$args['after_title'] = '<span></span>';
	
	return $nav_menu_args;
}