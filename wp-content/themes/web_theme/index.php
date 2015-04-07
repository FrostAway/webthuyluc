<?php get_header(); // This fxn gets the header.php file and renders it                         ?>
<div id="wrapper">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 second-col">
                <div id="slide" class="cycle-slideshow" data-cycle-fx=scrollHorz
                     data-cycle-timeout=5000 >
                    <div class="cycle-pager"></div>
                    <?php query_posts(array('post_type' => 'iz_slide')); ?>
                    <?php if (have_posts()):while (have_posts()):the_post(); ?>
                            <?php the_post_thumbnail('slide', array('class' => 'img-responsive')); ?>
                            <?php
                        endwhile;
                        wp_reset_query();
                    else:
                        ?>
                        <h1><a href="<?php echo admin_url(); ?>"</h1>
                    <?php endif; ?>
                </div>


                <?php $home_cats = get_option('iz-home-cat'); ?>


                <div class="page-part">
                    <h1 class="title">Sản phẩm nổi bật <a href="<?php ?>">Xem Thêm</a></h1>
                    <ul class="row list-unstyled products">
                        <?php
                        query_posts(array(
                            'post_type' => 'product', 'posts_per_page' => 12
                        ));
                        ?>
                        <?php if (have_posts()): while (have_posts()): the_post(); ?>

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

                                <?php
                            endwhile;
                            wp_reset_query();
                            ?>

                        <?php else: ?>

                        <?php endif; ?>
                    </ul>
                </div>

                <div class="page-part">
                    <h1 class="title">Tin tức <a href="<?php ?>">Xem Thêm</a></h1>
                    <ul class="list-unstyled row products posts">
                        <?php query_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'cat'=>1)); ?>
                        <?php if (have_posts()):while (have_posts()): the_post(); ?>
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
                                <?php
                            endwhile;
                            wp_reset_query();
                            ?>

                        <?php else: ?>
                            <h4>Không có bài viết mới</h4>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
            <!-- end right col -->
            <?php get_sidebar(); ?>
        </div>
    </div>


</div>
<!-- end wrapper -->
<div class="projects">
    <div class="container">
        <h3>Một số dự án đã thực hiện</h3>
        <?php 
        query_posts(array('post_type'=>'iz_project'));
        global $wp_query;
        $numproj = $wp_queries->found_posts;
        ?>
        <div class="slide-show">
            <div class="cycle-slideshow" 
                 data-cycle-fx=carousel
                 data-cycle-timeout=3500
                 data-cycle-carousel-visible=<?= $numproj ?>
                 data-cycle-carousel-fluid=true
                 data-cycle-prev=".projPrev"
                 data-cycle-next=".projNext"
                 data-cycle-slides="> a"
                 >
                
                <?php if(have_posts()):while (have_posts()):the_post(); ?>
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail('iz_project', array(
                        'class'=>'img-responsive'
                        )); ?>
                    <div class="title"><?php the_title(); ?></div>
                </a>
                <?php endwhile; wp_reset_query();endif; ?>
            </div>
            <div class="projPrev"><a href="#"><img src="<?= get_template_directory_uri() ?>/images/body/next.png" /></a></div>
            <div class="projNext"><a href="#"><img src="<?= get_template_directory_uri() ?>/images/body/prev.png" /></a></div>
        </div>
    </div>

</div>
</div>

<div class="separator">

</div>

<?php get_footer(); ?>