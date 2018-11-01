<?php function vif_content_carousel( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'vif_content_carousel', $atts );
  extract( $atts );
  
 	$rand = rand(0,1000);
 	$i = 0;
 	$classes[] = 'row';
 	$classes[] = 'vif-content-carousel vif-carousel';
 	$classes[] = $vif_margins;
 	$classes[] = $vif_overflow;
 	$classes[] = $extra_class;
 	
 	ob_start();

	?>
		<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" id="content-carousel-<?php echo esc_attr($rand); ?>" data-columns="<?php echo esc_attr($vif_columns); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>" data-pagination="<?php echo esc_attr($vif_pagination); ?>" data-infinite="false">
			<?php echo do_shortcode($content); ?>
		</div>
		
	<?php

	$out = ob_get_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
vif_add_short('vif_content_carousel', 'vif_content_carousel');