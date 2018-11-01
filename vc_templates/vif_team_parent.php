<?php function vif_team_parent( $atts, $content = null ) {
	global $vif_columns, $vif_border_color, $vif_style, $vif_member_style, $vif_team_animation;
	$atts = vc_map_get_attributes( 'vif_team_parent', $atts );
	extract( $atts );
	
	$vif_team_animation = $animation;
	$element_id = 'vif-team-' . mt_rand(10, 999);
	$el_class[] = 'vif-team-row';
	$el_class[] = $vif_text_color;
	
	$row_class[] = 'row';
	$row_class[] = $vif_style;
	$row_class[] = $vif_margins;
	$out ='';
	ob_start();
	
	
	?>
	<div id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<div class="<?php echo esc_attr(implode(' ', $row_class)); ?>" data-columns="<?php echo esc_attr($vif_columns); ?>" data-pagination="true" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-speed="<?php echo esc_attr($autoplay_speed); ?>">
			<?php echo wpb_js_remove_wpautop($content, false); ?>
		</div>
	</div>
	<style>
		<?php if ($bg_gradient1 && $bg_gradient2) { ?>
		#<?php echo esc_attr($element_id); ?> .team-information {
			<?php echo vif_css_gradient($bg_gradient1, $bg_gradient2, "-135", true); ?>
		}
		<?php } ?>
		<?php if ($box_shadow) { ?>
		#<?php echo esc_attr($element_id); ?> .member_style3:hover .team-container {
			box-shadow: 0 10px 40px <?php echo esc_attr($box_shadow); ?>;
		}
		<?php } ?>
	</style>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_team_parent', 'vif_team_parent');