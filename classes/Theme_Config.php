<?php 
class Theme_Config {
	/**
	 *	Main instance
	 */
	private static $_instance;
	
	/**
	 *	Theme Name
	 */
	public static $vif_theme_name;
	
	/**
	 *	Theme Version
	 */
	public static $vif_theme_version;
	
	/**
	 *	Theme Slug
	 */
	public static $vif_theme_slug;
	
	/**
	 *	Theme Directory
	 */
	public static $vif_theme_directory;
	
	/**
	 *	Theme Directory URL
	 */
	public static $vif_theme_directory_uri;
	
	/**
	 *	Product Key
	 */
	public static $vif_product_key;
	
	/**
	 *	Product Key Expiration
	 */
	public static $vif_product_key_expired;
	
	/**
	 * Envato Hosted
	 */
	public static $vif_envato_hosted;
	
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
		global $Theme_Config;
		if ( ! self::$_instance ) {
			self::$_instance = new self();
			$Theme_Config = self::$_instance;
			
			// Theme Variables
			$theme = wp_get_theme();
			self::$vif_theme_name = $theme->get( 'Name' );
			self::$vif_theme_version = $theme->parent() ? $theme->parent()->get( 'Version' ) : $theme->get( 'Version' );
			self::$vif_theme_slug = $theme->template;
			self::$vif_theme_directory = get_template_directory() . '/';
			self::$vif_theme_directory_uri = get_template_directory_uri() . '/';

			/* nulled */
			update_option( "vif_".self::$vif_theme_slug."_key", 'nulled' );
			update_option( "vif_".self::$vif_theme_slug."_key_expired", 0 );
			
			self::$vif_product_key = get_option("vif_".self::$vif_theme_slug."_key");
			self::$vif_product_key_expired = get_option("vif_".self::$vif_theme_slug."_key_expired");
			
			// Envato Hosted
			self::$vif_envato_hosted = defined('ENVATO_HOSTED_SITE');
			
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
		load_theme_textdomain('viftech', Theme_Config::$vif_theme_directory . 'inc/languages');
		
		/* Background Support */
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff', 'wp-head-callback' => 'vif_change_custom_background_cb' ) );
		
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
		
		$vif_image_sizes = self::$_instance->vif_image_sizes();
		
		// Register image size
		foreach ( $vif_image_sizes as $image_size ) {
			add_image_size( $image_size['slug'], $image_size['width'], $image_size['height'], $image_size['crop'] );
		}
		  
		/* HTML5 Galleries */
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		
		/* Register Menus */
		add_theme_support('nav-menus');
		register_nav_menus(
			array(
				'nav-menu' => esc_html__( 'Navigation Menu', 'viftech' ),
				'secondary-menu' => esc_html__( 'Secondary Menu', 'viftech' )
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
	public function vif_image_sizes() {
		$vif_image_sizes = array(
			array(
				'slug'   => 'viftech-thumbnail',
				'width'  => 100,
				'height' => 100,
				'crop'   => true,
			),
			array(
				'slug'   => 'viftech-bloglarge',
				'width'  => 650,
				'height' => 325,
				'crop'   => true,
			),
			array(
				'slug'   => 'viftech-square',
				'width'  => 380,
				'height' => 350,
				'crop'   => true,
			),
			array(
				'slug'   => 'viftech-rectangle',
				'width'  => 380,
				'height' => 315,
				'crop'   => true,
			),
			array(
				'slug'   => 'viftech-masonry',
				'width'  => 380,
				'height' => 9999,
				'crop'   => false,
			),
			array(
				'slug'   => 'viftech-tall',
				'width'  => 380,
				'height' => 700,
				'crop'   => true,
			),
			array(
				'slug'   => 'viftech-wide',
				'width'  => 760,
				'height' => 350,
				'crop'   => true,
			),
		);
		
		function vif_calculate_image_orientation( $vif_image_sizes ) {
			if ( ! is_array( $vif_image_sizes ) ) {
				return;
			}
			$new_sizes = array();
			foreach ( $vif_image_sizes as $image_size ) {
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
		$new_sizes = vif_calculate_image_orientation($vif_image_sizes);
		foreach($new_sizes as $new_size) {
			$vif_image_sizes[] = $new_size;
		}
		return $vif_image_sizes;
	}
	public function thbDemos() {
		return array(
	    array(
        'import_file_name'       => 'Main',
        'import_file_url'        => "#xml",
        'import_widget_file_url' => "#json",
        'import_theme_options_url' => "#widget",
        'import_image' => self::$vif_theme_directory_uri."assets/img/admin/demos/homepages/h1.jpg",
        'import_demo_url' => "#demo url"
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
			if ( 'admin.php' == $pagenow && isset($_GET['page']) && 'vif-theme-options' == wp_unslash($_GET['page']) ) {
				if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
					wp_redirect( admin_url( "themes.php?page=ot-theme-options" ) );
					die();
				}
			}
		}
		// Redirect to Main Page
		add_action( 'after_switch_theme', array( & $this, 'vif_activation_redirect' ) );
		
		// Ajax Option Update
		add_action("wp_ajax_vif_update_options", array( & $this, 'vif_update_options' ));
		add_action("wp_ajax_nopriv_vif_update_options", array( & $this, 'vif_update_options' ));
		
		// Admin Notices
		add_action( 'admin_notices', array( & $this, 'vif_admin_notices' ) );
		
		// Theme Updates
		add_action( 'admin_init', array( & $this, 'vif_theme_update') );
		
		// Plugin Update Nonce
		add_action( 'register_sidebar', array( & $this, 'vif_theme_admin_init' ) );
		
	}
	function vif_admin_notices() {
		$remote_ver = get_option("vif_".self::$vif_theme_slug."_remote_ver") ? get_option("vif_".self::$vif_theme_slug."_remote_ver") : self::$vif_theme_version;
		$local_ver = self::$vif_theme_version;

		if(version_compare($local_ver, $remote_ver, '<')) {
			if ( 
				( !self::$vif_product_key && ( self::$vif_product_key_expired == 0 ) && !self::$vif_envato_hosted ) || 
				( self::$vif_product_key && ( self::$vif_product_key_expired == 1 ) && !self::$vif_envato_hosted ) 
			) {
				echo '<div class="notice is-dismissible error vif_admin_notices">
				<p>There is an update available for the <strong>' . esc_html(self::$vif_theme_name) . '</strong> theme. Go to <a href="' . esc_url(admin_url( 'admin.php?page=vif-product-registration' )) . '">Product Registration</a> to enable theme updates.</p>
				</div>';
			}
	
			if ( ( self::$vif_product_key && ( self::$vif_product_key_expired == 0 ) ) || self::$vif_envato_hosted ) {
				echo '<div class="notice is-dismissible error vif_admin_notices">
				<p>There is an update available for the <strong>' . esc_html(self::$vif_theme_name) . '</strong> theme. <a href="' . esc_url(admin_url()) . 'update-core.php">Update now</a>.</p>
				</div>';
			}
    }
	}
	public function vif_update_options() {
		$key = isset($_POST['key']) ? wp_unslash($_POST['key']) : false;
		$expired = isset($_POST['expired']) ? wp_unslash($_POST['expired']) : false;  
		update_option("vif_".self::$vif_theme_slug."_key", $key);
		update_option("vif_".self::$vif_theme_slug."_key_expired", $expired);
		wp_die();
	}
	public function vif_theme_update() {
		global $wp_filesystem;
		// add_filter( 'pre_set_site_transient_update_plugins', array(&$this, 'vif_check_for_update_plugin' ) );
		add_filter( 'pre_set_site_transient_update_themes', array( & $this, 'vif_check_for_update_theme' ) );
		add_filter( 'upgrader_pre_download', array( $this, 'vif_upgradeFilter' ), 10, 4 );
	}
	public function vif_check_for_update_plugins() {
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"item_ids" => '242431',
				"product_key" => self::$vif_product_key,
				"envato_hosted" => self::$vif_envato_hosted
			)
		);
		$request = wp_remote_get( self::$_instance->dashboardUrl('plugin/version'), $args);
		
		$data = '';
		if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
			$data = json_decode( wp_remote_retrieve_body($request));
		}
		return $data;
	}
	public function vif_check_for_update_theme( $transient ) {
		global $wp_filesystem;
		$args = array(
			'timeout' => 30,
			'body' => array( 
				"theme_name" => self::$vif_theme_name,
				"product_key" => self::$vif_product_key,
				"envato_hosted" => self::$vif_envato_hosted
			)
		);
		
		$request = wp_remote_get( self::$_instance->dashboardUrl('version'), $args);

    if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
    	$data = json_decode( wp_remote_retrieve_body($request));
			update_option("vif_".self::$vif_theme_slug."_key_expired", 0);	
			
			if (isset($data->success) && $data->success == false) {
				self::$vif_product_key_expired = 1;
				update_option("vif_".self::$vif_theme_slug."_key_expired", 1);	
			} else {
				if(version_compare(self::$vif_theme_version, $data->version, '<')) {
					$transient->response[self::$vif_theme_slug] = array(
						"new_version"	=> 		$data->version,
						"package"		=>	    $data->download_url,
						"url"			=>		'#apiurl'		
					);
	
					update_option("vif_".self::$vif_theme_slug."_remote_ver", $data->version);
				}
			}
		}
		return $transient;
	}
	public function vif_upgradeFilter( $reply, $package, $updater ) {
		global $wp_filesystem;
		$cond = ( !self::$vif_product_key || ( self::$vif_product_key_expired == 1 ) ) && !self::$vif_envato_hosted;
		
		if ( isset( $updater->skin->theme_info ) && $updater->skin->theme_info['Name'] == self::$vif_theme_name ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'viftech' ), admin_url( 'admin.php?page=vif-product-registration' ) ) );
			}
		}
		
		// VisualComposer
		if ( (isset( $updater->skin->plugin )) && ( $updater->skin->plugin == 'js_composer/js_composer.php') ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'viftech' ), admin_url( 'admin.php?page=vif-product-registration' ) ) );
			}
		}
		return $reply;
	}
	public function vif_plugins_install( $item ) {
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
								'return_url'    => network_admin_url( 'admin.php?page=vif-plugins' )
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
							'vif-activate'       => 'activate-plugin',
							'vif-activate-nonce' => wp_create_nonce( 'vif-activate' ),
							'return_url'    => network_admin_url( 'admin.php?page=vif-plugins' )
						),
						admin_url( 'admin.php?page=vif-plugins' )
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
								'return_url'    => network_admin_url( 'admin.php?page=vif-plugins' )
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
							'vif-deactivate'       => 'deactivate-plugin',
							'vif-deactivate-nonce' => wp_create_nonce( 'vif-deactivate' ),
						),
						admin_url( 'admin.php?page=vif-plugins' )
					) ),
					$item['sanitized_plugin']
				),
			);
		}

		return $actions;
	}
	public function vif_theme_admin_init() {
		$get_name = isset($_GET['plugin_name']) ? wp_unslash($_GET['plugin_name']) : false;
		
		if ( isset( $_GET['vif-deactivate'] ) && $_GET['vif-deactivate'] == 'deactivate-plugin' ) {
			
			check_admin_referer( 'vif-deactivate', 'vif-deactivate-nonce' );

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

		if ( isset( $_GET['vif-activate'] ) && $_GET['vif-activate'] == 'activate-plugin' ) {
			
			check_admin_referer( 'vif-activate', 'vif-activate-nonce' );

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
	public function vif_activation_redirect() {
		if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			$viftech_installed = 'viftech_installed';
			
			if ( false == get_option( $viftech_installed, false ) ) {		
				update_option( $viftech_installed, true );
				wp_redirect( admin_url( 'admin.php?page=vif-plugins' ) );
				die();
			} 
			
			delete_option( $viftech_installed );
		}
	}
	public function adminPageEnqueue() {
		wp_enqueue_script( 'vif-admin-meta', Theme_Config::$vif_theme_directory_uri .'assets/js/admin-meta.min.js', array('jquery'), esc_attr(self::$vif_theme_version));
		wp_enqueue_style("vif-admin-css", Theme_Config::$vif_theme_directory_uri . "assets/css/admin.css", null, esc_attr(self::$vif_theme_version));
		wp_enqueue_style( 'vif-admin-vs-css', Theme_Config::$vif_theme_directory_uri . "assets/css/admin_vc.css", null, esc_attr(self::$vif_theme_version));
		
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style( 'vc_extra_css', Theme_Config::$vif_theme_directory_uri . 'assets/css/vc_extra.css' );
			wp_enqueue_script( 'vif-admin-vc', Theme_Config::$vif_theme_directory_uri .'assets/js/admin-vc.min.js', array('jquery'), esc_attr(self::$vif_theme_version));
		}
	}
	public function adminSetupMenu() {
		
		// Product Registration
		add_menu_page( Theme_Config::$vif_theme_name, Theme_Config::$vif_theme_name, 'edit_theme_options', 'vif-product-registration', array( & $this, 'vif_Plugins' ), '', 3 );
		
		// Product Registration
		/* add Product Regisrtaion*/		
		// Main Menu Item
		add_submenu_page( 'vif-product-registration', 'Plugins', 'Plugins', 'edit_theme_options', 'vif-plugins', array( & $this, 'vif_Plugins' ) );

		// Demo Import
		add_submenu_page( 'vif-product-registration', 'Demo Import', 'Demo Import', 'edit_theme_options', 'vif-demo-import', array( & $this, 'vif_Demo_Import' ) );
		
		// Theme Options
		add_submenu_page( 'vif-product-registration', 'Theme Options', 'Theme Options', 'edit_theme_options', 'vif-theme-options', '__return_false' ); 
		
	}
	public function vif_Plugins() {
		get_template_part( 'inc/admin/welcome/pages/plugins' );
	}
	public function vif_Product_Registration() {
		//get_template_part( 'inc/admin/welcome/pages/registration' );
	}
	public function vif_Demo_Import() {
		get_template_part( 'inc/admin/welcome/pages/demo-import' );
	}
	/**
	 *	Inintialize API
	 */
	public function dashboardUrl($type = null) {
		$url = '#API_FETCH';
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
function Theme_Config() {
	global $Theme_Config;
	return $Theme_Config;
}
Theme_Config::instance();