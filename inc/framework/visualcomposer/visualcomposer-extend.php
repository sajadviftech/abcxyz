<?php

// Utilities
$thb_animation_array = array(
	"type" => "dropdown",
	"heading" => esc_html__("Animation", 'viftech'),
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Right to Left" => "animation right-to-left",
		"Left to Right" => "animation left-to-right",
		"Right to Left - 3D" => "animation right-to-left-3d",
		"Left to Right - 3D" => "animation left-to-right-3d",
		"Bottom to Top" => "animation bottom-to-top",
		"Top to Bottom" => "animation top-to-bottom",
		"Bottom to Top - 3D" => "animation bottom-to-top-3d",
		"Top to Bottom - 3D" => "animation top-to-bottom-3d",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	)
);
$thb_column_array = array(
	'1 Column'  => "1",
	'2 Columns' => "medium-6",
	'3 Columns' => "medium-4",
	'4 Columns' => "medium-3",
	'5 Columns' => "thb-5",
	'6 Columns' => "medium-2"
);
$thb_filter_array = array(
	'Style 1 - Default' => "style1",
	'Style 1 - Default (Static)' => "style1 alt",
	'Style 2 - Regular' => "style2",
	'Style 3 - With Counts' => "style3",
	'Style 4 - Menu Items' => "style4"
);
$thb_button_style_array = array(
	'Style 1' => "style1",
	'Style 2' => 'style2',
	'Style 3' => "style3",
	'Style 4' => "style4"
);
$thb_offset_array = array(
	'-100%' => '-100%',
	'-95%' => '-95%',
	'-90%' => '-90%',
	'-85%' => '-85%',
	'-80%' => '-80%',
	'-75%' => '-75%',
	'-70%' => '-70%',
	'-65%' => '-65%',
	'-60%' => '-60%',
	'-55%' => '-55%',
	'-50%' => '-50%',
	'-45%' => '-45%',
	'-40%' => '-40%',
	'-35%' => '-35%',
	'-30%' => '-30%',
	'-25%' => '-25%',
	'-20%' => '-20%',
	'-15%' => '-15%',
	'-10%' => '-10%',
	'-5%'  => '-5%',
	'0%'  => '0%',
	'5%'  => '5%',
	'10%' => '10%',
	'15%' => '15%',	
	'20%' => '20%',
	'25%' => '25%',
	'30%' => '30%',
	'35%' => '35%',	
	'40%' => '40%',
	'45%' => '45%',	
	'50%' => '50%',
	'55%' => '55%',
	'60%' => '60%',
	'65%' => '65%',	
	'70%' => '70%',
	'75%' => '75%',	
	'80%' => '80%',
	'85%' => '85%',	
	'90%' => '90%',
	'95%' => '95%',	
	'100%' => '100%'
);

function thb_vc_gradient_color1( $group_name = 'Styling' ) {
	return array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Background Gradient Color 1', 'viftech' ),
		'param_name' => 'bg_gradient1',
		"class" => "hidden-label",
		'description' => esc_html__( 'Choose a first (top) color for the background gradient. Leave blank to disable.', 'viftech' ),
		'group' => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color2( $group_name = 'Styling' ) {
	return array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Background Gradient Color 2', 'viftech' ),
		'param_name' => 'bg_gradient2',
		"class" => "hidden-label",
		'description' => esc_html__( 'Choose a second (bottom) color for the background gradient.', 'viftech' ),
		'group' => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color3( $group_name = 'Styling' ) {
	return array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Background Gradient Color 1', 'viftech' ),
		'param_name' => 'bg_gradient3',
		"class" => "hidden-label",
		'description' => esc_html__( 'Choose a first (top) color for the background gradient. Leave blank to disable.', 'viftech' ),
		'group' => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

function thb_vc_gradient_color4( $group_name = 'Styling' ) {
	return array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Background Gradient Color 2', 'viftech' ),
		'param_name' => 'bg_gradient4',
		"class" => "hidden-label",
		'description' => esc_html__( 'Choose a second (bottom) color for the background gradient.', 'viftech' ),
		'group' => $group_name,
		'edit_field_class' => 'vc_col-sm-6',
	);
}

// Shortcodes 
$shortcodes = Thb_Theme_Admin::$thb_theme_directory. 'vc_templates/';
$files = glob($shortcodes.'thb_?*.php');
foreach ($files as $filename) {
	require get_theme_file_path('vc_templates/'.basename($filename));
}

// Visual Composer ROW Changes
vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "gap" );
vc_remove_param( "vc_row", "equal_height" );
vc_remove_param( "vc_row", "css_animation" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "parallax_speed_video" );

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Full Width", 'viftech'),
	"param_name" => "thb_full_width",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this row will fill the screen", 'viftech')
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Row Padding", 'viftech'),
	"param_name" => "thb_row_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this row won't leave padding on the sides", 'viftech')
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Column Padding", 'viftech'),
	"param_name" => "thb_column_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, the columns inside won't leave padding on the sides", 'viftech')
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => esc_html__("Video Background", 'viftech'),
	"param_name" => "thb_video_bg",
	'weight' => 1,
	"description" => esc_html__("You can specify a video background file here (mp4). Row Background Image will be used as Poster.", 'viftech')
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Video Overlay Color", 'viftech'),
	"param_name" => "thb_video_overlay_color",
	'weight' => 1,
	"description" => esc_html__("If you want, you can select an overlay color.", 'viftech')
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"heading" => esc_html__("Display Scroll to Bottom Arrow?", 'viftech'),
	"param_name" => "thb_scroll_bottom",
	"value" => array(
		"Yes" => "true"
	),
	"description" => esc_html__("If you enable this, this will show an arrow at the bottom of the row", 'viftech')
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"heading" => esc_html__("Scroll to Bottom Arrow Style", 'viftech'),
	"param_name" => "thb_scroll_bottom_style",
	"value" => array(
		"Line" => "style1",
		"Mouse" => "style2",
		"Arrow" => "style3"
	),
	"description" => esc_html__("This changes the shape of the arrow", 'viftech'),
	"dependency" => Array('element' => "thb_scroll_bottom", 'value' => array('true'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"heading" => esc_html__("Scroll to Bottom Arrow Color", 'viftech'),
	"param_name" => "thb_scroll_bottom_color",
	"value" => array(
		"Dark" => "dark",
		"Light" => "light"
	),
	"description" => esc_html__("Color of the scroll to bottom arrow", 'viftech'),
	"dependency" => Array('element' => "thb_scroll_bottom", 'value' => array('true'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"heading" => esc_html__("Border Radius", 'viftech'),
	"param_name" => "thb_border_radius",
	'weight' => 1,
	"description" => esc_html__("You can add your own border-radius code here. For ex: 2px 2px 4px 4px", 'viftech')
));
vc_add_param("vc_row", array(
	"type" 						=> "dropdown",
	"heading" 				=> esc_html__("Box Shadow", "revolution"),
	"param_name" 			=> "box_shadow",
	"value" 						=> array(
		'No Shadow' => "",
		'Small' => "small-shadow",
		'Medium' => "medium-shadow",
		'Large' => "large-shadow",
		'X-Large' => "xlarge-shadow",
	)
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"group" => esc_html__("Dividers", 'viftech'),
	"heading" => esc_html__("Enable Dividers?", 'viftech'),
	"param_name" => "thb_shape_divider",
	"value" => array(
		"Yes" => "true"
	),
	
));
vc_add_param("vc_row", array(
	"type" => "thb_radio_image",
	"heading" => esc_html__("Divider Shape", 'viftech'),
	"param_name" => "divider_shape",
	"group" => esc_html__("Dividers", 'viftech'),
	"options" => array(
		'curve' 				=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/curve.png",
		'tilt_v2' 				=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/tilt_v2.png",
		'tilt' 					=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/tilt.png",
		'triangle' 			=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/triangle.png",
		'waves_alt' 			=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves_alt.png",
		'waves_v2' 			=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves_v2.png",
		'waves' 				=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves.png",
		'waves_opacity'	=> Thb_Theme_Admin::$thb_theme_directory_uri."/assets/img/admin/dividers/waves_opacity.png"
	),
	"dependency" => Array('element' => "thb_shape_divider", 'value' => array('true'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Divider Color", 'viftech'),
	"param_name" => "thb_divider_color",
	"group" => esc_html__("Dividers", 'viftech'),
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"heading" => esc_html__("Divider 2 Color", 'viftech'),
	"param_name" => "thb_divider_color_2",
	"group" => esc_html__("Dividers", 'viftech'),
	"dependency" => Array('element' => "thb_divider_position", 'value' => array('both'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"heading" => esc_html__("Divider Position", 'viftech'),
	"param_name" => "thb_divider_position",
	"group" => esc_html__("Dividers", 'viftech'),
	"value" => array(
		"Bottom" => "bottom",
		"Top" => "top",
		"Both" => "both"
	),
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"group" => esc_html__("Dividers", 'viftech'),
	"heading" => esc_html__("Divider Height", 'viftech'),
	"param_name" => "thb_divider_height",
	"description" => esc_html__('Enter a custom height for your shape divider in pixels without the "px"', 'viftech')
));

// Inner Row
vc_remove_param( "vc_row_inner", "gap" );
vc_remove_param( "vc_row_inner", "equal_height" );
vc_remove_param( "vc_row_inner", "css_animation" );

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Max Width", 'viftech'),
	"param_name" => "thb_max_width",
	"value" => array(
		"Yes" => "max_width"
	),
	"std" => "max_width",
	'weight' => 1,
	"description" => esc_html__("If you enable this, the row won't exceed the max width, especially inside a full-width parent row.", 'viftech')
));

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Disable Column Padding", 'viftech'),
	"param_name" => "thb_column_padding",
	"value" => array(
		"Yes" => "true"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, the columns inside won't leave padding on the sides", 'viftech')
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"heading" => esc_html__("Border Radius", 'viftech'),
	"param_name" => "thb_border_radius",
	'weight' => 1,
	"description" => esc_html__("You can add your own border-radius code here. For ex: 2px 2px 4px 4px", 'viftech')
));
vc_add_param("vc_row_inner", array(
	"type" 						=> "dropdown",
	"heading" 				=> esc_html__("Box Shadow", "revolution"),
	"param_name" 			=> "box_shadow",
	"value" 						=> array(
		'No Shadow' => "",
		'Small' => "small-shadow",
		'Medium' => "medium-shadow",
		'Large' => "large-shadow",
		'X-Large' => "xlarge-shadow",
	)
));
// Columns
vc_remove_param( "vc_column", "css_animation" );
vc_add_param("vc_column", array(
	"type" => "dropdown",
	"heading" => esc_html__("Column Content Color", 'viftech'),
	"param_name" => "thb_color",
	"value" => array(
		"Dark" => "thb-dark-column",
		"Light" => "thb-light-column"
	),
	'weight' => 1,
	"description" => esc_html__("If you white-colored contents for this column, select Light.", 'viftech')
));
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Fixed Content", 'viftech'),
	"param_name" => "fixed",
	"value" => array(
		"Yes" => "thb-fixed"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this column will be fixed.", 'viftech')
));
vc_add_param("vc_column_inner", array(
	"type" => "dropdown",
	"heading" => esc_html__("Column Content Color", 'viftech'),
	"param_name" => "thb_color",
	"value" => array(
		"Dark" => "thb-dark-column",
		"Light" => "thb-light-column"
	),
	'weight' => 1,
	"description" => esc_html__("If you white-colored contents for this column, select Light.", 'viftech')
));
vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"heading" => esc_html__("Enable Fixed Content", 'viftech'),
	"param_name" => "fixed",
	"value" => array(
		"Yes" => "thb-fixed"
	),
	'weight' => 1,
	"description" => esc_html__("If you enable this, this column will be fixed.", 'viftech')
));
vc_add_param("vc_column", array(
	"type" => "textfield",
	"heading" => esc_html__("Border Radius", 'viftech'),
	"param_name" => "thb_border_radius",
	'weight' => 1,
	"description" => esc_html__("You can add your own border-radius code here. For ex: 2px 2px 4px 4px", 'viftech')
));
vc_add_param("vc_column", array(
	"type" 						=> "dropdown",
	"heading" 				=> esc_html__("Box Shadow", "revolution"),
	"param_name" 			=> "box_shadow",
	"value" 						=> array(
		'No Shadow' => "",
		'Small' => "small-shadow",
		'Medium' => "medium-shadow",
		'Large' => "large-shadow",
		'X-Large' => "xlarge-shadow",
	)
));
vc_add_param("vc_column", $thb_animation_array);
vc_add_param("vc_column_inner", $thb_animation_array);

// Text Area
vc_remove_param("vc_column_text", "css_animation");
vc_add_param("vc_column_text", $thb_animation_array);

// Toggle Accordion
vc_map( array(
	"name" => esc_html__("Toggle / Accordion", 'viftech'),
	"base" => "thb_accordion",
	"icon" => "thb_vc_ico_accordion",
	"class" => "thb_vc_sc_accordion wpb_vc_accordion wpb_vc_tta_accordion",
	"show_settings_on_create" => false,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
		  "type" => 'checkbox',
		  "heading" => esc_html__("Allow collapsible all", "revolution"),
		  "param_name" => "accordion",
		  "description" => esc_html__("Select checkbox to turn the toggles to an accordion.", "revolution"),
		  "value" => Array(esc_html__("Yes", "revolution") => 'true')
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Style", "revolution"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array(
				'Style 1' => "style1",
				'Style 2' => "style2",
			),
		),
	),
	"description" => esc_html__("Toggles or Accordions", "revolution"),
	'js_view' => 'VcBackendTtaAccordionView',
		'custom_markup' => '
	<div class="vc_tta-container" data-vc-action="collapseAll">
		<div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
		   <div class="vc_tta-panels vc_clearfix {{container-class}}">
		      {{ content }}
		      <div class="vc_tta-panel vc_tta-section-append">
		         <div class="vc_tta-panel-heading">
		            <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
		               <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
		                   <span class="vc_tta-title-text">' . esc_html__( 'Add Section', 'viftech' ) . '</span>
		                    <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
										</a>
		            </h4>
		         </div>
		      </div>
		   </div>
		</div>
	</div>',
		'default_content' => '[vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'viftech' ), 1 ) . '"][/vc_tta_section][vc_tta_section title="' . sprintf( '%s %d', __( 'Section', 'viftech' ), 2 ) . '"][/vc_tta_section]'
) );

VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Accordion' );

class WPBakeryShortCode_thb_accordion extends WPBakeryShortCode_VC_Tta_Accordion { }

// Attributes
vc_map( array(
	"name" => esc_html__( "Attributes", 'viftech'),
	"base" => "thb_portfolio_attribute",
	"icon" => "thb_vc_ico_portfolio_attribute",
	"class" => "thb_vc_sc_portfolio_attribute",
	"category" => esc_html__('by Fuel Themes', 'viftech'),
	"params" => array(
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Columns", "revolution"),
	    "param_name" => "thb_columns",
	    "admin_label" => true,
	    "value" => $thb_column_array,
	    "description" => esc_html__("Changes the column layout of the attributes.", "revolution")
		),
		$thb_animation_array,
	),
	"description" => esc_html__("Show your Attributes on this page.", "revolution")
) );

