<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'IZWT_VERSION', 1.0 );
add_filter('woocommerce_enqueue_styles', '__return_false');

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'iz_woocommerce' ), 
                'menu-bar' => __('Menu Bar', 'iz_woocommerce')
            )
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function iz_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
        register_sidebar(array(
            'id' => 'product-cat-bar',
            'name' => 'Product Category',
            'class' => 'sidebar-menu',
            'description' => 'Danh mục sản phẩm',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class="bar-title">',
            'afer_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'id' => 'product-search',
            'name' => 'Product Search',
        ));
        
        register_sidebar(array(
            'id' => 'iz_statistics',
            'name' => 'Thống kê',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class="bar-title"><i class="fa fa-line-chart"> </i> ',
            'after_title' => '</h3>'
        ));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'iz_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

//function naked_scripts()  { 
//	// get the theme directory style.css and link to it in the header
////	wp_enqueue_style( 'iz-style', get_template_directory_uri() . '/style.css', '10000', 'all' );			
//	// add fitvid
//	wp_enqueue_script( 'iz-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), IZWT_VERSION, true );	
//	// add theme scripts
//	wp_enqueue_script( 'izweb', get_template_directory_uri() . '/js/theme.min.js', array(), IZWT_VERSION, true );
//  
//}
//add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

//menu
function iz_register_menu(){
    register_nav_menu('primary', 'Primary Menu');
}
add_action('after_setup_theme', 'iz_register_menu');


function iz_add_support_theme(){
    add_theme_support('post-thumbnails');
    add_image_size('slide', 750, 415);
    add_image_size('newindex', 152, 185);
    add_image_size('iz_project', 315, 240);
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'iz_add_support_theme');

function short_desc($limit){
    if(trim(get_the_excerpt()) != ''){
        return wp_trim_words(get_the_excerpt(), $limit);
    }else{
        return wp_trim_words(get_the_content(), $limit);
    }
}


function iz_register_custom_js(){
//    wp_register_style('iz_prettyPhoto', plugins_url('woocommerce/assets/css/prettyPhoto.css'));
//    wp_enqueue_style('iz_prettyPhoto');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui');
    
    wp_register_script('iz_bootstrap', get_template_directory_uri().'/dist/js/bootstrap.min.js');
    wp_enqueue_script('iz_bootstrap');
    
    wp_register_script('iz_cycle2', get_template_directory_uri().'/js/jquery.cycle2.min.js');
    wp_enqueue_script('iz_cycle2');
    
    wp_register_script('iz_carousel', get_template_directory_uri().'/js/jquery.cycle2.carousel.min.js');
    wp_enqueue_script('iz_carousel');
    
    wp_register_script('iz_custom', get_template_directory_uri().'/js/iz_custom.js');
    wp_localize_script('iz_custom', 'ajaxParams', array('ajaxurl'=>admin_url('admin-ajax.php')));
    wp_enqueue_script('iz_custom');
}
add_action('wp_enqueue_scripts', 'iz_register_custom_js');


//pagination
function iz_get_post_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        if (is_archive()) {
            $query->set('posts_per_page', 12);
        }
        if (is_post_type_archive('product')) {
            $query->set('posts_per_page', 12);
        }
        if(is_search()){
            $query->set('posts_per_page', 12);
        }
    }
}
add_action('pre_get_posts', 'iz_get_post_query');


//woocommerce functions
require_once 'includes/woocommerce_function.php';
//theme option
require_once 'includes/theme_option.php';
//post type
require_once 'includes/add_post_type.php';

//menu
require_once 'includes/wp_bootstrap_navwalker.php';


add_action('wp_ajax_load_more_post', 'iz_load_more_post');
add_action('wp_ajax_nopriv_load_more_post', 'iz_load_more_post');
function iz_load_more_post(){
    $page = $_POST['page'];
     $posts = query_posts(array('post_type'=>'product', 'offset'=>2*$page, 'posts_per_page'=>2));
    global $wp_query;   
    if($page <= $wp_query->found_posts){  
    while(have_posts()): the_post();
        wc_get_template_part('content', 'product');
    endwhile;    wp_reset_query();
    }else{
        echo 'no post found';
    }
   
}


add_action('do_meta_boxes', 'iz_move_meta_box');

function iz_move_meta_box(){
    remove_meta_box( 'postimagediv', array('iz_slide', 'iz_project'), 'side' );
    add_meta_box('postimagediv', __('Featured Image'), 'post_thumbnail_meta_box', 'iz_slide', 'normal', 'high');
}