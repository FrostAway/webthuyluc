<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 first-col">
   
    <div class="menu-bar">
        <div class="navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                    <span class="sr-only">Sản phẩm</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Sản phẩm</span>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <?php dynamic_sidebar('product-cat-bar'); ?>
            </div><!--/.nav-collapse -->
        </div>

    </div>


    <div class="menu-bar stats">
        <?php dynamic_sidebar('iz_statistics'); ?>
    </div>

    <div class="menu-bar reviews">
        <h3><i class="fa fa-users"></i> Đánh giá của K.H</h3>
        <form class="" method="post" action="">
            <label>Họ tên: </label>
            <input class="form-control" name="izct-name" type="text" placeholder="Họ tên" required="" />
            <label>Email: </label>
            <input class="form-control" name="izct-email" type="email" placeholder="email" required="" />
            <label>Đánh giá của khách hàng</label>
            <textarea name="izct-content" rows="5" class="form-control" placeholder="Nội dung"></textarea>
            <?php global $wp;
            $current_url = home_url(add_query_arg(array(), $wp->request))
            ?>
            <input type="hidden" name="iz-sidebar-page" value="<?php echo $current_url; ?>" />
            <input type="hidden" name="iz-submit-contact" />
            <button type="submit"><span class="fa fa-thumbs-o-up"> </span><span class="text">Gửi Nhận xét</span></button>
        </form>
    </div>
</div>
<!-- end left col -->
<?php wp_reset_query(); ?>