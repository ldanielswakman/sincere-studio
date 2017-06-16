  <footer>

    <div class="u-pv10vh">

      <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 u-aligncenter">

          <div class="line line--white"></div>

        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-2"></div>
        <div class="col-xs-6 col-md-2">


          <h4 class="u-mb025 u-op50">Latest Projects</h4>
          <? foreach($site->find('projects')->children()->visible()->sortBy('year', 'desc')->limit(3) as $p) : ?>
            <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
          <? endforeach ?>

        </div>
        <div class="col-xs-6 col-md-4 u-pr2">

          <h4 class="u-mb025 u-op50">Latest articles</h4>
          <? foreach($site->find('articles')->children()->visible()->sortBy('year', 'desc')->limit(3) as $p) : ?>
            <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
          <? endforeach ?>

        </div>
        <div class="col-xs-6 col-md-3">

          <h4 class="u-mb025 u-op50">Explore</h4>
          <? foreach($site->pages()->find('projects', 'articles', 'about', 'CV', 'architecture', 'api') as $p) : ?>
            <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
          <? endforeach ?>

        </div>
      </div>

    </div>

    <div class="bg-blackfaded10 u-pv2 u-aligncenter">

      &copy; <a href="http://ldaniel.eu">ldaniel.eu</a> &mdash; <?php echo date("Y") ?>
      
      <div class="u-inlineblock u-op50">
        <a href="mailto:hello@ldaniel.eu" target="_blank">mail</a>
        <a href="https://www.twitter.com/ldanielswakman" target="_blank" class="a--twitter"><? snippet('svg/twitter-icon') ?></a>
        <a href="https://github.com/ldanielswakman" target="_blank">gh</a>
        <a href="https://dribbble.com/ldanielswakman" target="_blank">dr</a>
        <a href="https://www.linkedin.com/in/ldanielswakman" target="_blank">li</i></a>
        <a href="https://dribbble.com/ldanielswakman" target="_blank"><i class="ion ion-social-dribbble ion-2x u-inlineblock u-ph10"></i></a>
      </div>

    </div>

  </footer>

  <div style="height: 64px;"></div>

  <? ecco((c::get('env') !== 'DEV'), snippet('ga_tracking', [], true)) ?>

</body>
</html>