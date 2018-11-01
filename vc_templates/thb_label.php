<?php function thb_label( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_label', $atts );
  extract( $atts );
    
 	$out ='';
	ob_start();
	$element_id = uniqid("vif-label-");
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'vif-label', $atts );
	
	$el_class[] = 'vif-label';
	$el_class[] = $animation;
	$el_class[] = $extra_class;
	$el_class[] = $css_class;
	
	$description = vc_value_from_safe( $content );
	$description = nl2br( $description );
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<?php echo wp_kses_post(wpautop($description)); ?>
		<style>
			<?php if ($thb_icon_color) { ?>
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg path, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg circle, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg rect, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg ellipse {
				stroke: <?php echo esc_attr($thb_icon_color); ?>;
			}
			<?php } ?>
		</style>
	</div>
	<?php
	
	$out = ob_get_clean();
	   
	return $out;
}
thb_add_short('thb_label', 'thb_label');