// AutoType
vc_map( array(
	'base'  => 'thb_autotype',
	'name' => esc_html__('Auto Type', 'viftech'),
	"description" => esc_html__("Animated text typing", "revolution"),
	'category' => esc_html__('by Fuel Themes', 'viftech'),
	"icon" => "thb_vc_ico_autotype",
	"class" => "thb_vc_sc_autotype",
	'params' => array(
		array(
			'type'       => 'textarea_safe',
			'heading'    => esc_html__( 'Content', 'viftech' ),
			'param_name' => 'typed_text',
			'value'		 => '<h2>Unleash creativity with the powerful tools of *revolution;Developed by Fuel Themes*</h2>',
			'description'=> '
			Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. <br />
			Text separator is <b>;</b> for example: <strong>*revolution; Developed by Fuel Themes*</strong>',
			"admin_label" => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Animated Text Color", "revolution"),
			"param_name" => "thb_animated_color",
			"description" => esc_html__("Uses the accent color by default", "revolution")
		),
		array(
	    "type" => "textfield",
	    "heading" => esc_html__("Type Speed", "revolution"),
	    "param_name" => "typed_speed",
	    "description" => esc_html__("Speed of the type animation. Default is 50", "revolution")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Show Cursor?", "revolution"),
			"param_name" => "cursor",
			"value" => array(
				"Yes" => "1"
			),
			"std" => "1",
			"description" => esc_html__("If enabled, the text will always animate, looping through the sentences used.", "revolution"),
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Loop?", "revolution"),
			"param_name" => "loop",
			"value" => array(
				"Yes" => "1"
			),
			"description" => esc_html__("If enabled, the text will always animate, looping through the sentences used.", "revolution"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	)
) );

// Blog Posts
vc_map( array(
	"name" => esc_html__("Blog Posts", 'viftech'),
	"base" => "thb_post",
	"icon" => "thb_vc_ico_post",
	"class" => "thb_vc_sc_post",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Post Source", "revolution"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your post source here", "revolution")
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => esc_html__("Style", "revolution"),
	  	"param_name" => "style",
	  	"admin_label" => true,
	  	"value" => array(
	  		'Style 1' => "style1",
	  		'Style 2' => "style2",
	  		'Style 3' => "style3",
	  		'Style 3 - Border' => "style3-border",
	  		'Style 4' => "style4",
	  		'Style 5' => "style5",
	  		'Style 6' => "style6",
	  		'Style 7' => "style7",
	  	),
	  ),
	  $thb_animation_array,
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Use Carousel?", "revolution"),
	  	"param_name" => "thb_carousel",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"description" => esc_html__("If you enable this, the posts will be displayed inside a carousel", "revolution"),
	  	"dependency" => Array('element' => "style", 'value' => array('style1', 'style4', 'style5', 'style6'))
	  ),
	  array(
      "type" => "dropdown",
      "heading" => esc_html__("Columns", "revolution"),
      "param_name" => "columns",
      "admin_label" => true,
      "value" => array(
      	'1 Column' => "1",
      	'2 Columns' => "2",
      	'3 Columns' => "3",
      	'4 Columns' => "4",
      	'5 Columns' => "5",
      	'6 Columns' => "6"
      ),
      "description" => esc_html__("Select the layout of the posts.", "revolution"),
      "dependency" => Array('element' => "style", 'value' => array('style1', 'style4', 'style5', 'style6'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Auto Play", "revolution"),
	  	"param_name" => "autoplay",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
	  	"dependency" => Array('element' => "thb_carousel", 'value' => array('true'))
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
	  	"param_name" => "autoplay_speed",
	  	"value" => "4000",
	  	"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "revolution"),
	  	"dependency" => Array('element' => "autoplay", 'value' => array('true'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Display Category?", "revolution"),
	  	"param_name" => "thb_cat",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"std" => "true",
	  	"group" => "Styling",
	  	"description" => esc_html__("You can hide the category if you uncheck this.", "revolution")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Display Excerpt?", "revolution"),
	  	"param_name" => "thb_excerpt",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"std" => "true",
	  	"group" => "Styling",
	  	"description" => esc_html__("You can hide the excerpt if you uncheck this.", "revolution")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Display Date?", "revolution"),
	  	"param_name" => "thb_date",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"std" => "true",
	  	"group" => "Styling",
	  	"description" => esc_html__("You can hide the excerpt if you uncheck this.", "revolution")
	  ),
	),
	"description" => esc_html__("Display Blog Posts from your blog", "revolution")
) );

vc_map( array(
	"name" => esc_html__( "Button", 'viftech'),
	"base" => "thb_button",
	"icon" => "thb_vc_ico_button",
	"class" => "thb_vc_sc_button",
	"category" => esc_html__('by Fuel Themes', 'viftech'),
	"params" => array(
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Style", "revolution"),
		  "param_name" => "style",
		  "value" => $thb_button_style_array,
		  "description" => esc_html__("This changes the look of the button", "revolution")
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Link", "revolution"),
		  "param_name" => "link",
		  'edit_field_class' => 'vc_col-sm-6',
		  "description" => esc_html__("Set your url & text for your button", "revolution"),
		  "admin_label" => true,
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Add Arrow", "revolution"),
			"param_name" => "add_arrow",
			'edit_field_class' => 'vc_col-sm-6',
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, will show an arrow on hover.", "revolution"),
			"dependency" => Array('element' => "style", 'value' => array('style1', 'style2', 'style3', 'style4'))
		),
		$thb_animation_array,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Width", "revolution"),
			"param_name" => "full_width",
			"group"			 => 'Styling',
			'edit_field_class' => 'vc_col-sm-6',
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, this will make the button fill it's container", "revolution"),
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Size", "revolution"),
		  "param_name" => "size",
		  "group"			 => 'Styling',
		  'edit_field_class' => 'vc_col-sm-6',
		  'std' 			=> 'medium',
		  "value" => array(
		  	'Small' => 'small',
		  	'Medium' => 'medium',
		  	'Large' => 'large',
		  	'X-Large' => 'x-large'
		  ),
		  "description" => esc_html__("This changes the size of the button", "revolution")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Color", "revolution"),
		  "param_name" => "color",
		  "group"			 => 'Styling',
		  'edit_field_class' => 'vc_col-sm-6',
		  'std' 			=> 'accent',
		  "value" => array(
		  	'Black' => 'black',
		  	'White' => 'white',
		  	'Accent' => 'accent',
		  	'Gradient' => 'gradient'
		  ),
		  "description" => esc_html__("This changes the color of the button", "revolution")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Border Radius", "revolution"),
		  "param_name" => "border_radius",
		  "group"			 => 'Styling',
		  'edit_field_class' => 'vc_col-sm-6',
		  'std' 			=> 'small-radius',
		  "value" => array(
		  	'None' => 'no-radius',
		  	'Small' => 'small-radius',
		  	'Pill' => 'pill-radius'
		  ),
		  "description" => esc_html__("This changes the border-radius of the button. Some styles may not have this future.", "revolution")
		),
		array(
		  "type" => "colorpicker",
		  "heading" => esc_html__("See-Through Color for Gradients", "revolution"),
		  "param_name" => "st_color",
		  "group"			 => 'Styling',
		  'edit_field_class' => 'vc_col-sm-6',
		  "description" => esc_html__("Some Gradient colors have white placeholders to mimick transparency. You can change this color depending on your background color.", "revolution")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Add Shadow on Hover?", "revolution"),
			"param_name" => "thb_shadow",
			"group"			 => 'Styling',
			'edit_field_class' => 'vc_col-sm-6',
			"value" => array(
				"Yes" => "thb_shadow"
			),
			"description" => esc_html__("If enabled, this will add a shadow to the button", "revolution"),
		),
	),
	"description" => esc_html__("Add an animated button", "revolution")
) );
vc_add_param( "thb_button", thb_vc_gradient_color1() );
vc_add_param( "thb_button", thb_vc_gradient_color2() );

vc_map( array(
	"name" => esc_html__( "Text Button", 'viftech'),
	"base" => "thb_button_text",
	"icon" => "thb_vc_ico_button_text",
	"class" => "thb_vc_sc_button_text",
	"category" => esc_html__('by Fuel Themes', 'viftech'),
	"params" => array(
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Style", "revolution"),
		  "param_name" => "style",
		  "value" => array(
		  	'Style 1 (Line Left)' => "style1",
		  	'Style 2 (Line Bottom)' => 'style2',
		  	'Style 3 (Arrow Left)' => "style3",
		  	'Style 4 (Arrow Right)' => "style4",
		  	'Style 5 (Arrow Right Small)' => "style5"
		  ),
		  "description" => esc_html__("This changes the look of the button", "revolution")
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Link", "revolution"),
		  "param_name" => "link",
		  "description" => esc_html__("Set your url & text for your button", "revolution"),
		  "admin_label" => true,
		),
		$thb_animation_array,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	),
	"description" => esc_html__("Add a text button", "revolution")
) );

// Cascading Images
vc_map( array(
	"name" => esc_html__("Cascading Images", 'viftech'),
	"base" => "thb_cascading_parent",
	"icon" => "thb_vc_ico_cascading",
	"class" => "thb_vc_sc_cascading",
	"content_element"	=> true,
	"show_settings_on_create" => false,
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_parent" => array('only' => 'thb_cascading'),
	"description" => esc_html__("Insert a cascading Image", 'viftech' ),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Single Image", 'viftech'),
	"base" => "thb_cascading",
	"icon" => "thb_vc_ico_cascading",
	"class" => "thb_vc_sc_cascading",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_child"         => array('only' => 'thb_cascading_parent'),
	"params"           => array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Select Image', 'viftech' ),
			'param_name'     => 'image',
			'description'    => esc_html__( 'Select Image for the layer', 'viftech' )
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Offset X", "revolution"),
		  "param_name" => "image_x",
		  "value" => $thb_offset_array,
		  "std" => "0%"
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Offset Y", "revolution"),
		  "param_name" => "image_y",
		  "value" => $thb_offset_array,
		  "std" => "0%"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Retina Size?", "revolution"),
			"param_name" => "retina",
			"value" => array(
				"Yes" => "retina_size"
			),
			"description" => esc_html__("If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.", "revolution")
		),
		$thb_animation_array,
		array(
	    "type" => "textfield",
	    "heading" => esc_html__("Add Border Radius?", "revolution"),
	    "param_name" => "radius",
	    "group"					 => 'Styling',
	    "description" => esc_html__("You can add Border Radius in px value.", "revolution")
		),
		array(
		  "type" => "checkbox",
		  "heading" => esc_html__("Add Box Shadow?", "revolution"),
		  "param_name" => "thb_box_shadow",
		  "value" => array(
		  	"Yes" => "thb_box_shadow"
		  ),
		  "group"					 => 'Styling',
		  "description" => esc_html__("You can add a Box Shadow to your image.", "revolution")
		),
	)
) );

class WPBakeryShortCode_thb_cascading_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_cascading extends WPBakeryShortCode {}

// Clients Parent
vc_map( array(
	"name" => esc_html__("Clients", 'viftech'),
	"base" => "thb_clients_parent",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_parent" => array('only' => 'thb_clients'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "revolution"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1 (Grid)' => "style1",
		    	'Style 2 (Carousel)' => "thb-carousel",
		    	'Style 3 (Grid with Titles)' => "style3"
		    ),
		    "description" => esc_html__("This changes the layout style of the client logos", "revolution")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "revolution"),
			"param_name" => "thb_columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "small-6 large-6",
				'3 Columns' => "small-6 large-4",
				'4 Columns' => "small-6 large-3",
				'5 Columns' => "small-6 thb-5",
				'6 Columns' => "small-6 large-2"
			)
		),
		$thb_animation_array,
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Image Borders", "revolution"),
			"param_name" => "thb_image_borders",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, the logos will have border", "revolution"),
			"dependency" => Array('element' => "thb_style", 'value' => array('style1', 'thb-carousel'))
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Border Color", "revolution"),
			"param_name" => "thb_border_color",
			"admin_label" => true,
			"value" => "#f0f0f0",
			"dependency" => Array('element' => "thb_image_borders", 'value' => array('true'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Hover Effect", "revolution"),
			"param_name" => "thb_hover_effect",
			"admin_label" => true,
			"value" => array(
				'None' => "",
				'Opacity' => "thb-opacity",
				'Grayscale' => "thb-grayscale",
				'Opacity with Accent hover' => "thb-opacity with-accent"
			),
			"dependency" => Array('element' => "thb_style", 'value' => array('style1', 'thb-carousel'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "revolution"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
			"dependency" => Array('element' => "thb_style", 'value' => array('thb-carousel'))
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "revolution"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		),
	),
	"description" => esc_html__("Partner/Client logos", "revolution"),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Client", 'viftech'),
	"base" => "thb_clients",
	"icon" => "thb_vc_ico_clients",
	"class" => "thb_vc_sc_clients",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_child" => array('only' => 'thb_clients_parent'),
	"params"	=> array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', 'viftech' ),
			'param_name'     => 'image',
			'value'          => '',
			'description'    => esc_html__( 'Add logo image here.', 'viftech' )
		),
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'Link', 'viftech' ),
			'param_name'     => 'link',
			"admin_label" => true,
			'description'    => esc_html__( 'Add a link to client website if desired.', 'viftech' ),
		),
	),
	"description" => esc_html__("Single Client", "revolution")
) );
class WPBakeryShortCode_thb_clients_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_clients extends WPBakeryShortCode {}

// Contact Map
vc_map( array(
	"name" => esc_html__("Contact Map Parent", 'viftech'),
	"base" => "thb_map_parent",
	"icon" => "thb_vc_ico_contactmap",
	"class" => "thb_vc_sc_contactmap",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_parent" => array('only' => 'thb_map'),
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Map Height", "revolution"),
		  "param_name" => "height",
		  "admin_label" => true,
		  "value" => 50,
		  "description" => esc_html__("Enter height of the map in vh (0-100). For example, 50 will be 50% of viewport height and 100 will be full height. <small>Make sure you have filled in your Google Maps API inside Appearance > Theme Options.</small>", "revolution")
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Expand Toggle", "revolution"),
			"param_name" => "expand",
			"admin_label" => true,
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, this will show an expand button on the map.", "revolution")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Map Position", "revolution"),
			"param_name" => "position",
			"admin_label" => true,
			"value" => array(
				"Map on the Left" => "map_left",
				"Map on the Right" => "map_right"
			),
			"std" => "map_left",
			"description" => esc_html__("This affects which side the map will grow.", "revolution" ),
			"dependency" => Array('element' => "expand", 'value' => array('true'))
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Map Zoom', 'viftech' ),
			'param_name'     => 'zoom',
			'value'			 => '0',
			'description'    => esc_html__( 'Set map zoom level. Leave 0 to automatically fit to bounds.', 'viftech' )
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Map Controls', 'viftech' ),
			'param_name'     => 'map_controls',
			'std'            => 'panControl, zoomControl, mapTypeControl, scaleControl',
			'value'          => array(
				__('Pan Control', 'viftech')             => 'panControl',
				__('Zoom Control', 'viftech')            => 'zoomControl',
				__('Map Type Control', 'viftech')        => 'mapTypeControl',
				__('Scale Control', 'viftech')           => 'scaleControl',
				__('Street View Control', 'viftech')     => 'streetViewControl'
			),
			'description'    => esc_html__( 'Toggle map options.', 'viftech' )
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'Map Type', 'viftech' ),
			'param_name'     => 'map_type',
			'std'            => 'roadmap',
			'value'          => array(
				__('Roadmap', 'viftech')   => 'roadmap',
				__('Satellite', 'viftech') => 'satellite',
				__('Hybrid', 'viftech')    => 'hybrid',
			),
			'description' => esc_html__( 'Choose map style.', 'viftech' )
		),
		array(
			'type' => 'textarea_raw_html',
			'heading' => esc_html__( 'Map Style', 'viftech' ),
			'param_name' => 'map_style',
			'value' => '',
			'description' => esc_html__( 'Paste the style code here. Browse map styles in <a href="https://snazzymaps.com/" target="_blank">SnazzyMaps</a>', 'viftech' )
		),
	),
	"description" => esc_html__("Insert your Contact Map", 'viftech' ),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Contact Map Location", 'viftech'),
	"base" => "thb_map",
	"icon" => "thb_vc_ico_contactmap",
	"class" => "thb_vc_sc_contactmap",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_child"         => array('only' => 'thb_map_parent'),
	"params"           => array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Marker Image', 'viftech' ),
			'param_name'     => 'marker_image',
			'description'    => esc_html__( 'Add your Custom marker image or use default one.', 'viftech' )
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Retina Marker', 'viftech' ),
			'param_name'     => 'retina_marker',
			'value'          => array(
				esc_html__('Yes', 'viftech') => 'yes',
			),
			'description'    => esc_html__( 'Enabling this option will reduce the size of marker for 50%, example if marker is 32x32 it will be 16x16.', 'viftech' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Latitude', 'viftech' ),
			'admin_label' 	 => true,
			'param_name'     => 'latitude',
			'description'    => esc_html__( 'Enter latitude coordinate. To select map coordinates <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">click here</a>.', 'viftech' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Longitude', 'viftech' ),
			'admin_label' 	 => true,
			'param_name'     => 'longitude',
			'description'    => esc_html__( 'Enter longitude coordinate.', 'viftech' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Marker Title', 'viftech' ),
			'param_name'     => 'marker_title',
		),
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Marker Description', 'viftech' ),
			'param_name'     => 'marker_description',
		)
	)
) );

