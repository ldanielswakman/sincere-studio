// Contact Form Dialog
$(document).ready(function() {

  // Continue button
  $('dialog [data-action="continue"]').on('click touchstart', function (e) {
    e.preventDefault();
    bubbleRun($(this).closest('.bubble-wrap'));
  });
  // Continue key combination (Shift + Enter)
  $('dialog .bubble').find('textarea, input').on('keypress keydown', function(e) {
    if(e.keyCode == 13 && e.shiftKey == true) {
      e.preventDefault();
      bubbleRun($(this).closest('.bubble-wrap'));
    }
  });
  // Form submission handling
  $('dialog form').on('submit', function(e) {
    e.preventDefault();
    $submit_btn = $(this).find('[type="submit"]');
    bubbleRun($submit_btn.closest('.bubble-wrap'));
    $form = $submit_btn.closest('form');
    $form.addClass('isSending');

    // TEMPORARY: data doesn't get sent yet
    console.log($form.serialize());
    setTimeout(function() { bubbleRun($('#bubble_success')) }, 2000);
    setTimeout(function() { closeContactForm() }, 3000);
  });
  // Dialog close button
  $('dialog [data-action="dialog-close"]').on('click touchstart', function (e) {
    closeContactForm();
  });

});
// Dialog close key (Esc)
$(document).on('keydown', function(e) {
  if(e.keyCode == 27) { closeContactForm() }
});

// open Contact From
function openContactForm() {
  $('body').addClass('dialogIsActive');
  setTimeout(function() {
    bubbleRun( $('dialog').find('.bubble-wrap#bubble1') );
  }, 500);
}

// close Contact Form
function closeContactForm() {
  $('.bubble-wrap').removeClass('isLoaded');
  $('form.conversation').removeClass('isSending');
  $('body').removeClass('dialogIsActive');
}

// 'Run' Bubble
function bubbleRun($obj, stophere) {
  nextTimeout = 0;
  $form = $obj.closest('form');

  if(!$obj.hasClass('isLoaded')) {
    $obj.addClass('isLoaded');
    if($form[0]) {
      $form.scrollTop($form[0].scrollHeight);
    }
    $obj.find('textarea, input').first().focus();
    nextTimeout = 1500;
  }

  if(stophere !== true) {
    $next = $obj.next();
    if(!$next.hasClass('bubble-wrap--right')) {
      setTimeout( function() { bubbleRun($next); }, nextTimeout);
    } else {
      setTimeout( function() { bubbleRun($next, true); }, nextTimeout);
    }
  }
}
