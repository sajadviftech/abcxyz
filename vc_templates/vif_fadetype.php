<?php function vif_fadetype( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'vif_fadetype', $atts );
  extract( $atts );
  
	$out = $text = '';
	$element_id = uniqid('vif-fadetype-');
	$fade_text_safe = vc_value_from_safe($fade_text);
	$fade_text_safe = vif_remove_vc_added_p($fade_text_safe);
	$class[] = 'vif-fadetype';
	$class[] = $extra_class;
	ob_start();
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<?php 
		if(preg_match_all("/(\*.*?\*)/is", $fade_text_safe, $entries)) {
			foreach($entries[0] as $entry) {
			  $text = substr($entry, 1, -1);
			  
			  $fade_text_safe = str_replace($entry, '<placeholder>', $fade_text_safe);

			}
			echo str_replace('<placeholder>', '<span class="vif-fadetype-entry">'.$text.'</span>', $fade_text_safe);
		}
		
		?>
	</div>
  
  <?php
  $out = ob_get_clean();
     
  return $out;
}
vif_add_short('vif_fadetype', 'vif_fadetype');