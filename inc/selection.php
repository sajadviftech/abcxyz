<?php function vif_selection() {
	$id = get_queried_object_id();
	ob_start();
?>
/* Options set in the admin page */

/* Font Families */
<?php if ($primary_font = ot_get_option('primary_font')) { ?>
h1, .h1, .vif-countdown .vif-countdown-ul li .timestamp, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
	<?php vif_typeecho($primary_font); ?>		
}
<?php } ?>
<?php if ($secondary_font = ot_get_option('secondary_font')) { ?>
body {
	<?php vif_typeecho($secondary_font); ?>		
}
<?php } ?>
<?php if ($fullmenu_font = ot_get_option('fullmenu_font')) { ?>
.vif-full-menu {
	<?php vif_typeecho($fullmenu_font); ?>		
}
<?php } ?>
<?php if ($mobilemenu_font = ot_get_option('mobilemenu_font')) { ?>
.vif-mobile-menu,
.vif-secondary-menu {
	<?php vif_typeecho($mobilemenu_font); ?>		
}
<?php } ?>
<?php if ($em_font = ot_get_option('em_font')) { ?>
em {
	<?php vif_typeecho($em_font); ?>		
}
<?php } ?>
<?php if ($button_font = ot_get_option('button_font')) { ?>
input[type="submit"],
submit,
.button,
.btn,
.btn-text {
	<?php vif_typeecho($button_font); ?>		
}
<?php } ?>
/* Typography */
<?php if ($body_type = ot_get_option('body_type')) { ?>
p {
	<?php vif_typeecho($body_type); ?>		
}
<?php } ?>
<?php if ($fullmenu_type = ot_get_option('fullmenu_type')) { ?>
.vif-full-menu>li>a {
	<?php vif_typeecho($fullmenu_type); ?>		
}
<?php } ?>
<?php if ($fullmenu_sub_type = ot_get_option('fullmenu_sub_type')) { ?>
.vif-full-menu li .sub-menu a {
	<?php vif_typeecho($fullmenu_sub_type); ?>		
}
<?php } ?>
<?php if ($fullmenu_social_type = ot_get_option('fullmenu_social_type')) { ?>
.vif-full-menu>li>a.social {
	<?php vif_typeecho($fullmenu_social_type); ?>		
}
<?php } ?>
<?php if ($widget_title_type = ot_get_option('widget_title_type')) { ?>
.widget>h6 {
	<?php vif_typeecho($widget_title_type); ?>		
}
<?php } ?>
<?php if ($mobilemenu_type = ot_get_option('mobilemenu_type')) { ?>
.vif-mobile-menu>li>a {
	<?php vif_typeecho($mobilemenu_type); ?>		
}
<?php } ?>
<?php if ($mobilemenu_sub_type = ot_get_option('mobilemenu_sub_type')) { ?>
.vif-mobile-menu .sub-menu a {
	<?php vif_typeecho($mobilemenu_sub_type); ?>		
}
<?php } ?>
<?php if ($mobilemenu_secondary_type = ot_get_option('mobilemenu_secondary_type')) { ?>
.vif-secondary-menu a {
	<?php vif_typeecho($mobilemenu_secondary_type); ?>		
}
<?php } ?>
<?php if ($mobilemenu_footer_type = ot_get_option('mobilemenu_footer_type')) { ?>
#mobile-menu .menu-footer {
	<?php vif_typeecho($mobilemenu_footer_type); ?>		
}
<?php } ?>

/* Heading Typography */
<?php if ($h1_type = ot_get_option('h1_type')) { ?>
h1,
.h1 {
	<?php vif_typeecho($h1_type); ?>		
}
<?php } ?>
<?php if ($h2_type = ot_get_option('h2_type')) { ?>
h2 {
	<?php vif_typeecho($h2_type); ?>		
}
<?php } ?>
<?php if ($h3_type = ot_get_option('h3_type')) { ?>
h3 {
	<?php vif_typeecho($h3_type); ?>		
}
<?php } ?>
<?php if ($h4_type = ot_get_option('h4_type')) { ?>
h4 {
	<?php vif_typeecho($h4_type); ?>		
}
<?php } ?>
<?php if ($h5_type = ot_get_option('h5_type')) { ?>
h5 {
	<?php vif_typeecho($h5_type); ?>		
}
<?php } ?>
<?php if ($h6_type = ot_get_option('h6_type')) { ?>
h6 {
	<?php vif_typeecho($h6_type); ?>		
}
<?php } ?>

/* Header */
<?php if ($logo_height = ot_get_option('logo_height')) { ?>
.logolink .logoimg {
	max-height: <?php vif_measurementecho($logo_height); ?>;	
}
<?php } ?>
<?php if ($logo_height_mobile = ot_get_option('logo_height_mobile')) { ?>
@media screen and (max-width: 40.0625em) {
	.logolink .logoimg {
		max-height: <?php vif_measurementecho($logo_height_mobile); ?>;	
	}
}
<?php } ?>
<?php if ($header_border = ot_get_option('header_border')) { ?>
.header:not(.fixed):not(.hide-header-items) {
	border-bottom: <?php vif_borderecho($header_border); ?>;	
}
<?php } ?>

/* Measurements */
<?php if ($header_padding = ot_get_option('header_padding')) { ?>
@media only screen and (min-width: 40.0625em) {
	.vif-full-menu > li{
		<?php vif_paddingecho($header_padding); ?>;	
	}
}
<?php } ?>
<?php if ($header_padding_fixed = ot_get_option('header_padding_fixed')) { ?>
@media only screen and (min-width: 40.0625em) {
	.header.fixed .vif-full-menu > li {
		<?php vif_paddingecho($header_padding_fixed); ?>;	
	}
}
<?php } ?>
<?php if ($header_padding_mobile = ot_get_option('header_padding_mobile')) { ?>
@media only screen and (max-width: 40.0625em) {
	.header,
	.header.fixed {
		<?php vif_paddingecho($header_padding_mobile); ?>;	
	}
}
<?php } ?>
<?php if ($footer_padding = ot_get_option('footer_padding')) { ?>
.footer {
	<?php vif_paddingecho($footer_padding); ?>
}
<?php } ?>
<?php if ($subfooter_padding = ot_get_option('subfooter_padding')) { ?>
.subfooter {
	<?php vif_paddingecho($subfooter_padding); ?>	
}
<?php } ?>
<?php if ($footerbar_padding = ot_get_option('footerbar_padding')) { ?>
.footer-bar-container {
	<?php vif_paddingecho($footerbar_padding); ?>	
}
<?php } ?>
<?php if ($menu_margin = ot_get_option('menu_margin')) { ?>
.vif-full-menu>li+li {
	margin-left: <?php vif_measurementecho($menu_margin); ?>	
}
<?php } ?>

/* Colors */
<?php if ($accent_color = ot_get_option('accent_color')) { ?>
	a:hover,
	.vif-full-menu.vif-standard>li.current-menu-item:not(.has-hash)>a,
	.vif-full-menu>li a:not(.logolink)[data-filter].active,
	#mobile-menu.dark .vif-mobile-menu>li>a:hover,
	#mobile-menu.dark .sub-menu a:hover,
	#mobile-menu.dark .vif-secondary-menu a:hover,
	.vif-mobile-menu>li.menu-item-has-children>a:hover .vif-arrow div,
	.vif-secondary-menu a:hover,
	.authorpage .author-content .square-icon:hover,
	.authorpage .author-content .square-icon.email:hover,
	.commentlist .comment .reply a:hover,
	input[type="submit"].style3,.button.style3,.btn.style3,
	input[type="submit"].style4,.button.style4,.btn.style4,
	input[type="submit"].style4:hover,.button.style4:hover,.btn.style4:hover,
	.more-link,
	.vif-portfolio-filter.style1 ul li a:hover,.vif-portfolio-filter.style1 ul li a.active,
	.vif-portfolio-filter.style2 .select2.select2-container--default .select2-selection--single .select2-selection__rendered,
	.vif-portfolio-filter.style2 .select2-dropdown .select2-results__options .select2-results__option[aria-selected=true] span,
	.vif-portfolio-filter.style2 .select2-dropdown .select2-results__options .select2-results__option.select2-results__option--highlighted span,
	.vif-autotype .vif-autotype-entry,
	.vif-tabs.style3 .vc_tta-panel-heading h4 a:hover,
	.vif-tabs.style3 .vc_tta-panel-heading h4 a.active,
	.vif_location_container.row .vif_location h5,
	.vif-portfolio-slider.vif-portfolio-slider-style3 .portfolio-slide .content-side .vif-categories,
	.vif-portfolio-slider.vif-portfolio-slider-style3 .portfolio-slide .content-side .vif-categories a,
	.woocommerce-checkout-payment .wc_payment_methods .wc_payment_method.payment_method_paypal .about_paypal,
	input[type="submit"].style2, .button.style2, .btn.style2,
	.vif-header-menu > li.menu-item-has-children.sfHover > a span:after {
		color:<?php echo esc_attr($accent_color); ?>;
	}
	.vif-full-menu.vif-line-marker>li>a:before,
	.vif-page-header .vif-blog-categories li a:after,
	.select2-container .select2-dropdown .select2-results .select2-results__option[aria-selected=true],
	input[type="submit"],.button,.btn,
	input[type="submit"].black:hover,input[type="submit"].wc-forward.checkout:hover,.button.black:hover,
	.button.wc-forward.checkout:hover,.btn.black:hover,.btn.wc-forward.checkout:hover,
	input[type="submit"].style2:hover,.button.style2:hover,.btn.style2:hover,
	input[type="submit"].style3:before,.button.style3:before,.btn.style3:before,
	input[type="submit"].style4:after,.button.style4:after,.btn.style4:after,
	.btn-text.style3 .circle-btn,
	[class^="tag-cloud-link"]:hover,
	.vif-portfolio-filter.style1 ul li a:before,
	.vif-portfolio-filter.style2 .select2.select2-container--default .select2-selection--single .select2-selection__arrow:after,
	.vif-portfolio-filter.style2 .select2.select2-container--default .select2-selection--single .select2-selection__arrow:before,
	.vif-portfolio-filter.style2 .select2-dropdown .select2-results__options .select2-results__option span:before,
	.boxed-icon.email:hover,
	.vif-progressbar .vif-progress span,
	#scroll_to_top:hover .vif-animated-arrow.circular,
	.vif-tabs.style1 .vc_tta-panel-heading h4 a:before,
	.vif-client-row.vif-opacity.with-accent .vif-client:hover,
	.badge.onsale,
	.demo_store,
	.products .product .product_after_title .button:hover:after,
	.woocommerce-MyAccount-navigation ul li:hover a,.woocommerce-MyAccount-navigation ul li.is-active a,
	.footer_bar .socials .social.email:hover,
	.vif-header-menu > li.menu-item-has-children > a:hover span:before,
	.vif-header-menu > li.menu-item-has-children.sfHover > a span:before {
		background-color: <?php echo esc_attr($accent_color); ?>;
	}
	input[type="submit"]:hover,
	.button:hover,
	.btn:hover {
		background-color: <?php echo esc_attr(vif_adjustColorLightenDarken($accent_color, 7)); ?>;
	}
	.share_container .product_copy form,
	input[type="text"]:focus,input[type="password"]:focus,input[type="date"]:focus,
	input[type="datetime"]:focus,input[type="email"]:focus,input[type="number"]:focus,
	input[type="search"]:focus,input[type="tel"]:focus,input[type="time"]:focus,input[type="url"]:focus,textarea:focus,
	.select2.select2-container--default.select2-container--open .select2-selection--single,
	.select2-container .select2-dropdown,
	.select2-container .select2-dropdown.select2-drop-active,
	input[type="submit"].style2,.button.style2,.btn.style2,
	input[type="submit"].style3,.button.style3,.btn.style3,
	input[type="submit"].style4,.button.style4,.btn.style4,
	[class^="tag-cloud-link"]:hover,
	.boxed-icon.email:hover,
	.wpb_text_column a:after,
	.vif-client-row.has-border.vif-opacity.with-accent .vif-client:hover,
	.vif-pricing-table .vif-pricing-column.highlight-true .pricing-container,
	.woocommerce-MyAccount-navigation ul li:hover a,.woocommerce-MyAccount-navigation ul li.is-active a,
	.footer_bar .socials .social.email:hover {
		border-color: <?php echo esc_attr($accent_color); ?>;
	}
	.select2-container .select2-dropdown.select2-drop-active.select2-drop-above,
	.woocommerce-MyAccount-navigation ul li:hover+li a,.woocommerce-MyAccount-navigation ul li.is-active+li a {
		border-top-color: <?php echo esc_attr($accent_color); ?>;
	}
	.commentlist .comment .reply a:hover svg path,
	.btn-text.style4 .arrow svg:first-child {
		fill: <?php echo esc_attr($accent_color); ?>;
	}
	.vif-tabs.style2 .vc_tta-panel-heading h4 a.active {
		-moz-box-shadow:inset 0 -3px 0 <?php echo esc_attr($accent_color); ?>,0 1px 0 <?php echo esc_attr($accent_color); ?>;
		-webkit-box-shadow:inset 0 -3px 0 <?php echo esc_attr($accent_color); ?>,0 1px 0 <?php echo esc_attr($accent_color); ?>;
		box-shadow:inset 0 -3px 0 <?php echo esc_attr($accent_color); ?>,0 1px 0 <?php echo esc_attr($accent_color); ?>;
	}
	.vif-fancy-box.fancy-style5:hover .vif-fancy-content {
		-moz-box-shadow:inset 0 -3px 0 <?php echo esc_attr($accent_color); ?>;
		-webkit-box-shadow:inset 0 -3px 0 <?php echo esc_attr($accent_color); ?>;
		box-shadow:inset 0 -3px 0 <?php echo esc_attr($accent_color); ?>;
	}
<?php } ?>
<?php if ($post_category_color = ot_get_option('post_category_color')) { ?>
.post .post-category a,
.columns.vif-light-column .post .post-category a {
	color: <?php echo esc_attr($post_category_color); ?>;
}
<?php } ?>
<?php if ($footer_widget_title_color = ot_get_option('footer_widget_title_color')) { ?>
.footer .widget>h6,
.footer.dark .widget>h6 {
	color: <?php echo esc_attr($footer_widget_title_color); ?>;
}
<?php } ?>
<?php if ($footer_text_color = ot_get_option('footer_text_color')) { ?>
.footer p,
.footer.dark p {
	color: <?php echo esc_attr($footer_text_color); ?>;
}
<?php } ?>
<?php if ($subfooter_text_color = ot_get_option('subfooter_text_color')) { ?>
.subfooter p,
.subfooter.dark p {
	opacity: 1;
	color: <?php echo esc_attr($subfooter_text_color); ?>;
}
<?php } ?>
<?php if ($preloader_color = ot_get_option('preloader_color')) { ?>
.vif-page-preloader .material-spinner .material-path {
	animation: material-dash 1.4s ease-in-out infinite;
	stroke: <?php echo esc_attr($preloader_color); ?>;
}
<?php } ?>

