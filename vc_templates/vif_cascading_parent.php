<?php function vif_cascading_parent( $atts, $content = null ) {
	
	ob_start(); ?>
	<div class="vif_cascading_images">
		<?php echo wpb_js_remove_wpautop($content, false); ?>
	</div>
	<?php 
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_cascading_parent', 'vif_cascading_parent');