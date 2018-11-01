<?php function vif_gradienttype( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'vif_gradienttype', $atts );
  extract( $atts );
  
	$out = $text = '';
	$element_id = uniqid('vif-gradienttype-');
	$gradient_text_safe = vc_value_from_safe($gradient_text);
	$gradient_text_safe = vif_remove_vc_added_p($gradient_text_safe);
	$class[] = 'vif-gradienttype';
	$class[] = $extra_class;
	$class[] = $animation;
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<?php echo wp_kses_post($gradient_text_safe); ?>
		<style>
		<?php if ($bg_gradient1 && $bg_gradient2) { ?>
			#<?php echo esc_attr($element_id); ?> * {
				<?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", true); ?>
			}
		<?php } ?>
		</style>
	</div>
  
  <?php
  $out = ob_get_clean();
     
  return $out;
}
vif_add_short('vif_gradienttype', 'vif_gradienttype');