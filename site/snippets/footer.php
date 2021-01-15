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
          <?php foreach($site->find('projects')->children()->listed()->sortBy('year', 'desc')->limit(3) as $p) : ?>
            <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
          <?php endforeach ?>

        </div>
        <div class="col-xs-6 col-md-4 u-pr2">

          <h4 class="u-mb025 u-op50">Latest articles</h4>
          <?php foreach($site->find('articles')->children()->listed()->sortBy('year', 'desc')->limit(3) as $p) : ?>
            <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
          <?php endforeach ?>

        </div>
        <div class="col-xs-6 col-md-3">

          <h4 class="u-mb025 u-op50">Explore</h4>
          <?php foreach($site->pages()->find('projects', 'articles', 'about', 'CV', 'architecture', 'api') as $p) : ?>
            <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
          <?php endforeach ?>

        </div>
      </div>

    </div>

    <div class="bg-blackfaded10 u-pv2 u-aligncenter">

      &copy; <a href="https://sincere.studio">Sincere—Studio</a><sup class="u-op70"><small><?php echo date("Y") ?></small></sup>

      &mdash;
      
      <div class="u-inlineblock u-op50" style="vertical-align: middle;">
        <a href="mailto:hi@sincere.studio" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/email-icon') ?></a>
        <a href="//twitter.com/intent/follow?screen_name=ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/twitter-icon') ?></a>
        <a href="https://github.com/ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/github-icon') ?></a>
        <a href="https://dribbble.com/ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/dribbble-icon') ?></a>
        <a href="https://www.linkedin.com/in/ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/linkedin-icon') ?></i></a>
      </div>

    </div>

  </footer>

  <div style="height: 64px;"></div>

  <?php e((c::get('env') !== 'DEV'), snippet('ga_tracking', [], true)) ?>

</body>
</html>