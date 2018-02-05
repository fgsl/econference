(function ($) {
    $(function () {
        $('.carousel').carousel({fullWidth: false, dist: -0, shift: 50, padding: 0,indicators: true, noWrap:false});
        autoplay();
        $('.button-collapse').sideNav();
        $('.parallax').parallax();
        $("#patrocinio").load("logo.html");
        $("#patrocinioFooter").load("logo.html");
        var dayD = new Date("Sep 27, 2017 08:00:00");
        var diff = dayD.getTime() / 1000 - (new Date()).getTime() / 1000;
        var clock = $('#count').FlipClock(diff, {
          countdown : true,
          clockFace: 'DailyCounter',
          language : 'pt',
          showSeconds: false
        });
        //countdown(new Date("Sep 27, 2017 08:00:00").getTime());

        
    }); // end of document ready
})(jQuery); // end of jQuery name space

$(function () { // wait for document ready
    /*
    SETA ALTURA DO DIV PARA O TAMANHO DA TELA DISPONIVEL
    console.log(window.innerHeight, window.innerWidth);

    $(".panel").each(function () {
      $(this).height(window.innerHeight);
    });*/

    // init
    /*
    var controller = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave'
      }
    });

    // get all slides
    var slides = document.querySelectorAll("section.panel2");

    // create scene for every slide
    for (var i = 0; i < slides.length; i++) {
      new ScrollMagic.Scene({
          triggerElement: slides[i]
        })
        .setPin(slides[i])
        //.addIndicators() // add indicators (requires plugin)
        .addTo(controller);
    }*/
});

function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 3000);
}
function countdown(diaD){

var countDownDate = new Date("Sep 27, 2017 08:00:00").getTime();
countDownDate = diaD;

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("count").innerHTML = days + "d " + hours + "h "
  + minutes + "m "; //+ seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
}
