function scrollActions() {
  scroll = $(window).scrollTop();

  // top logo 'parallax'
  // if ($(window).width() > 767 ) {
  //   $('#logo').css('top',($logoTopInit-(scroll/3))+'px');
  // }

  allowMobileScroll = true;
  if (allowMobileScroll) {
    $('.section--homeintro, #read-on, #collaborate').each(function() {

      thisTop = $(this).offset().top;
      scrollValue = (scroll - thisTop) / 3;

      $(this).find('.section__bg-image')
        .css('-webkit-transform','translateY(' + scrollValue + 'px)')
        .css('-moz-transform','translateY(' + scrollValue + 'px)')
        .css('transform','translateY(' + scrollValue + 'px)');

    });
  }

}
$(window).scroll(function() { scrollActions(); });
$(window).resize(function() { scrollActions(); });
$(document).bind("scrollstart", function() { scrollActions(); });
$(document).bind("scrollstop", function() { scrollActions(); });
