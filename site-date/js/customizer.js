(function($) {
    wp.customize('mytheme_header_logo', function(value) {
        value.bind(function(newval) {
            $('.custom-header-logo').attr('src', newval);
        });
    });
    wp.customize('mytheme_header_image', function(value) {
        value.bind(function(newval) {
            $('.custom-header-image').attr('src', newval);
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