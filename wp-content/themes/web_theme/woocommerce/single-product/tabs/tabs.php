<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($tabs)) :
    ?>

    <div class="woocommerce-tabs">
        <ul class="tabs">
            <li>
                <a href="#tab-description">Mô tả</a>
            </li>
            <?php //foreach ( $tabs as $key => $tab ) : ?>

    <!--				<li class="<?php //echo $key  ?>_tab">
                                            <a href="#tab-<?php // echo $key  ?>"><?php echo $tab['title']; //apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key )  ?></a>
                                    </li>-->

            <?php //endforeach; ?>
        </ul>
        <?php foreach ($tabs as $key => $tab) : ?>

            <div class="panel entry-content" id="tab-<?php echo $key ?>">
                <?php call_user_func($tab['callback'], $key, $tab) ?>
            </div>

        <?php endforeach; ?>

    </div>

<div class="woocommerce-tabs custom-reviews">
        <ul class="tabs">
            <li><a href="#tab-reviews">Bình luận</a></li>
        </ul>
        <div class="custom-panel">
            <div class="comment-box">
                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
            </div>
        </div>
    </div>

<?php endif; ?>
