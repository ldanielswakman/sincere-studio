<?php snippet('header') ?>

  <main>

    <?
    $header_options = ['page' => $page, 'subtitle' => 'work experience'];
    if ($page->hasDocuments()) :
      $header_options['link_url'] = $page->documents()->filterBy('extension', 'pdf')->first()->url();
      $header_options['link_text'] = 'pdf';
    endif;
    snippet('page-header', $header_options);
    ?>

    <section>
      <div class="row">
        <div class="col-xs-12 col-sm-11 col-sm-offset-1 u-pb2">

          <? snippet('cv-section', ['section' => $page->work_xp()]) ?>

          <figure class="u-mt2">
            <img src="<?= url('assets/images/cv-graph.png') ?>" alt="" />
          </figure>

          <? snippet('cv-section', ['title' => 'education', 'section' => $page->education()]) ?>

          <? snippet('cv-section', ['title' => 'personal', 'section' => $page->personal()]) ?>

          <? snippet('cv-section', ['title' => 'languages', 'section' => $page->languages()]) ?>

          <? snippet('cv-section', ['title' => 'skills', 'section' => $page->skills()]) ?>

          <? snippet('cv-section', ['title' => 'interests', 'section' => $page->interests()]) ?>

          <? snippet('cv-section', ['title' => 'preferences', 'section' => $page->preferences()]) ?>

        </div>
      </div>
    </section>

      <?php echo $page->text()->kirbytext() ?>

      <?php if($page->slug() == 'contact') : ?>
        <?php snippet('twitterfeed'); ?>
      <?php endif; ?>

  </main>

<?php snippet('footer') ?>