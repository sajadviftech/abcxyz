<?php function vif_map_parent( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_map_parent', $atts );
	extract( $atts );
	$vif_api_key = ot_get_option('map_api_key');
	$map_style = rawurldecode( vif_decode( strip_tags( $map_style ) ) );
	$map_controls = explode( ',', $map_controls );
	
	ob_start(); ?>
	<div class="contact_map_parent <?php echo esc_attr($position); ?>" style="height:<?php echo esc_attr($height); ?>vh">
		<div class="contact_map <?php if ( $vif_api_key === '' ) { ?>disabled<?php } ?>" data-map-style="<?php echo esc_attr($map_style); ?>" data-map-zoom="<?php echo esc_attr($zoom); ?>" data-map-type="<?php echo esc_attr($map_type); ?>" data-pan-control="<?php echo esc_attr(in_array( 'panControl', $map_controls )); ?>" data-zoom-control="<?php echo esc_attr(in_array( 'zoomControl', $map_controls )); ?>" data-maptype-control="<?php echo esc_attr(in_array( 'mapTypeControl', $map_controls )); ?>" data-scale-control="<?php echo esc_attr(in_array( 'scaleControl', $map_controls )); ?>" data-streetview-control="<?php echo esc_attr(in_array( 'streetViewControl', $map_controls )); ?>">
			<?php if ( $vif_api_key !== '' ) { ?>
				<?php echo wpb_js_remove_wpautop($content, false); ?>
			<?php } else { ?>
				<?php esc_html_e('Please fill out Google Maps Api key inside Theme Options', 'viftech'); ?>
			<?php } ?>
			
		</div>
		<?php if ($expand) {?><a href="#" class="expand"><?php get_template_part( 'assets/svg/arrows_expand.svg' ); ?></a><?php } ?>
	</div>
	<?php 
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_map_parent', 'vif_map_parent');