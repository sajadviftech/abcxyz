<?php function vif_post( $atts, $content = null ) {
	$style = '';
	$atts = vc_map_get_attributes( 'vif_post', $atts );
	extract( $atts );
	
	$vif_excerpt = $vif_excerpt === 'true' ? true : false;
	$vif_date = $vif_date === 'true' ? true : false;
	
 	$posts = vc_build_loop_query($source);
 	$posts = $posts[1];
 	$style = $style;
 	
 	$classes[] = 'row posts-shortcode';
 	$classes[] = 'posts-'.$style;
 	$classes[] = $style === 'style4' && $vif_carousel !== 'true' ? 'masonry' : '';
 	$classes[] = $vif_carousel === 'true' ? 'vif-carousel overflow-visible' : '';
 	$vif_columns = vif_translate_columns($columns);
 	set_query_var('columns', $vif_columns);
 	ob_start();
 	?>
 	
 	<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-columns="<?php echo esc_attr($columns); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>" data-pagination="true">
		<?php if ($posts->have_posts()) :  while ($posts->have_posts()) : $posts->the_post(); ?>
			<?php 
				set_query_var( 'vif_i', false );
				set_query_var( 'vif_date', $vif_date );
				set_query_var( 'vif_cat', $vif_cat );
				set_query_var( 'vif_excerpt', $vif_excerpt );
				set_query_var( 'vif_animation', $animation );
				get_template_part( 'inc/templates/postbit/'.$style); 
			?>
		<?php endwhile; else : endif; ?>
	</div>
	<?php
	$out = ob_get_clean();
	
	wp_reset_query();
	wp_reset_postdata();
	 
	return $out;
}
vif_add_short('vif_post', 'vif_post');