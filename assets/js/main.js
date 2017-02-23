jQuery(document).ready(function ($) {
    
    $(function(){
        $('#login_from').submit(function(){
            $.post($('#login_from').attr('action'), $('#login_from').serialize(), function(json){
                if ( json.st == 0 ){
                    $('#login_pass').val('');
                    swal({
                      title: "Oops...",
                      text: "Sorry your email id or password is not correct!!!!",
                      type: "error",
                      confirmButtonText: "Try Again"
                    });
                } else {
                  window.location = json.url;
                  //window.history.go(-1);
                }
            },'json');
            return false;
        });
    });
    
   $( function() {
    $( "#noticedate" ).datepicker();
   } );
    
    
    
    // jQuery sticky menu
//    $(".header").sticky({topSpacing: 0});

    // Owl Carousel
    $('.notice1').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: 5000,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
   
    // Owl Carousel
    $('.success').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: 5000,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // Owl Carousel
    $('.single_job_offer_area').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: 5000,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    // Owl Carousel
    $('.dash_job_offer_area').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: 5000,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // jQuery counter
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    $(document).ready(function () {
        $(".set > a").on("click", function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass("active");
                $(this).siblings('.content').slideUp(200);
                $(".set > a i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
            } else {
                $(".set > a i").removeClass("fa-chevron-down").addClass("fa-chevron-right");
                $(this).find("i").removeClass("fa-chevron-right").addClass("fa-chevron-down");
                $(".set > a").removeClass("active");
                $(this).addClass("active");
                $('.content').slideUp(200);
                $(this).siblings('.content').slideDown(200);
            }
            return false;
        });
    });

     

    //jQuery scroll spy
    $('body').scrollspy({target: '.navbar-collapse', offset: 95

    });
    
    

    // WOW Animation//
    new WOW().init();

});

/*
$(document).ready(function() {
    var i = 0;
    $(".marqueeElement").last().addClass("last");
    $(".marqueeElement").each(function() {
          var $this = $(this);
          $this.css("top", i);
          i += $this.height();
          doScroll($this);
    });
});

function doScroll($ele) {
    var top = parseInt($ele.css("top"));
    if(top < -80) { //bit arbitrary!
        var $lastEle = $(".last");
        $lastEle.removeClass("last");
        $ele.addClass("last");
        var top = (parseInt($lastEle.css("top")) + $lastEle.height());
        $ele.css("top", top);
    }
    $ele.animate({ top: (parseInt(top)-60) },2000,'linear', function() {doScroll($(this))});
}
*/
$(document).ready(function() {
    var i = 0;
    $(".marqueeElement").last().addClass("last");
    $(".marqueeElement").each(function() {
        var $this = $(this);
        $this.css("top", i);
        i += $this.height();
        doScroll($this);
        $this.mouseover(function() {
            $(".marqueeElement").each(function() {
                $(this).stop();
            });
        }).mouseout(function() {
            $(".marqueeElement").each(function() {
                doScroll($(this));
            });
        });
    });

});



function doScroll($ele) {
    var top = parseInt($ele.css("top"));
    if (top < -80) { //bit arbitrary!
        var $lastEle = $(".last");
        $lastEle.removeClass("last");
        $ele.addClass("last");
        var top = (parseInt($lastEle.css("top")) + $lastEle.height());
        $ele.css("top", top);
    }
    $ele.animate({
        top: (parseInt(top) - 60)
    }, 2000, 'linear', function() {
        doScroll($(this))
    });
}