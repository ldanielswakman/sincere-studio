$(document).ready(function() {

  var $feed = $('#linkedinfeed');
  if ($feed.length === 0) return;

  $feed.html('<div class="row"><div class="col-xs-12 c-greylight"><small><em>loading posts...</em></small></div></div>');

  $.getJSON('/linkedin/posts', function(posts) {

    if (!Array.isArray(posts) || posts.length === 0) {
      $feed.html('<div class="row"><div class="col-xs-12 c-greylight"><small><em>No posts found.</em></small></div></div>');
      return;
    }

    var html = '<div class="card-container owl-carousel">';
    posts.forEach(function(post) {
      html += '<div class="card card--words card--shadow">';
      html += '<p>' + $('<div>').text(post.text).html() + '</p>';
      if (post.date) {
        html += '<small class="u-op70">' + post.date + '</small>';
      }
      html += '</div>';
    });
    html += '<a href="https://www.linkedin.com/in/ldanielswakman/recent-activity/all/" target="_blank" class="card card--words" style="padding: 6rem 1.5rem; text-align: center; color: blue;">See all posts &rarr;</a>';
    html += '</div>';

    $feed.html(html);
    $feed.closest('section').removeClass('section--collapsed');

    $('.owl-carousel').owlCarousel({
      items: 1,
      autoWidth: true,
      nav: false,
      dotsEach: 1
    });

  }).fail(function() {
    $feed.html('<div class="row"><div class="col-xs-12 c-greylight"><small><em>Could not load posts.</em></small></div></div>');
  });

});
