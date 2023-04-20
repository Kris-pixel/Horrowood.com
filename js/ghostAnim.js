var animation = bodymovin.loadAnimation({
    container: document.getElementById('ghost-preloader'), // Required
    path: '../animations/preloader.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "ghost-preloader", // Name for future reference. Optional.
  });
  animation.setSpeed(1.5);