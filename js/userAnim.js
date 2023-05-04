var user = bodymovin.loadAnimation({
    container: document.getElementById('ava'), // Required
    path: '../animations/ava.json', // Required
    renderer: 'svg', // Required
    loop: false, // Optional
    autoplay: true, // Optional
    name: "ava", // Name for future reference. Optional.
  });