class WPBakeryShortCode_thb_map_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_map extends WPBakeryShortCode {}

// Content Carousel Shortcode
vc_map( array(
	"name" => esc_html__("Content Carousel", 'viftech'),
	"base" => "thb_content_carousel",
	"icon" => "thb_vc_ico_content_carousel",
	"class" => "thb_vc_sc_content_carousel",
	"as_parent" => array('except' => 'thb_content_carousel'),
	"category" => esc_html__("by Fuel Themes", 'viftech'),
	"show_settings_on_create" => true,
	"content_element" => true,
	"params" => array(
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Columns", "revolution"),
		  "param_name" => "thb_columns",
		  "value" => $thb_column_array,
		  "description" => esc_html__("Select the layout.", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Display Slider Pagination", "revolution"),
			"param_name" => "thb_pagination",
			"value" => array(
				"Yes" => "true"
			),
			"std" => "true"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "revolution"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "revolution"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		),
		array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Margins between items", "revolution"),
	    "param_name" => "thb_margins",
	    "group" => "Styling",
	    "std"=> "regular-padding",
	    "value" => array(
	    	'Regular' => "regular-padding",
	    	'Mini' => "mini-padding",
	    	'Pixel' => "pixel-padding",
	    	'None' => "no-padding"
	    ),
	    "description" => esc_html__("This will change the margins between items", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Overflow Visible?", "revolution"),
			"param_name" => "thb_overflow",
			"value" => array(
				"Yes" => "overflow-visible-only"
			),
			"std" => ""
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	),
	"js_view" => 'VcColumnView',
	"description" => esc_html__("Display your content in a carousel", 'viftech')
) );

class WPBakeryShortCode_Thb_Content_Carousel extends WPBakeryShortCodesContainer { }


// Counter shortcode
vc_map( array(
	"name" => esc_html__("Counter", 'viftech'),
	"base" => "thb_counter",
	"icon" => "thb_vc_ico_counter",
	"class" => "thb_vc_sc_counter",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
			"type" 					=> "dropdown",
			"heading" 			=> esc_html__("Style", "revolution"),
			"param_name" 		=> "style",
			"std"						=> "counter-style1",
			"value"					=> array(
				'Counter Top' 	=> "counter-style1",
				'Counter Below' 	=> "counter-style3",
				'Counter Side' 	=> "counter-style2",
			)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", "revolution"),
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"dependency" => Array('element' => "style", 'value' => array('counter-style1', 'counter-style3')),
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image As Icon', 'viftech' ),
			'param_name'     => 'icon_image',
			'description'    => esc_html__( 'You can set an image instead of an icon.', 'viftech' ),
			"dependency" => Array('element' => "style", 'value' => array('counter-style1', 'counter-style3')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Image Width", "revolution"),
			"param_name" => "icon_image_width",
			'description'    => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'viftech' ),
			"dependency" => Array('element' => "style", 'value' => array('counter-style1', 'counter-style3')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", "revolution"),
			"param_name" => "alignment",
			"value" => array(
				"Left" => "thb-side left",
				"Right" => "thb-side right"
			),
			"dependency" => Array('element' => "style", 'value' => array('counter-style2'))
		),
		array(
			"type" 					 => "colorpicker",
			"heading" 			 => esc_html__("Counter Color", "revolution"),
			"param_name" 		 => "thb_counter_color",
			"group"					 => 'Styling',
		),
		array(
			"type" 					 => "colorpicker",
			"heading" 			 => esc_html__("Icon Color", "revolution"),
			"param_name" 		 => "thb_icon_color",
			"group"					 => 'Styling',
		),
		array(
			"type" 					 => "colorpicker",
			"heading" 			 => esc_html__("Heading Color", "revolution"),
			"param_name" 		 => "thb_heading_color",
			"group"					 => 'Styling',
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Number to Count", "revolution"),
			"param_name" => "counter",
			"admin_label" => true
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the counter animation", "revolution"),
			"param_name" => "speed",
			"value" => "2000",
			"description" => esc_html__("Speed of the counter animation, default 1500", "revolution"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Heading", "revolution"),
			"param_name" => "heading",
			"admin_label" => true
		),
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Description', 'viftech' ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'Include a small description for this counter', 'viftech' ),
		),
	),
	"description" => esc_html__("Counters with icons", "revolution")
) );

// Countdown shortcode
vc_map(array(
  "name" => esc_html__("Event Countdown", "revolution"),
  "base" => "thb_countdown",
  "icon" => "thb_vc_ico_event_countdown",
  "class" => "thb_vc_sc_event_countdown",
  'description' => esc_html__('Countdown module for your events.', 'viftech'),
  "category" => esc_html__("by Fuel Themes", "revolution"),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Upcoming Event Date", "revolution"),
      "param_name" => "date",
      "admin_label" => true,
      "value" => "12/24/2016 12:00:00",
      "description" => esc_html__("Enter the due date for Event. eg : 12/24/2018 12:00:00 => month/day/year hour:minute:second", "revolution")
    ) ,
    array(
      "heading" => esc_html__("UTC Timezone", "revolution"),
      "type" => "dropdown",
      "param_name" => "offset",
      "value" => array(
          "-12" => "-12",
          "-11" => "-11",
          "-10" => "-10",
          "-9" => "-9",
          "-8" => "-8",
          "-7" => "-7",
          "-6" => "-6",
          "-5" => "-5",
          "-4" => "-4",
          "-3" => "-3",
          "-2" => "-2",
          "-1" => "-1",
          "0" => "0",
          "+1" => "+1",
          "+2" => "+2",
          "+3" => "+3",
          "+4" => "+4",
          "+5" => "+5",
          "+6" => "+6",
          "+7" => "+7",
          "+8" => "+8",
          "+9" => "+9",
          "+10" => "+10",
          "+12" => "+12"
      )
    )
  )
));

// Fade Type
vc_map( array(
	'base'  => 'thb_fadetype',
	'name' => esc_html__('Fade Type', 'viftech'),
	"description" => esc_html__("Faded letter typing", "revolution"),
	'category' => esc_html__('by Fuel Themes', 'viftech'),
	"icon" => "thb_vc_ico_fadetype",
	"class" => "thb_vc_sc_fadetype",
	'params' => array(
		array(
			'type'       => 'textarea_safe',
			'heading'    => esc_html__( 'Content', 'viftech' ),
			'param_name' => 'fade_text',
			'value'		 => '<h2>*Unleash creativity with the powerful tools of revolution, Developed by Fuel Themes*</h2>',
			'description'=> 'Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. ',
			"admin_label" => true
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	)
) );

// Fancy Box
vc_map( array(
	"name" => esc_html__("Fancy Box", 'viftech'),
	"base" => "thb_fancybox",
	"icon" => "thb_vc_ico_fancybox",
	"class" => "thb_vc_sc_fancybox",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
	  array(
	  	"type" 					=> "dropdown",
	  	"heading" 			=> esc_html__("Style", "revolution"),
	  	"param_name" 		=> "style",
	  	"value"					=> array(
	  		'Gradient Hover' 	=> "fancy-style1",
	  		'3d Hover' 				=> "fancy-style2",
	  		'Zoom Hover' 			=> "fancy-style3",
	  		'Gradient Hover - No Image' 	=> "fancy-style4",
	  		'Title Under' 			=> "fancy-style5",
	  		'Button Hover' 		=> "fancy-style6",
	  	)
	  ),
	  array(
	  	'type'           => 'vc_link',
	  	'heading'        => esc_html__( 'Link', 'viftech' ),
	  	'param_name'     => 'link',
	  	'description'    => esc_html__( 'If you would like to link this box or show button depending on style, set your link here.', 'viftech' ),
	  ),
	  array(
	  	'type'           => 'attach_image',
	  	'heading'        => esc_html__( 'Select Background Image', 'viftech' ),
	  	'param_name'     => 'image',
	  	'description'    => esc_html__( 'Select background image from media library.', 'viftech' ),
	  	"dependency" => Array('element' => "style", 'value' => array('fancy-style1', 'fancy-style2', 'fancy-style3', 'fancy-style5', 'fancy-style6')),
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => esc_html__("Icon", "revolution"),
	  	"param_name" => "icon",
	  	'description'    => esc_html__( 'If you would like to include an icon, select it here.', 'viftech' ),
	  	"value" => thb_getIconArray()
	  ),
	  array(
	  	'type'           => 'textarea_html',
	  	'heading'        => esc_html__( 'Description', 'viftech' ),
	  	'param_name'     => 'content',
	  	'description'    => esc_html__( 'Include a small description for this box, this text area supports HTML too.', 'viftech' ),
	  ),
	  array(
	  	"type" 					 => "dropdown",
	  	"heading" 			 => esc_html__("Description Alignment", 'viftech'),
	  	"param_name" 		 => "thb_text_alignment",
	  	"value" => array(
	  		"Top Left" 				=> "thb-top-left",
	  		"Center" 					=> "thb-center",
	  		"Bottom Left" 		=> "thb-bottom-left"
	  	),
	  	"std" 					 => "thb-top-left",
	  	"description" 	 => esc_html__("Alignment of the Text.", 'viftech')
	  ),
	  array(
	    "type" 					=> "textfield",
	    "heading" 			=> esc_html__("Min Height", "revolution"),
	    "param_name" 		=> "height",
	    "std"						=> '300px',
	    "description" 	=> esc_html__("Please enter the minimum height you would like for your box. Default is 300px. You can use other values such as 10vh, etc.", "revolution"),
	    'group' 				=> 'Styling'
	  ),
	  $thb_animation_array,
	  array(
	  	"type" 					 => "dropdown",
	  	"heading" 			 => esc_html__("Text Color", 'viftech'),
	  	"param_name" 		 => "thb_text_color",
	  	"value" => array(
	  		"Dark" => "fancy-dark",
	  		"Light" => "fancy-light"
	  	),
	  	"group"					 => 'Styling',
	  	"std" 					 => "fancy-dark",
	  	"description" 	 => esc_html__("Color of the text.", 'viftech')
	  ),
	  array(
	  	"type" 						=> "dropdown",
	  	"heading" 				=> esc_html__("Box Shadow", "revolution"),
	  	"param_name" 			=> "box_shadow",
	  	"value" 						=> array(
	  		'No Shadow' => "",
	  		'Small' => "small-shadow",
	  		'Medium' => "medium-shadow",
	  		'Large' => "large-shadow",
	  		'X-Large' => "xlarge-shadow",
	  	),
	  	'group' 				=> 'Styling'
	  ),
	  array(
	  	'type'           => 'textfield',
	  	'heading'        => esc_html__( 'Border Radius', 'viftech' ),
	  	'param_name'     => 'border_radius',
	  	'description'    => esc_html__( 'Set border radius of the image. Please add px,em, etc.. as well.', 'viftech' ),
	  	'group' 				=> 'Styling'
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Extra Class Name", "revolution"),
	  	"param_name" => "extra_class",
	  ),
	),
	"description" => esc_html__("Display a Fancy Box", "revolution")
) );
vc_add_param( "thb_fancybox", thb_vc_gradient_color1() );
vc_add_param( "thb_fancybox", thb_vc_gradient_color2() );

// Flip Box shortcode
vc_map( array(
	"name" => esc_html__("Flip Box", "revolution"),
	"base" => "thb_flipbox",
	"icon" => "thb_vc_ico_flipbox",
	"class" => "thb_vc_sc_flipbox",
	"category" => esc_html__('by Fuel Themes', "revolution"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", "revolution"),
			"param_name" => "icon_front",
			"value" => thb_getIconArray(),
			"group" => esc_html__("Front Side", "revolution")
		),
		array(
			"type" => "textarea_safe",
			"heading" => esc_html__("Content", "revolution"),
			"param_name" => "front_content",
			"group" => esc_html__("Front Side", "revolution")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Content Color", "revolution"),
			"param_name" => "front_text_color",
			"value" => array(
				"Dark" => "dark",
				"Light" => "light"
			),
			"description" => esc_html__("If you want white-colored contents for this side, select Light.", "revolution"),
			"group" => esc_html__("Front Side", "revolution")
		),
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Background Image", "revolution"),
			"param_name" => "front_bg_image",
			"group" => esc_html__("Front Side", "revolution")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", "revolution"),
			"param_name" => "icon_back",
			"value" => thb_getIconArray(),
			"group" => esc_html__("Back Side", "revolution")
		),
		array(
			"type" => "textarea_safe",
			"heading" => esc_html__("Back Content", "revolution"),
			"param_name" => "back_content",
			"group" => esc_html__("Back Side", "revolution")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Content Color", "revolution"),
			"param_name" => "back_text_color",
			"value" => array(
				"Dark" => "dark",
				"Light" => "light"
			),
			"description" => esc_html__("If you want white-colored contents for this side, select Light.", "revolution"),
			"group" => esc_html__("Back Side", "revolution")
		),
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Background Image", "revolution"),
			"param_name" => "back_bg_image",
			"group" => esc_html__("Back Side", "revolution")
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Min Height", "revolution"),
		  "param_name" => "min_height",
		  "description" => esc_html__("Please enter the minimum height you would like for you box. Enter in number of pixels - Don't enter \"px\", default is \"300\"", "revolution")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	),
	"description" => esc_html__("Add a Flip Box", "revolution")
) );
vc_add_param( "thb_flipbox", thb_vc_gradient_color1("Front Side") );
vc_add_param( "thb_flipbox", thb_vc_gradient_color2("Front Side") );
vc_add_param( "thb_flipbox", thb_vc_gradient_color3("Back Side") );
vc_add_param( "thb_flipbox", thb_vc_gradient_color4("Back Side") );

