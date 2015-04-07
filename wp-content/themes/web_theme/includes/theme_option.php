<?php
add_action('admin_menu', 'iz_add_option_page');

function iz_add_option_page() {
    add_theme_page('Tùy chọn hiển thị', 'Hiển thị trang chủ', 'manage_options', 'iz-home-option', 'home_page_setting');
    // ten hien thi         hien thi menu     nguoi co quyen    id ten                ham setting
}

add_action('admin_init', 'iz_register_option');

function iz_register_option() {

    register_setting('iz-page-group', 'iz-hotline');
    register_setting('iz-page-group', 'iz-address');
    register_setting('iz-page-group', 'iz-email');
    register_setting('iz-page-group', 'iz-bank-addr');
    register_setting('iz-page-group', 'iz-bank-name');
    register_setting('iz-page-group', 'iz-facebook');
    register_setting('iz-page-group', 'iz-yahoo');
    register_setting('iz-page-group', 'iz-skype');
    register_setting('iz-page-group', 'iz-home-cat');
    register_setting('iz-page-group', 'iz-banner-right');
    register_setting('iz-page-group', 'iz-banner-left');
}

function home_page_setting() {
    $categories = get_categories(array());
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Display Option</h2>
        <form id="home_page_setting" method="post" action="options.php">
            <?php settings_fields('iz-page-group'); ?>

            <h3>General</h3>
            <table>
<!--                <tr>
                    <th>Chọn danh mục trang chủ: </th>
                    <td>
                        <div class="product-cat" style="max-height: 250px; overflow: auto; padding: 15px; background: #fff; margin-bottom: 15px;">
                            <?php //$cats = get_terms('product_cat', array('taxonomy' => 'product_cat', 'hide_empty' => false, 'has_archive' => false)); ?>
                            <?php //$c_cats = get_option('iz-home-cat'); ?>
                            <?php //foreach ($cats as $cat) {
                                //$check = ''; ?>
                                <?php
                                //if (in_array($cat->term_id, $c_cats)) {
                                    //$check = 'checked';
                                //}
                                ?>
                                <div><input type="checkbox" <?php //echo $check; ?> value="<?php //echo $cat->term_id ?>" name="iz-home-cat[]"  /> <span><?php //echo $cat->name ?></span></div>
                            <?php //} ?>
                        </div>
                    </td>
                </tr>-->
                <tr>
                    <th>Banner Phải: </th>
                    <td>
                        <input type="text" size="80" id="adright" name="iz-banner-right" value="<?= get_option('iz-banner-right') ?>" />
                        <button class="button" id="btn-adright" type="button">Upload</button>
                    </td>
                </tr>
                <tr>
                    <th>Banner Trái: </th>
                    <td>
                        <input type="text" size="80" id="adleft" name="iz-banner-left" value="<?= get_option('iz-banner-left') ?>" />
                        <button class="button" id="btn-adleft" type="button">Upload</button>
                    </td>
                </tr>
                <script>
            jQuery(document).ready(function () {
                var custom_uploader;
                jQuery('#btn-adright').click(function (e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Chọn ảnh',
                        button: {
                            text: 'Chọn ảnh'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function () {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#adright').val(attachment.url);
                    });
                    custom_uploader.open();
                });
                var custom_uploader2;
                jQuery('#btn-adleft').click(function (e) {
                    e.preventDefault();
                    if (custom_uploader2) {
                        custom_uploader2.open();
                        return;
                    }
                    custom_uploader2 = wp.media.frames.file_frame = wp.media({
                        title: 'Chọn ảnh',
                        button: {
                            text: 'Chọn ảnh'
                        },
                        multiple: false
                    });
                    custom_uploader2.on('select', function () {
                        attachment = custom_uploader2.state().get('selection').first().toJSON();
                        jQuery('#adleft').val(attachment.url);
                    });
                    custom_uploader2.open();
                });
            });
        </script>
                <tr>
                    <th>Hotline: </th>
                    <td><input size="80" type="text" value="<?php echo get_option('iz-hotline') ?>" name="iz-hotline" /></td>
                </tr>
                <tr>
                    <th>Email: </th>
                    <td><input size="80" type="text" value="<?php echo get_option('iz-email') ?>" name="iz-email" /></td>
                </tr>
                <tr>
                    <th>Địa chỉ: </th>
                    <td><textarea name="iz-address" rows="4" cols="80"><?php echo get_option('iz-address') ?></textarea></td>
                </tr>
                <tr>
                    <th>Facebook: </th>
                    <td><input type="text" size="80" name="iz-facebook"  value="<?php echo get_option('iz-facebook') ?>" /></td>
                </tr>
                <tr>
                    <th>Yahoo: </th>
                    <td><input type="text" size="80" name="iz-yahoo"  value="<?php echo get_option('iz-yahoo') ?>" /></td>
                </tr>
                <tr>
                    <th>Skype: </th>
                    <td><input type="text" size="80" name="iz-skype"  value="<?php echo get_option('iz-skype') ?>" /></td>
                </tr>
                <tr>
                    <th>Tài khoản ngân hàng: </th>
                    <td><input type="text" size="80" value="<?php echo get_option('iz-bank-name') ?>" name="iz-bank-name" /></td>
                </tr>
                <tr>
                    <th></th>
                    <td><textarea name="iz-bank-addr" rows="4" cols="80"><?php echo get_option('iz-bank-addr') ?></textarea></td>
                </tr>
            </table>

    <?php submit_button();                            wp_enqueue_media();?>
        </form>
        
    <?php
}
