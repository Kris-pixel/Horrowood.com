var animation = bodymovin.loadAnimation({
    container: document.getElementById('welcome'), // Required
    path: '../animations/2banner.json', // Required
    renderer: 'svg', // Required
    loop: false, // Optional
    autoplay: false, // Optional
    name: "welcome", // Name for future reference. Optional.
  });

  $('#welcome').on('click', function () {
    lottie.play('welcome');
    console.log(lottie.play('welcome'));
  });
//  document.addEventListener("click", animation.play(), false);