<?php
// Option-Tree Theme Mode
require get_theme_file_path('/option-tree/init.php');


/*ADMIN CSS AND JS */
add_action( 'admin_enqueue_scripts', 'admin_resources' );
function admin_resources() {
	wp_enqueue_style( 'viftech-admin-styles', get_stylesheet_directory_uri() . "resourses/admin_css.css", null, 1.0);
}

  