/* Food Menu Item */
vc_map( array(
	"name" => esc_html__("Food Menu Item", 'viftech'),
	"base" => "thb_menu_item",
	"icon" => "thb_vc_ico_menu_item",
	"class" => "thb_vc_sc_menu_item",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Title', 'viftech' ),
			'param_name'     => 'title',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Title of this food item', 'viftech' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Price', 'viftech' ),
			'param_name'     => 'price',
			'description'    => esc_html__( 'Price of this food item.', 'viftech' ),
		),
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Description', 'viftech' ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'Include a small description for this food item.', 'viftech' ),
		)
	),
	"description" => esc_html__("Add a food menu item", "revolution")
) );

// Free Scroll
vc_map( array(
	"name" => esc_html__("Free Scroll", "revolution"),
	"base" => "thb_freescroll",
	"icon" => "thb_vc_ico_freescroll",
	"class" => "thb_vc_sc_freescroll",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Type", "revolution"),
		  "param_name" => "type",
		  "admin_label" => true,
		  'std' 			=> 'images',
		  "value" => array(
		  	'Images' => 'images',
		  	'Text' => 'text',
		  	'Instagram' => 'instagram',
		  	'Blog Posts' => 'blog-posts',
		  	'Portfolio' => 'portfolios'
		  ),
		  "description" => esc_html__("This changes the size of the button", "revolution")
		),
		array(
		  "type" => "textarea_safe",
		  "heading" => esc_html__("Text Content", "revolution"),
		  "param_name" => "text_content",
		  "description" => esc_html__("Enter text to scroll here", "revolution"),
		  "dependency" => Array('element' => "type", 'value' => array('text')),
		),
		array(
	    "type" => "loop",
	    "heading" => esc_html__("Source", "revolution"),
	    "param_name" => "source",
	    "description" => esc_html__("Set your post source here", "revolution"),
	    "dependency" => Array('element' => "type", 'value' => array('blog-posts', 'products', 'portfolios')),
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Portfolio Style", "revolution"),
		    "param_name" => "portfolio_style",
		    "value" => array(
		    	'3D Hover' => "style1",
		    	'Half Overlay' => "style2",
		    	'Hover Raise' => "style3",
		    	'Title Below, Arrow Animation' => "style4",
		    	'Title Below, Shrinking Image' => "style5",
		    	'Mouse Position Image Movement' => "style6"
		    ),
		    "std" => "style1",
		    "description" => esc_html__("Select Portfolio Style", "revolution" ),
		    "dependency" => Array('element' => "type", 'value' => array('portfolios')),
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Number of Photos", 'viftech'),
		  "param_name" => "number",
		  "description" => esc_html__("Number of Instagram Photos to retrieve", 'viftech'),
		  "dependency" => Array('element' => "type", 'value' => array('instagram')),
		),
		array(
			"type" => "attach_images", //attach_images
			"heading" => esc_html__("Select Images", "revolution"),
			"param_name" => "images",
			"dependency" => Array('element' => "type", 'value' => array('images')),
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Columns", "revolution"),
		  "param_name" => "thb_columns",
		  "value" => array(
		  	'Single Column' => "small-12",
		  	'Two Columns' => "small-12 medium-6",
		  	'Three Columns' => "small-12 medium-4",
		  	'Four Columns' => "small-12 medium-3",
		  	'Five Columns' => "small-12 thb-5",
		  ),
		  "description" => esc_html__("Select the layout.", "revolution" ),
		  "dependency" => Array('element' => "type", 'value' => array('images', 'instagram', 'blog-posts', 'portfolios')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	),
	"description" => esc_html__("Marquee your content", "revolution")
) );

// Gradient Type
vc_map( array(
	'base'  => 'thb_gradienttype',
	'name' => esc_html__('Gradient Type', 'viftech'),
	"description" => esc_html__("Text with Gradient Color", "revolution"),
	'category' => esc_html__('by Fuel Themes', 'viftech'),
	"icon" => "thb_vc_ico_gradienttype",
	"class" => "thb_vc_sc_gradienttype",
	'params' => array(
		array(
			'type'       => 'textarea_safe',
			'heading'    => esc_html__( 'Content', 'viftech' ),
			'param_name' => 'gradient_text',
			'value'		 => '<h2>Unleash creativity with the powerful tools of revolution, Developed by Fuel Themes</h2>',
			'description'=> 'Enter the content to display with gradient.',
			"admin_label" => true
		),
		$thb_animation_array,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	)
) );
vc_add_param( "thb_gradienttype", thb_vc_gradient_color1() );
vc_add_param( "thb_gradienttype", thb_vc_gradient_color2() );

// Horizontal List
vc_map( array(
	"name" => esc_html__("Horizontal List", 'viftech'),
	"base" => "thb_horizontal_list",
	"icon" => "thb_vc_ico_horizontal_list",
	"class" => "thb_vc_sc_horizontal_list",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Column Layout", "revolution"),
			"param_name" => "thb_columns",
			"value" => array(
				"Single Column" => "1",
				"2 Columns" 			=> "2",
				"3 Columns" 			=> "3",
				"4 Columns" 			=> "4"
			)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Column Sizes", "revolution"),
			"param_name" => "columns_2_size",
			"value" => array(
				"50% | 50%" => "",
				"80% | 20%" => "size2_80_20",
				"70% | 30%" => "size2_70_30",
				"60% | 40%" => "size2_60_40",
				"40% | 60%" => "size2_40_60",
				"30% | 70%" => "size2_30_70",
				"20% | 80%" => "size2_20_80",
			),
			"dependency" => Array('element' => "thb_columns", 'value' => array('2')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Column Sizes", "revolution"),
			"param_name" => "columns_3_size",
			"value" => array(
				"33% | 33% | 33%" => "",
				"20% | 40% | 40%" => "size3_20_40_40",
				"50% | 25% | 25%" => "size3_50_25_25",
				"25% | 50% | 25%" => "size3_25_50_25",
				"25% | 25% | 50%" => "size3_25_25_50",	
			),
			"dependency" => Array('element' => "thb_columns", 'value' => array('3')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Column Sizes", "revolution"),
			"param_name" => "columns_4_size",
			"value" => array(
				"25% | 25% | 25% | 25%" => "",
				"15% | 35% | 35% | 15%" => "size4_15_35_35_15",
				"35% | 35% | 15% | 15%" => "size4_35_35_15_15",
				"35% | 15% | 35% | 15%" => "size4_35_15_35_15",
				"15% | 35% | 15% | 35%" => "size4_15_35_15_35",
			),
			"dependency" => Array('element' => "thb_columns", 'value' => array('4')),
		),
		array(
			"type" => "dropdown",
			"edit_field_class" => "vc_col-sm-3",
			"heading" => sprintf( esc_html__( "Text Alignment %s", 'viftech' ), '<span class="thb-row-heading">Column 1</span>' ),
			"param_name" => "column_1_align",
			"value" => array(
				"Left" => "text-left",
				"Center" => "text-center",
				"Right" => "text-right"
			)
		),
		array(
			"type" => "dropdown",
			"edit_field_class" => "vc_col-sm-3",
			"heading" => '<span class="thb-row-heading">Column 2</span>',
			"param_name" => "column_2_align",
			"value" => array(
				"Left" => "text-left",
				"Center" => "text-center",
				"Right" => "text-right"
			),
			"dependency" => Array('element' => "thb_columns", 'value' => array('2','3','4')),
		),
		array(
			"type" => "dropdown",
			"edit_field_class" => "vc_col-sm-3",
			"heading" => '<span class="thb-row-heading">Column 3</span>',
			"param_name" => "column_3_align",
			"value" => array(
				"Left" => "text-left",
				"Center" => "text-center",
				"Right" => "text-right"
			),
			"dependency" => Array('element' => "thb_columns", 'value' => array('3','4')),
		),
		array(
			"type" => "dropdown",
			"edit_field_class" => "vc_col-sm-3",
			"heading" => '<span class="thb-row-heading">Column 4</span>',
			"param_name" => "column_4_align",
			"value" => array(
				"Left" => "text-left",
				"Center" => "text-center",
				"Right" => "text-right"
			),
			"dependency" => Array('element' => "thb_columns", 'value' => array('4')),
		),
		array(
      "type" => "textarea_safe",
      "heading" => esc_html__("Column 1 Content", "revolution"),
      "param_name" => "column_1_content",
      "admin_label" => true,
      "description" => esc_html__("Enter your column text here", "revolution")
    ),
	  array(
      "type" => "textarea_safe",
      "heading" => esc_html__("Column 2 Content", "revolution"),
      "param_name" => "column_2_content",
      "admin_label" => true,
      "description" => esc_html__("Enter your column text here", "revolution"),
      "dependency" => Array('element' => "thb_columns", 'value' => array('2','3','4')),
    ),
	  array(
      "type" => "textarea_safe",
      "heading" => esc_html__("Column 3 Content", "revolution"),
      "param_name" => "column_3_content",
      "admin_label" => true,
      "description" => esc_html__("Enter your column text here", "revolution"),
      "dependency" => Array('element' => "thb_columns", 'value' => array('3','4')),
    ),
	  array(
      "type" => "textarea_safe",
      "heading" => esc_html__("Column 4 Content", "revolution"),
      "param_name" => "column_4_content",
      "admin_label" => true,
      "description" => esc_html__("Enter your column text here", "revolution"),
      "dependency" => Array('element' => "thb_columns", 'value' => array('4')),
    ),
    array(
      "type" => "vc_link",
      "heading" => esc_html__("Full Link URL", "revolution"),
      "param_name" => "url",
      "description" => esc_html__("Adding an URL for this will link your entire list item" , "revolution")
    ),
    array(
    	"type" => "textfield",
    	"heading" => esc_html__("Extra Class Name", "revolution"),
    	"param_name" => "extra_class",
    ),
    array(
      "type" => "colorpicker",
      "heading" => esc_html__("Hover Color", "revolution"),
      "param_name" => "hover_color",
      'description' => esc_html__( 'Hover Color for this item', 'viftech' ),
      "group" => "Styling"
    ),
    $thb_animation_array,
    array(
      "type" => "dropdown",
      "heading" => esc_html__("Style", "revolution"),
      "param_name" => "style",
      "value" => $thb_button_style_array,
      "description" => esc_html__("This changes the look of the button", "revolution"),
      "group" => "CTA Buttons"
    ),
    array(
    	"type" => "checkbox",
    	"heading" => esc_html__("Add Arrow", "revolution"),
    	"param_name" => "add_arrow",
    	'edit_field_class' => 'vc_col-sm-6',
    	"value" => array(
    		"Yes" => "true"
    	),
    	"description" => esc_html__("If enabled, will show an arrow on hover.", "revolution"),
    	"dependency" => Array('element' => "style", 'value' => array('style1', 'style2', 'style3', 'style4')),
    	"group" => "CTA Buttons"
    ),
	  array(
      "type" => "vc_link",
      "heading" => esc_html__("CTA Button 1", "revolution"),
      "param_name" => "cta_1",
      "description" => esc_html__("If you want to display a CTA button. Buttons are added to the last column." , "revolution"),
      "group" => "CTA Buttons"
    ),
		array(
			"type" => "vc_link",
			"heading" => esc_html__("CTA Button 2", "revolution"),
	    "param_name" => "cta_2",
	    "description" => esc_html__("If you want to display another CTA button. Buttons are added to the last column." , "revolution"),
			"group" => "CTA Buttons"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Width", "revolution"),
			"param_name" => "full_width",
			"group"			 => 'CTA Styling',
			'edit_field_class' => 'vc_col-sm-6',
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, this will make the button fill it's container", "revolution"),
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Size", "revolution"),
		  "param_name" => "size",
		  "group"			 => 'CTA Styling',
		  'edit_field_class' => 'vc_col-sm-6',
		  'std' 			=> 'medium',
		  "value" => array(
		  	'Small' => 'small',
		  	'Medium' => 'medium',
		  	'Large' => 'large',
		  	'X-Large' => 'x-large'
		  ),
		  "description" => esc_html__("This changes the size of the button", "revolution")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Color", "revolution"),
		  "param_name" => "color",
		  "group"			 => 'CTA Styling',
		  'edit_field_class' => 'vc_col-sm-6',
		  'std' 			=> 'accent',
		  "value" => array(
		  	'Black' => 'black',
		  	'White' => 'white',
		  	'Accent' => 'accent',
		  	'Gradient' => 'gradient'
		  ),
		  "description" => esc_html__("This changes the color of the button", "revolution")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Border Radius", "revolution"),
		  "param_name" => "border_radius",
		  "group"			 => 'CTA Styling',
		  'edit_field_class' => 'vc_col-sm-6',
		  'std' 			=> 'small-radius',
		  "value" => array(
		  	'None' => 'no-radius',
		  	'Small' => 'small-radius',
		  	'Pill' => 'pill-radius'
		  ),
		  "description" => esc_html__("This changes the border-radius of the button. Some styles may not have this future.", "revolution")
		),
		array(
		  "type" => "colorpicker",
		  "heading" => esc_html__("See-Through Color for Gradients", "revolution"),
		  "param_name" => "st_color",
		  "group"			 => 'CTA Styling',
		  "description" => esc_html__("Some Gradient colors have white placeholders to mimick transparency. You can change this color depending on your background color.", "revolution")
		),
	),
	"description" => esc_html__("Show your data in a horizontal list", "revolution")
));
vc_add_param( "thb_horizontal_list", thb_vc_gradient_color1('CTA Styling') );
vc_add_param( "thb_horizontal_list", thb_vc_gradient_color2('CTA Styling') );

// VC Gallery
vc_remove_param("vc_gallery", "type");
vc_remove_param("vc_gallery", "title");
vc_remove_param("vc_gallery", "interval");
vc_remove_param("vc_gallery", "onclick");
vc_remove_param("vc_gallery", "source");
vc_remove_param("vc_gallery", "custom_srcs");
vc_remove_param("vc_gallery", "css_animation");
vc_remove_param("vc_gallery", "custom_links");
vc_remove_param("vc_gallery", "custom_links_target");

vc_add_param("vc_gallery", array(
  "type" => "dropdown",
  "heading" => esc_html__("Gallery type", "revolution"),
  "param_name" => "gallery_type",
  "value" => array(
     esc_html__("Regular Grid", "revolution") => "grid",
     esc_html__("Masonry Grid", "revolution") => "thb-portfolio"
   ),
   'weight' => 1,
  "description" => esc_html__("Select gallery style. If you are using Masonry Grid, you can set individual image sizes inside 'Attachment Details > Masonry Size' when adding them to your gallery.", "revolution")
));

vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"heading" => esc_html__("Columns", "revolution"),
	"param_name" => "thb_columns",
	"admin_label" => true,
	"value" => array(
		'2 Columns' => "small-6 large-6",
		'3 Columns' => "small-6 large-4",
		'4 Columns' => "small-6 large-3",
		'5 Columns' => "small-6 thb-5",
		'6 Columns' => "small-6 large-2"
	),
	'weight' => 1,
	"dependency" => Array('element' => "gallery_type", 'value' => array('grid'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "heading" => esc_html__("Margins between items", "revolution"),
    "param_name" => "thb_margins",
    "group" => "Styling",
    "std"=> "regular-padding",
    "value" => array(
    	'Regular' => "regular-padding",
    	'Mini' => "mini-padding",
    	'Pixel' => "pixel-padding",
    	'None' => "no-padding"
    ),
    'weight' => 1,
    "description" => esc_html__("This will change the margins between items", "revolution" )
));

