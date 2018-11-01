<?php function vif_clients( $atts, $content = null ) {
	global $vif_columns, $vif_border_color, $vif_style, $vif_clients_animation;
	$atts = vc_map_get_attributes( 'vif_clients', $atts );
	extract( $atts );
	
	
	if( ! $image){
		return;
	}
	$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ) );
	
	$link = vc_build_link($link);
	$link_to = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'] ? $link['target'] : '_self';	
	
	if($link['url']) {
		$el_class[] = 'has-link';
	}
	
	$el_class[] = 'vif-client';
	if ($vif_style !== 'slick') {
	$el_class[] = $vif_columns;
	}
	$el_class[] = 'columns';
	$el_class[] = $vif_clients_animation;
	$out ='';
	ob_start();
	
	
	?>
	<div class="<?php echo esc_attr(implode(' ', $el_class)); ?>" style="border-color: <?php echo esc_attr($vif_border_color); ?>">
		<?php if ($vif_style == 'style3') { ?>
			<?php if($link_to) { ?>
				<a href="<?php echo esc_url($link_to); ?>" target="<?php echo esc_attr($a_target); ?>"><?php echo $image['thumbnail']; ?></a>
			<?php } else { ?>
				<?php echo $image['thumbnail']; ?>
			<?php } ?>
			<?php if($a_title) { ?><span class="client-title"><?php echo esc_html($a_title); ?></span><?php } ?>
		<?php } else { ?>
			<?php if($link_to) { ?>
				<a href="<?php echo esc_url($link_to); ?>" target="<?php echo esc_attr($a_target); ?>"><?php echo $image['thumbnail']; ?></a>
			<?php } else { ?>
				<?php echo $image['thumbnail']; ?>
			<?php } ?>
		<?php } ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_clients', 'vif_clients');