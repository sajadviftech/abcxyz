<?php

function vif_center_nav_menu_items($items, $args) {
	if ( $args->theme_location == 'nav-menu') {
		if (is_array($items) || is_object($items)) {
			$logo = ot_get_option('logo', Theme_Config::$vif_theme_directory_uri. 'assets/img/logo.png');
			$logo_light = ot_get_option('logo_light', Theme_Config::$vif_theme_directory_uri. 'assets/img/logo-light.png');
			
			ob_start();
			?>
			<div class="logo-holder"><a href="<?php echo esc_url(home_url()); ?>" class="logolink" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo esc_url($logo); ?>" class="logoimg logo-dark" alt="<?php bloginfo('name'); ?>"/>
				<img src="<?php echo esc_url($logo_light); ?>" class="logoimg logo-light" alt="<?php bloginfo('name'); ?>"/>
			</a></div>
			<?php
			$logo_html = ob_get_clean();
			$menu_items = array();
			foreach ($items as $key => $item) {
				if ($item->menu_item_parent == 0) { $menu_items[] = $key; }
			}
			$new_item_array = array();
			$new_item = new stdClass;
			$new_item->ID = 0;
			$new_item->db_id = 0;
			$new_item->menu_item_parent = 0;
			$new_item->url = '';
			$new_item->title = $logo_html;
			$new_item->menu_order = 0;
			$new_item->object_id = 0;
			$new_item->description = '';
			$new_item->attr_title = '';
			$new_item->button = '';
			$new_item->megamenu = '';
			$new_item->logo = true;
			$new_item->classes = 'logo-menu-item';
			$new_item_array[] = $new_item;
			$get_position = count($menu_items) % 2 == 0 ? (count($menu_items) / 2) - 1 : floor(count($menu_items) / 2);
			array_splice($items, $menu_items[$get_position], 0, $new_item_array);
		}
	}

	return $items;
}
/**
 * Custom Walker - Mobile Menu
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
class vif_mobileDropdown extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 3.0.0
	 * @since 4.4.0 'nav_menu_item_args' filter was added.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = ! empty( $item->menuanchor ) ? 'has-hash' : '';

		/**
		 * Filter the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param array  $args  An array of arguments.
		 * @param object $item  Menu item data object.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		
		$menu_anchor  = ! empty( $item->menuanchor ) ? '#'.esc_attr( $item->menuanchor ) : '';
		
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value.$menu_anchor ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filter a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The menu item's title.
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= (!empty($children) ? '<div class="vif-arrow"><div></div><div></div></div>' : ''). '</a>';
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
/* Full Menu */
class vif_fullmenu extends Walker_Nav_Menu {

	/**
	 * Starts the element output.
	 *
	 * @since 3.0.0
	 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 * @see Walker::start_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of wp_nav_menu() arguments.
	 * @param int    $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = ! empty( $item->menuanchor ) ? 'has-hash' : '';
		if(!empty($item->widthclass)) {
			$classes[] = $item->widthclass;
		}
		
		
		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param array  $args  An array of arguments.
		 * @param object $item  Menu item data object.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filters the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		
		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		 
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		
		$menu_anchor  = ! empty( $item->menuanchor ) ? '#'.esc_attr( $item->menuanchor ) : '';
		
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value.$menu_anchor ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The menu item's title.
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of wp_nav_menu() arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		if (!isset($item->logo) && !$item->logo) {
			$item_output .= '<a'. $attributes .'>';
		}
		
		$item_output .= $args->link_before . $title . $args->link_after;
		
		if (!isset($item->logo) && !$item->logo) {
			$item_output .= '</a>';
		}
		$item_output .= $args->after;

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/* Mega Background */
class vif_custom_menu {

    /*--------------------------------------------*
     * Constructor
     *--------------------------------------------*/

    /**
     * Initializes the plugin by setting localization, filters, and administration functions.
     */
    function __construct() {

        
        // add custom menu fields to menu
        add_filter( 'wp_setup_nav_menu_item', array( $this, 'vif_add_custom_nav_fields' ) );

        // save menu custom fields
        add_action( 'wp_update_nav_menu_item', array( $this, 'vif_update_custom_nav_fields'), 10, 3 );
        
        // edit menu walker
        add_filter( 'wp_edit_nav_menu_walker', array( $this, 'vif_edit_walker'), 10, 2 );

    } // end constructor
    

