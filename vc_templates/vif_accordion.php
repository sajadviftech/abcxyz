<?php function vif_accordion( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_accordion', $atts );
	extract( $atts );
	
	$element_id = uniqid('vif-accordion-');
	$out ='';
	$el_class[] = 'vif-accordion';
	$el_class[] = $style;
	$el_class[] = $accordion == 'true' ? 'has-accordion' : '';
	ob_start();
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_accordion', 'vif_accordion');