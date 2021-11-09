$(".carousel-container").owlCarousel({
  center: true,
  lazyLoad: true,
  loop: true,
  autoplay: true,
  nav: false,
  dots: false,
  autoWidth: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1,
      nav: false,
    },
    600: {
      items: 2,
      nav: false,
    },
    1000: {
      items: 3,
      nav: false,
    },
  },
});
