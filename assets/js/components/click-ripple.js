// Click Ripple Effect
// Creates a circle that scales up and fades out on click

document.addEventListener('click', function(e) {
  const ripple = document.createElement('div');
  ripple.classList.add('click-ripple');
  
  // Position ripple at click point
  ripple.style.left = e.clientX + 'px';
  ripple.style.top = e.clientY + 'px';
  
  document.body.appendChild(ripple);
  
  // Remove element after animation completes (1s)
  setTimeout(() => {
    ripple.remove();
  }, 1000);
});
