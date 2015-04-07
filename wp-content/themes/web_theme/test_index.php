<?php
/*
 * Template Name: index test
 */
?>
<?php get_header(); // This fxn gets the header.php file and renders it          ?>
<div id="wrapper">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 second-col">

                <?php
                ?>
                <?php $home_cats = get_option('iz-home-cat'); ?>

                <div class="page-part">
                    <h3 class="title"><?php echo get_term($homecat, 'product_cat')->name; ?></h3>
                    <ul class="row list-unstyled products">
                        <?php
                        query_posts(array(
                            'post_type' => 'product', 'paged' => (get_query_var('paged')) ? 1 : get_query_var('paged'), 'posts_per_page' => 2
                                )
                        );
                        ?>
                        <?php if (have_posts()): while (have_posts()): the_post(); ?>

                                <?php wc_get_template_part('content', 'product'); ?>
                            <?php endwhile;
                            wp_reset_query();
                            ?>

                        <?php else: ?>

                    <?php endif; ?>
                    </ul>

                    <div id="load-more-post"><button class="btn btn-success">Xem thêm post</button></div>
                  
                    <script>
                        jQuery(document).ready(function () {
                            var page = parseInt('<?php echo (get_query_var('paged') == 0) ? 1 : get_query_var('paged'); ?>');

                            
                            jQuery('#load-more-post').click(function () {
                                jQuery.ajax({
                                    url: '<?php echo admin_url('admin-ajax.php') ?>',
                                    type: 'POST',
                                    data: {
                                        action: 'load_more_post',
                                        page: page
                                    },
                                    success: function (data) {
                                        jQuery('.page-part .products').append(data);
                                    }
                                });
                                page = page+1;
                            });
                        });
                    </script>
                </div>
            </div>

<?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!-- end wrapper -->
<?php get_footer(); ?>

