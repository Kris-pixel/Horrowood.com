var hi = bodymovin.loadAnimation({
    container: document.getElementById('anim'), // Required
    path: '../../animations/hi.json', // Required
    renderer: 'svg', // Required
    loop: false, // Optional
    autoplay: false, // Optional
    name: "hi", // Name for future reference. Optional.
  });