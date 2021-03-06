<?php function vif_tabs( $atts, $content = null ) {
	
	$atts = vc_map_get_attributes( 'vif_tabs', $atts );
	extract( $atts );
	
	$element_id = uniqid('vif-tabs-');
	$out ='';
	$el_class[] = 'vif-tabs';
	$el_class[] = $style;
	ob_start();
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_tabs', 'vif_tabs');