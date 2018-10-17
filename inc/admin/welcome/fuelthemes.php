<?php 
class Thb_Theme_Admin {
	/**
	 *	Main instance
	 */
	private static $_instance;
	
	/**
	 *	Theme Name
	 */
	public static $thb_theme_name;
	
	/**
	 *	Theme Version
	 */
	public static $thb_theme_version;
	
	/**
	 *	Theme Slug
	 */
	public static $thb_theme_slug;
	
	/**
	 *	Theme Directory
	 */
	public static $thb_theme_directory;
	
	/**
	 *	Theme Directory URL
	 */
	public static $thb_theme_directory_uri;
	
	/**
	 *	Product Key
	 */
	public static $thb_product_key;
	
	/**
	 *	Product Key Expiration
	 */
	public static $thb_product_key_expired;
	
	/**
	 * Envato Hosted
	 */
	public static $thb_envato_hosted;
	
	/**
	 *	Theme Constructor executed only once per request
	 */
	public function __construct() {
		if ( self::$_instance ) {
			_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
		}
	}
	
	/**
	 * You cannot clone this class
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}

	/**
	 * You cannot unserialize instances of this class
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}
	
	public static function instance() {
		global $thb_Theme_Admin;
		if ( ! self::$_instance ) {
			self::$_instance = new self();
			$thb_Theme_Admin = self::$_instance;
			
			// Theme Variables
			$theme = wp_get_theme();
			self::$thb_theme_name = $theme->get( 'Name' );
			self::$thb_theme_version = $theme->parent() ? $theme->parent()->get( 'Version' ) : $theme->get( 'Version' );
			self::$thb_theme_slug = $theme->template;
			self::$thb_theme_directory = get_template_directory() . '/';
			self::$thb_theme_directory_uri = get_template_directory_uri() . '/';

			/* nulled */
			update_option( "thb_".self::$thb_theme_slug."_key", 'nulled' );
			update_option( "thb_".self::$thb_theme_slug."_key_expired", 0 );
			
			self::$thb_product_key = get_option("thb_".self::$thb_theme_slug."_key");
			self::$thb_product_key_expired = get_option("thb_".self::$thb_theme_slug."_key_expired");
			
			// Envato Hosted
			self::$thb_envato_hosted = defined('ENVATO_HOSTED_SITE');
			
			// After Setup Theme
			add_action( 'after_setup_theme', array( self::$_instance, 'afterSetupTheme' ) );
			
