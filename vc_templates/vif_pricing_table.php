<?php function vif_pricing_table( $atts, $content = null ) {
	global $vif_pricing_columns;
	$atts = vc_map_get_attributes( 'vif_pricing_table', $atts );
	extract( $atts );
	
	$element_id = uniqid('vif-pricing-table-');
	$el_class[] = 'vif-pricing-table';
	$out ='';
	ob_start();

	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<div class="row">
			<?php echo wpb_js_remove_wpautop($content, false); ?>
		</div>
	</div>
	<?php 
	$count ++;
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_pricing_table', 'vif_pricing_table');