// Implemented from Jason Mayes' Twitter Post Fetcher
// https://github.com/jasonmayes/Twitter-Post-Fetcher
$(document).ready(function() {

  var config = {
    "profile": {"screenName": 'ldanielswakman'},
    "domId": 'twitterfeed',
    "maxTweets": 5,
    "enableLinks": true,
    "showUser": false,
    "showInteraction": false,
    "customCallback": handleTweets
  };
  function handleTweets(tweets) {
    var x = tweets.length;
    var n = 0;
    var element = document.getElementById('twitterfeed');
    var html = '<div class="card-container owl-carousel">';
    while(n < x) {
      html += '<div class="card card--words card--shadow">' + tweets[n] + '</div>';
      n++;
    }
    html += '<a href="https://www.twitter.com/ldanielswakman" target="_blank" class="card card--words" style="padding: 6rem 1.5rem; text-align: center; color: blue;">See all tweets &rarr;</div>';
    html += '</div>';
    element.innerHTML = html;

    $('#twitterfeed').closest('section').removeClass('section--collapsed');

    $('.owl-carousel').owlCarousel({
      items: 1,
      autoWidth: true,
      nav: false,
      dotsEach: 1
    });
  }

  if($('#twitterfeed').length > 0) {
    loadingHTML = '<div class="row"><div class="col-xs-12 c-greylight"><small><em>loading tweets...</em></small></div></div>';
    $('#twitterfeed').html(loadingHTML);

    twitterFetcher.fetch(config);
  }
  
});