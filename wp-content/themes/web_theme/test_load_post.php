<?php
/*
 * Template Name: load post
 */
?>

<?php
    query_posts(array('post_type'=>'product', 'offset'=>2*get_query_var('paged'), 'posts_per_page'=>2));
    while(have_posts()): the_post();
        wc_get_template_part('content', 'product');
    endwhile;    wp_reset_query();

?>