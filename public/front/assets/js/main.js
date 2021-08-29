(function($) {
  'use strict';

  /*-------------------------------------------------------------------------------
  Prevent dropdown to close on click inside
	-------------------------------------------------------------------------------*/
  $(".dropdown-menu").on("click", function(e) {
    e.stopPropagation();
  });

  /*-------------------------------------------------------------------------------
  Toggle Dark Mode
  -------------------------------------------------------------------------------*/
  $(".dark-mode-toggle").on('click', function(e) {
    e.stopPropagation();
    e.preventDefault();

    var lightLogo = 'assets/img/logo.png';
    var darkLogo = 'assets/img/logo-light.png';

    $("body").toggleClass('dark-mode');

    if ($("body").hasClass('dark-mode')) {
      $(this).find(".custom-control-input").prop("checked", true);
      $(".navbar-logo").find('img').attr('src', darkLogo);
    } else {
      $(this).find(".custom-control-input").prop("checked", false);
      $(".navbar-logo").find('img').attr('src', lightLogo);
    }

  });

  /*-------------------------------------------------------------------------------
  Aside Menu
	-------------------------------------------------------------------------------*/
  $(".toggle-aside").on('click', function() {
    $(".sidebar-wrapper").toggleClass('open');
  });

  /*-------------------------------------------------------------------------------
  Aside Scroll
	-------------------------------------------------------------------------------*/
  function initAsideScrollbar() {
    var scrollHeight = $(window).innerWidth() < 991 ? $('.sidebar').innerHeight() : $('.sidebar').innerHeight() - 68;
    $('.aside-scroll').slimScroll({
      height: scrollHeight,
      position: "right",
      size: "5px",
      color: "#dcdcdc",
      opacity: 1,
      wheelStep: 5,
      distance: '3px',
      touchScrollStep: 50,
    });
  }
  initAsideScrollbar();

  /*-------------------------------------------------------------------------------
  Dropdown Scroll
  -------------------------------------------------------------------------------*/
  $('.dropdown-scroll').slimScroll({
    height: 300,
    position: "right",
    size: "5px",
    color: "#dcdcdc",
    opacity: 1,
    wheelStep: 5,
    distance: '3px',
    touchScrollStep: 50,
  });

  /*-------------------------------------------------------------------------------
  Banner 1 Slider (Explore Page)
  -------------------------------------------------------------------------------*/
  var banner1 = new Swiper('.banner-1', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
  });

  /*-------------------------------------------------------------------------------
  Multi row slides layout (Explore page)
  -------------------------------------------------------------------------------*/
  $('.multi-row-videos').each(function(){
    var $this = $(this),
    arrowPrev = $this.closest('.section').find('.multi-row-arrow-prev'),
    arrowNext = $this.closest('.section').find('.multi-row-arrow-next'),
    multiRow = new Swiper('.multi-row-videos', {
      slidesPerView: 1,
      spaceBetween: 30,
      slidesPerColumn: 2,
      slidesPerColumnFill: 'row',
      navigation: {
        nextEl: arrowNext,
        prevEl: arrowPrev,
      },
      breakpoints: {
        575: {
          slidesPerView: 2,
          slidesPerColumn: 2,
        },
        1024: {
          slidesPerView: 3,
          slidesPerColumn: 2,
        },
        1200: {
          slidesPerView: 4,
          slidesPerColumn: 2,
        },
      }
    });
  });

  /*-------------------------------------------------------------------------------
  Single row slides layout
  -------------------------------------------------------------------------------*/
  $('.single-row-slider').each(function () {
    var $this = $(this),
    arrowPrev = $this.closest('.section').find('.single-row-arrow-prev'),
    arrowNext = $this.closest('.section').find('.single-row-arrow-next'),
    singleRowSwiper = new Swiper($this, {
      slidesPerView: 1,
      spaceBetween: 30,
      slidesPerColumnFill: 'row',
      navigation: {
        nextEl: arrowNext,
        prevEl: arrowPrev,
      },
      breakpoints: {
        575: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      }
    });
  });

  /*-------------------------------------------------------------------------------
  Playlist Sliders
  -------------------------------------------------------------------------------*/
  $('.playlist-slider').each(function () {
    var $this = $(this),
    arrowPrev = $this.closest('.section').find('.swiper-button-prev'),
    arrowNext = $this.closest('.section').find('.swiper-button-next'),
    singleRowSwiper = new Swiper($this, {
      slidesPerView: 1,
      spaceBetween: 30,
      slidesPerColumnFill: 'row',
      navigation: {
        nextEl: arrowNext,
        prevEl: arrowPrev,
      },
      breakpoints: {
        575: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
      }
    });
  });

  /*-------------------------------------------------------------------------------
  Show More
  -------------------------------------------------------------------------------*/
  $(".show-more-trigger").on('click', function(e){
    e.preventDefault();
    var content = $(".show-more-content");
    content.toggleClass('active');

    if(content.hasClass('active')){
      return $(this).text("Show Less");
    }

    return $(this).text("Show More");

  });

  /*-------------------------------------------------------------------------------
  Video List/Grid Toggle
  -------------------------------------------------------------------------------*/
  $(".toggle-grid").on('click', function(){
    $('.video').removeClass('video-list');
    $('.video').parent().removeClass('col-xl-6 col-md-12').addClass('col-xl-3 col-lg-4 col-md-6 col-sm-6');
  })
  $(".toggle-list").on('click', function(){
    $('.video').addClass('video-list');
    $('.video').parent().removeClass('col-xl-3 col-lg-4 col-md-6 col-sm-6').addClass('col-xl-6 col-md-12');
  })

  /*-------------------------------------------------------------------------------
  Image Upload
  -------------------------------------------------------------------------------*/

  $("body")
    .on('click', '.btn-file-upload', function() {
      $(this).closest('.btn-file-upload-wrapper').find('.upload-input').click();
    })
    .on('change', '.upload-input', function() {
      var fileReference = this.files && this.files[0],
      $this = $(this);
      if (fileReference) {
        var reader = new FileReader();

        reader.onload = function(event) {
          $this.closest('.btn-file-upload-wrapper').find('.img-preview').attr('src', event.target.result);
        }

        reader.readAsDataURL(fileReference);

      }
    });


  /*-------------------------------------------------------------------------------
  Tooltips
  -------------------------------------------------------------------------------*/
  $('[data-toggle="tooltip"]').tooltip();

  //On resize events
  $(window).on('resize', function() {

    initAsideScrollbar();

  });

})(jQuery);
