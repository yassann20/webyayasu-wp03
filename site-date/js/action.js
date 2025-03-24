$(function(){
    $(".hamburger").on("click", function(){
        $(this).children("span").toggleClass("open");
        $(".menu").toggleClass("open");
    });
})
$(function () {
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

    //section-skill
    $('.skill-content__item').on('inview', function(event, isInView){
        let $this = $(this);
        if(isInView){
            $(this).addClass('fade-in');
        }
    });
    //contact//
    $('form').on('inview', function(event, isInView){
        if(isInView){
            $(this).addClass('fade-up');
        }
    });

});

$(".portofolio-img-slider").slick({
    dots: true,
});