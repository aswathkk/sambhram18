$(document).ready(function() {
  particlesJS('particles', {
    "particles": {
      "number": {
        "value": 40,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#ff0000"
        }
      },
      "opacity": {
        "value": 1,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 40,
          "size_min": 1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.7,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": false,
          "mode": "repulse"
        },
        "onclick": {
          "enable": true,
          "mode": "repulse"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 1,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 150,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
  });

  var hero = $('#hero').get(0);
  var parallax = new Parallax(hero, {
    hoverOnly: true
  });

  $('.countdown').downCount({
      date: '02/22/2018 09:00:00',
      offset: '+5.50',
  });

  // $('.event-item').ripple();

  var $ripple = $('.ripple');
  var $rippleWrapper = $('.ripple-wrapper');
  var $eventLoading = $('.event-loading');
  var $eventLoadingImg = $('.event-loading img');
  var $eventLoadingH4 = $('.event-loading h4');

  $('.event-item').click(function(e) {
    var type = $(this).attr('data-type');

    var x = e.clientX;
    var y = e.clientY;

    var h4 = $(this).find('h4').html();
    var img = $(this).find('img').attr('src');

    $rippleWrapper.css('display', 'block');
    $ripple.css('left', x + 'px');
    $ripple.css('top', y + 'px');
    $ripple.addClass('ani');

    setTimeout(function() {
      $eventLoadingH4.html(h4);
      $eventLoadingImg.prop('src', img);
      $eventLoading.show();
    }, 400);

    setTimeout(function() {
      $ripple.removeClass('ani');
      $rippleWrapper.hide();
      window.location = 'event.php?type=' + type;
    }, 1000);
  });

});