vc_add_param("vc_gallery", array(
	"type" => "checkbox",
	"heading" => esc_html__("Use lightbox?", "revolution"),
	"param_name" => "lightbox",
	'weight' => 1,
	"value" => array(
		"Yes" => "mfp-gallery"
	),
	"description" => esc_html__("Images will link to their large versions using Lightbox.", "revolution" )
));

vc_add_param("vc_gallery",$thb_animation_array );

// Iconbox
vc_map( array(
	"name" => esc_html__("Iconbox", 'viftech'),
	"base" => "thb_iconbox",
	"icon" => "thb_vc_ico_iconbox",
	"class" => "thb_vc_sc_iconbox",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Type", "revolution"),
			"param_name" => "type",
			"value" => array(
				"Top Icon - Line after icon" => "top type1",
				"Top Icon - Line after title" => "top type2",
				"Top Icon - Regular" => "top type3",
				"Top Icon - Border Around" => "top type4",
				"Left Icon - Style 1" => "left type1",
				"Right Icon - Style 1" => "right type1",
			)
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", "revolution"),
			"param_name" => "alignment",
			"value" => array(
				"Left" => "text-left",
				"Center" => "text-center",
				"Right" => "text-right"
			),
			"std" => "text-center",
			"dependency" => Array('element' => "type", 'value' => array('top type1', 'top type2', 'top type3', 'top type4'))
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Icon", "revolution"),
			"param_name" => "icon",
			"value" => thb_getIconArray()
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image As Icon', 'viftech' ),
			'param_name'     => 'icon_image',
			'description'    => esc_html__( 'You can set an image instead of an icon.', 'viftech' )
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Image Width", "revolution"),
			"param_name" => "icon_image_width",
			'description'    => esc_html__( 'If you are using an image, you can set custom width here. Default is 64 (pixels).', 'viftech' )
		),
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'Link', 'viftech' ),
			'param_name'     => 'link',
			'description'    => esc_html__( 'Add a link to the iconbox if desired.', 'viftech' ),
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Read More Style", "revolution"),
		  "param_name" => "style",
		  "value" => array(
		  	'Style 1 (Line Left)' => "style1",
		  	'Style 2 (Line Bottom)' => 'style2',
		  	'Style 3 (Arrow Left)' => "style3",
		  	'Style 4 (Arrow Right)' => "style4",
		  	'Style 5 (Arrow Right Small)' => "style5"
		  ),
		  "std" => 'style5',
		  "description" => esc_html__("This changes the look of the read more text", "revolution")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Heading", "revolution"),
			"param_name" => "heading",
			"admin_label" => true,
			"group"					 => 'Content',
		),
		array(
			"type" => "textarea_safe",
			"heading" => esc_html__("Content", "revolution"),
			"param_name" => "description",
			"group"					 => 'Content',
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("SVG Icon Color", "revolution"),
			"param_name" => "thb_icon_color",
			"group"					 => 'Styling',
		),
		array(
			"type" => "colorpicker",
			"heading" 			 => esc_html__("Heading Color", 'viftech'),
			"param_name" 		 => "thb_heading_color",
			"group"					 => 'Styling',
			"description" 	 => esc_html__("Color of the heading", 'viftech')
		),
		array(
			"type" => "colorpicker",
			"heading" 			 => esc_html__("Text Color", 'viftech'),
			"param_name" 		 => "thb_text_color",
			"group"					 => 'Styling',
			"description" 	 => esc_html__("Color of the text", 'viftech')
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Hover SVG Icon Color", "revolution"),
			"param_name" => "thb_icon_color_hover",
			"group"					 => 'Hover Styling',
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Hover Image As Icon', 'viftech' ),
			'param_name'     => 'icon_image_hover',
			'description'    => esc_html__( 'If you are using an image, you can set an hover image.', 'viftech' ),
			"group"					 => 'Hover Styling',
		),
		array(
			"type" => "colorpicker",
			"heading" 			 => esc_html__("Hover Heading Color", 'viftech'),
			"param_name" 		 => "thb_heading_color_hover",
			"group"					 => 'Hover Styling',
			"description" 	 => esc_html__("Color of the heading", 'viftech')
		),
		array(
			"type" => "colorpicker",
			"heading" 			 => esc_html__("Hover Text Color", 'viftech'),
			"param_name" 		 => "thb_text_color_hover",
			"group"					 => 'Hover Styling',
			"description" 	 => esc_html__("Color of the text", 'viftech')
		),
		array(
			"type" 						=> "checkbox",
			"heading" 				=> esc_html__("Animation", "revolution"),
			"param_name" 			=> "animation",
			"value" => array(
				"Yes" => "true"
			),
			'weight' => 1,
			'std' 					=> 'true',
			"group"					=> 'Animation',
			"description" 	=> esc_html__("You can disable animation if you like.", "revolution")
		),
		array(
			"type" 					=> "textfield",
			"heading" 			=> esc_html__("Animation Speed", "revolution"),
			"param_name" 		=> "animation_speed",
			"value" 					=> "1.5",
			"group"					 => 'Animation',
			'description'    => esc_html__( 'Speed of the animation in seconds', 'viftech' ),
			"dependency" => Array('element' => "animation", 'value' => array('true')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		)
	),
	"description" => esc_html__("Iconboxes with different animations", "revolution")
) );

// Image shortcode
vc_map( array(
	"name" => "Image",
	"base" => "thb_image",
	"icon" => "thb_vc_ico_image",
	"class" => "thb_vc_sc_image wpb_vc_single_image",
	"category" => esc_html__('by Fuel Themes', 'viftech'),
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"heading" => esc_html__("Select Image", 'viftech'),
			"param_name" => "image"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Display Caption?", 'viftech'),
			"param_name" => "caption",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If selected, the image caption will be displayed.", 'viftech')
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Caption Style", 'viftech'),
		  "param_name" => "caption_style",
		  "value" => array(
		  	"Style1" => "style1", 
		  	"Style2" => "style2"
		  ),
		  "description" => esc_html__("Select caption style.", 'viftech'),
		  "dependency" => Array('element' => "caption", 'value' => array('true'))
		),
		array(
			'type'           => 'textarea_html',
			'heading'        => esc_html__( 'Text Below Image', 'viftech' ),
			'param_name'     => 'content'
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Retina Size?", 'viftech'),
			"param_name" => "retina",
			"value" => array(
				"Yes" => "retina_size"
			),
			"description" => esc_html__("If selected, the image will be display half-size, so it looks crisps on retina screens. Full Width setting will override this.", 'viftech')
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Full Width?", 'viftech'),
			"param_name" => "full_width",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If selected, the image will always fill its container", 'viftech')
		),
		$thb_animation_array,
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Image size", 'viftech'),
		  "param_name" => "img_size",
		  "description" => esc_html__("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", 'viftech')
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Image alignment", 'viftech'),
		  "param_name" => "alignment",
		  "value" => array("Align left" => "alignleft", "Align right" => "alignright", "Align center" => "aligncenter"),
		  "description" => esc_html__("Select image alignment.", 'viftech')
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Link to Full-Width Image?", 'viftech'),
			"param_name" => "lightbox",
			"value" => array(
				"Yes" => "true"
			)
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Image link", 'viftech'),
		  "param_name" => "img_link",
		  "description" => esc_html__("Enter url if you want this image to have link.", 'viftech'),
		  "dependency" => Array('element' => "lightbox", 'is_empty' => true)
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Border Radius", 'viftech'),
			"param_name" => "thb_border_radius",
			'group' 				=> 'Styling',
			"description" => esc_html__("You can add your own border-radius code here. For ex: 2px 2px 4px 4px", 'viftech')
		),
		array(
			"type" 						=> "dropdown",
			"heading" 				=> esc_html__("Box Shadow", "revolution"),
			"param_name" 			=> "box_shadow",
			"value" 						=> array(
				'No Shadow' => "",
				'Small' => "small-shadow",
				'Medium' => "medium-shadow",
				'Large' => "large-shadow",
				'X-Large' => "xlarge-shadow",
			),
			"dependency" => Array('element' => "style", 'value' => array('lightbox-style2')),
			'group' 				=> 'Styling'
		),
		array(
			"type" 						=> "dropdown",
			"heading" 				=> esc_html__("Image Max Width", "revolution"),
			"param_name" 			=> "max_width",
			"value" 						=> array(
				'100%' => "size_100",
				'125%' => "size_125",
				'150%' => "size_150",
				'175%' => "size_175",
				'200%' => "size_200",
				'225%' => "size_225",
				'250%' => "size_250",
				'275%' => "size_275",
			),
			"std" => "size_100",
			'group' 				=> 'Styling',
			"description" => esc_html__("By default, image is contained within the columns, by setting this, you can extend the image over the container", 'viftech')
		),
	),
	"description" => esc_html__("Add an animated image", 'viftech')
) );

// Image Slider
vc_map( array(
	"name" => esc_html__("Image Slider", "revolution"),
	"base" => "thb_image_slider",
	"icon" => "thb_vc_ico_image_slider",
	"class" => "thb_vc_sc_image_slider",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
			"type" => "attach_images", //attach_images
			"heading" => esc_html__("Select Images", "revolution"),
			"param_name" => "images"
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Columns", "revolution"),
		  "param_name" => "thb_columns",
		  "value" => array(
		  	'Single Column' => "1",
		  	'Two Columns' => "small-12 medium-6",
		  	'Three Columns' => "small-12 medium-4",
		  	'Four Columns' => "small-12 medium-3",
		  ),
		  "description" => esc_html__("Select the layout.", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use lightbox?", "revolution"),
			"param_name" => "lightbox",
			"value" => array(
				"Yes" => "mfp-gallery"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Center Images", "revolution"),
			"param_name" => "thb_center",
			"value" => array(
				"Yes" => "true"
			)
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Use Pagination", "revolution"),
			"param_name" => "thb_pagination",
			"value" => array(
				"Yes" => "true"
			),
			"std" => "true"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Display Prev/Next Slides ?", "revolution"),
			"param_name" => "thb_next_slides",
			"value" => array(
				"Yes" => "overflow-visible"
			),
			"std" => "overflow-visible"
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "revolution"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "revolution"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		)
	),
	"description" => esc_html__("Add Slider with your images", "revolution")
) );

// Instagram
vc_map( array(
	"name" => esc_html__("Instagram", 'viftech'),
	"base" => "thb_instagram",
	"icon" => "thb_vc_ico_instagram",
	"class" => "thb_vc_sc_instagram",
	"category" => esc_html__("by Fuel Themes", 'viftech'),
	"params"	=> array(
	  array(
      "type" => "textfield",
      "heading" => esc_html__("Number of Photos", 'viftech'),
      "param_name" => "number",
      "admin_label" => true,
      "description" => esc_html__("Number of Instagram Photos to retrieve", 'viftech')
	  ),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", 'viftech'),
			"param_name" => "columns",
			"value" => $thb_column_array
		),
		array(
	    "type" => "checkbox",
	    "heading" => esc_html__("Link Photos to Instagram?", 'viftech'),
	    "param_name" => "link",
	    "value" => array(
				esc_html__("Yes", "revolution") =>"true"
			),
	    "description" => esc_html__("Do you want to link the Instagram photos to instagram.com website?", 'viftech')
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Column Padding", 'viftech'),
			"param_name" => "column_padding",
			"value" => array(
				'Normal' => "",
				'Low' => "low-padding",
				'No-Padding' => "no-padding"
			),
			"description" => esc_html__("You can have columns without spaces using this option"	, 'viftech')
		)
	),
	"description" => esc_html__("Add Instagram Photos", "revolution")
) );

// Label
vc_map( array(
	"name" => esc_html__("Label", 'viftech'),
	"base" => "thb_label",
	"icon" => "thb_vc_ico_label",
	"class" => "thb_vc_sc_label",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
			"type" 					 => "textarea_html",
			"heading" 			 => esc_html__("Content", "revolution"),
			"param_name" 		 => "content",
			"group"					 => 'Content',
		),
		$thb_animation_array,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
		array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'Css', 'viftech' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design options', 'viftech' ),
  	),
	),
	"description" => esc_html__("Display a label box", "revolution")
) );

// Like Button
vc_map( array(
	"name" => esc_html__("Like Button", "revolution"),
	"base" => "thb_like_button",
	"icon" => "thb_vc_ico_like_button",
	"class" => "thb_vc_sc_like_button",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Alignment", 'viftech'),
			"param_name" => "alignment",
			"value" => array(
				'Left' => "",
				'Center' => "align-center",
				'Right' => "align-right"
			),
			"std" => "",
			"description" => esc_html__("Change the alignment of the button."	, 'viftech')
		)
	),
	"description" => esc_html__("Add a Like Button to Your Page", "revolution")
) );

// Office Locations Shortcode
vc_map( array(
	"name" => esc_html__('Office Locations', 'viftech'),
	"base" => "thb_location_parent",
	"icon" => "thb_vc_ico_location",
	"class" => "thb_vc_sc_location",
	"category" => esc_html__("by Fuel Themes", 'viftech'),
	"as_parent" => array('only' => 'thb_location'),
	"show_settings_on_create" => true,
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Map Height", "revolution"),
		  "param_name" => "height",
		  "admin_label" => true,
		  "value" => 50,
		  "description" => esc_html__("Enter height of the map in vh (0-100). For example, 50 will be 50% of viewport height and 100 will be full height. <small>Make sure you have filled in your Google Maps API inside Appearance > Theme Options.</small>", "revolution")
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Map Zoom', 'viftech' ),
			'param_name'     => 'zoom',
			'value'			 		 => '0',
			'description'    => esc_html__( 'Set map zoom level. Leave 0 to automatically fit to bounds.', 'viftech' )
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Map Controls', 'viftech' ),
			'param_name'     => 'map_controls',
			'std'            => 'panControl, zoomControl, mapTypeControl, scaleControl',
			'value'          => array(
				esc_html__('Pan Control', 'viftech')             => 'panControl',
				esc_html__('Zoom Control', 'viftech')            => 'zoomControl',
				esc_html__('Map Type Control', 'viftech')        => 'mapTypeControl',
				esc_html__('Scale Control', 'viftech')           => 'scaleControl',
				esc_html__('Street View Control', 'viftech')     => 'streetViewControl'
			),
			'description'    => esc_html__( 'Toggle map options.', 'viftech' )
		),
		array(
			'type'           => 'dropdown',
			'heading'        => esc_html__( 'Map Type', 'viftech' ),
			'param_name'     => 'map_type',
			'std'            => 'roadmap',
			'value'          => array(
				esc_html__('Roadmap', 'viftech')   => 'roadmap',
				esc_html__('Satellite', 'viftech') => 'satellite',
				esc_html__('Hybrid', 'viftech')    => 'hybrid',
			),
			'description' => esc_html__( 'Choose map style.', 'viftech' )
		),
		array(
			'type' => 'textarea_raw_html',
			'heading' => esc_html__( 'Map Style', 'viftech' ),
			'param_name' => 'map_style',
			'description' => esc_html__( 'Paste the style code here. Browse map styles on SnazzyMaps.com', 'viftech' )
		),
		array(
			'type' 					=> 'colorpicker',
			'heading' 			=> esc_html__( 'Heading Color', 'viftech' ),
			'param_name' 		=> 'heading_color',
			'description' 	=> esc_html__( 'Color of the Location Title', 'viftech' ),
			'group' 				=> 'Styling'
		),
		array(
			'type' 					=> 'colorpicker',
			'heading' 			=> esc_html__( 'Active Location Background Color', 'viftech' ),
			'param_name' 		=> 'location_bg_color',
			'description' 	=> esc_html__( 'Changes the background color of the selected location.', 'viftech' ),
			'group' 				=> 'Styling'
		),
	),
	"content_element" => true,
	"js_view" => 'VcColumnView',
	"description" => esc_html__("Display your office locations", 'viftech' )
) );

