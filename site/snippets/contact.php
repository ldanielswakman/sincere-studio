<dialog class="dialog dialog--contact">
  <div class="dialog__header">
    <h3>get in touch</h3>
    <a href="javascript:void(0)" data-action="dialog-close">&times;</a>
  </div>

  <form class="conversation" action="<?= $site->url() . '/contactform_post' ?>" method="POST">

    <div class="bubble-wrap" id="bubble1">
      <div class="bubble">
        <div class="bubble__loader">...</div>
        <div class="bubble__content">Hi there! Thanks for visiting.</div>
      </div>
    </div>

    <div class="bubble-wrap" id="bubble2">
      <div class="bubble">
        <div class="bubble__loader">...</div>
        <div class="bubble__content">Please leave your message after the tone:</div>
      </div>
    </div>

    <div class="bubble-wrap bubble-wrap--right" id="bubble3">
      <div class="bubble bubble--white">
        <!-- <input class="field" type="text" placeholder="Your email address"><br> -->
        <textarea resize="noresize" name="message" required class="field" placeholder="Type your message here"></textarea>
        <div class="u-mb025">
          <small class="c-greylight u-mr05 u-hide-for-touch"><small>Hit Shift + Enter or</small></small>
          <a href="javascript:void(0)" data-action="continue" class="button button--small button--outline">Continue</a>
        </div>
      </div>
    </div>

    <div class="bubble-wrap" id="bubble4">
      <div class="bubble">
        <div class="bubble__loader">...</div>
        <div class="bubble__content">Great! And how can I reach you?</div>
      </div>
    </div>

    <div class="bubble-wrap bubble-wrap--right" id="bubble5">
      <div class="bubble bubble--white">
        <input class="field" name="name" type="text" placeholder="Your name"><br>
        <input class="field" name="email" required type="email" placeholder="Your email address"><br>
        <div class="u-mb025">
          <button type="submit" class="button">Send!</button>
        </div>
      </div>
    </div>

    <div class="bubble-wrap" id="bubble_formsending">
      <div class="bubble">
        <div class="bubble__loader">...</div>
        <div class="bubble__content">Sending your message...</div>
      </div>
    </div>

    <div class="bubble-wrap" id="bubble_formresponse">
      <div class="bubble">
        <div class="bubble__loader">...</div>
        <div class="bubble__content"></div>
      </div>
    </div>

    <div class="bubble-wrap" id="bubble_success">
      <div class="bubble">
        <div class="bubble__loader">...</div>
        <div class="bubble__content">
          Thank you! I'll be in touch soon.<br>
          <a href="javascript:void(0)" data-action="dialog-close" class="button button--white u-mt1 u-mb1">Browse on!</a>
        </div>
      </div>
    </div>

    <input name="source" class="u-hide" type="text" value="<?= $page->title()->html() ?>">

    <?//= csrf_field() ?>
    <?//= honeypot_field() ?>

  </form>
  <div class="dialog__footer">
    <a href="mailto:hello@ldaniel.eu?subject=[ldaniel.eu] Hello" class="button button--small button--outline button--white button--reveal" target="_blank">I prefer email</a>
  </div>

</dialog>
