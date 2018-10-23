<?php
/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file.
	You have been warned!

-------------------------------------------------------------------------------------*/
// Custom Post Types
require get_theme_file_path('post-types.php'); 

// Option-Tree Theme Mode
require get_theme_file_path('/option-tree/init.php');

// Theme Admin
require get_theme_file_path('/classes/Theme_Config.php');

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

// WooCommerce Support
require get_theme_file_path('/inc/woocommerce.php');
require get_theme_file_path('/inc/woocommerce-category-image.php');



add_filter( 'sanitize_user', function( $username, $raw_username, $strict )
{
    // Edit the port to your needs
    $port = 8010;

    if(    $strict                                                // wpmu_create_blog uses strict mode
        && is_multisite()                                         // multisite check
        && $port == parse_url( $raw_username, PHP_URL_PORT )      // raw domain has port 
        && false === strpos( $username, ':' . $port )             // stripped domain is without correct port
    )
        $username = str_replace( $port, ':' . $port, $username ); // replace e.g. example.tld8080 to example.tld:8080

    return $username;
}, 1, 3 );

/**
 * Temporarly change the port (e.g. :8080 ) to :80 to get around 
 * the core restriction in the network.php page.
 */
add_action( 'load-network.php', function()
{
    add_filter( 'option_active_plugins', function( $value )
    {
        add_filter( 'option_siteurl', function( $value )
        {
            // Edit the port to your needs
            $port = 8010;

            // Network step 2
            if( is_multisite() || network_domain_check() )
                return $value;

            // Network step 1
            static $count = 0;
            if( 0 === $count++ )
                $value = str_replace( ':' . $port, ':80', $value );
            return $value;
        } );
        return $value;
    } );
} );
function get_all_icons(){
    $icons = thb_getIconArray();
    echo '<div class="row">';
    foreach($icons as $icon){
        echo '<div class="columns medium-2 small-12">';
            get_template_part( 'assets/svg/'.$icon );
        echo '</div>';
    }
    echo '</div>';

}
add_shortcode('icons','get_all_icons');