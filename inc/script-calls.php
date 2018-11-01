<?php
/* De-register Contact Form 7 styles */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// Main Styles
function thb_main_styles() {	
	global $post;
	$i = 0;
	$self_hosted_fonts = ot_get_option('self_hosted_fonts');
	// Enqueue
	
	//CSS FONTOWESOME
	wp_enqueue_style("thb-fa", 			Theme_Config::$thb_theme_directory_uri . 'assets/css/fontawesome.css', 		null, null);
	// CSS FRAMEWORK
	wp_enqueue_style("thb-gird", 		Theme_Config::$thb_theme_directory_uri . 'assets/css/grid.css', 					null, esc_attr(Theme_Config::$thb_theme_version));
	//CSS UTILIZATION
	wp_enqueue_style("thb-utilities", 	Theme_Config::$thb_theme_directory_uri . 'assets/css/utilities.css', 				null, esc_attr(Theme_Config::$thb_theme_version));
	//CSS structure
	wp_enqueue_style("thb-structure", 	Theme_Config::$thb_theme_directory_uri . 'assets/css/structure.css', 				null, esc_attr(Theme_Config::$thb_theme_version));
	//ANIMATIONS
	wp_enqueue_style("thb-animations", 	Theme_Config::$thb_theme_directory_uri . 'assets/css/theme-animation.css',			null, esc_attr(Theme_Config::$thb_theme_version));
	//TOYOGROPHY
	wp_enqueue_style("thb-toyo", 		Theme_Config::$thb_theme_directory_uri . 'assets/css/fonts.css', 					null, esc_attr(Theme_Config::$thb_theme_version));
	//HEADER STYLES
	wp_enqueue_style("thb-headers", 	Theme_Config::$thb_theme_directory_uri . 'assets/css/header-styles.css', 			null, esc_attr(Theme_Config::$thb_theme_version));
	//MOBILE MENUS
	wp_enqueue_style("thb-mobiles", 	Theme_Config::$thb_theme_directory_uri . 'assets/css/mobile-menu.css',	 			null, esc_attr(Theme_Config::$thb_theme_version));
	//BLOGS
	wp_enqueue_style("thb-blog", 		Theme_Config::$thb_theme_directory_uri . 'assets/css/blog.css',	 					null, esc_attr(Theme_Config::$thb_theme_version));
	//PORTFOLIO
	wp_enqueue_style("thb-portfolio", 	Theme_Config::$thb_theme_directory_uri . 'assets/css/portfolios.css',				null, esc_attr(Theme_Config::$thb_theme_version));
	//WIDGETS
	wp_enqueue_style("thb-widgets", 	Theme_Config::$thb_theme_directory_uri . 'assets/css/widget.css',					null, esc_attr(Theme_Config::$thb_theme_version));
	//VC SHORTCODES
	wp_enqueue_style("thb-shortcodes",	Theme_Config::$thb_theme_directory_uri . 'assets/css/vc_shortcodes.css',			null, esc_attr(Theme_Config::$thb_theme_version));
	//WOOCOMMERCE
	wp_enqueue_style("thb-woocommerce",	Theme_Config::$thb_theme_directory_uri . 'assets/css/woocommerce.css',				null, esc_attr(Theme_Config::$thb_theme_version));
	//FOOTER
	wp_enqueue_style("thb-footer",		Theme_Config::$thb_theme_directory_uri . 'assets/css/footer.css',					null, esc_attr(Theme_Config::$thb_theme_version));
	//MIXTURE
	wp_enqueue_style("thb-app", 		Theme_Config::$thb_theme_directory_uri . 'assets/css/mixture.css', 					null, esc_attr(Theme_Config::$thb_theme_version));
	
	//wp_enqueue_style('thb-thb-style', get_stylesheet_uri(), null, null);	
	
	wp_enqueue_style( 'thb-google-fonts', thb_google_webfont(), array(), null );
	wp_add_inline_style( 'thb-app', thb_selection() );
	
	if ($self_hosted_fonts) {
		foreach ($self_hosted_fonts as $font) {
			$i++;
			wp_enqueue_style("thb-self-hosted-".$i, $font['font_url'], null, esc_attr(Theme_Config::$thb_theme_version));
		}
	} 
	
	if ( $post ) {
		if ( has_shortcode($post->post_content, 'contact-form-7') && function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}
}
add_action('wp_enqueue_scripts', 'thb_main_styles');

// Main Scripts
function thb_register_js() {
	if (!is_admin()) {
		global $post;
		$thb_api_key = ot_get_option('map_api_key');
		
		// Register 
		wp_enqueue_script('thb-vendor', Theme_Config::$thb_theme_directory_uri. 'assets/js/vendor.min.js', array('jquery'), esc_attr(Theme_Config::$thb_theme_version), TRUE);
		wp_enqueue_script('underscore');
		wp_enqueue_script('thb-app', Theme_Config::$thb_theme_directory_uri . 'assets/js/app.min.js', array('jquery', 'thb-vendor', 'underscore'), esc_attr(Theme_Config::$thb_theme_version), TRUE);
		
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1) ) {
			wp_enqueue_script('comment-reply');
		}
		
		if ( $post ) {
			if ( has_shortcode($post->post_content, 'thb_map_parent') || has_shortcode($post->post_content, 'thb_location_parent')) {
				wp_enqueue_script('gmapdep', 'https://maps.google.com/maps/api/js?key='.esc_attr($thb_api_key).'', false, null, false);
			}
			
			if ( has_shortcode($post->post_content, 'contact-form-7') && function_exists( 'wpcf7_enqueue_scripts' ) ) {
				wpcf7_enqueue_scripts();
			}
		}
		// Typekit 
		if ($typekit_id = ot_get_option('typekit_id')) {
			wp_enqueue_script('thb-typekit', 'https://use.typekit.net/'.$typekit_id.'.js', array(), NULL, FALSE );
			wp_add_inline_script( 'thb-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
		}
		
		wp_localize_script( 'thb-app', 'themeajax', array( 
			'url' => admin_url( 'admin-ajax.php' ),
			'l10n' => array (
				'loading' => esc_html__("Loading", 'viftech'),
				'nomore' => esc_html__("No More Posts", 'viftech'),
				'nomore_products' => esc_html__("All Products Loaded", 'viftech'),
				'loadmore' => esc_html__("Load More", 'viftech'),
				'added' => esc_html__("Added To Cart", 'viftech'),
				'copied' => esc_html__("Copied", 'viftech')
			),
			'svg' => array(
				'prev_arrow' => thb_load_template_part('assets/img/svg/prev_arrow.svg'),
				'next_arrow' => thb_load_template_part('assets/img/svg/next_arrow.svg'),
				'added_arrow' => thb_load_template_part('assets/svg/arrows_check.svg'),
			),
			'settings' => array (
				'current_url' => get_permalink(),
				'fixed_header_scroll' => ot_get_option('fixed_header_scroll', 'on'),
				'fixed_header_padding' => ot_get_option('header_padding_fixed'),
				'page_transition' => ot_get_option('page_transition', 'on'),
				'page_transition_style' => ot_get_option('page_transition_style', 'thb-fade'),
				'page_transition_in_speed' => ot_get_option('page_transition_in_speed', 1000),
				'page_transition_out_speed' => ot_get_option('page_transition_out_speed', 500),
				'shop_product_listing_pagination' => ot_get_option('shop_product_listing_pagination', 'style1'),
				'right_click' => ot_get_option('right_click','on'),
				'cart_url'  => thb_wc_supported() ? wc_get_cart_url(): false,
				'is_cart'  => thb_wc_supported() ? is_cart() : false,
				'is_checkout' => thb_wc_supported() ? is_checkout() : false
			)
		) );
	}
}
add_action('wp_enqueue_scripts', 'thb_register_js');

/* WooCommerce */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );