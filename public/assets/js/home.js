$("#scroll-down").click(function() {
    $('html, body').animate({
        scrollTop: $(".timeline-wrapper").offset().top
    }, 1500);
  });