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
// c::set('cache', false);
c::set('debug', true);

c::set('thumbs.presets', [
  'default' => ['quality' => 100]
]);

c::set('cache.ignore', ['cors']);

/*
---------------------------------------
Routes
---------------------------------------

Contact form Routing

*/
// --- LinkedIn OAuth helpers ---

function linkedinExchangeCode($code) {
  $ch = curl_init('https://www.linkedin.com/oauth/v2/accessToken');
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
      'grant_type'    => 'authorization_code',
      'code'          => $code,
      'redirect_uri'  => url('linkedin/callback'),
      'client_id'     => c::get('linkedin_client_id'),
      'client_secret' => c::get('linkedin_client_secret'),
    ]),
    CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
  ]);
  $body = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($body, true);
  if (empty($data['access_token'])) return null;
  $now = time();
  return [
    'access_token'       => $data['access_token'],
    'expires_at'         => $now + ($data['expires_in'] ?? 5183999),
    'refresh_token'      => $data['refresh_token'] ?? null,
    'refresh_expires_at' => $now + ($data['refresh_token_expires_in'] ?? 31535999),
  ];
}

function linkedinRefreshToken($refreshToken) {
  $ch = curl_init('https://www.linkedin.com/oauth/v2/accessToken');
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query([
      'grant_type'    => 'refresh_token',
      'refresh_token' => $refreshToken,
      'client_id'     => c::get('linkedin_client_id'),
      'client_secret' => c::get('linkedin_client_secret'),
    ]),
    CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
  ]);
  $body = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($body, true);
  if (empty($data['access_token'])) return null;
  $now = time();
  return [
    'access_token'       => $data['access_token'],
    'expires_at'         => $now + ($data['expires_in'] ?? 5183999),
    'refresh_token'      => $data['refresh_token'] ?? $refreshToken,
    'refresh_expires_at' => $now + ($data['refresh_token_expires_in'] ?? 31535999),
  ];
}

function linkedinGetAccessToken() {
  $tokenFile = kirby()->roots()->config() . '/linkedin-token.json';
  if (!file_exists($tokenFile)) return null;
  $stored = json_decode(file_get_contents($tokenFile), true);
  if (time() < $stored['expires_at']) return $stored['access_token'];
  if (!empty($stored['refresh_token']) && time() < $stored['refresh_expires_at']) {
    $fresh = linkedinRefreshToken($stored['refresh_token']);
    if ($fresh) {
      file_put_contents($tokenFile, json_encode($fresh));
      return $fresh['access_token'];
    }
  }
  return null;
}

function linkedinApiGet($url, $token, $extraHeaders = []) {
  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array_merge(
      ['Authorization: Bearer ' . $token, 'X-Restli-Protocol-Version: 2.0.0'],
      $extraHeaders
    ),
  ]);
  $body = curl_exec($ch);
  curl_close($ch);
  return json_decode($body, true);
}

function linkedinFetchPosts($token) {
  // Get authenticated member's person ID
  $profile = linkedinApiGet('https://api.linkedin.com/v2/me', $token);
  if (empty($profile['id'])) return false;
  $personId = $profile['id'];

  // Fetch posts (UGC Posts API)
  $authorUrn = urlencode('urn:li:person:' . $personId);
  $data = linkedinApiGet(
    "https://api.linkedin.com/v2/ugcPosts?q=authors&authors=List({$authorUrn})&count=5&sortBy=LAST_MODIFIED",
    $token
  );

  if (empty($data['elements'])) return [];

  $posts = [];
  foreach ($data['elements'] as $el) {
    $text = $el['specificContent']['com.linkedin.ugc.ShareContent']['shareCommentary']['text'] ?? null;
    if (!$text) continue;
    $idRaw  = $el['id'] ?? '';
    $idNum  = preg_replace('/[^0-9]/', '', $idRaw);
    $posts[] = [
      'text' => $text,
      'date' => isset($el['created']['time']) ? date('j M Y', intval($el['created']['time'] / 1000)) : '',
      'url'  => 'https://www.linkedin.com/feed/update/' . rawurlencode($idRaw) . '/',
    ];
  }
  return $posts;
}

