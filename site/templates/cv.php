<?php snippet('header') ?>

  <main>

    <?
    $header_options = ['page' => $page, 'subtitle' => 'work experience'];
    if ($pdf = $page->pdf_file()->toFile()) :
      $header_options['link_url'] = $pdf->url();
      $header_options['link_text'] = 'pdf';
    endif;
    snippet('page-header', $header_options);
    ?>

    <section>
      <div class="row">
        <div class="col-xs-12 col-sm-11 col-sm-offset-1 u-pb2">

          <? snippet('cv-section', ['section' => $page->work_xp()]) ?>

          <? if($graph = $page->cv_graph()->toFile()): ?>
            <figure class="u-mt2">
              <img src="<?= $graph->url() ?>" alt="<?= $page->title() ?>" />
            </figure>
          <? endif ?>

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