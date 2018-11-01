<?php function vif_iconbox( $atts, $content = null ) {
	$animation = 'true';
	$vif_icon_color = '';
	$alignment = 'text-center';
  $atts = vc_map_get_attributes( 'vif_iconbox', $atts );
  extract( $atts );
    
 	$out ='';
	ob_start();
	$element_id = uniqid("vif-iconbox-");
	$link = vc_build_link($link);
	
	$link_to = $link['url'];
	$a_title = $link['title'] ? $link['title'] : esc_html__('Read More', 'viftech');
	$a_target = $link['target'] ? $link['target'] : '_self';	
	
	$el = 'div';
	if($link_to) {
		$el = 'a';
		$el_class[] = 'has-link';
	}
	$el_class[] = 'vif-iconbox';
	$el_class[] = $type;
	$el_class[] = $extra_class;
	$el_class[] = $icon_image_hover ? 'has-hover-image' : '';
	$el_class[] = in_array($type, array('top type1', 'top type2', 'top type3', 'top type4')) ? $alignment : '';
	$el_class[] = $animation ? 'animation-'.$animation : 'animation-off';
	
	$description = vc_value_from_safe( $description );
	$description = nl2br( $description );
	
	$image = '';
	if ($icon_image) {
		$img = wpb_getImageBySize( array( 'attach_id' => $icon_image, 'thumb_size' => 'full', 'class' => 'vif_image' ) );
	}
	if ($icon_image_hover) {
		$img_hover = wpb_getImageBySize( array( 'attach_id' => $icon_image_hover, 'thumb_size' => 'full', 'class' => 'vif_image_hover' ) );
	}
	$bg = '';
	if(!empty($vif_icon_bgcolor)) {
		$bg= 'background:'.$vif_icon_bgcolor;
	}else{
		$b = '';
	}

	if(!empty($vif_box_color)) {
		echo '<style>
			#'.$element_id.' {
				background: '.$vif_box_color.';
			}
		</style>';
	}
	?>

	<<?php echo esc_attr($el); ?> id="<?php echo esc_attr($element_id); ?>" class="<?php echo esc_attr(implode(' ', $el_class)); ?>" href="<?php echo esc_url($link_to); ?>" target="<?php echo esc_attr($a_target); ?>" data-animation_speed="<?php echo esc_attr($animation_speed); ?>">
		<?php if ($icon_image || $icon) { ?>
		<figure style="<?php echo $bg; ?>">
			<?php if ($icon_image) { ?>
				<div class="iconbox-image">
					<?php echo $img['thumbnail']; ?>
					<?php if ($icon_image_hover) { echo $img_hover['thumbnail'];  }?>
				</div>
			<?php } else {
				get_template_part( 'assets/svg/'.$icon ); 
			} ?>
			<?php if ($type == 'top type2') {?>
			<?php if ($heading) { ?><h5><?php echo wp_kses_post($heading); ?></h5><?php } ?>
			<?php } ?>
			<?php if (in_array($type, array('top type1', 'top type2'))) {?>
				<span class="vif-iconbox-line"></span>
			<?php } ?>
		</figure>
		<?php } ?>
		<div class="iconbox-content">
			<?php if ($heading && $type !== 'top type2') { ?><h5><?php echo esc_html($heading); ?></h5><?php } ?>
			<?php echo wp_kses_post(wpautop($description)); ?>
			<?php if($link_to) { ?>
				<span class="vif-read-more btn-text <?php echo esc_attr($style); ?>"><?php if ($style === 'style3') { ?><strong class="circle-btn"></strong><?php } ?><span><?php echo esc_attr($a_title); ?></span><?php if ($style === 'style4') { ?><div class="arrow"><div><?php get_template_part('assets/img/svg/next_arrow.svg'); ?><?php get_template_part('assets/img/svg/next_arrow.svg'); ?></div></div><?php } ?><?php if ($style === 'style5') { ?><div class="arrow"><?php get_template_part('assets/img/svg/next_arrow.svg'); ?></div><?php } ?></span>
			<?php } ?>
		</div>
		<style>
			<?php if ($vif_icon_color) { ?>
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg path, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg circle, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg rect, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure svg ellipse {
				stroke: <?php echo esc_attr($vif_icon_color); ?>;
			}
			<?php } ?>
			<?php if ($icon_image_width && $icon_image) { ?>
				#<?php echo esc_attr($element_id); ?>.vif-iconbox .iconbox-image img {
					width: <?php echo esc_attr($icon_image_width); ?>px;
					height: auto;
				}
			<?php } ?>
			<?php if ($vif_heading_color) { ?>
			#<?php echo esc_attr($element_id); ?>.vif-iconbox .iconbox-content h5,
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure h5 {
				color: <?php echo esc_attr($vif_heading_color); ?>;
			}
			<?php } ?>
			<?php if ($vif_text_color) { ?>
			#<?php echo esc_attr($element_id); ?>.vif-iconbox .iconbox-content p,
			#<?php echo esc_attr($element_id); ?>.vif-iconbox .iconbox-content span {
				color: <?php echo esc_attr($vif_text_color); ?>;
			}
		
			#<?php echo esc_attr($element_id); ?>.vif-iconbox .iconbox-content svg,
			#<?php echo esc_attr($element_id); ?>.vif-iconbox .iconbox-content svg .bar {
				fill: <?php echo esc_attr($vif_text_color); ?>;
			}
			#<?php echo esc_attr($element_id); ?>.vif-iconbox .btn-text.style2:before, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox .btn-text.style2:after {
				background: <?php echo esc_attr($vif_text_color); ?>;
			}
			<?php } ?>
			/* Hover */
			<?php if ($vif_icon_color_hover) { ?>
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover figure svg path, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover figure svg circle, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover figure svg rect, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover figure svg ellipse {
				stroke: <?php echo esc_attr($vif_icon_color_hover); ?>;
			}
			<?php } ?>
			<?php if ($vif_heading_color_hover) { ?>
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover .iconbox-content h5,
			#<?php echo esc_attr($element_id); ?>.vif-iconbox figure h5 {
				color: <?php echo esc_attr($vif_heading_color_hover); ?>;
			}
			<?php } ?>
			<?php if ($vif_text_color_hover) { ?>
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover .iconbox-content p,
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover .iconbox-content span {
				color: <?php echo esc_attr($vif_text_color_hover); ?>;
			}
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover .iconbox-content svg,
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover .iconbox-content svg .bar {
				fill: <?php echo esc_attr($vif_text_color_hover); ?>;
			}
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover .btn-text.style2:before, 
			#<?php echo esc_attr($element_id); ?>.vif-iconbox:hover .btn-text.style2:after {
				background: <?php echo esc_attr($vif_text_color_hover); ?>;
			}
			<?php } ?>
		</style>
	</<?php echo esc_attr($el); ?>>
	<?php
	
	$out = ob_get_clean();
	   
	return $out;
}
vif_add_short('vif_iconbox', 'vif_iconbox');