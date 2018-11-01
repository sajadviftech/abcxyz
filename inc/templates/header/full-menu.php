<?php $full_menu_hover_style = ot_get_option('full_menu_hover_style', 'vif-standard'); ?>
<!-- Start Full Menu -->
<nav class="full-menu" id="full-menu">
	<?php if (has_nav_menu('nav-menu')) { wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 4, 'container' => false, 'menu_class' => 'vif-full-menu '.$full_menu_hover_style, 'walker' => new vif_fullmenu ) ); }?>
		<?php do_action( 'vif_social_links', ot_get_option('fullmenu_social_link'), true ); ?>
</nav>
<!-- End Full Menu -->