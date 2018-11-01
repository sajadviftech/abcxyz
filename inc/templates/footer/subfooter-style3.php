<?php
	$subfooter_classes[] = 'subfooter';
	$subfooter_classes[] = 'style1';
	$subfooter_classes[] = ot_get_option('footer_color', 'light');
	
	$full_menu_hover_style = ot_get_option('full_menu_hover_style', 'vif-standard');
	$subfooter_social_link = ot_get_option('subfooter_social_link');
	$subfooter_menu = ot_get_option('subfooter_menu');
?>
<!-- Start subfooter -->
<div class="<?php echo esc_attr(implode(' ', $subfooter_classes)); ?>">
	<div class="row">
		<div class="small-12 medium-6 columns text-center medium-text-left">
			<?php echo wp_kses_post(ot_get_option('subfooter_text')); ?>
		</div>
		<div class="small-12 medium-6 columns text-center medium-text-right">
			<?php if ($subfooter_menu) { wp_nav_menu( array( 'menu' => ot_get_option('subfooter_menu'), 'depth' => 1, 'menu_class' => 'vif-full-menu '. $full_menu_hover_style ) ); } ?>
			<?php do_action('vif_footer_payment'); ?>
		</div>
	</div>
</div>
<!-- End Subfooter -->