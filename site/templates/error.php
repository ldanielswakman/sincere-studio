<!DOCTYPE html>
<html lang="en">

	<? snippet('head') ?>

	<body class="u-flex-center" style="min-height: 90vh; background: #1F1F26;">

	  <main class="u-aligncenter u-ph2">

	  	<a href="<?= ($page->url() != $site->url()) ? $site->url() : '#top' ?>">
		    <? snippet('svg/logo', ['colour' => '#fff']) ?>
		    <style>#logo-svg { width: 5rem; }</style>
		  </a>

		  <span class="u-block c-white" style="font-size: 10rem; opacity: 0.1;" id="404_value">404</span>
	  	<script>
	  		val = 0;
	  		counter = setInterval(function() {
	  			if(val <= 404) {
	  				rand = Math.floor(Math.random() * 50);
	  				val += rand;
	  				if(val.toString().length == 1) {
	  					valStr = '00' + val;
	  				} else if(val.toString().length == 2) {
	  					valStr = '0' + val;
	  				} else {
	  					valStr = val;
	  				}
	  				$('#404_value').html(valStr);
	  			} else {
	  				val = 404;
	  				$('#404_value').html(val);
	  				clearInterval(counter);
	  			}
	  		}, 100);
	  	</script>

		  <h1 class="c-white u-mb05">The thing you are looking for could not be found.</h1>

		  <p class="bg-bluedull u-inlineblock" style="padding: 0 0.5rem; border-radius: 0.25rem; color: rgba(255, 255, 255, 0.5)"><?= url::current() ?></p>

		  <p class="c-white u-op30"><big>Fortunately, we've got some great alternative options:</big></p>

		  <div class="u-mt1">
		  	<a href="<?= $site->url() ?>" class="button u-mb1">Home</a>
		  	<a href="<?= $site->find('projects')->url() ?>" class="button button--outline button--white u-mb1">See projects</a>
		  	<a href="mailto:hello@ldaniel.eu?subject=[ldaniel.eu] Bug report" class="button button--outline button--reveal button--white u-mb1" target="_blank">Report bug</a>
		  </div>

	  </main>

	</body>

</html>