/* Link Colors */
<?php if ($fullmenu_link_color_dark = ot_get_option('fullmenu_link_color_dark')) { ?>
<?php vif_linkcolorecho($fullmenu_link_color_dark, '.header.dark-header .vif-full-menu>li>'); ?>
<?php } ?>
<?php if ($fullmenu_link_color_light = ot_get_option('fullmenu_link_color_light')) { ?>
<?php vif_linkcolorecho($fullmenu_link_color_light, '.header.light-header .vif-full-menu>li>'); ?>
<?php } ?>

<?php if ($footer_link_color = ot_get_option('footer_link_color')) { ?>
<?php vif_linkcolorecho($footer_link_color, '.footer .widget'); ?>
<?php if ('dark' === ot_get_option('footer_color')) { vif_linkcolorecho($footer_link_color, '.footer.dark .widget'); }?>
<?php } ?>

<?php if ($mobilemenu_link_color = ot_get_option('mobilemenu_link_color')) { ?>
<?php vif_linkcolorecho($mobilemenu_link_color, '#mobile-menu .vif-mobile-menu>li>'); ?>
<?php vif_linkcolorecho($mobilemenu_link_color, '#mobile-menu.dark .vif-mobile-menu>li>'); ?>
<?php } ?>
<?php if ($mobilemenu_secondary_link_color = ot_get_option('mobilemenu_secondary_link_color')) { ?>
<?php vif_linkcolorecho($mobilemenu_secondary_link_color, '#mobile-menu .vif-secondary-menu'); ?>
<?php vif_linkcolorecho($mobilemenu_secondary_link_color, '#mobile-menu.dark .vif-secondary-menu'); ?>
<?php } ?>

