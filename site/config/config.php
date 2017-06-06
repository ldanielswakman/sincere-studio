<?php

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// revert these when moving to production
c::set('cache', false);
c::set('debug', true);
c::set('uniform.language', 'en');

/*

---------------------------------------
Routes
---------------------------------------

Contact form Routing

*/
c::set('routes', [
  [
    'pattern' => 'contactform_post',
    'method' => 'POST',
    'action'  => function() {

      $form = new \Uniform\Form([
        'message' => [
          'rules' => ['required'],
          'message' => 'Please enter a message',
        ],
        'email' => [
          'rules' => ['required', 'email'],
          'message' => 'Please enter a valid email',
        ],
        'name' => [],
        'source' => [],
      ]);

      // Perform validation and execute guards.
      $form->withoutFlashing()
        ->withoutRedirect()
        ->guard();

      $code = 200;

      if (!$form->success()) { 

        $code = 400;

      } else {

        // If validation and guards passed, execute the action.
        $form->emailAction([
          'to' => 'hello@ldaniel.eu',
          'from' => 'contactform@ldaniel.eu',
          'replyTo' => $form->data('email'),
          'subject' => '[ldaniel.eu] New message Received',
        ])
        ->logAction([
          'file' => kirby()->roots()->site() . '/email.log',
        ]);

        if (!$form->success()) { $code = 500; }

      }

      // Return code 200 on success.
      return response::json(['success' => $form->success(), 'errors' => $form->errors(), 'code' => $code]);
    }
  ]
]);
