$(document).ready(function(){
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
     $('.counter').html(scrollTop);
    if (scrollTop >= 80) {
      $('.main-header').addClass('nav-extended');
    } else if (scrollTop < 80) {
      $('.main-header').removeClass('nav-extended');
    } 
  }); 
});

