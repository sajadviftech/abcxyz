<?php 
	$blog_pagination_style = is_home() ? ot_get_option('blog_pagination_style', 'style1') : 'style1'; 
	$blog_animation = ot_get_option('blog_animation', '');	
	set_query_var( 'vif_animation', $blog_animation );
	
	$vif_blog_columns = ot_get_option('vif_blog_columns', '4');	
	$columns = vif_translate_columns($vif_blog_columns);
	set_query_var('columns', $columns);
?>
<div class="row masonry <?php echo esc_attr('pagination-'.$blog_pagination_style); ?>">
	<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		<?php 
			get_template_part( 'inc/templates/postbit/style4'); 
		?>
	<?php endwhile; else : ?>
	  <?php get_template_part( 'inc/templates/not-found' ); ?>
	<?php endif; ?>
</div>
<?php do_action('vif_blog_pagination'); ?>