<?php function vif_product_category_grid( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_product_category_grid', $atts );
	extract( $atts );
	
	if(!vif_wc_supported()) {
		return;	
	}
	$args = $product_categories = $category_ids = array();
	$cats = explode(",", $cat);
	
	
	foreach ($cats as $cat) {
		$c = get_term_by('slug', $cat ,'product_cat');
		
		if($c) {
			array_push($category_ids, $c->term_id);
		}
	}
	
	$args = array(
	'orderby'    => 'name',
	'order'      => 'ASC',
	'hide_empty' => '0',
	'include'	=> $category_ids
	);
	$product_categories = get_terms( 'product_cat', $args );
	ob_start();
	$i = 1;

	$classes[] = "row products vif-product-category-grid masonry";
	$classes[] = $style;

		if ( $product_categories ) { 
		?>
			<ul class="<?php echo implode(' ', $classes); ?>" data-layoutmode="packery">
				<?php 
					foreach ( $product_categories as $category ) {
						
						$article_size = vif_get_product_cat_grid_size($style, $i);
						wc_get_template( 'content-product_cat.php', array(
		          'category' => $category,
		          'class' => 'item '.$article_size
		        ) ); 
		        
						$i++;
					} 
				?>
			</ul>
			<?php 
		}
	     
	$out = ob_get_clean();
	 
	return $out;
}
vif_add_short('vif_product_category_grid', 'vif_product_category_grid');