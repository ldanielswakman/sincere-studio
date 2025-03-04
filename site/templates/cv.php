<?php snippet('header', ['nav' => false]) ?>

  <main>

    <section class="section--cv-intro">
      <div class="container">

        <div class="hero">
          <figure><img src="<?= url('assets/images/avatar-daniel.png') ?>" alt="profile image" /></figure>
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
                  <img src="<?= $img->url() ?>" alt="" />
              <?php endif ?>
              <div>
                <h3><?= $item->title()->ktinline() ?></h3>
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

    <section class="section--details">

      <div class="page-nav" role="navigation">
        <a href="#experience" class="page-nav-item isActive">Experience</a>
        <a href="#projects" class="page-nav-item">Projects</a>
        <a href="#timeline" class="page-nav-item">Timeline</a>
      </div>

      <div class="nav-content isActive" id="experience">
        <div class="container">
          <?php foreach ($page->work_xp()->toStructure() as $item) : ?>

            <div class="experience-item">

              <div class="header">
                <?php if($image = $item->img()->toFile() && false): ?>
                  <figure class="xp-image"><img src="<?= $image->resize(null, 120)->url() ?>" alt="<?= $item->title() ?>" /></figure>
                <?php endif ?>

                <div class="title"><?= $item->title()->kti() ?> <span class="period"><?= $item->period() ?></span></div>

                <div class="icon"><?php snippet('svg/chevron-down') ?></div>
              </div>

              <div class="content">
                <p><?= $item->text()->kti() ?></p>

                <div class="project-list">
                  <?php foreach ($item->projects()->toStructure() as $project) : ?>

                    <?php  
                    $results = $site->find('projects')->search($project->title(), 'title');
                    $url = '';
                    if($project->linked()->value() !== 'none' && $project->linked_project()->isNotEmpty()) {
                      $url = $project->linked_project()->toPage()->url() . '?src=cv';
                    } elseif($project->linked()->value() !== 'none' && $project->linked_url()->isNotEmpty()) {
                      $url = $project->linked_url() . '?src=cv';
                    } elseif($project->linked()->value() !== 'none' && $results->count() > 0 && $results->first()->isNotEmpty()) {
                      $url = $results->first()->url() . '?src=cv';
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

      <div class="line-wrapper">
        <div class="line"></div>
      </div>

      <div class="nav-content" id="projects">
        <?php foreach($page->work_projects()->toPages() as $project): ?>

          <a href="<?= $project->url() . '?src=cv' ?>" class="project-item project-item--linked">
            <?php if($image = $project->featuredimage()->toFile()): ?>
              <figure class="project-image"><img src="<?= $image->url() ?>" alt="Cover image for <?= $project->title() ?>" /></figure>
            <?php endif ?>
            <h4><?= $project->title() ?></h4>
            <p class="description"><?= $project->description() ?></p>
          </a>

        <?php endforeach ?>
        <div style="grid-column: -1 / 1;"><a href="<?= $pages->find('projects')->url() . '#all' ?>" class="button button--outline">see all projects</a></div>
      </div>

      <div class="line-wrapper">
        <div class="line"></div>
      </div>

      <div class="nav-content" id="timeline">
        <?php if($image = $page->cv_graph()->toFile()): ?>
          <figure class="project-image"><img src="<?= $image->url() ?>" alt="CV Graph (outdated)" /></figure>
        <?php endif ?>
      </div>

    </section>

    <script>
      $(document).ready(() => {

        // Check for URL hash on page load
        var hash = window.location.hash;
        if(hash){
          // Check if a .nav-content section exists with the hash
          var targetSection = $('.nav-content').filter(function() {
            return $(this).attr('id') === hash.substr(1);
          });
          
          // If the section exists, scroll to it
          if(targetSection.length) {
            $('.page-nav-item').removeClass('isActive');
            $('.page-nav-item[href="'+hash+'"]').addClass('isActive');
            $('.nav-content').removeClass('isActive');
            targetSection.addClass('isActive');
            var scrollOffset = 96;
            
            setTimeout(function() {
              $('html, body').animate({
                scrollTop: targetSection.offset().top - scrollOffset
              }, 700);
            }, 1000);
          }
        }

        $('.experience-item .header').click(function(e) {
          $isActive = $(this).parent().hasClass('isActive');
          $(this).parent().parent().find('.experience-item').removeClass('isActive');
          if(!$isActive) {
            $(this).parent().addClass('isActive');
          }
        });

        $('.page-nav .page-nav-item').click(function(e) {
          e.preventDefault();
          if($(this).attr('href') && $('.nav-content' + $(this).attr('href')).length) {
            $('.page-nav-item').removeClass('isActive');
            $(this).addClass('isActive');
            $('.nav-content').removeClass('isActive');
            $($(this).attr('href')).addClass('isActive');
          }
        });

        // Function to update active page nav item on scroll
        function updateActiveNavItem() {
          var scrollOffset = 96;
          $('.nav-content').each(function() {
            var sectionId = $(this).attr('id');
            var scrollPos = $(window).scrollTop();
            var sectionOffset = $('#' + sectionId).offset().top - scrollOffset;
            if (scrollPos >= sectionOffset) {
              $('.page-nav-item').removeClass('isActive');
              $('.page-nav-item[href="#' + sectionId + '"]').addClass('isActive');
            }
          });
        }

        // Bind scroll event to window and call the function to update active nav item
        $(window).on('scroll', function() {
          updateActiveNavItem();
        });

        // Call the function on page load as well
        updateActiveNavItem();

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