<?php
/*
 * Template Name: Contact page
 */
?>

<?php get_header() ?>


<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 second-col">
                
                <h3 class="page-title">Liên hệ</h3>
                <article class="post">
                    
                      <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var myLatlng = new google.maps.LatLng(21.137346,105.846205);
                var mapOptions = {
                    zoom: 17,
                    center: myLatlng
                };
                var map = new google.maps.Map(document.getElementById('contact-ggmap'), mapOptions);
                var contentString = '<p class="location"><?php echo get_option('iz-address') ?></p>';
                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    width: 200
                });
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Viavo'
                });
                infowindow.open(map, marker);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
            
        <div style="width: 90%; margin: 10px auto; height: 300px;" id="contact-ggmap">
                
            </div>
                    
                <form method="post" action="" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3">Họ tên: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control required" name="izct-name" placeholder="Họ Tên" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Email: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control required" name="izct-email" placeholder="example@mail.com" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Số điện thoại: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="izct-phone" placeholder="01234567899"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Nội dung: </label>
                        <div class="col-sm-9">
                            <textarea class="form-control required" name="izct-content" placeholder="Nội dung" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" value="Gửi Liên Hệ" name="btn-contact-submit" class="btn btn-success" />
                        </div>
                    </div>
                    <?php global $wp;
                    $current_url = home_url(add_query_arg(array(), $wp->request)) ?>
                    <input type="hidden" name="iz-contact-page" value="<?php echo $current_url; ?>" />
                    <input type="hidden" name="iz-submit-contact" />
                </form>
                </article>
            </div>
<?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>