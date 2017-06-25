if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    // get site base URL
    base_url = $('head link[rel="manifest"]').attr('href').replace('manifest.json', '');
    
    navigator.serviceWorker.register(base_url + 'sw.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}
