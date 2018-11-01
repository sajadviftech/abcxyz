<?php function vif_button( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'vif_button', $atts );
  extract( $atts );
	
	$element_id = uniqid("vif-button-");
	$full_width = $full_width === "true" ? 'full' : '';
	
	$link = ( $link == '||' ) ? '' : $link;
	$link = vc_build_link( $link  );
	
	$link_to = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'] ? $link['target'] : '_self';	
	
	$class[] = 'btn';
	$class[] = $style;
	$class[] = $size;
	$class[] = $full_width;
	$class[] = $color;
	$class[] = $border_radius;
	$class[] = $animation;
	$class[] = $extra_class;
	$class[] = $vif_shadow;
	$class[] = $add_arrow ? 'arrow-enabled' : '';
	$out = '';
	
	ob_start();
	?>
	<a id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $class)); ?>" href="<?php echo esc_attr($link_to); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" role="button" title="<?php echo esc_attr( $a_title ); ?>"><span><?php echo esc_attr($a_title); ?></span><?php if ($add_arrow && $style !== 'style4') { get_template_part('assets/img/svg/next_arrow.svg'); } ?></a>
  <style>
  	<?php if ($color === 'gradient') { ?>
		<?php if ($bg_gradient1 && $bg_gradient2) { ?>
			<?php if ($style === 'style1') { ?>
			/* Style1 */
			#<?php echo esc_attr($element_id); ?>.style1 {
				<?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", true); ?>
			}
			#<?php echo esc_attr($element_id); ?>.style1:after {
				background: <?php echo esc_attr($bg_gradient2); ?>;
			}
			<?php } ?>
			<?php if ($style === 'style2') { ?>
			/* Style2 */
			#<?php echo esc_attr($element_id); ?>.style2:after {
				<?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", true); ?>
			}
			#<?php echo esc_attr($element_id); ?>.style2:not(:hover) {
				color: <?php echo esc_attr($bg_gradient2); ?>;
			}
			#<?php echo esc_attr($element_id); ?>.style2:before {
				background: <?php echo esc_attr($st_color); ?>;
			}
			<?php } ?>
			<?php if ($style === 'style3') { ?>
			/* Style3 */
			#<?php echo esc_attr($element_id); ?>.style3:after {
				<?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", true); ?>
			}
			#<?php echo esc_attr($element_id); ?>.style3:not(:hover) {
				color: <?php echo esc_attr($bg_gradient2); ?>;
			}
			#<?php echo esc_attr($element_id); ?>.style3:before {
				background: <?php echo esc_attr($st_color); ?>;
			}
			<?php } ?>
			<?php if ($style === 'style4') { ?>
			/* Style4 */
			#<?php echo esc_attr($element_id); ?>.style4 {
				border-image: <?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", false); ?> 1;
			}
			#<?php echo esc_attr($element_id); ?>.style4 {
				color: <?php echo esc_attr($bg_gradient2); ?>;
			}
			#<?php echo esc_attr($element_id); ?>.style4:after {
				background: <?php echo esc_attr($bg_gradient2); ?>;
			}
			<?php } ?>
		<?php } ?>
		<?php } ?>
  </style>
  <?php
  $out = ob_get_clean();
     
  return $out;
}
vif_add_short('vif_button', 'vif_button');