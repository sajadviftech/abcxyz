<?php function vif_image_slider( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'vif_image_slider', $atts );
  extract( $atts );

  $element_id = 'vif-image-slider-' . mt_rand(10, 999);
  $el_class[] = 'vif-image-slider';
  $el_class[] = 'vif-carousel';
  $el_class[] = 'row';
  $el_class[] = $lightbox;
  $el_class[] = $vif_next_slides;
 	$out ='';
	ob_start();
	$images = explode(',',$images);
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>" data-pagination="<?php echo esc_attr($vif_pagination); ?>" data-navigation="<?php echo esc_attr($vif_navigation); ?>" data-center="<?php echo esc_attr($vif_center); ?>" data-columns="<?php echo esc_attr($vif_columns); ?>" data-infinite="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>">
		<?php
			foreach ($images as $image) {
				$image_link = wp_get_attachment_image_src($image, 'full');
				?>
				<figure class="columns">
					<?php if($lightbox) { ?>
						<a href="<?php echo esc_attr($image_link[0]); ?>">
					<?php } ?>
					<?php echo wp_get_attachment_image($image, 'full'); ?>
					<?php if($lightbox) { ?>
						</a>
					<?php } ?>
				</figure>
				<?php
			}
		?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_image_slider', 'vif_image_slider');