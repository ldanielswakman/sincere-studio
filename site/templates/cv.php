<?php snippet('header', ['nav' => false]) ?>

  <main>

    <section class="section--cv-intro">
      <div class="container">

        <div class="hero">
          <figure><img src="<?= url('assets/images/avatar-daniel.png') ?>" /></figure>
          <div>
            <h1><?= $page->hero_title()->ktinline() ?></h1>
            <h2><?= $page->hero_subtitle()->ktinline() ?></h2>
          </div>
        </div>

        <p class="tagline"><?= $page->hero_description()->ktinline() ?></p>

        <div class="usps">
          <?php foreach($page->hero_usps()->toStructure() as $item) : ?>
            <div class="usp">
              <?php if($img = $item->image()->toFile()) : ?>
                  <img src="<?= $img->url() ?>" />
              <?php endif ?>
              <div>
                <h4><?= $item->title()->ktinline() ?></h4>
                <p><?= $item->description()->ktinline() ?></p>
              </div>
            </div>
          <?php endforeach ?>
        </div>

        <div class="line-wrapper">
          <div class="line"></div>
        </div>

      </div>
    </section>

    <section class="section--experience">

      <div class="page-nav" role="navigation">
        <div data-target="experience-list" class="page-nav-item isActive">Experience</div>
        <div data-target="project-list" class="page-nav-item">Projects</div>
        <div data-target="timeline" class="page-nav-item">Timeline</div>
      </div>

      <div class="nav-content experience-list isActive">
        <div class="container">
          <?php foreach ($page->work_xp()->toStructure() as $item) : ?>

            <div class="experience-item">

              <div class="header">
                <?php if($image = $item->img()->toFile() && false): ?>
                  <figure class="xp-image"><img src="<?= $image->resize(null, 120)->url() ?>" alt="<?= $item->title() ?>" /></figure>
                <?php endif ?>

                <div class="title"><?= $item->title()->kirbytextinline() ?> <span class="period"><?= $item->period() ?></span></div>

                <div class="icon"><?php snippet('svg/chevron-down') ?></div>
              </div>

              <div class="content">
                <p><?= $item->text() ?></p>

                <div class="project-list">
                  <?php foreach ($item->projects()->toStructure() as $project) : ?>

                    <?php  
                    $results = $site->find('projects')->search($project->title(), 'title');
                    $url = '';
                    if($project->linked()->value() !== 'none' && $project->linked_project()->isNotEmpty()) {
                      $url = $project->linked_project()->toPage()->url();
                    } elseif($project->linked()->value() !== 'none' && $project->linked_url()->isNotEmpty()) {
                      $url = $project->linked_url();
                    } elseif($project->linked()->value() !== 'none' && $results->count() > 0 && $results->first()->isNotEmpty()) {
                      $url = $results->first()->url();
                    }

                    snippet('cv-project-block', [
                      'project' => $project,
                      'url' => $url,
                    ]);
                    ?>
                    
                  <?php endforeach ?>
                </div>
              </div>

            </div>

          <?php endforeach ?>
        </div>
      </div>

      <div class="nav-content project-list">
        <?php foreach($page->work_projects()->toPages() as $project): ?>
          <a href="<?= $project->url() ?>" class="project-item project-item--linked">
            <?php if($image = $project->featuredimage()->toFile()): ?>
              <figure class="project-image"><img src="<?= $image->url() ?>" alt="<?= $project->title() ?>" /></figure>
            <?php endif ?>
            <h4><?= $project->title() ?></h4>
            <p class="description"><?= $project->description() ?></p>
          </a>
        <?php endforeach ?>
        <div style="grid-column: -1 / 1;"><a href="<?= $pages->find('projects')->url() ?>" class="button button--outline">see all projects</a></div>
      </div>

      <div class="nav-content timeline">
        <?php if($image = $page->cv_graph()->toFile()): ?>
          <figure class="project-image"><img src="<?= $image->url() ?>" alt="CV Graph (outdated)" /></figure>
        <?php endif ?>
      </div>

    </section>

    <script>
      $(document).ready(() => {

        $('.experience-item .header').click(function() {
          $isActive = $(this).parent().hasClass('isActive');
          $(this).parent().parent().find('.experience-item').removeClass('isActive');
          if(!$isActive) {
            $(this).parent().addClass('isActive');
          }
        });

        $('.page-nav .page-nav-item').click(function() {
          if($(this).attr('data-target') && $('.' + $(this).attr('data-target')).length) {
            $('.page-nav-item').removeClass('isActive');
            $(this).addClass('isActive');
            $('.nav-content').removeClass('isActive');
            $('.' + $(this).attr('data-target')).addClass('isActive');
          }
        });

      });
    </script>


    <div class="line-wrapper">
      <div class="line"></div>
    </div>

    <section class="section--education">
      <div class="container">
        <h4>Education</h4>
        <p>Graphic Design Summer School - Central Saint Martin’s  <span class="period">2015</span><br />
  Gamification Certificate - University of Pennsylvania  <span class="period">2014</span><br />
  Dual Master’s Degree in Architecture and Urbanism - TU Delft  <span class="period">2007-2011</span><br />
  Study Abroad Architecture - South Bank University London  <span class="period">2008</span><br />
  Bachelor’s Degree - Architecture TU Delft  <span class="period">2004-2007</span><br />
  Gymnasium Diploma - Vossius Gymnasium Amsterdam  <span class="period">1998-2004</span></p>
      </div>
    </section>

  </main>

<?php snippet('footer') ?>