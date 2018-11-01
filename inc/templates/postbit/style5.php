<?php 
	add_filter( 'excerpt_length', 'vif_supershort_excerpt_length' );
	
	$blog_sidebar = ot_get_option('blog_sidebar', 'on');
	
	$vars = $wp_query->query_vars;
	$vif_i = array_key_exists('vif_i', $vars) ? $vars['vif_i'] : false;
	$columns = (array_key_exists('columns', $vars) && !is_admin()) ? $vars['columns'] : 'large-4';
	$vif_animation = array_key_exists('vif_animation', $vars) ? $vars['vif_animation'] : false;
	$vif_date = array_key_exists('vif_date', $vars) ? $vars['vif_date'] : true;
	$vif_cat = array_key_exists('vif_cat', $vars) ? $vars['vif_cat'] : true;
	
	$format = get_post_format();
	$permalink = get_the_permalink();
	if ($format === 'link') {
		$permalink = get_post_meta(get_the_ID(), 'post_link', true);	
	}
	if ($vif_i && $blog_sidebar === 'on') {
		$columns = 'large-6';
	}
	if ( $vif_i ) {
		switch ( $vif_i ) {
			case '1':
				$columns = $blog_sidebar === 'on' ? 'medium-12 half-height' : 'medium-12 large-8 half-height';
				break;
			default:
				$columns = $blog_sidebar === 'on' ? 'medium-6': 'medium-6 large-4';
				break;	
		}
	}
?>
<div class="small-12 medium-6 <?php echo esc_attr($columns); ?> columns">
	<article itemscope itemtype="http://schema.org/Article" <?php post_class('post style5 ' . $vif_animation); ?>>
		<figure class="post-gallery">
			<a href="<?php echo esc_url($permalink); ?>" rel="bookmark" title="<?php the_title(); ?>"></a>
			<?php the_post_thumbnail('viftech-square-x2'); ?>
			<div class="overlay"></div>
			<?php if ($vif_cat) { ?>
			<aside class="post-category">
				<?php the_category(', '); ?>
			</aside>
			<?php } ?>
			<div class="style5-content-container">
				<header class="post-title entry-header">
					<?php the_title('<h3 class="entry-title" itemprop="name headline"><a href="'.esc_url($permalink).'" title="'.the_title_attribute("echo=0").'">', '</a></h3>'); ?>
				</header>
				<?php if ($vif_date) { ?>
				<aside class="post-meta">
					<?php echo get_the_date(); ?>
				</aside>
				<?php } ?>
			</div>
		</figure>
		<?php do_action( 'vif_PostMeta' ); ?>
	</article>
</div>