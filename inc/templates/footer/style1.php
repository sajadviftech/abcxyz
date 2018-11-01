<?php
	$footer_classes[] = 'footer';
	$footer_classes[] = ot_get_option('footer_color', 'light');
?>
<!-- Start Footer -->
<footer id="footer" class="<?php echo esc_attr(implode(' ', $footer_classes)); ?>">
	<?php do_action('vif_footer_logo'); ?>
	<?php do_action('vif_page_content', true); ?>
	<div class="row">
		<?php do_action('vif_footer_columns'); ?>
	</div>
</footer>
<!-- End Footer -->