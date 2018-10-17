<?php
	$vars = $wp_query->query_vars;
	$thb_size = array_key_exists('thb_size', $vars) ? $vars['thb_size'] : false;
	$thb_animation = array_key_exists('thb_animation', $vars) ? $vars['thb_animation'] : false;
	$thb_aspect = array_key_exists('thb_aspect', $vars) ? $vars['thb_aspect'] : false;
	$thb_masonry = array_key_exists('thb_masonry', $vars) ? $vars['thb_masonry'] : false;
	
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
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	}
	
	// Classes
	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = 'style1';
	$class[] = $thb_masonry ? '' : $thb_size;
	$class[] = $thb_animation;
	$class[] = $main_color_title;
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
	$image_size = $thb_aspect ? 'revolution-masonry-x2' : 'revolution-square-x2';
	if ($thb_masonry) {
		$masonry_size = get_post_meta($id, 'masonry_size', true);	
		$thb_masonry_size = thb_get_masonry_size($masonry_size);
		$class[] = $thb_masonry_size['class'];
		$image_size = $thb_masonry_size['image_size'];
	}

?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">	
	<div class="portfolio-holder">
		<?php the_post_thumbnail($image_size, array('class' => 'visually-hidden')); ?>
		<div class="thb_3dimg">
			<div class="thb-portfolio-image atvImg-layer">
				<?php the_post_thumbnail($image_size, array('class' => 'thb_3dimage')); ?>
				<div class="thb-portfolio-hover"></div>	
			</div>
			<a href="<?php echo esc_url($permalink); ?>" class="thb-portfolio-link atvImg-layer"></a>
			
			<div class="thb-portfolio-content atvImg-layer">
				<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
	<?php if ($main_color) { ?>
	<style>
		.<?php echo esc_attr($element_class) ?>.style1 .thb-portfolio-hover {
			<?php echo esc_html(thb_css_gradient($main_color[0], $main_color[1], "-135", true)); ?>
		}
	</style>
	<?php } ?>
</div>