    /**
     * Add custom fields to $item nav object
     * in order to be used in custom Walker
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    function vif_add_custom_nav_fields( $menu_item ) {
    
      $menu_item->menubg = get_post_meta( $menu_item->ID, '_menu_item_menubg', true );
			$menu_item->menuanchor = get_post_meta( $menu_item->ID, '_menu_item_menuanchor', true );
			$menu_item->widthclass = get_post_meta( $menu_item->ID, 'widthclass', true );
      return $menu_item;
        
    }
    
    /**
     * Save menu custom fields
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    function vif_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {

	    // Check if element is properly sent
	    if (!empty($_REQUEST['menu-item-menubg'])) {
	    	$menubg_value = $_REQUEST['menu-item-menubg'][$menu_item_db_id];
	      	update_post_meta( $menu_item_db_id, '_menu_item_menubg', $menubg_value );
	    }

		if (!empty($_REQUEST['menu-item-menuanchor'])) {
		    $menuanchor_value = $_REQUEST['menu-item-menuanchor'][$menu_item_db_id];
		    update_post_meta( $menu_item_db_id, '_menu_item_menuanchor', $menuanchor_value );
		}

		if (!empty($_REQUEST['menu-item-widthclass'])) {
		    $widthclass_value = $_REQUEST['menu-item-widthclass'][$menu_item_db_id];
		    update_post_meta( $menu_item_db_id, 'widthclass', $widthclass_value );
		}
	}
		
    /**
     * Define new Walker edit
     *
     * @access      public
     * @since       1.0 
     * @return      void
    */
    function vif_edit_walker($walker,$menu_id) {
        return 'vif_Nav_Menu_Edit_Custom'; 
    }
}

// instantiate plugin's class
$GLOBALS['vif_custom_menu'] = new vif_custom_menu();

/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class vif_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {

	var $vif_icons;
	
	function __construct() {
	    $this->vif_icons = vif_getIconArray();
	}
	
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {  
	}
	
	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function end_lvl(&$output, $depth = 0, $args = array()) {
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
		global $_wp_nav_menu_max_depth;
		
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
		    'action',
		    'customlink-tab',
		    'edit-menu-item',
		    'menu-item',
		    'page-tab',
		    '_wpnonce',
		);
		
		
		
		$original_title = false;
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = get_the_title( $original_object->ID );
		} elseif ( 'post_type_archive' == $item->type ) {
			$original_object = get_post_type_object( $item->object );
			if ( $original_object ) {
				$original_title = $original_object->labels->archives;
			}
		}
		
