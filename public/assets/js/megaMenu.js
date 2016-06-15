// Dropdown Menu Fade
jQuery(document).ready(function(){

    //menu responsif
    $(document).mouseup(function (e){
    var container = $("#wrapper");

    if (!container.is(e.target)
        && container.has(e.target).length === 0)
    {
      $('.menu').css({"transform": "translate3d(-240px, 0, 0)"});
      $('#wrapper').unbind('click');
    }
});

    init();
    $(window).on('resize', init);
    $('[data-toggle="tooltip"]').tooltip();


    //$("#deconnecter").show();
    //$("#connecter").hide();


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
    if(Modernizr.mq("screen and (max-width: 62em), screen and (max-device-width: 62em)")){
	    $(".menu").show();
        $(".headerResp").show();
        }else{
        $(".menu").hide();
        $(".headerResp").hide();

        $("nav").show();
        }
}
