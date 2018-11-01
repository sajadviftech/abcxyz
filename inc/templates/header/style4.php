<?php 
	$vif_id = get_queried_object_id();
	$logo = ot_get_option('logo', Theme_Config::$vif_theme_directory_uri. 'assets/img/logo.png');
	$logo_light = ot_get_option('logo_light', Theme_Config::$vif_theme_directory_uri. 'assets/img/logo-light.png');
	
	$fixed_header_color = ot_get_option('fixed_header_color', 'dark-header');
	$fixed_header_shadow = ot_get_option('fixed_header_shadow');
	$header_color = vif_get_header_color($vif_id);
	
	$header_class[] = 'header style4';
	$header_class[] = $fixed_header_shadow;
	$header_class[] = $header_color;
?>
<!-- Start Header -->

<header class="<?php echo esc_attr(implode(' ', $header_class)); ?>" data-header-color="<?php echo esc_attr($header_color); ?>" data-fixed-header-color="<?php echo esc_attr($fixed_header_color); ?>">
	<div class="row align-middle">
		<div class="small-12 columns">
			<div class="logo-holder">
				<a href="<?php echo esc_url(home_url()); ?>" class="logolink" title="<?php bloginfo('name'); ?>">
					<img src="<?php echo esc_url($logo); ?>" class="logoimg logo-dark" alt="<?php bloginfo('name'); ?>"/>
					<img src="<?php echo esc_url($logo_light); ?>" class="logoimg logo-light" alt="<?php bloginfo('name'); ?>"/>
				</a>
			</div>
			<?php get_template_part( 'inc/templates/header/full-menu' ); ?> 
			<div>
				<?php do_action( 'vif_secondary_area' ); ?>
			</div>
		</div>
	</div>
</header>
<!-- End Header -->