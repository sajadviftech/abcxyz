<?php 
	$thb_id = get_queried_object_id();
	$logo = ot_get_option('logo', Theme_Config::$thb_theme_directory_uri. 'assets/img/logo.png');
	$logo_light = ot_get_option('logo_light', Theme_Config::$thb_theme_directory_uri. 'assets/img/logo-light.png');
	
	$fixed_header_color = ot_get_option('fixed_header_color', 'dark-header');
	$fixed_header_shadow = ot_get_option('fixed_header_shadow');
	$header_color = thb_get_header_color($thb_id);
	
	$header_class[] = 'header style1';
	$header_class[] = $fixed_header_shadow;
	$header_class[] = $header_color;
	
?>
<!-- Start Header -->

<header class="<?php echo esc_attr(implode(' ', $header_class)); ?>" data-header-color="<?php echo esc_attr($header_color); ?>" data-fixed-header-color="<?php echo esc_attr($fixed_header_color); ?>">
	<div class="header_overlay_menu">
		<div class="header_overlay_padding">
			<div class="row">
				<div class="small-12 columns">
					<div class="logo-holder">
						<a href="<?php echo esc_url(home_url()); ?>" class="logolink" title="<?php bloginfo('name'); ?>">
							<img src="<?php echo esc_url($logo); ?>" class="logoimg logo-dark" alt="<?php bloginfo('name'); ?>"/>
						</a>
					</div>
					<div class="header_overlay_menu_holder">
						<?php 
							if ( has_nav_menu('nav-menu') ) {
								wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 2, 'container' => false, 'link_after' => '<span></span>', 'menu_class' => 'vif-header-menu' ) ); 
							}
						?>
						<?php if ( has_nav_menu('secondary-menu') ) { ?>
							<div class="vif-secondary-menu-container">
								<span class="vif-secondary-line"></span>
								<?php wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'depth' => 1, 'container' => false ) ); ?>
								<?php do_action( 'thb_social_links', ot_get_option('fullmenu_social_link'), true ); ?>
							</div>	
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row align-middle">
		<div class="small-12 columns">
			<div class="logo-holder">
				<a href="<?php echo esc_url(home_url()); ?>" class="logolink" title="<?php bloginfo('name'); ?>">
					<img src="<?php echo esc_url($logo); ?>" class="logoimg logo-dark" alt="<?php bloginfo('name'); ?>"/>
					<img src="<?php echo esc_url($logo_light); ?>" class="logoimg logo-light" alt="<?php bloginfo('name'); ?>"/>
				</a>
			</div>
			<div class="style1-holder">
				<?php do_action( 'thb_mobile_toggle', false); ?>
				<?php do_action( 'thb_secondary_area', true); ?>
			</div>
		</div>
		
	</div>
</header>
<!-- End Header -->