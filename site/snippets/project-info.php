<section class="block block--info is-visible">
  <div class="row">
    <div class="col-xs-12 col-sm-7 col-md-5 col-md-offset-2 project-info-main">

      <h1><?= $page->title()->html() ?></h1>

      <blockquote><?= $page->intro()->or($page->description())->kt() ?></blockquote>

      <div class="actions">
        <a href="#block_1" target="_blank">Read on</a>

        <?php if($page->projecturl()->isNotEmpty()): ?>
          <a href="<?= $page->projecturl() ?>" target="_blank">See it live</a>
        <?php endif ?>
      </div>

    </div>
    <div class="col-xs-12 col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-1">

      <div class="project-info-side">

        <div class="disciplines">
          <!-- <h4>DISCIPLINES</h4> -->
          <?php foreach(explode(',', $page->tags()->html()) as $tag) : ?>
            <div class="discipline">
              <a href="<?= $page->parent()->url() . '/tag:' . $tag ?>">
                <?= $tag ?>
              </a>
            </div>
          <?php endforeach ?>
        </div>

        <div class="year"><?= $page->year() ?></div>

        <div class="team">
          <!-- <h4>TEAM</h4> -->
          <?php foreach($page->team()->toStructure() as $member) : ?>
            <div class="member">
              <a href="<?= $member->link() ?>" target="_blank">
                <?= $member->name()->html() ?>
              </a>
              <span class="note"><?= $member->note()->upper() ?></span>
            </div>
          <?php endforeach ?>
        </div>

      </div>

    </div>
</section>
