jQuery(document).ready(function($){

 
  // jQuery sticky menu
    $(".header").sticky({topSpacing:0});
 
 
  $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
 
 
 $('#bar1,#bar2').barfiller();
 
 
 
 
 // WOW Animation//
	new WOW().init();
 
 
 
 
 
});