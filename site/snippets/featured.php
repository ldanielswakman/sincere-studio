<section id="featured" class="section section--featured">
	<div class="featured-grid">
		
		<?php foreach ($recent->toPages() as $project): ?>
			<?php if($image = $project->featuredimage()->toFile()) : ?>

				<?php if($recent->toPages()->indexOf($project) === $recent->toPages()->count() - 1): ?>
					<div class="item-container"></div>
				<?php endif ?>

				<div class="item-container">
					<a href="<?= $project->url() ?>" class="item">
						<figure>
							<img src="<?= $image->thumb(['width' => 1200])->url() ?>" alt="">
						</figure>
					</a>
				</div>

			<?php endif ?>
		<?php endforeach ?>

		<div class="col-xs-12 u-mb2 u-mt1">
			<a href="<?= $pages->find('projects')->url() ?>" class="button u-mb1 u-mr1">all projects</a>
		</div>

		</div>
	</div>
</section>