<?php snippet('header') ?>

  <main>

    <section class="u-mb40">

      <div class="row">

        <?php echo $page->text()->kirbytext() ?>

      </div>

    </section>

    <section class="u-nopadding">

      <div class="row">
        <div class="col-xs-12 u-aligncenter">
          <h5 class="u-mb30">RECENT WORK</h5>
        </div>
      </div>

      <div class="u-relative" style="height: 200px;">

        <div class="row row-nopadding row-full u-abs-full">
          <?php snippet('featured', array('page' => $page )); ?>
        </div>

      </div>

    </section>

    <section class="bg-grey5">
      <div class="row u-pb10 u-mb30">
        <div class="col-md-3 u-alignleft">
          <a href="http://www.twitter.com/ldanielswakman" target="_blank"><i class="ion ion-social-twitter ion-15x u-pt10"></i></a>
        </div>
        <div class="col-md-6 u-aligncenter">
          <h5 class="u-pv10">RECENT TWEETS</h5>
        </div>
        <div class="col-md-3 u-alignright">
          <a href="http://www.twitter.com/ldanielswakman" target="_blank" class="btn btn-whiteoutline">view all tweets</a>
        </div>
      </div>

      <?php snippet('twitterfeed'); ?>
    
    </section>

  </main>

<?php snippet('footer') ?>