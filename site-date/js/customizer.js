(function($) {
    wp.customize('mytheme_header_logo', function(value) {
        value.bind(function(newval) {
            $('.custom-header-logo').attr('src', newval);
        });
    });
    wp.customize('mytheme_header_img', function(value) {
        value.bind(function(newval) {
            $('.custom-header-img').attr('src', newval);
        });
    });
    wp.customize('custom_header_profile_img', function(value) {
        value.bind(function(newval) {
            $('.custom-header-profile-img').attr('src', newval);
        });
    });
    wp.customize('mytheme_header_headline_h2', function(value) {
        value.bind(function(newval) {
            $('.custom-header-headline-h2').text(newval);
        });
    });
    wp.customize('mytheme_header_text', function(value) {
        value.bind(function(newval) {
            $('.custom-header-text').text(newval);
        });
    });
})(jQuery);