<?php snippet('header') ?>

  <main>


    <?php // Basic info section ?>
    <?php snippet('project-info') ?>


    <?php // Key visual section ?>
    <?php if ($keyvisual = $page->keyvisual()->toFile()): ?>
      <section id="key_visual" class="block block--keyvisual">
        <?php if ($keyvisual->type() == 'video') : ?>

            <video autoplay loop muted playsinline style="max-width: 100%">
                <source src="<?= $keyvisual->url() ?>" type="video/mp4">
            </video>

        <?php else : ?>

            <figure>
                <img src="<?= $keyvisual->url() ?>" alt="" />
            </figure>

        <?php endif ?>
      </section>
    <?php endif ?>


    <?php // Builder ?>
    <?php $i=1; foreach ($page->builder()->toBlocks() as $index => $block): ?>
      <section id="block_<?= $i ?>" class="block block--<?= $block->type() ?>">
        <?php snippet('blocks/' . $block->type(), ['block' => $block]) ?>
      </section>
      <?php $i++ ?>
    <?php endforeach ?>


    <?php // Legacy Structured Sections ?>
    <?php foreach($page->sections()->toStructure() as $key => $section): ?>

      <?php
      $bgLocation = 'full';
      if($section->bg_image_pos()->isNotEmpty() && $section->bg_image_pos() == 'left') { $bgLocation = 'left'; }
      if($section->bg_image_pos()->isNotEmpty() && $section->bg_image_pos() == 'right') { $bgLocation = 'right'; }

      $bg = 'style="padding-top: 15vh; padding-bottom: 15vh; ';

      if ($section->bg_image()->isNotEmpty() && $bgLocation == 'full') :
        $image = $section->bg_image()->toFile();
        $image_url = $image->url();
        $ratio = $image->dimensions()->height() / $image->dimensions()->width() * 100;
        $bg .= 'min-height: ';
        $bg .= ($key < 1 || $section->col_1()->isNotEmpty() ) ? '60vh;' : '40vh; padding-top: 0 !important; padding-bottom:' .  $ratio . '% !important;';
        $bg .= ' background-image: url(' . $image_url . '); background-repeat: no-repeat;';
        $bg .= ($page->featuredcolour()->isNotEmpty()) ? ' background-color: #' . $page->featuredcolour() . ';' : '';
      endif;

      if ($section->bg_colour()->isNotEmpty()) :
        $colour = (strpos($section->bg_colour()->value(), '#') !== false) ? $section->bg_colour() : '#' . $section->bg_colour();
        $bg .= 'background-color: ' . $colour . ';"';
      endif;

      $bg .= '"';
      ?>

      <section <?= 'id="part' . ($key+1) . '"' . $bg ?> class="section-bg <?= $section->classes() ?>">

        <div class="row">

          <?php if($section->num_cols() == '1' || $section->num_cols() == 'false') : ?>  
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
              <?= $section->col_1()->kirbytext() ?>
              <?= $section->col_2()->kirbytext() ?>
            </div>
          <?php else : ?>  
            <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1" <?= ($bgLocation === 'left') ? $bg : '' ?>>
              <?= $section->col_1()->kirbytext() ?>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-5 col-md-offset-1" <?= ($bgLocation === 'right') ? $bg : '' ?>>
              <?= $section->col_2()->kirbytext() ?>
            </div>
          <?php endif ?>

        </div>

      </section>

    <?php endforeach ?>


    <?php
    if($next = $page->nextListed()):
    ?>
    <a href="<?= $next->url() ?>">
      <section class="section--next-project">
        <div class="section__header">
          <h4>next up</h4>
        </div>

        <div class="row" style="align-items: center;">
          <div class="col-xs-6 col-md-2">
            <?php if($image = $next->featuredimage()->toFile(0)): ?>
              <figure>
                <img src="<?= $image->thumb(['width' => 800])->url() ?>" alt="<?= $next->title() ?>" />
              </figure>
            <?php endif; ?>
          </div>
          <div class="col-xs-6 col-md-2 last-md u-alignright" style="font-size: 3rem;">
            &rarr;
          </div>
          <div class="col-xs-12 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-2">
              <p><big>
                <?= (strlen($next->description()) > 0) ? $next->description() : '<h3>' . $next->title() . '</h3>' ?>
              </big></p>
          </div>
        </div>
      </section>
    </a>
    <?php endif ?>

  </main>

<?php snippet('footer') ?>

<script>
$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('load ready resize scroll', function() {
  $('.block').each(function() {
    if ($(this).isInViewport()) {
      $(this).addClass('is-visible');
    // } else {
    //   $(this).removeClass('is-visible');
    }
  });
});
</script>