vc_map( array(
  "name" => esc_html__("Office Location", 'viftech'),
  "base" => "thb_location",
  "icon" => "thb_vc_ico_location_single",
  "as_child" => array('only' => 'thb_location_parent'),
  "content_element" => true,
  "params" => array(
    array(
    	'type'           => 'attach_image',
    	'heading'        => esc_html__( 'Marker Image', 'viftech' ),
    	'param_name'     => 'marker_image',
    	'description'    => esc_html__( 'Add your Custom marker image or use default one.', 'viftech' )
    ),
    array(
    	'type'           => 'checkbox',
    	'heading'        => esc_html__( 'Retina Marker', 'viftech' ),
    	'param_name'     => 'retina_marker',
    	'value'          => array(
    		esc_html__('Yes', 'viftech') => 'yes',
    	),
    	'description'    => esc_html__( 'Enabling this option will reduce the size of marker for 50%, example if marker is 32x32 it will be 16x16.', 'viftech' )
    ),
    array(
    	'type'           => 'textfield',
    	'heading'        => esc_html__( 'Latitude', 'viftech' ),
    	'param_name'     => 'latitude',
    	'description'    => esc_html__( 'Enter latitude coordinate. To select map coordinates, use http://www.latlong.net/convert-address-to-lat-long.html', 'viftech' ),
    ),
    array(
    	'type'           => 'textfield',
    	'heading'        => esc_html__( 'Longitude', 'viftech' ),
    	'param_name'     => 'longitude',
    	'description'    => esc_html__( 'Enter longitude coordinate.', 'viftech' ),
    ),
    array(
    	'type'           => 'textfield',
    	'heading'        => esc_html__( 'Marker Title', 'viftech' ),
    	'admin_label' 	 => true,
    	'param_name'     => 'marker_title'
    ),
    array(
    	'type'           => 'textarea',
    	'heading'        => esc_html__( 'Marker Description', 'viftech' ),
    	'param_name'     => 'marker_description'
    )
  ),
  "description" => esc_html__("Display your office locations", 'viftech')
));

class WPBakeryShortCode_thb_location_parent extends WPBakeryShortCodesContainer { }
class WPBakeryShortCode_thb_location extends WPBakeryShortCode { }

// Portfolio Masonry
vc_map( array(
	"name" => esc_html__("Portfolio Masonry", 'viftech'),
	"base" => "thb_portfolio",
	"icon" => "thb_vc_ico_portfolio",
	"class" => "thb_vc_sc_portfolio",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Portfolio Style", "revolution"),
		    "param_name" => "style",
		    "value" => array(
		    	'3D Hover' => "style1",
		    	'Half Overlay' => "style2",
		    	'Hover Raise' => "style3",
		    	'Mouse Position Image Movement' => "style6"
		    ),
		    "admin_label" => true,
		    "description" => esc_html__("Select Portfolio Style", "revolution" )
		),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Portfolio Source", "revolution"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "revolution")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Margins between items", "revolution"),
	      "param_name" => "thb_margins",
	      "group" => "Styling",
	      "std"=> "regular-padding",
	      "value" => array(
	      	'Regular' => "regular-padding",
	      	'Mini' => "mini-padding",
	      	'None' => "no-padding"
	      ),
	      "description" => esc_html__("This will change the margins between items", "revolution" )
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Animation Style", "revolution"),
	      "param_name" => "animation_style",
	      "std" => "thb-animate-from-bottom",
	      "group" => "Styling",
	      "value" => array(
	      	'Slide From Bottom' => "thb-animate-from-bottom",
	      	'Vertical Flip' => "thb-vertical-flip",
	      	'Fade' => "thb-fade",
	      	'Scale' => "thb-scale",
	      	'No Animation' => "thb-none"
	      ),
	      "description" => esc_html__("You can change how the portfolio elements appear on the screen.", "revolution")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Filters?", "revolution"),
	      "param_name" => "add_filters",
	      "value" => array(
      		"Yes" => "true"
      	),
	      "group" => "Filters",
	      "description" => esc_html__("This will display filters on the top", "revolution" )
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Filter Categories", "revolution"),
	      "param_name" => "filter_categories",
	      "value" => thb_portfolioCategories(),
	      "group" => "Filters",
	      "description" => esc_html__("Select which categories you want to filter", "revolution"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Filter Style", "revolution"),
	      "param_name" => "filter_style",
	      "value" => array(
	      	'Style 1 - Classic' => "style1",
	      	'Style 2 - Dropdown' => "style2"
	      ),
	      "group" => "Filters",
	      "description" => esc_html__("Select your filter style", "revolution" )
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Load More Button?", "revolution"),
	      "param_name" => "loadmore",
	      "value" => array(
      		"Yes" => "true"
      	),
	      "description" => esc_html__("Add Load More button at the bottom", "revolution" )
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in masonry layouts", "revolution" )
) );

vc_map( array(
	"name" => esc_html__("Portfolio Grid", 'viftech'),
	"base" => "thb_portfolio_grid",
	"icon" => "thb_vc_ico_portfolio_grid",
	"class" => "thb_vc_sc_portfolio_grid",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Portfolio Style", "revolution"),
		    "param_name" => "style",
		    "value" => array(
		    	'3D Hover' => "style1",
		    	'Half Overlay' => "style2",
		    	'Hover Raise' => "style3",
		    	'Title Below, Arrow Animation' => "style4",
		    	'Title Below, Shrinking Image' => "style5",
		    	'Mouse Position Image Movement' => "style6"
		    ),
		    "admin_label" => true,
		    "description" => esc_html__("Select Portfolio Style", "revolution" )
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Columns", "revolution"),
		    "param_name" => "columns",
		    "value" => array(
		    	'Six Columns' => "small-12 medium-4 large-2",
		    	'Five Columns' => "small-12 medium-3 thb-5",
		    	'Four Columns' => "small-12 medium-6 large-3",
		    	'Three Columns' => "small-12 large-4",
		    	'Two Columns' => "small-12 large-6"
		    ),
		    "admin_label" => true,
		    "description" => esc_html__("Select the layout of the portfolios.", "revolution" )
		),
	  array(
	      "type" => "loop",
	      "heading" => esc_html__("Portfolio Source", "revolution"),
	      "param_name" => "source",
	      "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "revolution")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("True Aspect Ratio", "revolution"),
	      "param_name" => "true_aspect",
	      "value" => array(
	      		"Yes" => "true"
	      	),
	      "description" => esc_html__("This will change the aspect ratios of the portfolio so that they are displayed same as their featured image.", "revolution")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Margins between items", "revolution"),
	      "param_name" => "thb_margins",
	      "group" => "Styling",
	      "std"=> "regular-padding",
	      "value" => array(
	      	'Regular' => "regular-padding",
	      	'Mini' => "mini-padding",
	      	'None' => "no-padding"
	      ),
	      "description" => esc_html__("This will change the margins between items", "revolution" )
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Animation Style", "revolution"),
	      "param_name" => "animation_style",
	      "std" => "thb-animate-from-bottom",
	      "group" => "Styling",
	      "value" => array(
	      	'Slide From Bottom' => "thb-animate-from-bottom",
	      	'Vertical Flip' => "thb-vertical-flip",
	      	'Fade' => "thb-fade",
	      	'Scale' => "thb-scale",
	      	'No Animation' => "thb-none"
	      ),
	      "description" => esc_html__("You can change how the portfolio elements appear on the screen.", "revolution")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Filters?", "revolution"),
	      "param_name" => "add_filters",
	      "value" => array(
	    		"Yes" => "true"
	    	),
	      "group" => "Filters",
	      "description" => esc_html__("This will display filters on the top", "revolution" )
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Filter Categories", "revolution"),
	      "param_name" => "filter_categories",
	      "value" => thb_portfolioCategories(),
	      "group" => "Filters",
	      "description" => esc_html__("Select which categories you want to filter", "revolution"),
	      "dependency" => Array('element' => "add_filters", 'value' => array('true'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Filter Style", "revolution"),
	      "param_name" => "filter_style",
	      "value" => array(
	      	'Style 1 - Classic' => "style1",
	      	'Style 2 - Dropdown' => "style2"
	      ),
	      "group" => "Filters",
	      "description" => esc_html__("Select your filter style", "revolution" )
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Add Load More Button?", "revolution"),
	      "param_name" => "loadmore",
	      "value" => array(
      		"Yes" => "true"
      	),
	      "description" => esc_html__("Add Load More button at the bottom", "revolution" )
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in grids", "revolution" )
) );

// Portfolio Carousel
vc_map( array(
	"name" => esc_html__("Portfolio Carousel", 'viftech'),
	"base" => "thb_portfolio_carousel",
	"icon" => "thb_vc_ico_portfolio_carousel",
	"class" => "thb_vc_sc_portfolio_carousel",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Portfolio Style", "revolution"),
		    "param_name" => "portfolio_style",
		    "value" => array(
		    	'3D Hover' => "style1",
		    	'Half Overlay' => "style2",
		    	'Hover Raise' => "style3",
		    	'Title Below, Arrow Animation' => "style4",
		    	'Title Below, Shrinking Image' => "style5",
		    	'Mouse Position Image Movement' => "style6"
		    ),
		    "std" => "style1",
		    "admin_label" => true,
		    "description" => esc_html__("Select Portfolio Style", "revolution" ),
		    "dependency" => Array('element' => "type", 'value' => array('portfolios')),
		),
		array(
		    "type" => "loop",
		    "heading" => esc_html__("Portfolio Source", "revolution"),
		    "param_name" => "source",
		    "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "revolution")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Columns", "revolution"),
		  "param_name" => "thb_columns",
		  "value" => array(
		  	'Single Column' => "small-12",
		  	'Two Columns' => "small-12 medium-6",
		  	'Three Columns' => "small-12 medium-4",
		  	'Four Columns' => "small-12 medium-3",
		  ),
		  "description" => esc_html__("Select the layout.", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Display Slider Pagination", "revolution"),
			"param_name" => "thb_pagination",
			"value" => array(
				"Yes" => "true"
			),
			"std" => "true"
		),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Auto Play", "revolution"),
	  	"param_name" => "autoplay",
	  	"value" => array(
	  		"Yes" => "1"
	  	),
	  	"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
	  	"param_name" => "autoplay_speed",
	  	"value" => "5000",
	  	"description" => esc_html__("Speed of the autoplay, default 5000 (5 seconds)", "revolution"),
	  	"dependency" => Array('element' => "autoplay", 'value' => array('1'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Overflow Visible?", "revolution"),
	  	"param_name" => "thb_overflow",
	  	"group" => "Styling",
	  	"value" => array(
	  		"Yes" => "overflow-visible"
	  	),
	  	"std" => "overflow-visible"
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a Carousel Layout", "revolution")
) );

// Portfolio Slider
vc_map( array(
	"name" => esc_html__("Portfolio Slider", 'viftech'),
	"base" => "thb_portfolio_slider",
	"icon" => "thb_vc_ico_portfolio_slider",
	"class" => "thb_vc_sc_portfolio_slider",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "revolution"),
		    "param_name" => "style",
		    "admin_label" => true,
		    "std"	=> 'style1',
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2",
		    	'Style 3' => "style3",
		    	'Style 4' => "style4",
		    )
		),
		array(
		    "type" => "loop",
		    "heading" => esc_html__("Portfolio Source", "revolution"),
		    "param_name" => "source",
		    "description" => esc_html__("Set your portfolio source here. Make sure you select portfolio post type", "revolution")
		),
		array(
			'type'           => 'checkbox',
			'heading'        => esc_html__( 'Full Height', 'viftech' ),
			'param_name'     => 'full_height',
			'value'          => array(
				esc_html__('Yes', 'viftech') => 'full_height',
			),
			'description'    => esc_html__( 'Enabling this option will increase the height of the slider to full height of the screen.', 'viftech' ),
			"dependency" => Array('element' => "style", 'value' => array('style1', 'style2', 'style4'))
		),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Auto Play", "revolution"),
	  	"param_name" => "autoplay",
	  	"value" => array(
	  		"Yes" => "1"
	  	),
	  	"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
	  	"param_name" => "autoplay_speed",
	  	"value" => "5000",
	  	"description" => esc_html__("Speed of the autoplay, default 5000 (5 seconds)", "revolution"),
	  	"dependency" => Array('element' => "autoplay", 'value' => array('1'))
	  ),
	),
	"description" => esc_html__("Display Your Portfolio in a Slider Layout", "revolution")
) );

// Pricing Table Parent
vc_map( array(
	"name" => esc_html__("Pricing Table", 'viftech'),
	"base" => "thb_pricing_table",
	"icon" => "thb_vc_ico_pricing_table",
	"class" => "thb_vc_sc_pricing_table",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_parent" => array('only' => 'thb_pricing_column'),
	"params"	=> array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "revolution"),
			"param_name" => "thb_pricing_columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "large-6",
				'3 Columns' => "large-4",
				'4 Columns' => "medium-4 large-3",
				'5 Columns' => "medium-6 thb-5",
				'6 Columns' => "medium-4 large-2"
			)
		)
	),
	"description" => esc_html__("Pricing Table", "revolution"),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Pricing Table Column", 'viftech'),
	"base" => "thb_pricing_column",
	"icon" => "thb_vc_ico_pricing_table",
	"class" => "thb_vc_sc_pricing_table",
	"as_child" => array('only' => 'thb_pricing_table'),
	"params"	=> array(
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Highlight?", "revolution"),
			"param_name" => "highlight",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, this column will be hightlighted.", "revolution"),
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', 'viftech' ),
			'param_name'     => 'image',
			'description'    => esc_html__( 'Select an image if you would like to display one on top.', 'viftech' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Title', 'viftech' ),
			'param_name'     => 'title',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Title of this pricing column', 'viftech' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Price', 'viftech' ),
			'param_name'     => 'price',
			'description'    => esc_html__( 'Price of this pricing column.', 'viftech' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Sub Title', 'viftech' ),
			'param_name'     => 'sub_title',
			'description'    => esc_html__( 'Some information under the price.', 'viftech' ),
		),
		array(
			'type'           => 'textarea_html',
			'heading'        => esc_html__( 'Description', 'viftech' ),
			'param_name'     => 'content',
			'description'    => esc_html__( 'Include a small description for this box, this text area supports HTML too.', 'viftech' ),
		),
		array(
			'type'           => 'vc_link',
			'heading'        => esc_html__( 'Pricing CTA Button', 'viftech' ),
			'param_name'     => 'link',
			'description'    => esc_html__( 'Button at the end of the pricing table.', 'viftech' ),
		),
	),
	"description" => esc_html__("Add a pricing table", "revolution")
) );

class WPBakeryShortCode_thb_pricing_table extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_pricing_column extends WPBakeryShortCode {}