/* Backgrounds */
.page-id-<?php echo esc_attr($id); ?> #wrapper div[role="main"],
.postid-<?php echo esc_attr($id); ?> #wrapper div[role="main"] {
	<?php vif_bgecho( get_post_meta($id, 'page_bg', true)); ?>
}
<?php if ($mobilemenu_bg = ot_get_option('mobilemenu_bg')) { ?>
#mobile-menu {
	<?php vif_bgecho($mobilemenu_bg); ?>
}
<?php } ?>
<?php if ($header_bg = ot_get_option('header_bg')) { ?>
.header:not(.fixed) {
	<?php vif_bgecho($header_bg); ?>
}
<?php } ?>
<?php if ($fixed_header_bg = ot_get_option('fixed_header_bg')) { ?>
.header.fixed {
	<?php vif_bgecho($fixed_header_bg); ?>
}
<?php } ?>
<?php if ($header_style1_bg = ot_get_option('header_style1_bg')) { ?>
.header.style1 .header_overlay_menu {
	<?php vif_bgecho($header_style1_bg); ?>
}
<?php } ?>
<?php if ($search_bg = ot_get_option('search_bg')) { ?>
.vif-search-popup {
	<?php vif_bgecho($search_bg); ?>
}
<?php } ?>
<?php if ($footer_bg = ot_get_option('footer_bg')) { ?>
.footer {
	<?php vif_bgecho($footer_bg); ?>
}
<?php } ?>
<?php if ($subfooter_bg = ot_get_option('subfooter_bg')) { ?>
.subfooter {
	<?php vif_bgecho($subfooter_bg); ?>
}
<?php } ?>
<?php if ($footerbar_bg = ot_get_option('footerbar_bg')) { ?>
.footer-bar-container {
	<?php vif_bgecho($footerbar_bg); ?>
}
<?php } ?>
<?php if ($notfound_bg = ot_get_option('notfound_bg')) { ?>
.error404 #wrapper [role="main"] {
	<?php vif_bgecho($notfound_bg); ?>
}
<?php } ?>
<?php if ($preloader_bg = ot_get_option('preloader_bg')) { ?>
.vif-page-preloader {
	<?php vif_bgecho($preloader_bg); ?>
}
<?php } ?>

/* Footer */
<?php if ($footer_logo_height = ot_get_option('footer_logo_height')) { ?>
.footer .footer-logo-holder .footer-logolink .logoimg {
	max-height: <?php vif_measurementecho($footer_logo_height); ?>;	
}
<?php } ?>

/* Sub-Footer */
<?php if ($subfooter_logo_height = ot_get_option('subfooter_logo_height')) { ?>
.subfooter .footer-logo-holder .logoimg {
	max-height: <?php vif_measurementecho($subfooter_logo_height); ?>;	
}
<?php } ?>

/* Shop */
<?php if ( vif_wc_supported() ) { ?>
	<?php if (is_shop() || is_product_tag() ) { ?>
		<?php if ($shop_header_bg = ot_get_option('shop_header_bg')) { ?>
			.post-type-archive-product .vif-page-header,
			.tax-product_tag .vif-page-header {
				<?php vif_bgecho($shop_header_bg); ?>	
			}
		<?php } ?>
	<?php } else if ( is_product_category() ) { 
		$cat = get_queried_object();
		$cat_id = $cat->term_id;
		$header_id = get_term_meta( $cat_id, 'header_id', true );
		
		$image = wp_get_attachment_url($header_id, 'full');
	?>
		.tax-product_cat.term-<?php echo esc_attr($cat_id); ?> .shop-header-style2 {
			background-image: url(<?php echo esc_url($image); ?>);	
		}
	<?php } ?>
<?php } ?>
/* Extra CSS */
<?php echo esc_html(ot_get_option('extra_css')); ?>
<?php 
	$out = ob_get_clean();
	// Remove comments
	$out = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out);
	// Remove space after colons
	$out = str_replace(': ', ':', $out);
	// Remove whitespace
	$out = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $out);
	
	return $out;
}