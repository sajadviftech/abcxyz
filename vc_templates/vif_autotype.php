<?php function vif_autotype( $atts, $content = null ) {
	
  $atts = vc_map_get_attributes( 'vif_autotype', $atts );
  extract( $atts );
  
	$out = $text = '';
	$element_id = uniqid('vif-autotype-');
	$typed_text_safe = vc_value_from_safe($typed_text);
	$typed_text_safe = vif_remove_vc_added_p($typed_text_safe);
	$typed_speed = $typed_speed !== '' ? $typed_speed : 50;
	$class[] = 'vif-autotype';
	$class[] = $extra_class;
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<?php 
			if(preg_match_all("/(\*.*?\*)/is", $typed_text_safe, $entries)) {
				foreach($entries[0] as $entry) {
				  $text = substr($entry, 1, -1);
				  $autotype = explode(';', $text);
				  $autotype = array_map('trim', $autotype);
				  
				  $typed_text_safe = str_replace($entry, '<placeholder>', $typed_text_safe);
				}
			}
			echo str_replace('<placeholder>', '<span class="vif-autotype-entry" data-vif-cursor="'.esc_attr($cursor).'" data-vif-loop="'.esc_attr($loop).'" data-strings="'.esc_attr(json_encode($autotype)).'" data-speed="'.esc_attr($typed_speed).'"></span>', $typed_text_safe);
		?>
		<?php if($vif_animated_color) { ?>
		<style>
			#<?php echo esc_attr($element_id); ?> .vif-autotype-entry {
				color: <?php echo esc_attr($vif_animated_color); ?>;
			}
		</style>
		<?php } ?>
	</div>
  
  <?php
  $out = ob_get_clean();
     
  return $out;
}
vif_add_short('vif_autotype', 'vif_autotype');