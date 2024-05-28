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
    <div class="col-xs-12 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1">

      <div class="project-info-side">
        
        <div class="year"><?= $page->year() ?></div>

        <div class="disciplines">
          <?php foreach($page->tags()->split() as $tag) : ?>
            <div class="discipline">
              <a href="<?= url($page->parent()->url(), ['params' => ['tag' => urlencode($tag)]]) ?>">
                <?= $tag ?>
              </a>
            </div>
          <?php endforeach ?>
        </div>

        <div class="team">
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
