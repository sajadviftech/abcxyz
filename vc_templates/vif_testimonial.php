<?php function vif_testimonial( $atts, $content = null ) {
	global $vif_testimonial_columns, $vif_style;
	$atts = vc_map_get_attributes( 'vif_testimonial', $atts );
	extract( $atts );

	$author_image = wpb_getImageBySize( array( 'attach_id' => $author_image, 'class' => 'author_image', 'thumb_size' => array('140','140') ) );
	
	$image = wpb_getImageBySize( array( 'attach_id' => $review_image, 'class' => 'review_image', 'thumb_size' => 'full' ) );
	
	/* Full Link */
	$url = ( $link == '||' ) ? '' : $link;
	$url_btn = vc_build_link( $url  );
	
	$url_to = $url_btn['url'];
	$url_title = $url_btn['title'];
	$url_target = $url_btn['target'] ? $url_btn['target'] : '_self';	
	
	$el_class[] = 'vif-testimonial';
	$el_class[] = $author_image ? 'has-avatar' : '';
	$vif_testimonial_columns = in_array($vif_style, array('style3', 'style6')) ? $vif_testimonial_columns : '';
	$out ='';
	ob_start();
	
	
	
	?>
	<div class="small-12 <?php echo esc_attr($vif_testimonial_columns); ?> columns">
		<?php if ($vif_style == 'style5') { ?>
			<div class="row no-padding">
				<div class="small-12 medium-4 small-order-2 medium-order-1 columns">
		<?php } ?>
					<div class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
						<?php if ($vif_review) { 
							$percentage = ($vif_review_stars / 5 ) * 100;
							?>
							<div class="star-rating"><span style="width: <?php echo esc_attr($percentage); ?>%"></span></div>
						<?php } ?>
						<?php if ($quote_title) { ?>
						<h4><?php echo esc_html($quote_title); ?></h4>
						<?php } ?>
						<blockquote><?php echo wpautop($quote); ?></blockquote>
						<?php if($author_name) { ?>
							<?php echo $author_image['thumbnail']; ?>
							<div>
								<cite><?php echo esc_html($author_name); ?></cite>
							<span class="title"><?php echo esc_html($author_title); ?></span>
							</div>
						<?php } ?>
					</div>
		<?php if ($vif_style == 'style5') { ?>
				</div>
				<div class="small-12 medium-8 small-order-1 medium-order-2 columns">
					<?php echo $image['thumbnail']; ?>
				</div>
				<?php if ($url_to) { ?>
					<a href="<?php echo esc_url($url_to); ?>" target="<?php echo esc_attr($url_target); ?>" title="<?php echo esc_attr($url_title); ?>" class="review-full-link"></a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
	
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_testimonial', 'vif_testimonial');