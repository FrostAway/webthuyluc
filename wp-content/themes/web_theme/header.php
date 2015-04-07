<?php
/* ----------------------------------------------------------------------------------- */
/* This template will be called by all other template files to begin 
  /* rendering the page and display the header/nav
  /*----------------------------------------------------------------------------------- */
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>
        <?php bloginfo('name'); // show the blog name, from settings ?> | 
        <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
    </title>

    <link rel="profile" href="http://iziweb.vn" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/font-awesome.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700,800&subset=latin,latin-ext,vietnamese' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/main.css" />
    <?php ?>

    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
 
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1418616455105788&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <div id="adright" class="hidden-sm hidden-xs hidden-md" style="display: none;">
        <img  src="<?= get_option('iz-banner-right'); ?>" />
    </div>
    <div id="adleft" class="hidden-sm hidden-xs hidden-md" style="display: none;">
        <img  src="<?= get_option('iz-banner-left'); ?>" />
    </div>


    <div id="header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-sm-3 pull-left">
                    <a href="<?php bloginfo('home') ?>"><img src="<?php bloginfo('template_directory') ?>/images/header/logo.png" title="LOGO" alt="LOGO" /></a>
                </div>
                <div class="col-sm-9 right-header pull-right">
                    
                    <?php iz_woo_template_cart(); ?>
                    <div class="hotline">
                        <span class="fa fa-phone icon"> </span>
                        <div class="text">
                            <div><strong>HOTLINE</strong></div>
                            <div><span>Tư vấn lắp đặt</span></div>
                        </div>
                    </div>

                    <div class="phones">
                        <h1>0913.501.459 - 0985.380.880</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-menu">
        <div class="container">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <a><span id="menu-small" class="visible-xs pull-left navbar-brand">Menu</span></a>
                    <button class="btn btn-navbar navbar-toggle pull-right" data-target=".navbar-header-menu" data-toggle="collapse" type="button">
                        <i class=" fa fa-bars"></i>
                    </button>
                </div>

                <div class="navbar-header-menu navbar-collapse collapse">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'primary',
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => '',
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker()
                    ));
                    ?>
                    <?php get_search_form(); ?>
                </div>

            </nav>

        </div>
    </div>
    <!-- end header -->

    <?php if (isset($_GET['message']) && $_GET['message'] == 'sended') { ?>
        <script>
            alert('Đã gửi Nội dung của bạn! Cãm ơn bạn!');
        </script>
    <?php } ?>
