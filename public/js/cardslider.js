$('.carousel').each(function(){

  var idCarousel ='#' + $this.attr('id');
  const multipleCardCarousel = document.querySelector("idCarousel");
  
  if (window.matchMedia("(min-width: 576px)").matches) {
    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
      interval: false,
    });
    var carouselWidth = $(idCarousel +".carousel-inner")[0].scrollWidth;
    var cardWidth = $(idCarousel +".carousel-item").width();
    var scrollPosition = 0;
    $(idCarousel +" .carousel-control-next").on("click", function () {
      if (scrollPosition < carouselWidth - cardWidth * 4) {
        scrollPosition += cardWidth;
        $(idCarousel +" .carousel-inner").animate(
          { scrollLeft: scrollPosition },
          600
        );
      }
    });
    $(idCarousel +" .carousel-control-prev").on("click", function () {
      if (scrollPosition > 0) {
        scrollPosition -= cardWidth;
        $(idCarousel +" .carousel-inner").animate(
          { scrollLeft: scrollPosition },
          600
        );
      }
    });
  } else {
    $(multipleCardCarousel).addClass("slide");
  }


});