// --- End LinkedIn helpers ---

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

        $from = (strlen($form->data('name')) > 0) ? $form->data('name') : $form->data('email');
        // If validation and guards passed, execute the action.
        $form->logAction([
          'file' => kirby()->roots()->site() . '/email.log',
        // ])->emailAction([
        //   'to' => 'hi@sincere.studio',
        //   'from' => 'contactform@ldaniel.eu',
        //   'replyTo' => $form->data('email'),
        //   'subject' => '[Sincere—Studio] New Message Received',
        ]);

        if (!$form->success()) { $code = 500; }

      }

      // Return code 200 on success.
      return response::json(['success' => $form->success(), 'errors' => $form->errors(), 'code' => $code]);
    }
  ],
  // Routing for Legacy SEO
  [
    'pattern' => 'work',
    'action'  => function() {
      return page('projects');
    }
  ],
  [
    'pattern' => 'work/(:any)',
    'action'  => function($uid) {
      return page('projects/' . $uid);
    }
  ],
  [
    'pattern' => 'cors',
    'action' => function () {
      // provide server-side CORS request path

      $url = get('url');

      if(strlen($url) > 0) {

        // Set Access Control Header
        // header("Access-Control-Allow-Origin: *");

        // Make request
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        // Return response
        $json = ['status' => ['code' => 200, 'message' => 'OK'], 'response' => $data];
        
      } else {
        $json = ['status' => ['code' => 400, 'message' => 'No URL parameter found']];
      }

      return response::json($json);

    }
  ],

  // LinkedIn OAuth: initiate flow
  [
    'pattern' => 'linkedin/auth',
    'action'  => function() {
      $state = bin2hex(random_bytes(16));
      s::set('linkedin_state', $state);
      $params = http_build_query([
        'response_type' => 'code',
        'client_id'     => c::get('linkedin_client_id'),
        'redirect_uri'  => url('linkedin/callback'),
        'scope'         => 'openid profile r_member_social',
        'state'         => $state,
      ]);
      go('https://www.linkedin.com/oauth/v2/authorization?' . $params);
    }
  ],

  // LinkedIn OAuth: handle callback
  [
    'pattern' => 'linkedin/callback',
    'action'  => function() {
      if (get('state') !== s::get('linkedin_state')) {
        return 'State mismatch — possible CSRF. Try /linkedin/auth again.';
      }
      $tokenData = linkedinExchangeCode(get('code'));
      if (!$tokenData) {
        return 'Failed to exchange code for token. Check client credentials.';
      }
      file_put_contents(kirby()->roots()->config() . '/linkedin-token.json', json_encode($tokenData));
      s::remove('linkedin_state');
      return 'LinkedIn connected successfully. You can close this tab.';
    }
  ],

  // LinkedIn posts: serve cached JSON to frontend
  [
    'pattern' => 'linkedin/posts',
    'action'  => function() {
      $token = linkedinGetAccessToken();
      if (!$token) {
        return response::json(['error' => 'Not authenticated — visit /linkedin/auth to connect LinkedIn.'], 401);
      }

      $cacheFile = kirby()->roots()->cache() . '/linkedin-posts.json';
      if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 3600) {
        header('Content-Type: application/json');
        return response::json(json_decode(file_get_contents($cacheFile), true));
      }

      $posts = linkedinFetchPosts($token);
      if ($posts === false) {
        return response::json(['error' => 'Failed to fetch posts from LinkedIn API.'], 500);
      }

      file_put_contents($cacheFile, json_encode($posts));
      return response::json($posts);
    }
  ],
]);

return [
  'panel' =>[
    'install' => true
  ],
  'thathoff.git-content' => [
    'pull' => (strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') === false),
    'push' => (strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') === false),
    'commitMessage' => 'Content update via Panel',
  ],
];
