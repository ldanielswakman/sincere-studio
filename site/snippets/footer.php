  <footer>

    <div class="u-pv10vh">

      <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 u-aligncenter">

          <div class="line line--white"></div>

        </div>
      </div>

    </div>

    <div class="footer-info">

      <a href="https://sincere.studio">Sincere—Studio</a>
      
      <div class="u-inlineblock u-op50" style="vertical-align: middle;">
        <a href="mailto:hi@sincere.studio" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/email-icon') ?></a>
        <a href="//twitter.com/intent/follow?screen_name=ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/twitter-icon') ?></a>
        <a href="https://github.com/ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/github-icon') ?></a>
        <a href="https://dribbble.com/ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/dribbble-icon') ?></a>
        <a href="https://www.linkedin.com/in/ldanielswakman" target="_blank" class="u-floatleft u-ml1 a--icon"><?php snippet('svg/linkedin-icon') ?></i></a>
      </div>

    </div>

  </footer>

  <!-- Menu placeholder -->
  <div style="height: 64px;"></div>

  <?php e((c::get('env') !== 'DEV'), snippet('ga_tracking', [], true)) ?>

</body>
</html>