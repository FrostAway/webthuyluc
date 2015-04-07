<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="related products">

            <h2 class="title"><?php _e( 'Related Products', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<li class="col-sm-12 col-md-6 col-lg-4 product">
                                    <div class="pcontent">
                                        <a href="<?php the_permalink() ?>">
                                            <div class="image-box">
                                                <?php woocommerce_template_loop_product_thumbnail() ?>

                                            </div>
                                            <h3><?php the_title() ?></h3>
                                        </a>
                                        <a class="button add_to_cart_button" href="<?php the_permalink() ?>"><i class="fa fa-search"></i>Xem Thêm</a>
                                    </div>
                                </li>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
