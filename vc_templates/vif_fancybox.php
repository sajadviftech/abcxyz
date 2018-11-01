<?php function vif_fancybox( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_fancybox', $atts );
	extract( $atts );
	
	$element_id = uniqid('vif-fancy-box-');
	
	$el_class[] = 'vif-fancy-box';
	$el_class[] = $box_shadow;
	$el_class[] = $vif_text_color;
	$el_class[] = $style;
	$el_class[] = $extra_class;
	$el_class[] = $vif_text_alignment;
	$el_class[] = $animation;
	$el_class[] = in_array($style, array('fancy-style2')) ? 'vif_3dimg' : '';
	
	$btn_class[] = 'button small style2';
	$btn_class[] = $vif_text_color === 'fancy-light' ? 'white' : 'black';
	$btn_class[] = 'pill-radius';
	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link  );
	
	$link_to = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'] ? $link['target'] : '_self';	
	
	$el_class[] = $link['url'] ? 'has-link' : '';
	$out ='';
	ob_start();
	
	
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<?php if ($link && $link_to) { ?>
		<a href="<?php echo esc_attr($link_to); ?>" class="vif-fancy-link <?php if (in_array($style, array('fancy-style2')) ) { ?>atvImg-layer<?php } ?>">
			<?php if ('fancy-style1' === $style) { ?>
				<div class="vif-animated-arrow circular arrow-right"><?php get_template_part('assets/img/svg/prev_arrow.svg'); ?></div>
			<?php } ?>
			<?php if ('fancy-style6' === $style) { ?>
				<div class="<?php echo esc_attr(implode(' ', $btn_class)); ?>"><span><?php echo esc_attr($a_title); ?></span></div>
			<?php } ?>
		</a>
		<?php } ?>
		<div class="vif-fancy-image-container <?php if (in_array($style, array('fancy-style2')) ) { ?>atvImg-layer<?php } ?>">
			<div class="vif-fancy-image">
				<?php echo wp_get_attachment_image($image, 'viftech-tall-x3'); ?>
			</div>
		</div>
		<?php if (in_array($style, array('fancy-style1', 'fancy-style4')) ) { ?>
		<div class="vif-fancy-hover"></div>
		<?php } ?>
		<div class="vif-fancy-content <?php if (in_array($style, array('fancy-style2')) ) { ?>atvImg-layer<?php } ?>">
			<?php if ($icon && $style !== 'fancy-style5') { get_template_part( 'assets/svg/'.$icon ); } ?>
			<?php echo wp_kses_post(force_balance_tags($content)); ?>
		</div>
		<style>
			#<?php echo esc_attr($element_id); ?>,
			#<?php echo esc_attr($element_id); ?>.fancy-style5 .vif-fancy-image-container,
			#<?php echo esc_attr($element_id); ?> .atvImg-container,
			#<?php echo esc_attr($element_id); ?> .atvImg-layers {
				min-height: <?php echo esc_attr($height); ?>;
			}
			<?php if ($border_radius) { ?>
				#<?php echo esc_attr($element_id); ?>,
				#<?php echo esc_attr($element_id); ?> .vif-fancy-image-container,
				#<?php echo esc_attr($element_id); ?> .vif-fancy-image,
				#<?php echo esc_attr($element_id); ?> .vif-fancy-image img,
				#<?php echo esc_attr($element_id); ?> .vif-fancy-content,
				#<?php echo esc_attr($element_id); ?> .vif-fancy-hover {
					border-radius: <?php echo esc_attr($border_radius); ?>;
				}
			<?php } ?>
			<?php if ($style === 'fancy-style1' || $style === 'fancy-style4') { ?>
				<?php if ($bg_gradient1 && $bg_gradient2) { ?>
					#<?php echo esc_attr($element_id); ?> .vif-fancy-hover {
						<?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", true); ?>
					}
				<?php } ?>
			<?php } ?>
		</style>
	</div>
	
	<?php
	
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_fancybox', 'vif_fancybox');