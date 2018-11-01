<?php
// Remove actions
remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect' );
remove_action( 'init', 'vc_page_welcome_redirect' );
remove_action( 'admin_init', 'vc_page_welcome_redirect' );

// Remove menu item
function wpex_vc_remove_welcome_page() {
	remove_submenu_page( 'vc-general', 'vc-welcome' );
}
add_action( 'admin_menu', 'wpex_vc_remove_welcome_page', 999 );

// Set As Theme
add_action( 'vc_before_init', 'vif_vcSetAsTheme' );
function vif_vcSetAsTheme() {
    vc_manager()->disableUpdater(true);
		vc_set_as_theme();
}

// Remove IE & MetaData
add_action( 'init', 'vif_VC_init' );
function vif_VC_init() {
	if (function_exists('visual_composer')) {
		remove_action('wp_head', array(visual_composer(), 'addMetaData'));
		remove_action('wp_head', array(visual_composer(), 'addIEMinimalSupport'));
	}
}

add_action( 'init', 'vif_TheShortcodesForVC' );
function vif_TheShortcodesForVC() {
	if (function_exists('visual_composer')) {
		if(function_exists('vc_set_default_editor_post_types')) { vc_set_default_editor_post_types( array('page', 'portfolio') ); }
		
		add_filter( 'vc_load_default_templates', 'vif_custom_template_modify_array' );
		function vif_custom_template_modify_array( $data ) {
		    return array();
		}
		
		if (is_admin()) {
			function remove_vc_teaser() {
				remove_meta_box('vc_teaser', 'post' , 'side');
				remove_meta_box('vc_teaser', 'page' , 'side');
			}
			add_action( 'admin_head', 'remove_vc_teaser' );
		}
		
		// Shortcodes 
		require get_theme_file_path('/inc/framework/visualcomposer/visualcomposer-extend.php');
		
		
		// Offsets
		function vif_column_offset_class_merge($class_string, $tag) {
	
			if($tag === 'vc_column' || $tag === 'vc_column_inner') {

				$class_string = preg_replace('/offset-/', 'push-', $class_string);
				$class_string = preg_replace('/vc_col-/', '', $class_string);
				$class_string = preg_replace('/lg-/', 'large-', $class_string);
				$class_string = preg_replace('/md-/', 'medium-', $class_string);
				$class_string = preg_replace('/sm-/', 'medium-', $class_string);
				$class_string = preg_replace('/xs-/', 'small-', $class_string);
				$class_string = preg_replace('/vc_column_container/', 'columns', $class_string);
				
				if (!preg_grep('/small-[0-9]/', array($class_string)) ) {
					$class_string .= ' small-12';
				} 
				/* Change visibility */
				$class_string = preg_replace('/vc_hidden-large/', 'hide-for-large', $class_string);
				$class_string = preg_replace('/vc_hidden-medium/', 'hide-for-medium-only', $class_string);
				$class_string = preg_replace('/vc_hidden-small/', 'hide-for-small-only', $class_string);
				$class_string = preg_replace('/vc_hidden-smallall/', 'hide-for-small-only', $class_string);
			} else if ($tag === 'vc_row' || $tag === 'vc_row_inner') {
				$class_string = preg_replace('/vc_row/', 'row', $class_string);
			}
			return $class_string;
		}
		add_filter('vc_shortcodes_css_class', 'vif_column_offset_class_merge', 10, 2);
		
		// Add Page parameter to loop
		require_once vc_path_dir( 'PARAMS_DIR', '/loop/loop.php' );
		class ThbLoopQueryBuilder extends VcLoopQueryBuilder {
		  function parse_paged( $value ) {
		  	$this->args['paged'] = $value;
		  }
		}
		
		// Add Radio Image option
		function vif_radio_images( $param, $value ) {
			$unique_id = uniqid();
			$options = isset($param['options']) ? $param['options'] : '';
	
			$param_line = '<input type="hidden" id="vif-radio-image-'.esc_attr($unique_id).'" class="wpb_vc_param_value '.esc_attr($param['param_name']).' '.esc_attr($param['type']).'" name="'.esc_attr($param['param_name']).'" value="'.esc_attr($value).'"/>';
      $param_line .= '<div class="vif-radio-image" data-radio-image-id="' . esc_attr($unique_id) . '">';
      $param_line .= '<ul class="vif-radio-images-list">';
			
			$i = 0;
			foreach ( $options as $key => $key_value ) {
				$checked = $value == $key ? 'checked' : '';

				$param_line .= '<li for="vif_radio_image_' . esc_attr($unique_id .'_'.$i).'"><label>
					<input type="radio" class="vif_radio_image_val" value="'. esc_attr($key) .'" name="vif_radio_image_' . esc_attr($unique_id) . '" ' . esc_attr($checked) . ' id="vif_radio_image_' . esc_attr($unique_id .'_'.$i).'" />
					<div class="vif_radio_image"><img src="'. esc_url($key_value) .'" alt="'. esc_attr($name).'" /></div>
					<span class="vif_radio_image_title">'.esc_html($name).'</span>
				</label></li>';
				$i++;
			}
			
	        
      $param_line .= '</ul>';
      $param_line .= '</div>';

      return $param_line;
		}
		vc_add_shortcode_param( 'vif_radio_image', 'vif_radio_images' );
	}
}