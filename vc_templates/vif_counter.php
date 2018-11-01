<?php function vif_counter( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_counter', $atts );
	extract( $atts );
	$speed = $speed === '' ? 2000 : $speed;
	$out = '';
	$element_id = uniqid('vif-counter-');
	$description = vc_value_from_safe( $description );
	
	$el_class[] = 'vif-counter';
	$el_class[] = $style;
	$el_class[] = $alignment;
	
	$image = '';
	if ($icon_image) {
		$img = wpb_getImageBySize( array( 'attach_id' => $icon_image, 'thumb_size' => 'full', 'class' => 'vif_image' ) );
	}
	
	ob_start();
	?>
	<div class="<?php echo esc_attr(implode(' ', $el_class)); ?>" id="<?php echo esc_attr($element_id); ?>">
		<?php if ($style === 'counter-style3') { ?>
			<?php if ($icon || $icon_image) { ?>
				<figure>
					<?php if ($icon_image) { ?>
						<div class="counter-image">
							<?php echo $img['thumbnail']; ?>
						</div>
					<?php } else { ?>
						<?php get_template_part( 'assets/svg/'.$icon ); ?>
					<?php } ?>
				</figure>
			<?php } ?>
			<div class="counter-container">
				<h6><?php echo esc_attr($heading); ?></h6>
				<?php if ($description) { ?>
				<div class="vif-description"><p><?php echo wp_kses_post($description); ?></p></div>
				<?php } ?>
				<div class="h1" data-count="<?php echo esc_attr($counter); ?>" data-speed="<?php echo esc_attr($speed); ?>">0</div>
			</div>
		<?php } else { ?>
			<div class="counter-container">
				<div class="h1" data-count="<?php echo esc_attr($counter); ?>" data-speed="<?php echo esc_attr($speed); ?>">0</div>
				<h6><?php echo esc_attr($heading); ?></h6>
			</div>
			<?php if ($description) { ?>
			<div class="vif-description"><p><?php echo wp_kses_post($description); ?></p></div>
			<?php } ?>
			<?php if ($icon || $icon_image) { ?>
				<figure>
					<?php if ($icon_image) { ?>
						<div class="counter-image">
							<?php echo $img['thumbnail']; ?>
						</div>
					<?php } else { ?>
						<?php get_template_part( 'assets/svg/'.$icon ); ?>
					<?php } ?>
				</figure>
			<?php } ?>
		<?php } ?>
		<style>
			#<?php echo esc_attr($element_id); ?> .odometer.odometer-auto-theme.odometer-animating-up .odometer-ribbon-inner, 
			#<?php echo esc_attr($element_id); ?> .odometer.odometer-theme-minimal.odometer-animating-up .odometer-ribbon-inner {
				transition: transform <?php echo esc_attr($speed / 1000); ?>s;
			}
			<?php if ($vif_counter_color) { ?>
				#<?php echo esc_attr($element_id); ?>.vif-counter .h1 {
					color: <?php echo esc_attr($vif_counter_color); ?>;
				}
			<?php } ?>
			<?php if ($vif_heading_color) { ?>
				#<?php echo esc_attr($element_id); ?>.vif-counter h6 {
					color: <?php echo esc_attr($vif_heading_color); ?>;
				}
			<?php } ?>
			<?php if ($vif_icon_color) { ?>
				#<?php echo esc_attr($element_id); ?>.vif-counter figure svg path, 
				#<?php echo esc_attr($element_id); ?>.vif-counter figure svg circle, 
				#<?php echo esc_attr($element_id); ?>.vif-counter figure svg rect, 
				#<?php echo esc_attr($element_id); ?>.vif-counter figure svg ellipse {
					stroke: <?php echo esc_attr($vif_icon_color); ?>;
				}
			<?php } ?>
			<?php if ($icon_image_width && $icon_image) { ?>
				#<?php echo esc_attr($element_id); ?>.vif-counter .counter-image img {
					width: <?php echo esc_attr($icon_image_width); ?>px;
					height: auto;
				}
			<?php } ?>
		</style>
	</div>
	<?php
	
  $out = ob_get_clean();
     
  return $out;
}
vif_add_short('vif_counter', 'vif_counter');