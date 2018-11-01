<?php
	$vars = $wp_query->query_vars;
	$vif_size = array_key_exists('vif_size', $vars) ? $vars['vif_size'] : false;
	$vif_animation = array_key_exists('vif_animation', $vars) ? $vars['vif_animation'] : false;
	$vif_aspect = array_key_exists('vif_aspect', $vars) ? $vars['vif_aspect'] : false;
	
	$id = get_the_ID();
	$element_class = uniqid('portfolio-id-'.$id.'-');
	$image_id = get_post_thumbnail_id($id);
	
	// Colors
	$main_color_title = get_post_meta($id, 'main_color_title', true);
	$main_color = get_post_meta($id, 'main_color', true);
	
	// Categories
	$categories = get_the_term_list( $id, 'portfolio-category', '', ', ', '' ); 
	if ($categories !== '' && !empty($categories)) {
		$categories = strip_tags($categories);
	}
	
	$terms = get_the_terms( $id, 'portfolio-category' );
	
	$cats = '';	
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' vif-cat-'.strtolower($term->slug); }
	}
	
	// Classes
	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = 'style4';
	$class[] = $vif_size;
	$class[] = $vif_animation;
	$class[] = $cats;
	$class[] = $element_class;
	
	// Listing Type
	$main_listing_type = get_post_meta($id, 'main_listing_type', true);
	$permalink = '';
	if ($main_listing_type == 'lightbox') {
		$permalink = $image_url[0];
	} else if ($main_listing_type == 'link') {
		$permalink = get_post_meta($id, 'main_listing_link', true);	
	} else {
		$permalink = get_the_permalink();	
	}
	
	// Image sizes
	$image_size = $vif_aspect ? 'viftech-masonry-x2' : 'viftech-square-x2';
?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">	
	<div class="portfolio-holder">
		<div class="vif-portfolio-image">
			<?php the_post_thumbnail($image_size); ?>
			<div class="vif-portfolio-hover"></div>
		</div>
		<a href="<?php echo esc_url($permalink); ?>" class="vif-portfolio-link"></a>
		<div class="vif-portfolio-content">
			<h5><?php the_title(); ?></h5>
			<aside class="vif-categories"><span><?php echo esc_html($categories); ?></span></aside>
			<?php get_template_part('assets/img/svg/next_arrow.svg'); ?>
		</div>
	</div>
	<?php if ($main_color) { ?>
	<style>
		.<?php echo esc_attr($element_class) ?>.style4 .vif-portfolio-hover {
			<?php echo esc_html(vif_css_gradient($main_color[0], $main_color[1], "0", true)); ?>
		}
	</style>
	<?php } ?>
</div>