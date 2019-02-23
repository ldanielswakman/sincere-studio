<? snippet('header') ?>

  <main>

      <? snippet('page-header', ['page' => $page]) ?>

      <section style="min-height: 70vh;">
        <div id="twittering"></div>
      </section>

      <script>
        // Implemented from Jason Mayes' Twitter Post Fetcher
        // https://github.com/jasonmayes/Twitter-Post-Fetcher
        $(document).ready(function() {

          var config = {
            "profile": {"screenName": 'ldanielswakman'},
            "domId": 'twittering',
            "maxTweets": 4,
            "enableLinks": true,
            "showUser": false,
            "customCallback": handleTweets
          };
          function handleTweets(tweets) {
            var x = tweets.length;
            var n = 0;
            var element = document.getElementById('twittering');
            var html = '<div class="card-container owl-carousel">';
            while(n < x) {
              html += '<div class="card card--words card--shadow">' + tweets[n] + '</div>';
              n++;
            }
            html += '<a href="https://www.twitter.com/ldanielswakman" target="_blank" class="card card--words" style="padding: 6rem 1.5rem; text-align: center; color: blue;">See all tweets &rarr;</div>';
            html += '</div>';
            element.innerHTML = html;
          }

          if($('#twittering').length > 0) {
            twitterFetcher.fetch(config);
          }
          
        });
      </script>

  </main>

<? snippet('footer') ?>