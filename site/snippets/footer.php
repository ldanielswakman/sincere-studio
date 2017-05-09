

  <footer class="u-pv10vh">

    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-1 u-aligncenter">

        <div class="line line--white"></div>

      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-md-2"></div>
      <div class="col-xs-6 col-md-2">

        <? foreach($site->pages() as $p) : ?>
          <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
        <? endforeach ?>

      </div>
      <div class="col-xs-6 col-md-4 u-aligncenter">


        <? foreach($site->find('projects')->children()->visible()->sortBy('year', 'desc')->limit(10) as $p) : ?>
          <a href="<?= $p->url() ?>"><?= $p->title() ?></a><br>
        <? endforeach ?>

      </div>
      <div class="col-xs-6 col-md-3">

        &copy; <a href="http://ldaniel.eu">ldaniel.eu</a> &mdash; <?php echo date("Y") ?>

      </div>
    </div>

    <div class="row">
      
      <!-- <div class="col-md-4 u-aligncenter">
        <a href="mailto:hello@ldaniel.eu" target="_blank"><i class="ion ion-ios-email ion-2x u-inlineblock u-ph10"></i></a>
        <a href="https://www.twitter.com/ldanielswakman" target="_blank"><i class="ion ion-social-twitter ion-2x u-inlineblock u-ph10"></i></a>
        <a href="https://github.com/ldanielswakman" target="_blank"><i class="ion ion-social-github ion-2x u-inlineblock u-ph10"></i></a>
        <a href="https://www.linkedin.com/in/ldanielswakman" target="_blank"><i class="ion ion-social-linkedin ion-2x u-inlineblock u-ph10"></i></a>
        <a href="https://dribbble.com/ldanielswakman" target="_blank"><i class="ion ion-social-dribbble ion-2x u-inlineblock u-ph10"></i></a>
      </div> -->

    </div>

  </footer>

  <div style="height: 78px;"></div>

  <?php snippet('ga_tracking') ?>

</body>
</html>