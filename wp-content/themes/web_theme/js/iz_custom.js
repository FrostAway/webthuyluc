(function ($) {
    $(document).ready(function(){
    $('.menu-bar .product-categories .cat-parent a .fa').click(function (e) {
        e.preventDefault();
        var children = $(this).closest('.cat-parent').children('.children');
        if (children.css('display') === 'none') {
            children.slideDown();
            $(this).removeClass('fa-angle-right');
            $(this).addClass('fa-angle-down');
        } else {
            children.slideUp();
            $(this).removeClass('fa-angle-down');
            $(this).addClass('fa-angle-right');
        }
        return false;
    });

    $('#basic-addon1').click(function () {
        $('.search-form').submit();
    });


    $(document).click(function () {
        $('.search-form #result').fadeOut(200);
    });

    var timer;

    $('.search-form #s').keyup(function () {
        $('.search-form .loading').fadeIn(200);
        $('.search-form #result').fadeIn(200);
        clearTimeout(timer);
        if ($(this).val() === '') {
            $('.search-form .loading').fadeOut(200);
            $('.search-form #result').fadeOut(200);
        }
        $.ajax({
            type: 'POST',
            url: ajaxParams.ajaxurl,
            data: {
                action: 'product_search',
                key: $(this).val()
            },
            success: function (data) {
                $('.search-form #result ul').html(data);
                $('.search-form .loading').fadeOut(200);
                $('.search-form #result .more-search').click(function () {
                    $('.search-form').submit();
                    return false;
                });
            }
        });
    });


    $(window).scroll(function () {
        var top = $(window).scrollTop();
        if (top > 217) {
            $('#adleft, #adright').animate({'top': top + 15}, 50);
        } else {
            $('#adleft, #adright').animate({'top': 217}, 50);
        }
    });



    function toggleNavbarMethod() {
        if ($(window).width() > 768) {
            $('.navbar .dropdown').on('mouseover', function () {
                $('.dropdown-toggle', this).trigger('click');
            }).on('mouseout', function () {
                $('.dropdown-toggle', this).trigger('click').blur();
            });
        }
        else {
            $('.navbar .dropdown').off('mouseover').off('mouseout');
        }
    }
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);

    });
})(jQuery);

