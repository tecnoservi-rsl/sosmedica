$(document).ready(function(){

$('.botones-sociales .social').mouseenter(function(){
$(this).stop();
$(this).animate({width:'160'}, 500, 'easeOutBounce',function(){});
});
$('.botones-sociales .social').mouseleave(function(){
$(this).stop();
$(this).animate({width:'43'}, 500, 'easeOutBounce',function(){});
});




$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('a.scroll-top').fadeIn();
        } else {
            $('a.scroll-top').fadeOut();
        }
    });
    
    $('a.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
});

});


