<?php snippet('header') ?>

  <main>

    <section class="nopadding u-relative" style="border-bottom: 1px solid #ddd">

      <div class="row row-nopadding row-full u-abs-full">
        <?php // snippet('featured', array('page' => $page )); ?>
      </div>

        <p class="text"><?php echo $page->text()->kirbytext() ?></p>

      </div>

    </section>

    <section id="projects">

      <div class="row">
        <div class="col-xs-12">

          <h3 class="u-mb20">
            projects

            <span class="filter-container">
              —
              <select id="project_filter" data-base-url="<?php echo $page->url(); ?>">
                <?php
                // build a list of existing tags in subpages
                $tag_list = $page->children()->visible()->pluck('tags', ',', true);
                array_unshift($tag_list, 'all');
                foreach($tag_list as $tag):
                  $selected = ($tag == urldecode(param('tag'))) ? ' selected' : '';
                  echo '<option' . $selected . '>' . $tag . '</option>';
                endforeach;
                ?>
              </select>
            </span>
            <script>
              $('#project_filter').change(function() {
                $urlpath = ($(this).val() === 'all') ? '' : '/tag:' + $(this).val();
                window.location.href = $(this).attr('data-base-url') + $urlpath + '#projects';
              });
            </script>

            <?php if($tag = param('tag')) : ?>
            <a href="<?php echo $page->url() . '#projects' ?>" class="u-ml10">
              <i class="ion ion-android-close"></i>
            </a>
            <?php endif; ?>

          </h3>


        </div>
      </div>

      <div class="row project-container">
        <?php 
        $projects = $page->children()->visible()->sortBy('year', 'desc');
        if($tag = param('tag')) {
          $projects = $projects->filterBy('tags', urldecode($tag), ',');
        }
        foreach($projects as $project): ?>
        <div class="col-md-4 project u-pv40">
          <a href="<?php echo $project->url() ?>" title="<?php echo $project->title()->html() ?>" class="u-inlineblock">

            <?php if ($img = $project->featuredimage()): ?>
              <?php
              $style = 'background-image: url(\'';
              $style .= thumb($project->image($img), array('width' => 600, 'quality' => 80))->url();
              $style .= '\');';
              $style .= (strlen($project->featuredcolour()) > 0) ? ' background-color: #' . $project->featuredcolour() . ';' : '';
              ?>
              <div class="project-teaser u-mb20" style="<?php echo $style ?>"></div>
            <?php endif; ?>

            <h4 class="project-title u-mb10"><?php echo $project->title()->html() ?></h4>
            <p class="meta"><?php echo $project->description() ?></p>

          </a>
          <p class="meta">
            <small>
              <?php snippet('project_tags', array('page' => $project) ); ?>
            </small>
          </p>
        </div>
        <?php endforeach; ?>
      </div>

    </section>

    <?php if($page->slug() == 'work'): ?>
    <section class="bg-grey2">
      <div class="row">
        <div class="col-md-6">

          <big><em>
            <a href="<?php echo u('/architecture') ?>" class="">My background is in architecture and urban design. </a>
          </em></big>
          
        </div>
      </div>
    </section>
    <?php endif; ?>

  </main>

<?php snippet('footer') ?>