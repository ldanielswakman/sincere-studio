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

        <div class="line-wrapper">
          <div class="line"></div>
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

              <div class="icon"><?php snippet('svg/chevron-down') ?></div>
            </div>

            <div class="content">
              <p><?= $item->text() ?></p>

              <div class="project-list">
                <?php foreach ($item->projects()->toStructure() as $project) : ?>

                  <?php if($project->linked_project()->isNotEmpty()): ?>
                    <a href="<?= $project->linked_project()->toPage()->url() ?>" class="project-item project-item--linked">
                      <h4><?= $project->title() ?> <?php snippet('svg/chevron-down') ?></h4>
                      <?php if($image = $project->image()->toFile()): ?>
                        <figure class="project-image"><img src="<?= $image->url() ?>" alt="<?= $project->title() ?>" /></figure>
                      <?php endif ?>
                    </a>
                  <?php else : ?>
                    <div class="project-item">
                      <h4><?= $project->title() ?></h4>
                      <?php if($image = $project->image()->toFile()): ?>
                        <figure class="project-image"><img src="<?= $image->url() ?>" alt="<?= $project->title() ?>" /></figure>
                      <?php endif ?>
                    </div>
                  <?php endif ?>
                  
                <?php endforeach ?>
              </div>
            </div>

          </div>

        <?php endforeach ?>
        </div>

        <script>
          $(document).ready(() => {
            $('.experience-item .header').click(function() {
              $isActive = $(this).parent().hasClass('isActive');
              $(this).parent().parent().find('.experience-item').removeClass('isActive');
              if(!$isActive) {
                $(this).parent().addClass('isActive');
              }
            });
          });
        </script>

      </div>
    </section>


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