<?php 
	$blog_pagination_style = is_home() ? ot_get_option('blog_pagination_style', 'style1') : 'style1'; 
	$blog_sidebar = ot_get_option('blog_sidebar', 'on');
	$blog_animation = ot_get_option('blog_animation', '');	
	set_query_var( 'vif_animation', $blog_animation );
	
	$vif_blog_columns = ot_get_option('vif_blog_columns', '4');	
	$columns = vif_translate_columns($vif_blog_columns);
	set_query_var('columns', $columns);
	
	
	$classes[] = 'row masonry';
	$classes[] = 'pagination-'.$blog_pagination_style;
	$classes[] = 'blog-sidebar-'.$blog_sidebar;
?>
<div class="<?php echo esc_attr(implode(' ', $classes)); ?>" data-layoutmode="packery">
	<?php $i = 1; if (have_posts()) :  while (have_posts()) : the_post(); ?>
		<?php 
			set_query_var('vif_i', $i);
			get_template_part( 'inc/templates/postbit/style5'); 
		?>
	<?php $i++; endwhile; else : ?>
	  <?php get_template_part( 'inc/templates/not-found' ); ?>
	<?php endif; ?>
</div>
<?php do_action('vif_blog_pagination'); ?>