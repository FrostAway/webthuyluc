<?php
function iz_create_post_type() {
    register_post_type('iz_contact', array(
        'labels' => array(
            'name' => 'Liên hệ',
            'singular_name' => 'Liên hệ'
        ),
        'description' => 'Liên hệ và đánh giá của khách hàng',
        'supports' => array(
            'title', 'excerpt'
        ),
        'hierarchical' => true,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-phone',
        'capability_type' => 'post'
    ));
    register_post_type('iz_slide', array(
        'labels' => array(
            'name' => 'Slide',
            'singular_name' => 'Slide',
            'add_new' => 'Slide mới'
        ),
        'supports' => array('title', 'excerpt', 'thumbnail'),
        'menu_icon' => 'dashicons-images-alt',
        'has_archive' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5
    ));
    register_post_type('iz_project', array(
        'labels' => array(
            'name' => 'Dự án thực hiện',
            'singular_name' => 'Dự án'
        ),
        'description' => 'Dự án đã thực hiện',
        'supports' => array(
            'title', 'excerpt', 'thumbnail'
        ),
        'hierarchical' => true,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'capability_type' => 'post'
    ));
}
add_action('init', 'iz_create_post_type');

function iz_add_contact_fields(){
    add_meta_box('show-contact-field', 'Thông tin khách hàng', 'iz_show_contact_field', 'iz_contact', 'normal', 'high', array());
}
add_action('add_meta_boxes', 'iz_add_contact_fields');
function iz_show_contact_field($post){
    $contact = get_post_custom($post->ID);
    ?>
<table id="list-table">
    <?php if(isset($contact['iz-contact-phone'][0])){ ?>
    <tr>
        <th>Số điện thoại: </th>
        <td><?= $contact['iz-contact-phone'][0]; ?></td>
    </tr>
    <?php } ?>
    <tr>
        <th>Địa chỉ Email: </th>
        <td><?php if(isset($contact['iz-contact-email'][0])){echo $contact['iz-contact-email'][0];} ?></td>
    </tr>
</table>
    <?php
}


if(isset($_POST['iz-submit-contact'])){
    if(isset($_POST['iz-sidebar-page'])){
        $title = 'Đánh giá - '.$_POST['izct-name'];
    }elseif(isset ($_POST['iz-contact-page'])){
        $title = 'Liên hệ - '.$_POST['izct-name'];
    }else{
        $title = $_POST['izct-name'];
    }
    $post_id = wp_insert_post(array(
        'post_title' => $title,
        'post_excerpt' => $_POST['izct-content'],
        'post_type' => 'iz_contact',
        'post_status' => 'pending'
    ));
    add_post_meta($post_id, 'iz-contact-email', $_POST['izct-email']);
    
    if(isset($_POST['izct-phone'])){
        add_post_meta($post_id, 'iz-contact-phone', $_POST['izct-phone']);
    }
    
    wp_redirect($_POST['iz-contact-page'].'?message=sended');
    die();
}

function show_pending_number($menu) {    
    $types = array('iz_contact');
    $status = "pending";
    foreach($types as $type) {
        $num_posts = wp_count_posts($type, 'readable');
        $pending_count = 0;
        if (!empty($num_posts->$status)) $pending_count = $num_posts->$status;

        if ($type == 'post') {
            $menu_str = 'edit.php';
        } else {
            $menu_str = 'edit.php?post_type=' . $type;
        }

        foreach( $menu as $menu_key => $menu_data ) {
            if( $menu_str != $menu_data[2] )
                continue;
            $menu[$menu_key][0] .= " <span class='update-plugins count-$pending_count'><span class='plugin-count'>" . number_format_i18n($pending_count) . '</span></span>';
            }
        }
    return $menu;
}
add_filter('add_menu_classes', 'show_pending_number');