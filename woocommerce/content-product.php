<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce_loop;

$vars = $wp_query->query_vars;
$vif_animation = array_key_exists('vif_animation', $vars) ? $vars['vif_animation'] : false;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$shop_product_listing_layout = isset($_GET['shop_product_listing_layout']) ? $_GET['shop_product_listing_layout'] : ot_get_option('shop_product_listing_layout', 'style1');
$shop_product_listing = isset($_GET['shop_product_listing']) ? $_GET['shop_product_listing'] : ot_get_option('shop_product_listing', 'style1');
$shop_product_hover = ot_get_option('shop_product_hover', 'on');
$columns = isset($_GET['products_per_row']) ? $_GET['products_per_row'] : ot_get_option('products_per_row', 'large-3');
$vars = $wp_query->query_vars;

if ( in_array($shop_product_listing_layout, array('style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8' )) && is_shop()) {
	$columns = vif_get_product_size($shop_product_listing_layout, $woocommerce_loop['loop']);
}


$columns = array_key_exists('vif_columns', $vars) && $vars['vif_columns'] ? $vars['vif_columns'] : $columns;

$classes[] = 'small-6';
$classes[] = $columns;
$classes[] = 'columns';
$classes[] = $vif_animation;
$classes[] = 'vif-listing-'.$shop_product_listing;

?>
<?php
	$thumbnail_class = '';
	$featured = wp_get_attachment_url( get_post_thumbnail_id(), 'shop_catalog' );
	$attachment_ids = $product->get_gallery_image_ids();
	if ( $attachment_ids ) {
		$loop = 0;
		foreach ( $attachment_ids as $attachment_id ) {
			$image_link = wp_get_attachment_url( $attachment_id );
			if (!$image_link) continue;
			$loop++;
			$thumbnail_second = wp_get_attachment_image_src($attachment_id, 'shop_catalog');
			if ($image_link !== $featured) {
				if ($loop == 1) break;
			}
		}
	}
	$style = $class = '';
	if (isset($thumbnail_second[0])) {            
		$style = 'background-image:url(' . $thumbnail_second[0] . ')';
		$thumbnail_class = 'vif_hover';     
	}
?>
<li <?php post_class($classes); ?>>
	<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
	?>
	<figure class="product_thumbnail <?php echo esc_attr($thumbnail_class); ?>">	
		<?php do_action( 'vif_product_badge'); ?>
		<?php if ($shop_product_listing === 'style1') { vif_wishlist_button(); } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php if ($shop_product_hover === 'on') { ?>
			<span class="product_thumbnail_hover" style="<?php echo esc_attr($style); ?>"></span>
			<?php } ?>
			<?php
				if ( has_post_thumbnail( $product->get_id() ) ) { 	
					echo  get_the_post_thumbnail( $product->get_id(), 'shop_catalog');
				}else{
					 echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $product->get_id() );
				}
			?>
		</a>
	</figure>
	<h3>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		<?php if ($shop_product_listing === 'style2') { vif_wishlist_button(); } ?>
	</h3>
	<div class="product_after_title">
		<div class="product_after_shop_loop_price">
			<?php do_action( 'woocommerce_after_shop_loop_item_title_loop_price' ); ?>
		</div>

		<div class="product_after_shop_loop_buttons">
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
	</div>
</li>