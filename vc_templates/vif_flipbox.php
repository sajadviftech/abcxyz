<?php function vif_flipbox( $atts, $content = null ) {
	$vif_margins = $vif_arrow_color = '';
	$vif_pagination = 'true';
  $atts = vc_map_get_attributes( 'vif_flipbox', $atts );
  extract( $atts );

  $element_id = uniqid('vif-flip-box-');
  $el_class[] = 'vif-flip-box';
  $el_class[] = 'vif-flip-box-front-'.$front_text_color;
  $el_class[] = 'vif-flip-box-back-'.$back_text_color;
  $el_class[] = $extra_class;
  $front_bg_image = wpb_getImageBySize( array( 'attach_id' => $front_bg_image, 'thumb_size' => 'full' ) );
  $back_bg_image  = wpb_getImageBySize( array( 'attach_id' => $back_bg_image, 'thumb_size' => 'full' ) );
  
 	$out ='';
	ob_start();
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<div class="vif-flip-box-front vif-flip-box-side">
			<div class="vif-flip-box-inner">
				<?php if ($icon_front) { get_template_part( 'assets/svg/'.$icon_front ); } ?>
				<div>
					<?php echo wp_kses_post(vif_remove_p($front_content)); ?>
				</div>
			</div>
		</div>
		<div class="vif-flip-box-back vif-flip-box-side">
			<div class="vif-flip-box-inner">
				<div>
					<?php echo wp_kses_post(vif_remove_p($back_content)); ?>
				</div>
			</div>
		</div>
		<style>
			#<?php echo esc_attr($element_id); ?> {
				min-height: <?php echo esc_html($min_height); ?>px;
			}
			#<?php echo esc_attr($element_id); ?> .vif-flip-box-front {
				background-image: url(<?php echo esc_html($front_bg_image['p_img_large'][0]); ?>);
			}
			#<?php echo esc_attr($element_id); ?> .vif-flip-box-back {
				background-image: url(<?php echo esc_html($back_bg_image['p_img_large'][0]); ?>);
			}
			<?php if ($bg_gradient1 && $bg_gradient2) { ?>
				#<?php echo esc_attr($element_id); ?> .vif-flip-box-front {
					<?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", true); ?>
				}
			<?php } ?>
			<?php if ($bg_gradient3 && $bg_gradient4) { ?>
				#<?php echo esc_attr($element_id); ?> .vif-flip-box-back {
					<?php echo vif_css_gradient($bg_gradient3, $bg_gradient4, "-135", true); ?>
				}
			<?php } ?>
		</style>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_flipbox', 'vif_flipbox');