function progress() {
  console.log('prog');
  var time = 1;
  var $bar,
      isPause,
      tick,
      percentTime;

  $bar = $('.progress-line .progress');
  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    isPause = false;
    tick = setInterval(interval, 45);
  }

  function interval() {
    if (isPause === false) {
      percentTime += 1 / (time + 0.1);
      $bar.css({
        width: percentTime + "%"
      });
      if (percentTime >= 100) {
        // $slick.slick('slickNext');

        startProgressbar();
      }
    }
    return
  }

  function resetProgressbar() {
    $bar.css({
      width: 0 + '%'
    });
    clearTimeout(tick);
  }

  startProgressbar()
}

export {progress}