$(function(){
    $(".hamburger").on("click", function(){
        $(this).children("span").toggleClass("open");
        $(".menu").toggleClass("open");
    });
})
$(function () {
    $('header').on('inview', function (event, isInView) {
        if (isInView) {
            $('.menu-content').addClass('fade-dawn');
            setTimeout(function () {
                $('.header-img').addClass('left-slide-in');
            }, 400);
            setTimeout(function () {
                $('.content-profile').addClass('fade-up');
            }, 800);
        }
    });
    $('.section-news').on('inview', function (event, isInView) {
        if (isInView) {
            $(this).addClass('fade-in');
        }
    });

    //すべてのsection-textにscale効果によるアニメーションを付与

    $('.sections-text-scale').on('inview', function (event, isInView) {
        if (isInView) {
            $(this).addClass('scale-show');
        }
    });

    //section-work//

    $('.work-content').on('inview', function (event, isInView){
        for(let i= 0; i<=3; i++){
            if(isInView){
                setTimeout(function(){
                $('.work-content_item').eq(i).addClass('fade-up')
                }, 300*i );
            }
        }
    });

    //section-portfolio//

    $('.left').on('inview', function(event, isInView){
        if(isInView){
            $(this).addClass('slide-left-in');
        }
    });
    $('.right').on('inview', function(event, isInView){
        if(isInView){
            $(this).addClass('slide-right-in');
        }
    });

    //section-skill//

    $('.skill-left').on('inview', function(event, isInView){
        if(isInView){
            $(this).addClass('slide-in');
        }
    });
    $('.skill-right').on('inview', function(event, isInView){
        if(isInView){
            $(this).addClass('slide-in');
        }
    });

    //contact//
    $('form').on('inview', function(event, isInView){
        if(isInView){
            $(this).addClass('fade-up');
        }
    });

});