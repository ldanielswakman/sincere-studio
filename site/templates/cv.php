<?php snippet('header', ['nav' => false]) ?>

  <main>

    <section class="section--cv-intro">
      <div class="container">

        <div class="hero">
          <figure><img src="<?= url('assets/images/avatar-daniel.png') ?>" /></figure>
          <div>
            <h1>Daniel Swakman</h1>
            <h2>Digital Designer  •  Berlin, Germany</h2>
          </div>
        </div>

        <p class="tagline">I’m a designer with 10+ years of experience, working with startups and small businesses that want to innovate and create positive impact. I focus on:</p>

        <div class="usps">
          <div class="usp">
            <img src="<?= url('assets/images/icon-intersect.svg') ?>" />
            <div>
              <h4>Design</h4>
              <p>Meticulous craftsmanship, integrated brand thinking, and an eye for detail drive my design approach.</p>
            </div>
          </div>
          <div class="usp">
            <img src="<?= url('assets/images/icon-command.svg') ?>" />
            <div>
              <h4>Tech</h4>
              <p>Tech-savvy and skilled at collaborating with development teams, I bridge the gap between design and code.</p>
            </div>
          </div>
          <div class="usp">
            <img src="<?= url('assets/images/icon-users.svg') ?>" />
            <div>
              <h4>Leadership</h4>
              <p>With leadership experience, I grow teams and spearhead design change within organizations.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="section--experience">
      <div class="container">

        <div class="page-nav" role="navigation">
          <div class="page-nav-item isActive">Experience</div>
          <div class="page-nav-item">Projects</div>
          <div class="page-nav-item">Timeline</div>
        </div>

        <div class="experience-list">
        <?php foreach ($page->work_xp()->toStructure() as $item) : ?>

          <div class="experience-item">

            <div class="header">
              <?php if($image = $item->img()->toFile() && false): ?>
                <figure class="xp-image"><img src="<?= $image->resize(null, 120)->url() ?>" alt="<?= $item->title() ?>" /></figure>
              <?php endif ?>

              <div class="title"><?= $item->title()->kirbytextinline() ?> <span class="period"><?= $item->period() ?></span></div>

              <img class="icon" src="<?= url('assets/images/icon-chevron-down.svg') ?>" />
            </div>

            <div class="content">
              <p><?= $item->text() ?></p>

              <div class="project-list">
                <?php foreach ($item->projects()->toStructure() as $project) : ?>
                <div class="project-item">
                  <h4><?= $project->title() ?></h4>
                  <?php if($image = $project->image()->toFile()): ?>
                    <figure class="project-image"><img src="<?= $image->url() ?>" alt="<?= $project->title() ?>" /></figure>
                  <?php endif ?>
                </div>
                <?php endforeach ?>
              </div>
            </div>

          </div>

        <?php endforeach ?>
        </div>

        <script>
          $(document).ready(() => {
            $('.experience-item').click(function() {
              $isActive = $(this).hasClass('isActive');
              $(this).parent().find('.experience-item').removeClass('isActive');
              if(!$isActive) {
                $(this).addClass('isActive');
              }
            });
          });
        </script>

      </div>
    </section>

    <section>
      <div class="row">
        <div class="col-xs-12 col-sm-11 col-sm-offset-1 u-pb2">

          <?php snippet('cv-section', ['section' => $page->work_xp()]) ?>

          <?php if($graph = $page->cv_graph()->toFile()): ?>
            <figure class="u-mt2">
              <img src="<?= $graph->url() ?>" alt="<?= $page->title() ?>" />
            </figure>
          <?php endif ?>

          <?php snippet('cv-section', ['title' => 'education', 'section' => $page->education()]) ?>

          <?php snippet('cv-section', ['title' => 'personal', 'section' => $page->personal()]) ?>

          <?php snippet('cv-section', ['title' => 'languages', 'section' => $page->languages()]) ?>

          <?php snippet('cv-section', ['title' => 'skills', 'section' => $page->skills()]) ?>

          <?php snippet('cv-section', ['title' => 'interests', 'section' => $page->interests()]) ?>

          <?php snippet('cv-section', ['title' => 'preferences', 'section' => $page->preferences()]) ?>

        </div>
      </div>
    </section>

      <?php echo $page->text()->kirbytext() ?>

      <?php if($page->slug() == 'contact') : ?>
        <?php snippet('twitterfeed'); ?>
      <?php endif; ?>

  </main>

<?php snippet('footer') ?>