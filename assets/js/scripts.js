$(document).ready(function() {

  // touch device detection
  $touch = ( navigator.userAgent.match(/(Android|webOS|iPad|iPhone|iPod|BlackBerry)/i) ? true : false );
  if ($touch) { $('body').addClass('isTouch') }
  var touchEvent = $touch ? 'touchstart' : 'click';

  //reading the start 'top' value of #logo
  $logoTopInit = $('#logo').offset().top - $(window).scrollTop();

  //adding animation to svg logo
  $('#logo').addClass('animated');

  // initiating smooth scroll plugin
  $('a[href^="#"]').smoothScroll( { afterScroll: function() { location.hash = $(this).attr('href'); $(this).blur(); } });

  // initiating isotope
  $('.project-container').isotope({
    // options
    itemSelector: '.project',
    layoutMode: 'fitRows',
    getSortData: {
      name: '.project-title'
    },
    sortBy: 'asc',
    sortAscending: true
  });

  // initiating scrollactions
  scrollActions();
  
});

function scrollActions() {
  scroll = $(window).scrollTop();

  // top logo 'parallax'
  if ($(window).width() > 767 ) {
    $('#logo').css('top',($logoTopInit-(scroll/3))+'px');
  }

  $('.slide').each(function() {
    var st = $(this).offset().top;
    var po = $(this).attr('data-prlx-offset');
    if (!$touch) {
      prlx_offset = (po) ? po : 0 ;
      $(this).css('background-position','center ' + ((scroll - st)/2 - prlx_offset) + 'px');
    }
  });

}


$(window).scroll(function() { scrollActions(); });
$(window).resize(function() { scrollActions(); });
$(document).bind("scrollstart", function() { scrollActions(); });
$(document).bind("scrollstop", function() { scrollActions(); });
