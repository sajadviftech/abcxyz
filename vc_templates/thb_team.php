<?php function thb_team( $atts, $content = null ) {
	global $thb_columns,$thb_style, $thb_member_style, $thb_team_animation;
	$atts = vc_map_get_attributes( 'thb_team', $atts );
	extract( $atts );
	
	if( ! $image){
		return;
	}
	$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ) );
	
	$description = vc_value_from_safe( $description );
	$description = nl2br( $description );
	
	$el_class[] = 'vif-team-member';
	$el_class[] = 'small-12';
	$el_class[] = $thb_columns;
	$el_class[] = $thb_team_animation;
	$el_class[] = 'columns';
	$el_class[] = $thb_member_style;
	$out ='';
	ob_start();
	
	
	?>
	<div class="<?php echo esc_attr(implode(' ', $el_class)); ?>">
		<div class="team-container <?php if ($thb_member_style == 'member_style2') { ?>thb_3dimg<?php } ?>">
			<?php echo $image['thumbnail']; ?>
			<?php if (in_array($thb_member_style, array('member_style2')) ) { ?>
				<div class="atvImg-layer"><?php echo $image['thumbnail']; ?></div>
			<?php } ?>
			<div class="team-information <?php if ($thb_member_style == 'member_style2') { ?>atvImg-layer<?php } ?>">
				<?php if ($thb_member_style !== 'member_style1') { ?>
					<div class="team-title">
						<h6><?php echo esc_html($name); ?></h6>
						<p class="job-title"><?php echo esc_html($sub_title); ?></p>
					</div>
				<?php } ?>
				<?php if (in_array($thb_member_style, array('member_style2', 'member_style3')) ) { ?>
				<div class="info-container">
				<?php } ?>
				<?php if ($description) { ?>
				<div class="vif-description"><?php echo wp_kses_post($description); ?></div>
				<?php } ?>
				<?php if ($facebook || $instagram || $twitter || $linkedin) { ?>
					<div class="vif-icons">
						<?php if ($facebook) { ?>
							<a href="<?php echo esc_url($facebook); ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
						<?php } ?>
						<?php if ($twitter) { ?>
							<a href="<?php echo esc_url($twitter); ?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
						<?php } ?>
						<?php if ($linkedin) { ?>
							<a href="<?php echo esc_url($linkedin); ?>" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
						<?php } ?>
						<?php if ($instagram) { ?>
							<a href="<?php echo esc_url($instagram); ?>" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
						<?php } ?>
					</div>
				<?php } ?>
				<?php if (in_array($thb_member_style, array('member_style2', 'member_style3')) ) { ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php if ($thb_member_style === 'member_style1') { ?>
			<h6><?php echo esc_html($name); ?></h6>
			<p class="job-title"><?php echo esc_html($sub_title); ?></p>
		<?php } ?>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_team', 'thb_team');