// Products
vc_map( array(
	"name" => esc_html__("Products", 'viftech'),
	"base" => "thb_product",
	"icon" => "thb_vc_ico_product",
	"class" => "thb_vc_sc_product",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Product Sort", "revolution"),
	      "param_name" => "product_sort",
	      "value" => array(
	      	'Best Sellers' => "best-sellers",
	      	'Latest Products' => "latest-products",
	      	'Top Rated' => "top-rated",
					'Featured Products' => "featured-products",
	      	'Sale Products' => "sale-products",
	      	'By Category' => "by-category",
	      	'By Product ID' => "by-id",
	      	),
	      "description" => esc_html__("Select the order of the products you'd like to show.", "revolution")
	  ),
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Product Category", "revolution"),
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => esc_html__("Select the order of the products you'd like to show.", "revolution"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Product IDs", "revolution"),
	      "param_name" => "product_ids",
	      "description" => esc_html__("Enter the products IDs you would like to display seperated by comma", "revolution"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-id'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Number of Items", "revolution"),
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => esc_html__("The number of products to show.", "revolution"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers', 'featured-products'))
	  ),
	  $thb_animation_array,
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Use Carousel?", "revolution"),
	  	"param_name" => "thb_carousel",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"description" => esc_html__("If you enable this, products will be displayed inside a carousel", "revolution")
	  ),
	  array(
	    "type" => "dropdown",
	    "heading" => esc_html__("Columns", "revolution"),
	    "param_name" => "columns",
	    "admin_label" => true,
	    "value" => array(
	    	'1 Column' => "1",
	    	'2 Columns' => "2",
	    	'3 Columns' => "3",
	    	'4 Columns' => "4",
	    	'5 Columns' => "5",
	    	'6 Columns' => "6"
	    ),
	    "description" => esc_html__("Select the layout of the posts.", "revolution")
	  ),
	  array(
	  	"type" => "checkbox",
	  	"heading" => esc_html__("Auto Play", "revolution"),
	  	"param_name" => "autoplay",
	  	"value" => array(
	  		"Yes" => "true"
	  	),
	  	"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
	  	"dependency" => Array('element' => "thb_carousel", 'value' => array('true'))
	  ),
	  array(
	  	"type" => "textfield",
	  	"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
	  	"param_name" => "autoplay_speed",
	  	"value" => "4000",
	  	"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "revolution"),
	  	"dependency" => Array('element' => "autoplay", 'value' => array('true'))
	  ),
	),
	"description" => esc_html__("Add WooCommerce products", "revolution")
) );

// Product List
vc_map( array(
	"name" => esc_html__("Product List", 'viftech'),
	"base" => "thb_product_list",
	"icon" => "thb_vc_ico_product_list",
	"class" => "thb_vc_sc_product_list",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
		    "type" => "textfield",
		    "heading" => esc_html__("Title", "revolution"),
		    "param_name" => "title",
		    "admin_label" => true,
		    "description" => esc_html__("Title of the widget", "revolution")
		),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Product Sort", "revolution"),
	      "param_name" => "product_sort",
	      "value" => array(
	      	'Best Sellers' => "best-sellers",
	      	'Latest Products' => "latest-products",
	      	'Top Rated' => "top-rated",
	      	'Sale Products' => "sale-products",
	      	'By Product ID' => "by-id"
	      ),
	      "admin_label" => true,
	      "description" => esc_html__("Select the order of the products you'd like to show.", "revolution")
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Product IDs", "revolution"),
	      "param_name" => "product_ids",
	      "description" => esc_html__("Enter the products IDs you would like to display seperated by comma", "revolution"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-id'))
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => esc_html__("Number of Items", "revolution"),
	      "param_name" => "item_count",
	      "value" => "4",
	      "description" => esc_html__("The number of products to show.", "revolution"),
	      "dependency" => Array('element' => "product_sort", 'value' => array('by-category', 'sale-products', 'top-rated', 'latest-products', 'best-sellers'))
	  )
	),
	"description" => esc_html__("Add WooCommerce products in a list", "revolution")
) );

// Shop Grid
vc_map( array(
	"name" => esc_html__("Product Category Grid", 'viftech'),
	"base" => "thb_product_category_grid",
	"icon" => "thb_vc_ico_grid",
	"class" => "thb_vc_sc_grid",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
		array(
		  "type" => "checkbox",
		  "heading" => esc_html__("Product Category", "revolution"),
		  "param_name" => "cat",
		  "value" => thb_productCategories(),
		  "description" => esc_html__("Select the categories you would like to display", "revolution")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Style", "revolution"),
		  "param_name" => "style",
		  "admin_label" => true,
		  "value" => array(
				'Style 1' => "style1",
				'Style 2' => "style2",
				'Style 3' => "style3"
		  ),
		  "description" => esc_html__("This applies different grid structures", "revolution")
		)
	),
	"description" => esc_html__("Display Product Category Grid", "revolution")
) );

// Product Categories
vc_map( array(
	"name" => esc_html__("Product Categories", 'viftech'),
	"base" => "thb_product_categories",
	"icon" => "thb_vc_ico_product_categories",
	"class" => "thb_vc_sc_product_categories",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
	  array(
	      "type" => "checkbox",
	      "heading" => esc_html__("Product Category", "revolution"),
	      "param_name" => "cat",
	      "value" => thb_productCategories(),
	      "description" => esc_html__("Select the categories you would like to display", "revolution")
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Columns", "revolution"),
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	'Four Columns' => "4",
	      	'Three Columns' => "3",
	      	'Two Columns' => "2"
	      ),
	      "description" => esc_html__("Select the layout of the products.", "revolution")
	  ),
	),
	"description" => esc_html__("Add WooCommerce product categories", "revolution")
) );

// Progress Bar Shortcode
vc_map( array(
	"name" => esc_html__("Progress Bar", 'viftech'),
	"base" => "thb_progressbar",
	"icon" => "thb_vc_ico_progressbar",
	"class" => "thb_vc_sc_progressbar",
	"category" => esc_html__("by Fuel Themes", 'viftech'),
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Title", 'viftech' ),
		  "param_name" => "title",
		  "admin_label" => true,
		  "description" => esc_html__('Title of this progress bar', 'viftech' ),
		  "value" => "Development"
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Progress", 'viftech' ),
		  "param_name" => "progress",
		  "admin_label" => true,
		  "description" => esc_html__('Value for this progress. Should be between 0 and 100', 'viftech' ),
		  "value" => "70"
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Bar Color", "revolution"),
			"param_name" => "thb_bar_color",
			"description" => esc_html__("Uses the accent color by default", "revolution")
		),
	),
	"description" => esc_html__("Display progress bars in different colors", 'viftech' )
) );

// Search Field
vc_map( array(
	'base'  => 'thb_searchfield',
	'name' => esc_html__('Search Field', 'viftech'),
	"description" => esc_html__("Adds a search form with different sizes", "revolution"),
	'category' => esc_html__('by Fuel Themes', 'viftech'),
	"icon" => "thb_vc_ico_searchfield",
	"class" => "thb_vc_sc_searchfield",
	'params' => array(
		array(
			"type" => "textfield",
			"heading" => esc_html__("Placeholder", "revolution"),
			"param_name" => "placeholder",
			"description" => esc_html__("You can change the placeholder text here", "revolution")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Size", "revolution"),
			"param_name" => "size",
			"admin_label" => true,
			"value" => array(
				'Small' => "small",
				'Medium' => "medium",
				'Large' => "large",
			),
		),
		array(
		  "type" => "checkbox",
		  "heading" => esc_html__("Add Border Radius?", "revolution"),
		  "param_name" => "thb_border_radius",
		  "value" => array(
		  	"Yes" => "border_radius"
		  ),
		  "description" => esc_html__("When enabled, search form will have a pill shape.", "revolution")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Border Color", "revolution"),
			"param_name" => "border_color",
			'edit_field_class' => 'vc_col-sm-6',
			"group" => "Styling"
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Background Color", "revolution"),
			"param_name" => "background_color",
			'edit_field_class' => 'vc_col-sm-6',
			"group" => "Styling"
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Border Focus Color", "revolution"),
			"param_name" => "border_color_active",
			'edit_field_class' => 'vc_col-sm-6',
			"group" => "Styling"
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Background Focus Color", "revolution"),
			"param_name" => "background_color_active",
			'edit_field_class' => 'vc_col-sm-6',
			"group" => "Styling"
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Text Color", "revolution"),
			"param_name" => "text_color",
			'edit_field_class' => 'vc_col-sm-6',
			"group" => "Styling"
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Placeholder Text Color", "revolution"),
			"param_name" => "placeholder_color",
			'edit_field_class' => 'vc_col-sm-6',
			"group" => "Styling"
		),
		
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color", "revolution"),
			"param_name" => "icon_color",
			'edit_field_class' => 'vc_col-sm-6',
			"group" => "Styling"
		),
	)
) );

// Share shortcode
vc_map( array(
	"name" => esc_html__("Share", 'viftech'),
	"base" => "thb_share",
	"icon" => "thb_vc_ico_share",
	"class" => "thb_vc_sc_share",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
			"type" 					 => "dropdown",
			"heading" 			 => esc_html__("Alignment", 'viftech'),
			"param_name" 		 => "thb_alignment",
			"value" => array(
				"Left" 				=> "thb-left",
				"Center" 					=> "thb-center",
				"Right" 		=> "thb-right"
			),
			"std" 					 => "thb-center",
			"description" 	 => esc_html__("Alignment of the icons.", 'viftech')
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Share Text", "revolution"),
		  "param_name" => "text",
		  "description" => esc_html__("Enter an optional title.", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Facebook", "revolution"),
			"param_name" => "facebook",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Facebook share icon will be displayed inside lightbox", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Twitter", "revolution"),
			"param_name" => "twitter",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Twitter share icon will be displayed inside lightbox", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Pinterest", "revolution"),
			"param_name" => "pinterest",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Pinterest share icon will be displayed inside lightbox", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Google Plus", "revolution"),
			"param_name" => "google_plus",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Google Plus share icon will be displayed inside lightbox", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Linkedin", "revolution"),
			"param_name" => "linkedin",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Linkedin share icon will be displayed inside lightbox", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("VKontakte", "revolution"),
			"param_name" => "vkontakte",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, VKontakte share icon will be displayed inside lightbox", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("WhatsApp", "revolution"),
			"param_name" => "whatsapp",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, WhatsApp share icon will be displayed inside lightbox", "revolution" )
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Facebook Messenger", "revolution"),
			"param_name" => "facebook_messenger",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If you enable this, Facebook Messenger share icon will be displayed inside lightbox", "revolution" )
		)
	),
	"description" => esc_html__("Display a Share Button", "revolution" )
) );

// slidetype
vc_map( array(
	'base'  => 'thb_slidetype',
	'name' => esc_html__('Slide Type', 'viftech'),
	"description" => esc_html__("Animated text scrolling", "revolution"),
	'category' => esc_html__('by Fuel Themes', 'viftech'),
	"icon" => "thb_vc_ico_slidetype",
	"class" => "thb_vc_sc_slidetype",
	'params' => array(
		array(
			'type'       => 'textarea_safe',
			'heading'    => esc_html__( 'Content', 'viftech' ),
			'param_name' => 'slide_text',
			'value'		 => '<h2>*Revolution;Developed by Fuel Themes*</h2>',
			'description'=> 'Enter the content to display with typing text. <br />
			Text within <b>*</b> will be animated, for example: <strong>*Sample text*</strong>. <br />
			Text separator is <b>;</b> for example: <strong>*revolution; Developed by Fuel Themes*</strong> which will create new lines at ;',
			"admin_label" => true,
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Style", "revolution"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array(
				'Lines' => "style1",
				'Words' => "style2",
				'Characters' => "style3",
			),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Animated Text Color", "revolution"),
			"param_name" => "thb_animated_color",
			"description" => esc_html__("Uses the accent color by default", "revolution")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
	)
) );

// stroke type
vc_map( array(
	'base'  => 'thb_stroketype',
	'name' => esc_html__('Stroke Type', 'viftech'),
	"description" => esc_html__("Text with Stroke style", "revolution"),
	'category' => esc_html__('by Fuel Themes', 'viftech'),
	"icon" => "thb_vc_ico_stroketype",
	"class" => "thb_vc_sc_stroketype",
	'params' => array(
		array(
			'type'       => 'textarea_safe',
			'heading'    => esc_html__( 'Content', 'viftech' ),
			'param_name' => 'slide_text',
			'value'		 => '<h1>Revolution</h1>',
			'description'=> 'Enter the content to display with stroke.',
			"admin_label" => true,
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Text Color", "revolution"),
			"param_name" => "thb_color",
			"description" => esc_html__("Select text color", "revolution")
		),
		array(
		  "type" 					=> "textfield",
		  "heading" 			=> esc_html__("Stroke Width", "revolution"),
		  "param_name" 		=> "stroke_width",
		  "std"=> "2px",
		  "description" 	=> esc_html__("Enter the value for the stroke width. ", "revolution" )
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra Class Name", "revolution"),
			"param_name" => "extra_class",
		),
		$thb_animation_array
	)
) );

// Tabs
vc_map( array(
	"name" => esc_html__("Tabs", 'viftech'),
	"base" => "thb_tabs",
	"icon" => "thb_vc_ico_thb_tabs",
	"class" => "thb_vc_sc_thb_tabs wpb_vc_tabs wpb_vc_tta_tabs",
	"show_settings_on_create" => false,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Style", "revolution"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array(
				'Style 1' => "style1",
				'Style 2' => "style2",
				'Style 3' => "style3",
			),
		),
	),
	"description" => esc_html__("Tabbed Content", "revolution"),
	'js_view' => 'VcBackendTtaTabsView',
		'custom_markup' => '
	<div class="vc_tta-container" data-vc-action="collapse">
		<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
			<div class="vc_tta-tabs-container">'
		                   . '<ul class="vc_tta-tabs-list">'
		                   . '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
		                   . '</ul>
			</div>
			<div class="vc_tta-panels vc_clearfix {{container-class}}">
			  {{ content }}
			</div>
		</div>
	</div>',
		'default_content' => '
	[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'viftech' ), 1 ) . '"][/vc_tta_section]
	[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'viftech' ), 2 ) . '"][/vc_tta_section]
		',
		'admin_enqueue_js' => array(
			vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
		),
) );

VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Tabs' );

class WPBakeryShortCode_thb_tabs extends WPBakeryShortCode_VC_Tta_Accordion { }

