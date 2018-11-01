<?php function thb_portfolio( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio', $atts );
  extract( $atts );
  $filter_categories_array = $filter_categories ? explode(',',$filter_categories) : false;
  $source_data = VcLoopSettings::parseData( $source );
  $query_builder = new ThbLoopQueryBuilder( $source_data );
  $posts = $query_builder->build();
  $posts = $posts[1];	
  if ( $posts->have_posts() ) {
  	while ( $posts->have_posts() ) : $posts->the_post();
  		$portfolio_id_array[] = get_the_ID();
  	endwhile;
  }
 	$rand = rand(0,1000);
 	ob_start();
 	
 	$classes[] = 'vif-portfolio masonry row';
 	$classes[] = 'variable-height';
 	$classes[] = $thb_margins;
 	$classes[] = 'vif-portfolio-style-'.$style;
 	$classes[] = $animation_style === 'vif-vertical-flip' ? 'perspective-enabled' : '';
 	
 	$btn_classes[] = 'masonry_btn';
 	?>
	<?php do_action('vif-render-filter', $filter_categories_array, $rand, $filter_style, $portfolio_id_array ); ?>
	<section class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-loadmore="#loadmore-<?php echo esc_attr($rand); ?>" data-filter="vif-filter-<?php echo esc_attr($rand); ?>" data-layoutmode="packery" data-vif-animation="<?php echo esc_attr($animation_style); ?>">
		<?php
			while ( $posts->have_posts() ) : $posts->the_post();
				set_query_var( 'thb_masonry', true );
				get_template_part( 'inc/templates/portfolio/'.$style );
		 	endwhile; // end of the loop. 
	 	?>
	</section>
	<?php if ($loadmore) { 
		wp_localize_script( 'vif-app', esc_attr('thb_portfolioajax_'.$rand), array( 
			'masonry' => true,
			'style' => $style,
			'count' => $source_data['size'],
			'loop' => $source,
		) );
	?>
	<div class="text-center">
		<a class="<?php echo esc_attr(implode(' ', $btn_classes)); ?>" href="#" id="loadmore-<?php echo esc_attr($rand); ?>" data-portfolio-id="<?php echo esc_attr($rand); ?>"><?php esc_html_e( 'Load More', 'viftech' ); ?></a>
	</div>
	<?php } ?>
	 
	<?php 
   $out = ob_get_clean();
   
   wp_reset_postdata();
     
  return $out;
}
thb_add_short('thb_portfolio', 'thb_portfolio');