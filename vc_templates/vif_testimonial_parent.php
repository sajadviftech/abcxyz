<?php function vif_testimonial_parent( $atts, $content = null ) {
	global $vif_testimonial_columns, $vif_style;
	
	$autoplay = $autoplay_speed = false;
	$atts = vc_map_get_attributes( 'vif_testimonial_parent', $atts );
	extract( $atts );
	
	$element_id = uniqid('vif-testimonials-');
	$el_class[] = 'vif-testimonials';
	$el_class[] = 'vif-testimonial-'.$vif_style;
	$el_class[] = $vif_style === 'style6' ? 'row' : 'vif-carousel';
	$el_class[] = $vif_style;
	$el_class[] = $vif_style === 'style5' ? 'no-padding' : '';
	
	$fade = $vif_style !== 'style3' ? 'true' : 'false';
	$vif_testimonial_columns = (in_array($vif_style, array('style3', 'style6')) ? $columns : 1);
	
	$pagination = $vif_style !== 'style5' ? $vif_pagination : '';
	$navigation = $vif_style !== 'style5' ? 'false': 'true';
	$out ='';
	ob_start();
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>" data-columns="<?php echo esc_attr($vif_testimonial_columns); ?>" data-pagination="<?php echo esc_attr($pagination); ?>" data-navigation="<?php echo esc_attr($navigation); ?>"<?php if ($vif_style === 'style3') { ?> data-center="true"<?php } ?> data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>" data-fade="<?php echo esc_attr($fade); ?>">
		<?php echo wpb_js_remove_wpautop($content, false); ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_testimonial_parent', 'vif_testimonial_parent');