$(document).ready(function() {

  // touch device detection
  $touch = ( navigator.userAgent.match(/(Android|webOS|iPad|iPhone|iPod|BlackBerry)/i) ? true : false );
  if ($touch) { $('body').addClass('isTouch') }
  var touchEvent = $touch ? 'touchstart' : 'click';

  //reading the start 'top' value of #logo
  // $logoTopInit = $('#logo').offset().top - $(window).scrollTop();
  // $logoTopInit = ($('body').hasClass('home')) ? 30 : -30;

  //adding animation to svg logo
  $('body').addClass('isLoaded');
  $('.logo').addClass('animated');
  //adding animation to svg logo
  setTimeout(function() { $('body').removeClass('header-full'); }, 1500);


  // add autosize to textareas
  autosize($('textarea'));

  // initiating smooth scroll plugin
  $('a[href^="#"]').smoothScroll( { afterScroll: function() { location.hash = $(this).attr('href'); $(this).blur(); } });

  // initiating isotope
  if($('.project-container').length > 0) {
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
  }

  // initiating scrollactions
  scrollActions();
  
});


function scrollActions() {
  scroll = $(window).scrollTop();

  // top logo 'parallax'
  // if ($(window).width() > 767 ) {
  //   $('#logo').css('top',($logoTopInit-(scroll/3))+'px');
  // }

  allowMobileScroll = true;
  if (allowMobileScroll) {
    $('section').each(function() {

      thisTop = $(this).offset().top;
      scrollValue = (scroll - thisTop) / 1.5;

      $(this).find('.section__bg-image')
        .css('-webkit-transform','translateY(' + scrollValue + 'px)')
        .css('-moz-transform','translateY(' + scrollValue + 'px)')
        .css('transform','translateY(' + scrollValue + 'px)');

    });
  }

}







// Owl Carousel
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    items: 1,
    autoWidth: true,
    nav: false,
    dotsEach: 1
  });
});






// Location via L Daniel API
$(document).ready(function() {
  if($('#ldaniel_location').length > 0 && $('#ldaniel_location').attr('data-url').length > 0) {

    $url = $('#ldaniel_location').attr('data-url');

    $.getJSON( $url, function(r) {

      $.each(r['location'], function(i, item) {
        if (item['year'] == '2017') {
          current = item['location_city'] + ' ' + item['location_flag'];
        }
      });

      if(current) {
        html = 'Currently in: <strong>';
        html += current;
        html += '</strong>';

        $('#ldaniel_location').html(html);
      } else {
        console.log('No location found for curent year');
      }

    });

  }
});




// Dribbble shots via API
$(document).ready(function() {
  $token = '92024af1ed1c7f87d7fe417bcad6de02afe6cafe6a539bafbbc1b56dda6c6628';
  $num_results = 4;
  $base_url = 'https://api.dribbble.com/v1/users/ldanielswakman/shots?per_page=' + $num_results;
  // curl -i -H "Authorization: Bearer " 
  $.getJSON( $base_url + '&access_token=' + $token , function(r) {

    $container = $('#dribbblefeed');
    $container.html();

    shuffle(r);
    html = '';
    $.each(r, function(i, item) {
      html += '<a href="' + item['html_url'] + '" class="card card--shadow" target="_blank">';
      html += '<figure>';
      html += '<img src="' + item['images']['normal'] + '" alt="">';
      html += '</figure>';
      html += '</a>';
    });
    html += '<a href="https://www.dribbble.com/ldanielswakman" target="_blank" class="card card--words card--shadow" style="padding: 6rem 1.5rem; text-align: center; color: blue;">See all shots &rarr;</div>';
    $container.append(html);

    $container.closest('section').removeClass('section--collapsed');
    $container.addClass('owl-carousel');

    $container.owlCarousel({
      items: 1,
      autoWidth: true,
      nav: false,
      dotsEach: 1
    });

    // console.log('yay!');

  });
});




// Shuffle function
// From https://css-tricks.com/snippets/javascript/shuffle-array/
function shuffle(o) {
  for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
  return o;
};




$(window).scroll(function() { scrollActions(); });
$(window).resize(function() { scrollActions(); });
$(document).bind("scrollstart", function() { scrollActions(); });
$(document).bind("scrollstop", function() { scrollActions(); });
