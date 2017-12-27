// Dribbble shots via API
$(document).ready(function() {

  // variables
  $token = '92024af1ed1c7f87d7fe417bcad6de02afe6cafe6a539bafbbc1b56dda6c6628';
  $num_results = 4;
  $base_url = 'https://api.dribbble.com/v2/users/ldanielswakman/shots?per_page=' + $num_results;

  // set loading content
  $container = $('#dribbblefeed');
  loadingHTML = '<div class="row"><div class="col-xs-12 c-greylight"><small><em>loading shots...</em></small></div></div>';
  $container.html(loadingHTML);

  // make request
  $.getJSON( $base_url + '&access_token=' + $token , function(r) {

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
    $container.html(html);

    $container.closest('section').removeClass('section--collapsed');
    $container.addClass('owl-carousel');

    $container.owlCarousel({
      items: 1,
      autoWidth: true,
      nav: false,
      dotsEach: 1
    });

  });
});
