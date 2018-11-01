<?php function vif_like_button( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_like_button', $atts );
	extract( $atts );
	$vif_id = get_queried_object_id();
	
	$likes = vif_get_post_likes($vif_id);
	
	
	$class[] = 'vif-like-button';
	$class[] = $alignment;
	$class[] = $likes['like'] ? 'active' : '';
	
	$count = $likes['count'];
	
	ob_start(); ?>
	
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>" data-id="<?php echo esc_attr($vif_id); ?>">
		<div class="heart-wrapper">
		  <div class="heart"></div>
		  <div class="ring"></div>
		  <div class="circles"></div>
		</div>
		<span class="counter like-count" data-count="<?php echo esc_html( $count ); ?>" data-speed="1000">0</span>
	</div>
	
	<?php 
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_like_button', 'vif_like_button');