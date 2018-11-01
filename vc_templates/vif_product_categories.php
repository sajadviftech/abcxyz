<?php function vif_product_categories( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_product_categories', $atts );
	extract( $atts );
	
	if(!vif_wc_supported()) {
		return;	
	}
	
	$args = $product_categories = $category_ids = array();
	$cats = explode(",", $cat);
	
	
	foreach ($cats as $cat) {
		$c = get_term_by('slug',$cat,'product_cat');
		
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
 	
	?>
			
	<div class="carousel products slick row" data-columns="<?php echo esc_attr($columns); ?>" data-navigation="true">	
		<?php
			if ( $product_categories ) {
				foreach ( $product_categories as $category ) {
					wc_get_template( 'content-product_cat.php', array(
						'category' => $category
					) );
				}
			}
			woocommerce_reset_loop();  
		?>			
	</div>
	   
	<?php 
	     
  $out = ob_get_clean();
  
  return $out;
}
vif_add_short('vif_product_categories', 'vif_product_categories');