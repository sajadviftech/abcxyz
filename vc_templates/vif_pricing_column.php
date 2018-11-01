<?php function vif_pricing_column( $atts, $content = null ) {
	global $vif_pricing_columns;
	global $count;
	$atts = vc_map_get_attributes( 'vif_pricing_column', $atts );
	extract( $atts );
	

	
	$content = vc_value_from_safe( $content );
	$el_class[] = 'vif-pricing-column';
	$el_class[] = 'small-12';
	$el_class[] = $vif_pricing_columns;
	$el_class[] = 'columns';
	$el_class[] = 'highlight-'.$highlight;
	$el_class[] = 'style '.$styles;
	if($remove_spaces) {
		$el_class[] = 'remove-spaces';
	}
	$el_class[] = 'style '.$h_f_color;
	$out ='';
	ob_start();
	
	/* Button */
	$link = ( $link == '||' ) ? '' : $link;
	$link_btn = vc_build_link( $link  );
	
	$link_to = $link_btn['url'];
	$a_title = $link_btn['title'];
	$a_target = $link_btn['target'] ? $link_btn['target'] : '_self';	
	if($as_header == true) {
		$el_class[] = 'as_header';
	}
	
	if($h_f_bg) {
	?>

	<style>
	.vif-pricing-table .style-1[data-bg="<?php echo $h_f_bg; ?>"] .vif_pricing_head,
	.vif-pricing-table .style-1[data-bg="<?php echo $h_f_bg; ?>"] .pricinf_footer {
		background: <?php echo $h_f_bg; ?>;
	}
	.vif-pricing-table .style-1[data-bg="<?php echo $h_f_bg; ?>"] {
		 border: 1px solid <?php echo  $h_f_bg; ?>
	}
	
	</style>
<?php } ?>
	<div class="<?php echo esc_attr(implode(' ', $el_class)); ?>"data-bg="<?php echo $h_f_bg; ?>" >
		<div class="pricing-container <?php if ($link) { ?>has-button<?php } ?>">
			<div class="vif_pricing_head">
				<div class="inner">
					<?php if ($title) { ?>
					<h4><?php echo esc_html($title); ?></h4>
					<?php } ?>
					
					<?php if ($price) { ?>
						<h3><span><?php echo $symbol; ?> </span><?php echo esc_html($price); ?></h3>
					<?php } ?>
					
					<?php if ($sub_title) { ?>
						<p class="pricing_sub_title"><?php echo esc_html($sub_title); ?></p>
					<?php } ?>
				</div>
			</div>
			<div class="pricing-description">
				<div class="inner">
					<?php if ($content) { echo do_shortcode($content); } ?>
				</div>
			</div>
			<?php if ($link) { ?>
			<div class="pricinf_footer">
					<a class="btn" href="<?php echo esc_attr($link_to); ?>" target="<?php echo sanitize_text_field( $a_target ); ?>" role="button" title="<?php echo esc_attr( $a_title ); ?>"><?php echo esc_attr($a_title); ?></a>
			</div>
			<?php } ?>
		</div>
		
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_pricing_column', 'vif_pricing_column');