		$classes = array(
		    'menu-item menu-item-depth-' . $depth,
		    'menu-item-' . esc_attr( $item->object ),
		    'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);
		
		$title = $item->title;
		
		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( esc_html__( '%s (Invalid)', 'viftech' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( esc_html__('%s (Pending)', 'viftech'), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth )
			$submenu_text = 'style="display: none;"';
		
		?>
		<li id="menu-item-<?php echo esc_attr($item_id); ?>" class="<?php echo implode(' ', $classes ); ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
				    <span class="item-title"><?php echo esc_html( $title ); ?></span>
				    <span class="item-controls">
				        <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
				        <span class="item-order hide-if-js">
				            <a href="<?php
				                echo wp_nonce_url(
				                    add_query_arg(
				                        array(
				                            'action' => 'move-up-menu-item',
				                            'menu-item' => $item_id,
				                        ),
				                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
				                    ),
				                    'move-menu_item'
				                );
				            ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'viftech'); ?>">&#8593;</abbr></a>
				            |
				            <a href="<?php
				                echo wp_nonce_url(
				                    add_query_arg(
				                        array(
				                            'action' => 'move-down-menu-item',
				                            'menu-item' => $item_id,
				                        ),
				                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
				                    ),
				                    'move-menu_item'
				                );
				            ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down','viftech'); ?>">&#8595;</abbr></a>
				        </span>
				        <a class="item-edit" id="edit-<?php echo esc_attr($item_id); ?>" title="<?php esc_attr_e('Edit Menu Item', 'viftech'); ?>" href="<?php
				            echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
				        ?>"><span class="screen-reader-text"><?php esc_html_e( 'Edit', 'viftech'); ?></span></a>
				    </span>
				</dt>
			</dl>
		
		  <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo esc_attr($item_id); ?>">
	        <?php if( 'custom' == $item->type ) : ?>
	            <p class="field-url description description-wide">
	                <label for="edit-menu-item-url-<?php echo esc_attr($item_id); ?>">
	                    <?php _e( 'URL', 'viftech' ); ?><br />
	                    <input type="text" id="edit-menu-item-url-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
	                </label>
	            </p>
	        <?php endif; ?>
	        <p class="description description-thin">
	            <label for="edit-menu-item-title-<?php echo esc_attr($item_id); ?>">
	                <?php _e( 'Navigation Label', 'viftech' ); ?><br />
	                <input type="text" id="edit-menu-item-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
	            </label>
	        </p>
	        <p class="description description-thin">
	            <label for="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>">
	                <?php _e( 'Title Attribute', 'viftech' ); ?><br />
	                <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
	            </label>
	        </p>
	        <p class="field-link-target description">
	            <label for="edit-menu-item-target-<?php echo esc_attr($item_id); ?>">
	                <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr($item_id); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr($item_id); ?>]"<?php checked( $item->target, '_blank' ); ?> />
	                <?php _e( 'Open link in a new window/tab', 'viftech' ); ?>
	            </label>
	        </p>
			
			<p class="field-menuanchor description-wide vif_menu_options">
	        	<label for="edit-menu-item-menuanchor-<?php echo esc_attr($item_id); ?>">
	        		<strong><?php _e( 'Fullwidth Menu Class', 'viftech' ); ?></strong><br />
	        		<input type="text" id="edit-menu-item-widthclass<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-widthclass" name="menu-item-widthclass[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->widthclass ); ?>" />
	        		<span class="description"><?php _e('Add your width class i.e "fullwidth large-6 small-12"', 'viftech'); ?></span>
	        	</label>
	        </p>


	        <p class="field-menubg description-wide vif_menu_options">
	        	<label for="edit-menu-item-menubg-<?php echo esc_attr($item_id); ?>">
	        		<strong><?php _e( 'Menu Background', 'viftech' ); ?></strong><br />
	        		<textarea id="edit-menu-item-menubg-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-menubg" rows="3" cols="20" name="menu-item-menubg[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->menubg ); ?></textarea>
	        		<span class="description"><?php _e('The menu background will be used when possible. Enter an image url here.', 'viftech'); ?></span>
	        	</label>
	        </p>
	        <p class="field-menuanchor description-wide vif_menu_options">
	        	<label for="edit-menu-item-menuanchor-<?php echo esc_attr($item_id); ?>">
	        		<strong><?php _e( 'Menu Anchor', 'viftech' ); ?></strong><br />
	        		<input type="text" id="edit-menu-item-menuanchor-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-menuanchor" name="menu-item-menuanchor[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menuanchor ); ?>" />
	        		<span class="description"><?php _e('Add your row ID without the hashtag.', 'viftech'); ?></span>
	        	</label>
	        </p>
	        <p class="field-css-classes description description-thin">
	            <label for="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>">
	                <?php _e( 'CSS Classes (optional)', 'viftech' ); ?><br />
	                <input type="text" id="edit-menu-item-classes-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	            </label>
	        </p>
	        <p class="field-xfn description description-thin">
	            <label for="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>">
	                <?php _e( 'Link Relationship (XFN)', 'viftech'  ); ?><br />
	                <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
	            </label>
	        </p>
	        <p class="field-description description description-wide">
	            <label for="edit-menu-item-description-<?php echo esc_attr($item_id); ?>">
	                <?php _e( 'Description', 'viftech' ); ?><br />
	                <textarea id="edit-menu-item-description-<?php echo esc_attr($item_id); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
	                <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'viftech'); ?></span>
	            </label>
	        </p>
					<?php do_action( 'wp_nav_menu_item_custom_fields', $item_id, $item, $depth, $args );?>
		
		      <div class="menu-item-actions description-wide submitbox">
		          <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
		              <p class="link-to-original">
		                  <?php printf( __('Original: %s', 'viftech'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
		              </p>
		          <?php endif; ?>
		          <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr($item_id); ?>" href="<?php
		          echo wp_nonce_url(
		              add_query_arg(
		                  array(
		                      'action' => 'delete-menu-item',
		                      'menu-item' => $item_id,
		                  ),
		                  remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
		              ),
		              'delete-menu_item_' . $item_id
		          ); ?>"><?php _e('Remove', 'viftech' ); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo esc_attr($item_id); ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
		              ?>#menu-item-settings-<?php echo esc_attr($item_id); ?>"><?php _e('Cancel', 'viftech'); ?></a>
		      </div>
		
		      <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item_id); ?>" />
		      <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
		      <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
		      <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
		      <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
		      <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
		  </div><!-- .menu-item-settings-->
		  <ul class="menu-item-transport"></ul>
		<?php
		
		$output .= ob_get_clean();
	
	}
}