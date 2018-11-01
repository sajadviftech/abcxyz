<?php function vif_clients_parent( $atts, $content = null ) {
	global $vif_columns, $vif_border_color, $vif_style, $vif_clients_animation;
	$atts = vc_map_get_attributes( 'vif_clients_parent', $atts );
	extract( $atts );
	
	$vif_clients_animation = $animation;
	$element_id = uniqid('vif-client-logos-');
	$el_class[] = 'vif-client-row';
	if($vif_style !== 'style3') {
		$el_class[] = $vif_hover_effect;
	}
	if($vif_image_borders == 'true') {
		$el_class[] = 'has-border';
	}

	$out ='';
	ob_start();
	
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<div class="row no-padding <?php echo esc_attr($vif_style); ?>" data-columns="<?php echo esc_attr($vif_columns); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>" data-pagination="true">
			<?php echo wpb_js_remove_wpautop($content, false); ?>
		</div>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_clients_parent', 'vif_clients_parent');