<?php function vif_location_parent( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_location_parent', $atts );
	extract( $atts );
	$vif_api_key = ot_get_option('map_api_key');
	$map_style = rawurldecode( vif_decode( strip_tags( $map_style ) ) );
	$map_controls = explode( ',', $map_controls );
	
	$location_title = $location_description = '';
	preg_match_all( '/marker_title=\"(.*?)\"\smarker_description=\"(.*?)\"]/is', $content, $matches, PREG_OFFSET_CAPTURE );
	
	$locations = [];
	if (isset($matches[1])) {
		for ($i = 0; $i < sizeof($matches[1]); ++$i) {
			$locations[] = [
				'title' 				=> $matches[1][$i][0],
				'description' => $matches[2][$i][0],
			];
		}
	}
	$element_id = 'vif-office-locations-' . mt_rand(10, 999);
	ob_start(); ?>
	<?php if (sizeof($locations)) { ?>
		<div id="<?php echo esc_attr($element_id); ?>" class="vif-carousel row max_width vif_location_container" data-columns="4" data-pagination="true" data-infinite="false">
			<?php $i = 1; foreach ($locations as $location) { ?>
				<div class="columns">
					<div class="vif_location <?php if ($i === 1) { ?>active<?php } ?>">
						<h5><?php echo esc_attr($i); ?>. <?php echo esc_html($location['title']); ?></h5>
						<?php echo wp_kses_post(vif_remove_p($location['description'])); ?>
					</div>
				</div>
			<?php $i++; } ?>
		</div>
		
	<?php } ?>
	<div class="vif_office_location <?php if ( $vif_api_key === '' ) { ?>disabled<?php } ?>" style="height:<?php echo esc_attr($height); ?>vh" data-map-style="<?php echo esc_attr($map_style); ?>" data-map-zoom="<?php echo esc_attr($zoom); ?>" data-map-type="<?php echo esc_attr($map_type); ?>" data-pan-control="<?php echo esc_attr(in_array( 'panControl', $map_controls )); ?>" data-zoom-control="<?php echo esc_attr(in_array( 'zoomControl', $map_controls )); ?>" data-maptype-control="<?php echo esc_attr(in_array( 'mapTypeControl', $map_controls )); ?>" data-scale-control="<?php echo esc_attr(in_array( 'scaleControl', $map_controls )); ?>" data-streetview-control="<?php echo esc_attr(in_array( 'streetViewControl', $map_controls )); ?>">
		<?php if ( $vif_api_key !== '' ) { ?>
			<?php echo wpb_js_remove_wpautop($content, false); ?>
		<?php } else { ?>
			<?php esc_html_e('Please fill out Google Maps Api key inside Theme Options', 'viftech'); ?>
		<?php } ?>
	</div>
	<style>
		<?php if ($location_bg_color) { ?>
			#<?php echo esc_attr($element_id); ?> .vif_location.active {
				background: <?php echo esc_attr($location_bg_color); ?>;
			}
		<?php } ?>
		<?php if ($heading_color) { ?>
			#<?php echo esc_attr($element_id); ?> h5 {
				color: <?php echo esc_attr($heading_color); ?>;	
			}
		<?php } ?>
	</style>
	<?php 
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_location_parent', 'vif_location_parent');