// Team Member Parent
vc_map( array(
	"name" => esc_html__("Team Members", 'viftech'),
	"base" => "thb_team_parent",
	"icon" => "thb_vc_ico_team",
	"class" => "thb_vc_sc_team",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_parent" => array('only' => 'thb_team, thb_team_addnew'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Layout", "revolution"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1 (Grid)' => "style1",
		    	'Style 2 (Carousel)' => "thb-carousel"
		    ),
		    "description" => esc_html__("This changes the layout style of the team members", "revolution")
		),
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Margins between items", "revolution"),
		  "param_name" => "thb_margins",
		  "group" => "Styling",
		  "std"=> "regular-padding",
		  "value" => array(
		  	'Regular' => "regular-padding",
		  	'Mini' => "mini-padding",
		  	'Pixel' => "pixel-padding",
		  	'None' => "no-padding"
		  ),
		  "description" => esc_html__("This will change the margins between team members.", "revolution" ),
		  "dependency" => Array('element' => "thb_style", 'value' => array('style1'))
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Team Member Style", "revolution"),
		    "param_name" => "thb_member_style",
		    "value" => array(
		    	'Style 1 (Title under Image)' => "member_style1",
		    	'Style 2 (Title over Image)' => "member_style2",
		    	'Style 3 (Title over Image - 2)' => "member_style3"
		    ),
		    "description" => esc_html__("This changes the style of the members", "revolution")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns", "revolution"),
			"param_name" => "thb_columns",
			"admin_label" => true,
			"value" => array(
				'2 Columns' => "large-6",
				'3 Columns' => "large-4",
				'4 Columns' => "medium-4 large-3",
				'5 Columns' => "medium-6 thb-5",
				'6 Columns' => "medium-4 large-2"
			)
		),
		$thb_animation_array,
		array(
			"type" 					 => "dropdown",
			"heading" 			 => esc_html__("Text Color", 'viftech'),
			"param_name" 		 => "thb_text_color",
			"value" => array(
				"Dark" => "team-dark",
				"Light" => "team-light"
			),
			"group"					 => 'Styling',
			"std" 					 => "team-dark",
			"description" 	 => esc_html__("Color of the text inside hover information", 'viftech')
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "revolution"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
			"dependency" => Array('element' => "thb_style", 'value' => array('thb-carousel'))
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "revolution"),
			"dependency" => Array('element' => "autoplay", 'value' => array('true'))
		)
	),
	"description" => esc_html__("Team Members", "revolution"),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Team Member", 'viftech'),
	"base" => "thb_team",
	"icon" => "thb_vc_ico_team",
	"class" => "thb_vc_sc_team",
	"as_child" => array('only' => 'thb_team_parent'),
	"params"	=> array(
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Image', 'viftech' ),
			'param_name'     => 'image',
			'description'    => esc_html__( 'Add Team Member image here.', 'viftech' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Name', 'viftech' ),
			'param_name'     => 'name',
			'admin_label'	 => true,
			'description'    => esc_html__( 'Name of the member.', 'viftech' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Sub Title', 'viftech' ),
			'param_name'     => 'sub_title',
			'description'    => esc_html__( 'Position or title of the member.', 'viftech' ),
		),
		array(
			'type'           => 'textarea_safe',
			'heading'        => esc_html__( 'Description', 'viftech' ),
			'param_name'     => 'description',
			'description'    => esc_html__( 'Include a small description for this member, this text area supports HTML too.', 'viftech' ),
		),
		array(
		  "type" 					=> "textfield",
		  "heading" 			=> esc_html__('Facebook', "revolution"),
		  "param_name" 		=> "facebook",
		  "group" 				=> esc_html__('Social Icons', 'viftech' ),
		  "description" 	=> esc_html__("Enter Facebook Link", "revolution" )
		),
		array(
		  "type" 					=> "textfield",
		  "heading" 			=> esc_html__("Twitter", "revolution"),
		  "param_name" 		=> "twitter",
		  "group" 				=> esc_html__('Social Icons', 'viftech' ),
		  "description" 	=> esc_html__("Enter Twitter Link", "revolution" )
		),
		array(
		  "type" 					=> "textfield",
		  "heading" 			=> esc_html__("Linkedin", "revolution"),
		  "param_name" 		=> "linkedin",
		  "group" 				=> esc_html__('Social Icons', 'viftech' ),
		  "description" 	=> esc_html__("Enter Linkedin Link", "revolution" )
		),
		array(
		  "type" 					=> "textfield",
		  "heading" 			=> esc_html__("Instagram", "revolution"),
		  "param_name" 		=> "instagram",
		  "group" 				=> esc_html__('Social Icons', 'viftech' ),
		  "description" 	=> esc_html__("Enter Instagram Link", "revolution" )
		)
	),
	"description" => esc_html__("Single Team Member", "revolution")
) );
vc_add_param( "thb_team_parent", thb_vc_gradient_color1() );
vc_add_param( "thb_team_parent", thb_vc_gradient_color2() );
vc_add_param( "thb_team_parent", array(
	'type' => 'colorpicker',
	'heading' => esc_html__( 'Shadow Color for Style 3', 'viftech' ),
	'param_name' => 'box_shadow',
	'description' => esc_html__( 'Choose a shadow color if needed', 'viftech' ),
	'group' => 'Styling'
) );

class WPBakeryShortCode_thb_team_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_team extends WPBakeryShortCode {}

// Testimonial Parent
vc_map( array(
	"name" => esc_html__("Testimonials", 'viftech'),
	"base" => "thb_testimonial_parent",
	"icon" => "thb_vc_ico_testimonial",
	"class" => "thb_vc_sc_testimonial",
	"content_element"	=> true,
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_parent" => array('only' => 'thb_testimonial'),
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "revolution"),
		    "param_name" => "thb_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Single Column Slider - Style 1 (avatars)' => "style1",
		    	'Single Column Slider - Style 2' => "style2",
		    	'Single Column Slider - Style 3' => "style4",
		    	'Multi Column Slider' => "style3",
		    	'Review Slider with Images' => "style5",
		    	'Grid' => "style6"
		    ),
		    "description" => esc_html__("This changes the layout style of the testimonials", "revolution")
		),
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Columns", "revolution"),
		    "param_name" => "columns",
		    "value" => $thb_column_array,
		    "description" => esc_html__("This changes the column counts of the carousel or grid", "revolution"),
		    "dependency" => Array('element' => "thb_style", 'value' => array('style3', 'style6'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Display Slider Pagination", "revolution"),
			"param_name" => "thb_pagination",
			"value" => array(
				"Yes" => "true"
			),
			"std" => "true",
			"dependency" => Array('element' => "thb_style", 'value' => array('style1', 'style2', 'style3', 'style4'))
		),
		array(
			"type" => "checkbox",
			"heading" => esc_html__("Auto Play", "revolution"),
			"param_name" => "autoplay",
			"value" => array(
				"Yes" => "true"
			),
			"description" => esc_html__("If enabled, the carousel will autoplay.", "revolution"),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Speed of the AutoPlay", "revolution"),
			"param_name" => "autoplay_speed",
			"value" => "4000",
			"description" => esc_html__("Speed of the autoplay, default 4000 (4 seconds)", "revolution"),
			"dependency" => Array('element' => "thb_style", 'value' => array('style1', 'style2', 'style3', 'style4', 'style5'))
		),
	),
	"description" => esc_html__("Testimonials Slider or Grid", "revolution"),
	"js_view" => 'VcColumnView'
) );

vc_map( array(
	"name" => esc_html__("Testimonial", 'viftech'),
	"base" => "thb_testimonial",
	"icon" => "thb_vc_ico_testimonial",
	"class" => "thb_vc_sc_testimonial",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"as_child" => array('only' => 'thb_testimonial_parent'),
	"params"	=> array(
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Quote Title', 'viftech' ),
			'param_name'     => 'quote_title',
			'group'					 => esc_html__( 'Quote', 'viftech' ),
			'description'    => esc_html__( 'Title of the Quote', 'viftech' ),
		),
		array(
			'type'           => 'textarea',
			'heading'        => esc_html__( 'Quote', 'viftech' ),
			'param_name'     => 'quote',
			'group'					 => esc_html__( 'Quote', 'viftech' ),
			'description'    => esc_html__( 'Quote text', 'viftech' ),
		),
		array(
			"type" 					 => "checkbox",
			"heading" 			 => esc_html__("Enable Review Stars", 'viftech'),
			"param_name" 		 => "thb_review",
			"value" => array(
				"Yes" => "true"
			),
			'group'					 => esc_html__( 'Quote', 'viftech' ),
			"description" => esc_html__("If you enable this, stars will be shown to display user review.", 'viftech')
		),
		array(
			"type" 					 => "dropdown",
			"heading" 			 => esc_html__("Review", 'viftech'),
			"param_name" 		 => "thb_review_stars",
			"value" => array(
				"5 Stars" => "5",
				"4 Stars" => "4",
				"3 Stars" => "3",
				"2 Stars" => "2",
				"1 Stars" => "1",
				"0 Stars" => "0"
			),
			'group'					 => esc_html__( 'Quote', 'viftech' ),
			"description" 		=> esc_html__("Star rating of this review.", 'viftech'),
			"dependency" 			=> Array('element' => "thb_review", 'value' => array('true'))
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Review Image', 'viftech' ),
			'param_name'     => 'review_image',
			'group'					 => esc_html__( 'Quote', 'viftech' ),
			'description'    => esc_html__( 'Set an image for this review. Used for Style 5.', 'viftech' )
		),
		array(
		  "type" => "vc_link",
		  "heading" => esc_html__("Link", "revolution"),
		  "param_name" => "link",
		  'group'					 => esc_html__( 'Quote', 'viftech' ),
		  "description" => esc_html__("Set a link for this slide. Used for Style 5.", "revolution")
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Author', 'viftech' ),
			'param_name'     => 'author_name',
			'admin_label'	 => true,
			'group'					 => esc_html__( 'Author', 'viftech' ),
			'description'    => esc_html__( 'Name of the member.', 'viftech' ),
		),
		array(
			'type'           => 'textfield',
			'heading'        => esc_html__( 'Author Title', 'viftech' ),
			'param_name'     => 'author_title',
			'group'					 => esc_html__( 'Author', 'viftech' ),
			'description'    => esc_html__( 'Title that will appear below author name.', 'viftech' ),
		),
		array(
			'type'           => 'attach_image',
			'heading'        => esc_html__( 'Author Image', 'viftech' ),
			'param_name'     => 'author_image',
			'group'					 => esc_html__( 'Author', 'viftech' ),
			'description'    => esc_html__( 'Add Author image here.', 'viftech' )
		)
	),
	"description" => esc_html__("Single Testimonial", "revolution")
) );
class WPBakeryShortCode_thb_testimonial_parent extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_thb_testimonial extends WPBakeryShortCode {}

// Twitter shortcode
vc_map( array(
	"name" => esc_html__("Twitter", 'viftech'),
	"base" => "thb_twitter",
	"icon" => "thb_vc_ico_twitter",
	"class" => "thb_vc_sc_twitter",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => esc_html__("Style", "revolution"),
		    "param_name" => "style",
		    "value" => array(
		    	'Style 1 - List' => "style1",
		    	'Style 2 - Slider' => "style2",
		    ),
		    "description" => esc_html__("This changes layout", "revolution" )
		),
		array(
		  "type" => "textfield",
		  "heading" => esc_html__("Number of Tweets", "revolution"),
		  "param_name" => "count",
		  "admin_label" => true
		)
	),
	"description" => esc_html__("Display your Tweets", "revolution" )
) );

// Video Lightbox
vc_map( array(
	"name" => esc_html__("Video Lightbox", 'viftech'),
	"base" => "thb_video_lightbox",
	"icon" => "thb_vc_ico_video_lightbox",
	"class" => "thb_vc_sc_video_lightbox",
	"category" => esc_html__("by Fuel Themes", "revolution"),
	"params"	=> array(
	  array(
	  	"type" 					=> "dropdown",
	  	"heading" 			=> esc_html__("Style", "revolution"),
	  	"param_name" 		=> "style",
	  	"value"					=> array(
	  		esc_html__('Just Icon', 'viftech' ) 	=> "lightbox-style1",
	  		esc_html__('With Image', 'viftech' ) 	=> "lightbox-style2",
	  		esc_html__('With Text', 'viftech' ) 	=> "lightbox-style3",
	  	)
	  ),
	  array(
	  	'type'           => 'textfield',
	  	'heading'        => esc_html__( 'Video Link', 'viftech' ),
	  	'param_name'     => 'video',
	  	'admin_label'	 	 => true,
	  	'description'    => esc_html__( 'URL of the video you want to link to. Youtube, Vimeo, etc.', 'viftech' ),
	  ),
	  array(
	  	'type'           => 'textfield',
	  	'heading'        => esc_html__( 'Text for the link', 'viftech' ),
	  	'param_name'     => 'video_text',
	  	'admin_label'	 	 => true,
	  	'description'    => esc_html__( 'Text you want to show next to the icon', 'viftech' ),
	  	"dependency" 		 => Array('element' => "style", 'value' => array('lightbox-style3'))
	  ),
	  array(
	  	"type" 					=> "dropdown",
	  	"heading" 			=> esc_html__("Icon Shape", "revolution"),
	  	"param_name" 		=> "icon_style",
	  	"value"					=> array(
	  		'Style 1' 	=> "style1",
	  		'Style 2' 	=> "style2",
	  		'Style 3' 	=> "style3",
	  	),
	  	'group' 				=> 'Styling'
	  ),
	  array(
	  	"type" 					=> "dropdown",
	  	"heading" 			=> esc_html__("Icon Size", "revolution"),
	  	"param_name" 		=> "icon_size",
	  	"value"					=> array(
	  		'Inline' 	=> "inline",
	  		'Regular' 	=> "regular",
	  		'Large' 	=> "large",
	  		'X-Large' 	=> "xlarge",
	  	),
	  	"std"						=> 'regular',
	  	'group' 				=> 'Styling'
	  ),
	  array(
	  	'type' 					=> 'colorpicker',
	  	'heading' 			=> esc_html__( 'Icon Color', 'viftech' ),
	  	'param_name' 		=> 'icon_color',
	  	'description' 	=> esc_html__( 'Color of the Play Icon', 'viftech' ),
	  	'group' 				=> 'Styling'
	  ),
	  array(
	  	'type'           => 'attach_image',
	  	'heading'        => esc_html__( 'Select Image', 'viftech' ),
	  	'param_name'     => 'image',
	  	'description'    => esc_html__( 'Select image from media library.', 'viftech' ),
	  	"dependency" 		 => Array('element' => "style", 'value' => array('lightbox-style2'))
	  ),
	  $thb_animation_array,
	  array(
	  	"type" 						=> "dropdown",
	  	"heading" 				=> esc_html__("Image Hover Style", "revolution"),
	  	"param_name" 			=> "hover_style",
	  	"value" 						=> array(
	  		'No Animation' 	=> "",
	  		'Image Zoom' 		=> "hover-style1",
	  		'Fade' 					=> "hover-style2",
	  	),
	  	"dependency" 			=> Array('element' => "style", 'value' => array('lightbox-style2')),
	  	'group' 					=> 'Styling'
	  ),
	  array(
	  	"type" 						=> "dropdown",
	  	"heading" 				=> esc_html__("Box Shadow", "revolution"),
	  	"param_name" 			=> "box_shadow",
	  	"value" 						=> array(
	  		'No Shadow' => "",
	  		'Small' => "small-shadow",
	  		'Medium' => "medium-shadow",
	  		'Large' => "large-shadow",
	  		'X-Large' => "xlarge-shadow",
	  	),
	  	"dependency" => Array('element' => "style", 'value' => array('lightbox-style2')),
	  	'group' 				=> 'Styling'
	  ),
	  array(
	  	'type'           => 'textfield',
	  	'heading'        => esc_html__( 'Border Radius', 'viftech' ),
	  	'param_name'     => 'border_radius',
	  	'description'    => esc_html__( 'Set border radius of the image. Please add px,em, etc.. as well.', 'viftech' ),
	  	"dependency" => Array('element' => "style", 'value' => array('lightbox-style2')),
	  	'group' 				=> 'Styling'
	  )
	),
	"description" => esc_html__("Display Blog Posts from your blog", "revolution")
) );