			// Setup Admin Menus
			if ( is_admin() ) {
				self::$_instance->initAdminPages();
			}
		}
		
		return self::$_instance;
	}
	/**
	 *	After Theme Setup
	 */
	public function afterSetupTheme() {
		/* WooCommerce Support */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		if (ot_get_option('shop_product_lightbox', 'lightbox') === 'zoom') {
			add_theme_support( 'wc-product-gallery-zoom' );
		}
		
		/* WooCommerce Products per Page */
		if( $products_per_page = ot_get_option('products_per_page')) {
			$products_per_page = isset($_GET['products_per_page']) ? wp_unslash($_GET['products_per_page']) : $products_per_page;
			add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $products_per_page . ';' ), 20 );
		}
		
		/* Post Formats */
		add_theme_support('post-formats', array('image', 'gallery', 'video', 'link'));
		
		/* Text Domain */
		load_theme_textdomain('revolution', Thb_Theme_Admin::$thb_theme_directory . 'inc/languages');
		
		/* Background Support */
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff', 'wp-head-callback' => 'thb_change_custom_background_cb' ) );
		
		/* Title Support */
		add_theme_support( 'title-tag' );
		
		/* Required Settings */
		global $content_width;
		if(!isset($content_width)) $content_width = 1170;
		add_theme_support( 'automatic-feed-links' );
		
		/* Editor Styling */
		add_editor_style( array('assets/css/editor-style.css') );
		
		/* Image Settings */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 200, true );
		
		$thb_image_sizes = self::$_instance->thb_image_sizes();
		
		// Register image size
		foreach ( $thb_image_sizes as $image_size ) {
			add_image_size( $image_size['slug'], $image_size['width'], $image_size['height'], $image_size['crop'] );
		}
		  
		/* HTML5 Galleries */
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		
		/* Register Menus */
		add_theme_support('nav-menus');
		register_nav_menus(
			array(
				'nav-menu' => esc_html__( 'Navigation Menu', 'revolution' ),
				'secondary-menu' => esc_html__( 'Secondary Menu', 'revolution' )
			)
		);
		
		$sidebars = ot_get_option('sidebars');
		if(!empty($sidebars)) {
			foreach($sidebars as $sidebar) {
				register_sidebar( array(
					'name' => $sidebar['title'],
					'id' => $sidebar['id'],
					'description' => '',
					'before_widget' => '<div id="%1$s" class="widget cf %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h6>',
					'after_title' => '</h6>',
				));
			}
		}
	}
	public function thb_image_sizes() {
		$thb_image_sizes = array(
			array(
				'slug'   => 'revolution-thumbnail',
				'width'  => 100,
				'height' => 100,
				'crop'   => true,
			),
			array(
				'slug'   => 'revolution-bloglarge',
				'width'  => 650,
				'height' => 325,
				'crop'   => true,
			),
			array(
				'slug'   => 'revolution-square',
				'width'  => 380,
				'height' => 350,
				'crop'   => true,
			),
			array(
				'slug'   => 'revolution-rectangle',
				'width'  => 380,
				'height' => 315,
				'crop'   => true,
			),
			array(
				'slug'   => 'revolution-masonry',
				'width'  => 380,
				'height' => 9999,
				'crop'   => false,
			),
			array(
				'slug'   => 'revolution-tall',
				'width'  => 380,
				'height' => 700,
				'crop'   => true,
			),
			array(
				'slug'   => 'revolution-wide',
				'width'  => 760,
				'height' => 350,
				'crop'   => true,
			),
		);
		
		function thb_calculate_image_orientation( $thb_image_sizes ) {
			if ( ! is_array( $thb_image_sizes ) ) {
				return;
			}
			$new_sizes = array();
			foreach ( $thb_image_sizes as $image_size ) {
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-small',
					'width'  => absint($image_size['width'] / 2),
					'height' => $image_size['height'] === 9999 ? 9999 : absint($image_size['height'] * 2),
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-x2',
					'width'  => $image_size['width'] * 2,
					'height' => $image_size['height'] === 9999 ? 9999 : $image_size['height'] * 2,
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-x3',
					'width'  => $image_size['width'] * 3,
					'height' => $image_size['height'] === 9999 ? 9999: $image_size['height'] * 3,
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug' 	 => $image_size['slug'].'-mini',
					'width'  => 20,
					'height' => $image_size['height'] === 9999 ? 9999  : absint(($image_size['height'] * 20) / $image_size['width']),
					'crop'   => $image_size['crop'],
				);
			}
			return $new_sizes;
		}
		$new_sizes = thb_calculate_image_orientation($thb_image_sizes);
		foreach($new_sizes as $new_size) {
			$thb_image_sizes[] = $new_size;
		}
		return $thb_image_sizes;
	}
	public function thbDemos() {
		return array(
	    array(
        'import_file_name'       => 'Main',
        'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/main/demo-content.xml",
        'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/main/widget_data.json",
        'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/main/theme-options.txt",
        'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h1.jpg",
        'import_demo_url' => "http://revolution.fuelthemes.net/"
	    ),
	    array(
	      'import_file_name'       => 'Creative Agency',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/creative-agency/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/creative-agency/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/creative-agency/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h2.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-agency-creative/"
	    ),
	    array(
	      'import_file_name'       => 'Classic Agency',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/classic/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/classic/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/classic/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h3.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-classic/"
	    ),
	    array(
	      'import_file_name'       => 'Corporate Agency',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/corporate-agency/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/corporate-agency/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/corporate-agency/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h4.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-corporate-agency/"
	    ),
	    array(
	      'import_file_name'       => 'Video Agency',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/video-agency/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/video-agency/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/video-agency/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h5.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-agency/"
	    ),
	    array(
	      'import_file_name'       => 'Restaurant',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/restaurant/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/restaurant/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/restaurant/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h6.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-ranchero/"
	    ),
	    array(
	      'import_file_name'       => 'Consulting',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/consulting/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/consulting/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/consulting/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h7.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-consulting/"
	    ),
	    array(
	      'import_file_name'       => 'Adventure',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/adventure/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/adventure/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/adventure/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h8.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-adventure/"
	    ),
	    array(
	      'import_file_name'       => 'Coraline',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/coraline/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/coraline/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/coraline/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h9.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-coraline/"
	    ),
	    array(
	      'import_file_name'       => 'Cryptocurrency',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/cryptocurrency/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/cryptocurrency/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/cryptocurrency/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h10.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-cryptocurrency/"
	    ),
	    array(
	      'import_file_name'       => 'Music / Band',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/music-band/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/music-band/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/music-band/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h11.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-band/"
	    ),
	    array(
	      'import_file_name'       => 'Food Magazine',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/food-magazine/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/food-magazine/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/food-magazine/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h12.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-milky-tasty/"
	    ),
	    array(
	      'import_file_name'       => 'Fitness',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/fitness/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/fitness/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/fitness/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h13.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-fitness/"
	    ),
	    array(
	      'import_file_name'       => 'Shop',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/shop/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/shop/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/shop/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h14.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-shop/"
	    ),
	    array(
	      'import_file_name'       => 'Portfolio Slider',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-slider/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-slider/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-slider/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h15.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-portfolio-slider/"
	    ),
	    array(
	      'import_file_name'       => 'Portfolio Minimal',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-minimal/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-minimal/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-minimal/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h16.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-portfolio-minimal/"
	    ),
	    array(
	      'import_file_name'       => 'Portfolio Simple',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-simple/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-simple/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-simple/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h17.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-portfolio-simple/"
	    ),
	    array(
	      'import_file_name'       => 'Portfolio Masonry Dark',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-masonry-dark/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-masonry-dark/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-masonry-dark/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h18.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-portfolio-masonry-2/"
	    ),
	    array(
	      'import_file_name'       => 'Portfolio Masonry',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-masonry/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-masonry/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/portfolio-masonry/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h19.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-portfolio-masonry/"
	    ),
	    array(
	      'import_file_name'       => 'Product Landing',
	      'import_file_url'        => "http://themes.fuelthemes.net/theme-demo-files/revolution/product-landing/demo-content.xml",
	      'import_widget_file_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/product-landing/widget_data.json",
	      'import_theme_options_url' => "http://themes.fuelthemes.net/theme-demo-files/revolution/product-landing/theme-options.txt",
	      'import_image' => self::$thb_theme_directory_uri."assets/img/admin/demos/homepages/h20.jpg",
	      'import_demo_url' => "http://revolution.fuelthemes.net/revolution-product-landing/"
	    ),
	    
		);
	}
	/**
	 *	Inintialize Admin Pages
	 */
	public function initAdminPages() {
		global $pagenow;
		
		// Script and styles
		add_action( 'admin_enqueue_scripts', array( & $this, 'adminPageEnqueue' ) );
		
		// Menu Pages
		add_action( 'admin_menu', array( & $this, 'adminSetupMenu' ), 1 );
		
		// Theme Options Redirect
		if ( $pagenow ) {
			if ( 'admin.php' == $pagenow && isset($_GET['page']) && 'thb-theme-options' == wp_unslash($_GET['page']) ) {
				if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
					wp_redirect( admin_url( "themes.php?page=ot-theme-options" ) );
					die();
				}
			}
		}
		// Redirect to Main Page
		add_action( 'after_switch_theme', array( & $this, 'thb_activation_redirect' ) );
		
		// Ajax Option Update
		add_action("wp_ajax_thb_update_options", array( & $this, 'thb_update_options' ));
		add_action("wp_ajax_nopriv_thb_update_options", array( & $this, 'thb_update_options' ));
		
		// Admin Notices
		add_action( 'admin_notices', array( & $this, 'thb_admin_notices' ) );
		
		// Theme Updates
		add_action( 'admin_init', array( & $this, 'thb_theme_update') );
		
		// Plugin Update Nonce
		add_action( 'register_sidebar', array( & $this, 'thb_theme_admin_init' ) );
		
	}
	function thb_admin_notices() {
		$remote_ver = get_option("thb_".self::$thb_theme_slug."_remote_ver") ? get_option("thb_".self::$thb_theme_slug."_remote_ver") : self::$thb_theme_version;
		$local_ver = self::$thb_theme_version;

		if(version_compare($local_ver, $remote_ver, '<')) {
			if ( 
				( !self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) && !self::$thb_envato_hosted ) || 
				( self::$thb_product_key && ( self::$thb_product_key_expired == 1 ) && !self::$thb_envato_hosted ) 
			) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . esc_html(self::$thb_theme_name) . '</strong> theme. Go to <a href="' . esc_url(admin_url( 'admin.php?page=thb-product-registration' )) . '">Product Registration</a> to enable theme updates.</p>
				</div>';
			}
	
			if ( ( self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) ) || self::$thb_envato_hosted ) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . esc_html(self::$thb_theme_name) . '</strong> theme. <a href="' . esc_url(admin_url()) . 'update-core.php">Update now</a>.</p>
				</div>';
			}
    }
	}
	public function thb_update_options() {
		$key = isset($_POST['key']) ? wp_unslash($_POST['key']) : false;
		$expired = isset($_POST['expired']) ? wp_unslash($_POST['expired']) : false;  
		update_option("thb_".self::$thb_theme_slug."_key", $key);
		update_option("thb_".self::$thb_theme_slug."_key_expired", $expired);
		wp_die();
	}
	public function thb_theme_update() {
		global $wp_filesystem;
		// add_filter( 'pre_set_site_transient_update_plugins', array(&$this, 'thb_check_for_update_plugin' ) );
		add_filter( 'pre_set_site_transient_update_themes', array( & $this, 'thb_check_for_update_theme' ) );
		add_filter( 'upgrader_pre_download', array( $this, 'thb_upgradeFilter' ), 10, 4 );
	}
	public function thb_check_for_update_plugins() {
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"item_ids" => '242431',
				"product_key" => self::$thb_product_key,
				"envato_hosted" => self::$thb_envato_hosted
			)
		);
		$request = wp_remote_get( self::$_instance->dashboardUrl('plugin/version'), $args);
		
		$data = '';
		if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
			$data = json_decode( wp_remote_retrieve_body($request));
		}
		return $data;
	}
	public function thb_check_for_update_theme( $transient ) {
		global $wp_filesystem;
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"theme_name" => self::$thb_theme_name,
				"product_key" => self::$thb_product_key,
				"envato_hosted" => self::$thb_envato_hosted
			)
		);
		
		$request = wp_remote_get( self::$_instance->dashboardUrl('version'), $args);

    if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
    	$data = json_decode( wp_remote_retrieve_body($request));
			update_option("thb_".self::$thb_theme_slug."_key_expired", 0);	
			
			if (isset($data->success) && $data->success == false) {
				self::$thb_product_key_expired = 1;
				update_option("thb_".self::$thb_theme_slug."_key_expired", 1);	
			} else {
				if(version_compare(self::$thb_theme_version, $data->version, '<')) {
					$transient->response[self::$thb_theme_slug] = array(
						"new_version"	=> 		$data->version,
						"package"		=>	    $data->download_url,
						"url"			=>		'http://fuelthemes.net'		
					);
	
					update_option("thb_".self::$thb_theme_slug."_remote_ver", $data->version);
				}
			}
		}
		return $transient;
	}
	public function thb_upgradeFilter( $reply, $package, $updater ) {
		global $wp_filesystem;
		$cond = ( !self::$thb_product_key || ( self::$thb_product_key_expired == 1 ) ) && !self::$thb_envato_hosted;
		
		if ( isset( $updater->skin->theme_info ) && $updater->skin->theme_info['Name'] == self::$thb_theme_name ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'revolution' ), admin_url( 'admin.php?page=thb-product-registration' ) ) );
			}
		}
		
		// VisualComposer
		if ( (isset( $updater->skin->plugin )) && ( $updater->skin->plugin == 'js_composer/js_composer.php') ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'revolution' ), admin_url( 'admin.php?page=thb-product-registration' ) ) );
			}
		}
		return $reply;
	}
	public function thb_plugins_install( $item ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();

		$item['sanitized_plugin'] = $item['name'];

		// WordPress Repository
		if ( ! $item['version'] ) {
			$item['version'] = TGM_Plugin_Activation::$instance->does_plugin_have_update( $item['slug'] );
		}

		// Install Link
		if ( ! isset( $installed_plugins[$item['file_path']] ) ) {
			$actions = array(
				'install' => sprintf(
					'<a href="%1$s" class="button" title="Install %2$s">Install Now</a>',
					esc_url( wp_nonce_url(
						add_query_arg(
							array(
								'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'        => urlencode( $item['slug'] ),
								'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
								'tgmpa-install' => 'install-plugin',
								'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-install',
						'tgmpa-nonce'
					) ),
					$item['sanitized_plugin']
				),
			);
		}
		// Activate Link
		else if ( is_plugin_inactive( $item['file_path'] ) ) {
			$actions = array(
				'activate' => sprintf(
					'<a href="%1$s" class="button button-primary" title="Activate %2$s">Activate</a>',
					esc_url( add_query_arg(
						array(
							'plugin'               => urlencode( $item['slug'] ),
							'plugin_name'          => urlencode( $item['sanitized_plugin'] ),
							'thb-activate'       => 'activate-plugin',
							'thb-activate-nonce' => wp_create_nonce( 'thb-activate' ),
							'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
						),
						admin_url( 'admin.php?page=thb-plugins' )
					) ),
					$item['sanitized_plugin']
				),
			);
		}
		// Update Link
		
		else if ( version_compare( $installed_plugins[$item['file_path']]['Version'], $item['version'], '<' ) ) {
			$actions = array(
				'update' => sprintf(
					'<a href="%1$s" class="button button-update" title="Install %2$s"><span class="dashicons dashicons-update"></span> Update</a>',
					wp_nonce_url(
						add_query_arg(
							array(
								'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'        => urlencode( $item['slug'] ),
								'tgmpa-update'  => 'update-plugin',
								'version'       => urlencode( $item['version'] ),
								'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' )
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-update',
						'tgmpa-nonce'
					),
					$item['sanitized_plugin']
				),
			);
		} else if ( is_plugin_active( $item['file_path'] ) ) {
			$actions = array(
				'deactivate' => sprintf(
					'<a href="%1$s" class="button" title="Deactivate %2$s">Deactivate</a>',
					esc_url( add_query_arg(
						array(
							'plugin'                 => urlencode( $item['slug'] ),
							'plugin_name'            => urlencode( $item['sanitized_plugin'] ),
							// 'plugin_source'          => urlencode( $item['source'] ),
							'thb-deactivate'       => 'deactivate-plugin',
							'thb-deactivate-nonce' => wp_create_nonce( 'thb-deactivate' ),
						),
						admin_url( 'admin.php?page=thb-plugins' )
					) ),
					$item['sanitized_plugin']
				),
			);
		}

		return $actions;
	}
	public function thb_theme_admin_init() {
		$get_name = isset($_GET['plugin_name']) ? wp_unslash($_GET['plugin_name']) : false;
		
		if ( isset( $_GET['thb-deactivate'] ) && $_GET['thb-deactivate'] == 'deactivate-plugin' ) {
			
			check_admin_referer( 'thb-deactivate', 'thb-deactivate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				
				if ( $plugin['Name'] == $get_name ) {
						deactivate_plugins( $plugin_name );
				}
			}

		} 

		if ( isset( $_GET['thb-activate'] ) && $_GET['thb-activate'] == 'activate-plugin' ) {
			
			check_admin_referer( 'thb-activate', 'thb-activate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] == $get_name) {
					activate_plugin( $plugin_name );
				}
			}

		}

	}
	public function thb_activation_redirect() {
		if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			$revolution_installed = 'revolution_installed';
			
			if ( false == get_option( $revolution_installed, false ) ) {		
				update_option( $revolution_installed, true );
				wp_redirect( admin_url( 'admin.php?page=thb-product-registration' ) );
				die();
			} 
			
			delete_option( $revolution_installed );
		}
	}
	public function adminPageEnqueue() {
		wp_enqueue_script( 'thb-admin-meta', Thb_Theme_Admin::$thb_theme_directory_uri .'assets/js/admin-meta.min.js', array('jquery'), esc_attr(self::$thb_theme_version));
		wp_enqueue_style("thb-admin-css", Thb_Theme_Admin::$thb_theme_directory_uri . "assets/css/admin.css", null, esc_attr(self::$thb_theme_version));
		wp_enqueue_style( 'thb-admin-vs-css', Thb_Theme_Admin::$thb_theme_directory_uri . "assets/css/admin_vc.css", null, esc_attr(self::$thb_theme_version));
		
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style( 'vc_extra_css', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/css/vc_extra.css' );
			wp_enqueue_script( 'thb-admin-vc', Thb_Theme_Admin::$thb_theme_directory_uri .'assets/js/admin-vc.min.js', array('jquery'), esc_attr(self::$thb_theme_version));
		}
	}
	public function adminSetupMenu() {
		
		// Product Registration
		add_menu_page( Thb_Theme_Admin::$thb_theme_name, Thb_Theme_Admin::$thb_theme_name, 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_Product_Registration' ), '', 3 );
		
		// Product Registration
		add_submenu_page( 'thb-product-registration', 'Registration', 'Registration', 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_Product_Registration' ) );
		
		// Main Menu Item
		add_submenu_page( 'thb-product-registration', 'Plugins', 'Plugins', 'edit_theme_options', 'thb-plugins', array( & $this, 'thb_Plugins' ) );

		// Demo Import
		add_submenu_page( 'thb-product-registration', 'Demo Import', 'Demo Import', 'edit_theme_options', 'thb-demo-import', array( & $this, 'thb_Demo_Import' ) );
		
		// Theme Options
		add_submenu_page( 'thb-product-registration', 'Theme Options', 'Theme Options', 'edit_theme_options', 'thb-theme-options', '__return_false' ); 
		
	}
	public function thb_Plugins() {
		get_template_part( 'inc/admin/welcome/pages/plugins' );
	}
	public function thb_Product_Registration() {
		get_template_part( 'inc/admin/welcome/pages/registration' );
	}
	public function thb_Demo_Import() {
		get_template_part( 'inc/admin/welcome/pages/demo-import' );
	}
	/**
	 *	Inintialize API
	 */
	public function dashboardUrl($type = null) {
		$url = 'https://my.fuelthemes.net';
		switch ( $type ) {
			case 'verify':
				$url .= '/api/verify';
				break;
			case 'version':
				$url .= '/api/version';
				break;
			case 'plugin/version':
				$url .= '/api/plugin/version';
				break;
		}
		return $url;
	}
}
// Main instance shortcut
function thb_Theme_Admin() {
	global $thb_Theme_Admin;
	return $thb_Theme_Admin;
}
Thb_Theme_Admin::instance();