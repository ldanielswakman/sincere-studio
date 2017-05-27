<div id="twitterfeed">
</div>

<script>

  // Implemented from Jason Mayes' Twitter Post Fetcher
  // https://github.com/jasonmayes/Twitter-Post-Fetcher

  $(document).ready(function() {

    loadingHTML = '<div class="row"><div class="col-xs-12 u-aligncenter"><i class="ion ion-ios-loop-strong ion-rotate ion-15x u-mr5"></i> loading tweets</div></div>';
    $('#twitterfeed').html(loadingHTML);

    var config = {
      "id": '437257042844073984',
      "domId": 'twitterfeed',
      "maxTweets": 5,
      "enableLinks": true,
      "showUser": false,
      "dateFunction": momentDateFormatter,
      "customCallback": handleTweets
    };
    function handleTweets(tweets) {
      var x = tweets.length;
      var n = 0;
      var element = document.getElementById('twitterfeed');
      var html = '<div class="card-container owl-carousel">';
      while(n < x) {
        html += '<div class="card card--words">' + tweets[n] + '</div>';
        n++;
      }
      html += '<a href="https://www.twitter.com/ldanielswakman" target="_blank" class="card card--words" style="padding: 6rem 1.5rem; text-align: center; color: blue;">See all tweets &rarr;</div>';
      html += '</div>';
      element.innerHTML = html;

      $('.owl-carousel').owlCarousel({
        items: 1,
        autoWidth: true,
        nav: false,
        dotsEach: 1
      });
    }
    function momentDateFormatter(date) {
      var values = date.toDateString().split(" ");
      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
      var parsed_date = Date.parse(time_value);
      var relative_to = new Date();
      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
      var shortdate = time_value.substr(4,2) + " " + time_value.substr(0,3);
      delta = delta + (relative_to.getTimezoneOffset() * 60);

      if (delta < 60) {
        return '1m ago';
      } else if(delta < 120) {
        return '1m ago';
      } else if(delta < (60*60)) {
        return (parseInt(delta / 60)).toString() + 'm ago';
      } else if(delta < (120*60)) {
        return '1h ago';
      } else if(delta < (24*60*60)) {
        return (parseInt(delta / 3600)).toString() + 'h ago';
      } else if(delta < (48*60*60)) {
        //return '1 day';
        return shortdate;
      } else {
        return shortdate;
      }
    }
    twitterFetcher.fetch(config);
  });
</script>
