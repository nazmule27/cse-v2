$(function(){
    var shrinkHeader = 100;
    const mq = window.matchMedia( "(min-width: 500px)" );
    $(window).scroll(function() {
        if (mq.matches) {
            var scroll = getCurrentScroll();
            if ( scroll >= shrinkHeader ) {
                $(".header").slideUp(200);
                $(".navbar-icon").fadeIn(200);
            }
            else {
                $(".header").slideDown(200);
                $(".navbar-icon").fadeOut(200);
            }
        }
    });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
});