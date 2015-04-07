<?php get_header(); ?>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 second-col">
                <ul class="row list-unstyled products">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <?php if(get_post_type() == 'product'){ ?>
                    <li>product</li>
                    <?php } ?>
                <?php endwhile; endif; ?>                    
                </ul>

                <?php if (have_posts()) : ?>

                    <h3 class="page-title">Kết quả tìm kiếm cho '<?= $_GET['s'] ?>'</h3>

                    <ul class="list-unstyled row products posts">
                        <?php while (have_posts()) : the_post(); ?> 
                            <?php if (get_post_type() == 'post') { ?>
                                <li class="col-xs-12 col-md-6 col-lg-4 product post">
                                    <div class="pcontent postcontent">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail(); ?>
                                            <h3 class="title"><?php the_title(); ?></h3>

                                            <p class="excerpt">
                                                <?php echo short_desc(30); ?>
                                            </p>
                                        </a>
                                        <a href="<?php the_permalink() ?>" class="add_to_cart_button">
                                            <i class="fa fa-search"> </i> <span class="text">Xem Thêm</span>
                                        </a>
                                    </div>
                                </li>
                            <?php } endwhile; ?>
                    </ul>
                <?php endif; ?>

                <div class="pagination">
                    <?php
                    global $wp_query;

                    $big = 999999999; // need an unlikely integer

                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages
                    ));
                    ?>
                </div> 
            </div>
            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>


