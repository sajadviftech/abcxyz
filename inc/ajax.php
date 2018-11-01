<?php
function vif_blog_posts() {
	$page = isset($_POST['page']) ? wp_unslash($_POST['page']) : '1';
	$ppp = get_option('posts_per_page');
	$blog_style = ot_get_option('blog_style', 'style3');
	
	$args = array(
		'posts_per_page'	 => $ppp,
		'paged' => $page,
		'post_status' => 'publish'
	);
	
	$vif_blog_columns = ot_get_option('vif_blog_columns', '4');	
	$blog_animation = ot_get_option('blog_animation', '');	
	$columns = vif_translate_columns($vif_blog_columns);
	

	$more_query = new WP_Query( $args );
		
	if ($more_query->have_posts()) :  while ($more_query->have_posts()) : $more_query->the_post(); 
		set_query_var( 'columns', $columns);
		set_query_var( 'vif_animation', $blog_animation );
		get_template_part( 'inc/templates/postbit/'.$blog_style); 
	endwhile; else : endif;
	wp_die();
}
add_action("wp_ajax_nopriv_vif_blog_ajax", "vif_blog_posts");
add_action("wp_ajax_vif_blog_ajax", "vif_blog_posts");

function vif_load_more() {
	$aspect = isset($_POST['aspect']) ? wp_unslash($_POST['aspect']) : false;
	$columns = isset($_POST['columns']) ? wp_unslash($_POST['columns']) : false;
	$style = isset($_POST['style']) ? wp_unslash($_POST['style']) : false;
	$masonry = isset($_POST['masonry']) ? wp_unslash($_POST['masonry']) : false;
	
	$loop = isset($_POST['loop']) ? wp_unslash($_POST['loop']) : false;
	$page = isset($_POST['page']) ? wp_unslash($_POST['page']) : false;
	
	$loop .= '|paged:'.$page;

	$source_data = VcLoopSettings::parseData( $loop );
	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$posts = $query_builder->build();
	$posts = $posts[1];
	
	if ($posts->have_posts()) :  while ($posts->have_posts()) : $posts->the_post(); 
		set_query_var( 'vif_masonry', $masonry );
		set_query_var( 'vif_aspect', $aspect );
		set_query_var( 'vif_size', $columns );
		get_template_part( 'inc/templates/portfolio/'.$style );
	endwhile; else : endif;
	wp_die();
}
add_action("wp_ajax_nopriv_vif_ajax", "vif_load_more");
add_action("wp_ajax_vif_ajax", "vif_load_more");