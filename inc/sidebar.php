<?php
function thb_register_sidebars() {
	if ( thb_wc_supported() ) {
		register_sidebar(array('name' => esc_html__('Shop Sidebar', 'viftech'), 'id' => 'vif-shop-filters', 'description' => esc_html__('Sidebar used for filters on the Shop page', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget woo cf %2$s">', 'after_widget' => '</div></div>', 'before_title' => '<h6>', 'after_title' => '</h6><div class="widget_content">'));
	}
	register_sidebar(array('name' => esc_html__('Blog Sidebar', 'viftech'), 'id' => 'blog', 'description' => esc_html__('Blog', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Article Sidebar', 'viftech'), 'id' => 'single', 'description' => esc_html__('Articles', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 1', 'viftech'), 'id' => 'footer1', 'description' => esc_html__('Footer - first column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 2', 'viftech'), 'id' => 'footer2', 'description' => esc_html__('Footer - second column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 3', 'viftech'), 'id' => 'footer3', 'description' => esc_html__('Footer - third column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 4', 'viftech'), 'id' => 'footer4', 'description' => esc_html__('Footer - forth column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 5', 'viftech'), 'id' => 'footer5', 'description' => esc_html__('Footer - fifth column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Footer Column 6', 'viftech'), 'id' => 'footer6', 'description' => esc_html__('Footer - sixth column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Header - Style 8 - Column 1', 'viftech'), 'id' => 'header-style8-1', 'description' => esc_html__('Header - Style 8 - first column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Header - Style 8 - Column 2', 'viftech'), 'id' => 'header-style8-2', 'description' => esc_html__('Header - Style 8 - second column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => esc_html__('Header - Style 8 - Column 3', 'viftech'), 'id' => 'header-style8-3', 'description' => esc_html__('Header - Style 8 - third column', 'viftech'), 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
}
add_action( 'widgets_init', 'thb_register_sidebars' );

function thb_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'thb_remove_recent_comments_style');