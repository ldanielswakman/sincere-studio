$(document).ready(function() {
  //reading the start 'top' value of #logo
  $logoTopInit = $('#logo').offset().top - $(window).scrollTop();
  //adding animation to svg logo
  $('#logo').addClass('animated');
});

function scrollActions() {
  scroll = $(window).scrollTop();
  if ($(window).width() > 767 ) {
    $('#logo').css('top',($logoTopInit-(scroll/3))+'px');
  } else {
  }
}

$(window).scroll(function() { scrollActions(); });
$(window).resize(function() { scrollActions(); });
$(document).bind("scrollstart", function() { scrollActions(); });
$(document).bind("scrollstop", function() { scrollActions(); });
