// Dropdown Menu Fade
jQuery(document).ready(function(){
    
      init();
    $(window).on('resize', init);


    $("#deconnecter").hide();
      //  $("#connecter").hide();


    $(".dropdown").hover(
        function() { $('.dropdown-menu', this).stop().fadeIn("fast");
        },
        function() { $('.dropdown-menu', this).stop().fadeOut("fast");
    });

     //back to top
    if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}
});

function init(){
    if(Modernizr.mq("screen and (max-width: 41em), screen and (max-device-width: 41em)")){
	    $("#dl-menu").show();
        }else{
        $("#dl-menu").hide();

        $("nav").show();
        }
}
