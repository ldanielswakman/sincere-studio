<dialog>
  <a href="javascript:void(0)" data-action="dialog-close" class="c-white u-alignright u-pr2 u-pt1 u-text-2x">
    &times;
  </a>
  <div class="conversation">

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
        <textarea resize="noresize" class="field" placeholder="Type your message here"></textarea>
        <div class="u-mb025">
          <small class="c-greylight u-mr05"><small>Hit Shift + Enter or</small></small>
          <button data-action="continue" class="button button--small button--outline">Continue</button>
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
        <input class="field" type="text" placeholder="Your name"><br>
        <input class="field" type="email" placeholder="Your email address"><br>
        <div class="u-mb025">
          <button data-action="continue" class="button">Send!</button>
        </div>
      </div>
    </div>

  </div>
</dialog>
