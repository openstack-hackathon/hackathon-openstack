jQuery(document).ready(function($){
  $(window).scroll(function(){
    if ($(window).scrollTop() > 200 || $('html').scrollTop() > 200 || $('body').scrollTop() > 200) {
      $('#scroll-top').css({ 'opacity': 1 });
    }
  });

  $('#scroll-top').click(function(){
    $('html, body').animate({
      scrollTop: 0
    }, 500, function(){
      $('#scroll-top').css({ 'opacity': 0 });
    });
  });

  $('#team .project').hover(function(){
    $(this).addClass('hover');
  });

  $('#team .project').mouseleave(function(){
    $(this).removeClass('hover');
  });
});