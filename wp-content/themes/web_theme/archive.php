<?php get_header(); ?>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 second-col">

                <?php if (have_posts()) : ?>

                    <?php $post = $posts[0]; ?>
                    <?php if (is_category()) { ?>
                        <h1 class="page-title"><?php single_cat_title(); ?></h1>
                    <?php } elseif (is_tag()) {
                        ?>
                        <h1 class="page-title"><?php single_tag_title(); ?></h1>
                    <?php } elseif (is_day()) {
                        ?>
                        <h1 class="page-title"><?php the_time('F jS, Y'); ?></h1>
                    <?php } elseif (is_month()) {
                        ?>
                        <h1 class="page-title"><?php the_time('F, Y'); ?></h1>
                    <?php } elseif (is_year()) {
                        ?>
                        <h1 class="page-title"><?php the_time('Y'); ?></h1>
                    <?php } elseif (is_author()) {
                        ?>
                        <h1 class="page-title">Author </h1>
                    <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
                        ?>
                        <h1 class="page-title">Blog </h1>			
                    <?php } ?>

                    <ul class="list-unstyled row products posts">
                        <?php while (have_posts()) : the_post(); ?> 
                            <li class="col-sm-12 col-md-6 product post">
                                    <div class="pcontent postcontent">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6 post-image">
                                                <a class="image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('newindex'); ?></a>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <div class=" content-box">
                                                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                                    <div class="meta"><?php the_time('F j, Y'); ?></div>
                                                    <p><?php echo short_desc(12); ?></p>
                                                    <a class="button add_to_cart_button" href="/camera/?add-to-cart=61"><i class="fa fa-search"></i>Xem Thêm</a>

                                                    <div class="related-post">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        <?php endwhile; ?>
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


