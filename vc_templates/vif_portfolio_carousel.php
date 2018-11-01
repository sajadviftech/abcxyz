<?php function vif_portfolio_carousel( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'vif_portfolio_carousel', $atts );
  extract( $atts );
  
  $source_data = VcLoopSettings::parseData( $source );
  $query_builder = new ThbLoopQueryBuilder( $source_data );
  $carousel_posts = $query_builder->build();
  $carousel_posts = $carousel_posts[1];	
  
 	$rand = rand(0,1000);
 	$i = 0;
 	
 	$classes[] = 'vif-portfolio vif-carousel';
 	$classes[] = $vif_overflow;
 	ob_start();

	?>
		<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" id="portfolio-carousel-<?php echo esc_attr($rand); ?>" data-columns="<?php echo esc_attr($vif_columns); ?>" data-pagination="<?php echo esc_attr($vif_pagination); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>" data-pagination="true">
				<?php if ($carousel_posts->have_posts()) :  while ($carousel_posts->have_posts()) : $carousel_posts->the_post(); ?>
					<?php
						set_query_var( 'vif_size', $vif_columns );
						get_template_part( 'inc/templates/portfolio/'.$portfolio_style); 
					?>
				<?php endwhile; else : endif; ?>
		</div>
		
	<?php

	$out = ob_get_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
vif_add_short('vif_portfolio_carousel', 'vif_portfolio_carousel');