<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_site_icon(); ?>
	<?php 
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>
<body <?php body_class(); ?>>
<?php do_action('vif_before_wrapper'); ?>
 <!-- Start Wrapper -->
<div id="wrapper" class="vif-page-transition-<?php echo esc_attr(ot_get_option('page_transition', 'on')); ?>">
	<?php do_action('vif_mobile_menu'); ?>
	
	<?php do_action( 'vif_side_cart' ); ?>
	
	<?php do_action( 'vif_shop_filters' ); ?>
	
	<?php get_template_part( 'inc/templates/header/'.ot_get_option('header_style', 'style1').''); ?>
	
	<div role="main">
		<div class="header-spacer"></div>

