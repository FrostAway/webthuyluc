<?php get_header(); // This fxn gets the header.php file and renders it      ?>

<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 second-col">

                <?php if (have_posts()) : ?>
                    <div class="row">
                        <div class="col-xs-12 col-lg-8 main-post">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php $post_id = get_the_ID(); ?>
                                <h3 class="cat-title"><?php echo the_category(', '); ?></h3>

                                <article class="post">
                                    <h1 class="title"><?php the_title(); // Display the title of the post      ?></h1>
                                    <div class="post-meta">
                                        Ngày đăng: <?php the_time('d/m/y'); // Display the time it was published    ?>


                                    </div><!--/post-meta -->

                                    <div class="the-content">
                                        <?php
                                        the_content();
                                        ?>

                                        <?php wp_link_pages(); // This will display pagination links, if applicable to the post  ?>
                                    </div><!-- the-content -->

                                    <div class="meta clearfix">
                                        <div class="category">Posted in: <?php the_category(', '); ?></div>
                                        <div class="tags">Tags: <?php echo get_the_tag_list('| &nbsp;', '&nbsp;'); // Display the tags this post has, as links separated by spaces and pipes      ?></div>
                                    </div><!-- Meta -->

                                </article>

                            <?php endwhile; // OK, let's stop the post loop once we've displayed it   ?>

                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <h3 class="cat-title">Tin liên quan</h3>
                            <article class="related-post">
                                <?php
                                $cats = get_the_category();
                                $cat_ids = array();
                                foreach ($cats as $cat) {
                                    $cat_ids[] = $cat->cat_ID;
                                }
                                query_posts(array(
                                    'post_type' => 'post', 'category__in' => $cat_ids, 'post__not_in' => array($post_id), 'showposts' => 4
                                ));
                                ?>
                                <ul class="list-unstyled row products posts">
                                    <?php while (have_posts()) : the_post(); ?> 
                                        <li class="col-sm-12 product post">
                                            <div class="pcontent postcontent">
                                                <div class="row">
                                                    <div class="col-sm-12 post-image">
                                                        <a class="image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('newindex'); ?></a>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class=" content-box">
                                                            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                                            <div class="meta"><?php the_time('F j, Y'); ?></div>
                                                            <p><?php echo short_desc(18); ?></p>
                                                            <a class="button add_to_cart_button" href="/camera/?add-to-cart=61"><i class="fa fa-search"></i>Xem Thêm</a>

                                                            <div class="related-post">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endwhile;
                                    wp_reset_query(); ?>
                                </ul>
                            </article>
                        </div>
                    </div>

                    <div id="respond">
                        <div class="facebook comment">
                            <div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
                        </div>
                    </div>


<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error)    ?>

                    <article class="post error">
                        <h1 class="404">Nothing has been posted like that yet</h1>
                    </article>

<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show)    ?>

            </div><!-- #content .site-content -->

<?php get_sidebar(); ?>
        </div><!-- #primary .content-area -->
    </div>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it  ?>
