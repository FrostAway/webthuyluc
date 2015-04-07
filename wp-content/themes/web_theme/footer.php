
        <div id="footer">
            
            <div class="second-ft">
                <div class="container"
                     <div class="row">
                        <div class="col-sm-3 ft-col">
                            <h3>Thủy lực Sinh Sơn</h3>
                            <div><?php echo get_option('iz-address') ?></div>
                            <div>Hotline: <?php echo get_option('iz-hotline') ?></div>
                            <div><?php get_option('iz-email') ?></div>

                            <hr />
                            <div>Tài khoản <?= get_option('iz-bank-name') ?></div>
                            <div><strong><?php echo get_option('iz-bank-addr'); ?></strong></div>
                        </div>
                        <div class="col-sm-6 ft-col">
                            <h3>Tư vấn thiết kế lắp đặt Thủy lực</h3>
                            <?php query_posts(array('post_type'=>'post', 'cat'=>62, 'posts_per_page'=>12)); ?>
                            <ul class="row list-unstyled pp-camera">
                                <?php if(have_posts()):while(have_posts()):the_post(); ?>
                                
                                <li class="col-sm-6"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; wp_reset_query(); endif; ?>
                            </ul>
                        </div>

                        <div class="col-sm-3 ft-col">
                            <h3>Sản phẩm</h3>
                            <?php $terms = get_terms('product_cat', array('parent'=>0));?> 
                            <ul class="list-unstyled">
                                <?php foreach ($terms as $term){ ?>
                                <li><a href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="col-sm-6 social-icon pull-left">
                            <a href="<?= get_option('iz-google-plus') ?>"><i class="fa fa-google-plus-square"></i></a>
                            <a href="<?= get_option('iz-facebook') ?>"><i class="fa fa-facebook-square"></i></a>
                            <a href="<?= get_option('iz-twitter') ?>"><i class="fa fa-twitter-square"></i></a>
                            <a href="ymsgr:sendIM?<?= get_option('iz-yahoo') ?>"><img border="0" src="http://opi.yahoo.com/online?u=hotro&m=g&t=7"></i></a>
                            <a href="skype:<?= get_option('iz-skype') ?>?chat"><i class="fa fa-skype"></i></a>
                        </div>

                        <div class="col-sm-6 pull-right">
                            <div>
                                <div>Copyright &copy;2015 - All right reserved by thuylucsinhson.com</div>
                                <div>Designed By <a href="iziweb.vn">Iziweb.vn</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end footer -->
            
            
<?php wp_footer(); ?>

</body>
</html>
