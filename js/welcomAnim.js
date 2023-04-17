var animation = bodymovin.loadAnimation({
    container: document.getElementById('welcome'), // Required
    path: '../animations/2banner.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "welcome", // Name for future reference. Optional.
  });