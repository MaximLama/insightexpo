document.addEventListener("DOMContentLoaded", function () {
  if ($('main').hasClass('main-seo')) {
    $('.header').addClass('header-seo');
    $('.clients').addClass('seo-clients');
  }
  
  $('.language-select_checked').click(function () {
    $(this).toggleClass('active').next().slideToggle();
  });

  $('.header-language__dropdown-item').click(function () {
    var value = $(this).attr('data-language');
    $(this).closest('.header-language').find('.header-language__select').val(value).end().find('.language-select_checked').toggleClass('active').end().find('.select-text').text(value);
    $(this).closest('.select-dropdown').slideUp();
  });
  
  var videoSlider = new Swiper('#video-slider', {
    // slidesPerView: 2,
    slidesPerView: 'auto',
    speed: 1200,
    // autoplay: {
    //   delay: 4000,
    //   disableOnInteraction: false,
    // },
    breakpoints: {
      769: {
        slidesPerView: 2
      }
    },
    pagination: {
      el: '.video-pagination',
    },
    navigation: {
      nextEl: '.video-button-next',
      prevEl: '.video-button-prev',
    },
  });

  var advantagesSlider = new Swiper('#advantages-slider', {
    slidesPerView: 'auto',
    speed: 1200,
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: '.advantages-pagination',
    },
    navigation: {
      nextEl: '.advantages-button-next',
      prevEl: '.advantages-button-prev',
    },
  });

  var certificatesSlider = new Swiper('#certificates-slider', {
    slidesPerView: 'auto',
    speed: 1200,
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: '.certificates-pagination',
    },
    navigation: {
      nextEl: '.certificates-button-next',
      prevEl: '.certificates-button-prev',
    },
  });

  var reviewsSlider = new Swiper('#reviews-slider', {
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    speed: 1200,
    // autoplay: {
    //   delay: 4000,
    // },
    pagination: {
      el: '.reviews-pagination',
    },
    navigation: {
      nextEl: '.reviews-button-next',
      prevEl: '.reviews-button-prev',
    },
  });

  var clientsSlider = new Swiper('#clients-slider', {
    slidesPerView: 'auto',
    speed: 1200,
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: '.clients-pagination',
    },
  });

  // const portfolioSlider = new Swiper('.portfolio-slider', {
  //   slidesPerView: 'auto',
  //   speed: 1200,
  //   autoplay: {
  //     delay: 4000,
  //   },
  //   // allowTouchMove: false,
  //   // initialSlide: 2,
  //   loop: true,
  //   // loopedSlides: 4,
  //   // centeredSlides: true,
  //   observer: true,
  //   observeParents: true,
  //   observeSlideChildren: true,
  //   breakpoints: {
  //     769: {
  //       centeredSlides: true,
  //       allowTouchMove: false,
  //     }
  //   },
  //   pagination: {
  //     el: '.portfolio-pagination',
  //     type: "fraction",
  //   },
  //   navigation: {
  //     nextEl: '.portfolio-button-next',
  //     prevEl: '.portfolio-button-prev',
  //   },
  // });

  if ($('.portfolio-slider').hasClass('seo-portfolio-slider')) {
    const portfolioSlider = new Swiper('.portfolio-slider', {
      slidesPerView: 'auto',
      speed: 1200,
      // autoplay: {
      //   delay: 4000,
      // },
      // allowTouchMove: false,
      // initialSlide: 2,
      loop: true,
      // loopedSlides: 4,
      // centeredSlides: true,
      observer: true,
      observeParents: true,
      observeSlideChildren: true,
      breakpoints: {
        769: {
          centeredSlides: true,
          allowTouchMove: false,
        }
      },
      pagination: {
        el: '.portfolio-pagination',
        type: 'bullets',
        dynamicBullets: 'true',
        // dynamicMainBullets: 4,
      },
      navigation: {
        nextEl: '.portfolio-button-next',
        prevEl: '.portfolio-button-prev',
      },
    });
  } else {
    const portfolioSlider = new Swiper('.portfolio-slider', {
      slidesPerView: 'auto',
      speed: 1200,
      // autoplay: {
      //   delay: 4000,
      // },
      // allowTouchMove: false,
      // initialSlide: 2,
      loop: true,
      // loopedSlides: 4,
      // centeredSlides: true,
      observer: true,
      observeParents: true,
      observeSlideChildren: true,
      breakpoints: {
        769: {
          centeredSlides: true,
          allowTouchMove: false,
        }
      },
      pagination: {
        el: '.portfolio-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.portfolio-button-next',
        prevEl: '.portfolio-button-prev',
      },
    });
  }

  $.each($('.portfolio-slider'), function () {
    let item = $(this).find('.portfolio-slider__item');

    if (item.length <= 3) {
      this.swiper.loopDestroy();
      // this.swiper.disable();
      // this.swiper.navigation.destroy();

      $(this).find('.swiper-pagination').addClass('d-none');
      $(this).find('.slider-kit').addClass('d-none');
    }
  });

  $('.form-input').on('keyup', function () {
    var $this = $(this),
      val = $this.val();

    if (val.length >= 1) {
      $(this).parent().addClass('filled');
    } else {
      $(this).parent().removeClass('filled');
    }
  });
  
  function formSend() {
    $('.form').addClass('sent');

    let s = $('.feedback').offset().top;

    $('html').animate({scrollTop: s - 100}, 1000);
  }

  var servicesThumbs = new Swiper('#services-thumbs', {
    loop: true,
    // spaceBetween: 10,
    speed: 1200,
    slidesPerView: 'auto',
    // freeMode: true,
    watchSlidesProgress: true,
    // observer: true,
    // observeParents: true,
    // observeSlideChildren: true,
  });
  var servicesSlider = new Swiper('.services-slider', {
    loop: true,
    spaceBetween: 10,
    hashNavigation: true,
    // autoplay: {
    //   delay: 4000,
    // },
    speed: 1200,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    navigation: {
      nextEl: '.services-button-next',
      prevEl: '.services-button-prev',
    },
    pagination: {
      el: '.services-pagination',
    },
    thumbs: {
      swiper: servicesThumbs,
    },
  });

  $('.header-burger').click(function () {
    $(this).toggleClass('active');
    $('.header').toggleClass('active');
    $('.header-nav').toggleClass('active');
    $('body').toggleClass('o-hidden');
  });

  function scrollHeader() {
    window.addEventListener('scroll', function () {
      let header = document.querySelector('header');
      header.classList.toggle('scroll', window.scrollY > 0);
    });
  }

  if ($(window).width() <= 768) {
    scrollHeader();
  }

  $('.filter_checked').click(function () {
    $(this).toggleClass('active').next().slideToggle();
  });

  $('.filter-dropdown__option').click(function () {
    var value = $(this).attr('data-value');
    $(this).closest('.filter').find('.filter__select').val(value).end().find('.select_checked').toggleClass('active').end().find('.select-text span').text(value);
    // $('.filter-dropdown__option').removeClass('active');
    $(this).closest('.filter').find('.filter-dropdown__option').removeClass('active');
    $(this).addClass('active').closest('.select-dropdown').slideUp();
  });

  var galleryThumbs = new Swiper('#gallery-thumbs', {
    // loop: true,
    speed: 1200,
    slidesPerView: 'auto',
    // freeMode: true,
    watchSlidesProgress: true,
    // observer: true,
    // observeParents: true,
    // observeSlideChildren: true,
  });

  // var gallerySlider = new Swiper('#gallery-slider', {
  //   // loop: true,
  //   spaceBetween: 10,
  //   // autoplay: {
  //   //   delay: 4000,
  //   // },
  //   speed: 1200,
  //   effect: 'fade',
  //   fadeEffect: {
  //     crossFade: true
  //   },
  //   observer: true,
  //   observeParents: true,
  //   observeSlideChildren: true,
  //   navigation: {
  //     nextEl: '.gallery-button-next',
  //     prevEl: '.gallery-button-prev',
  //   },
  //   pagination: {
  //     el: '.gallery-pagination',
  //   },
  //   thumbs: {
  //     swiper: galleryThumbs,
  //   },
  // });

  if ($('#gallery-thumbs').length > 0) {
    if ($(window).width() >= 769) {
      galleryThumbs.destroy();
    }
  }
  
  if ($(window).width() <= 768) {
    $('.project-gallery__item').removeAttr('data-fancybox');

    $('.project-gallery__item').click(function (e) {
      e.preventDefault();
    });

    var gallerySlider = new Swiper('#gallery-slider', {
      // loop: true,
      spaceBetween: 10,
      // autoplay: {
      //   delay: 4000,
      // },
      speed: 1200,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      observer: true,
      observeParents: true,
      observeSlideChildren: true,
      navigation: {
        nextEl: '.gallery-button-next',
        prevEl: '.gallery-button-prev',
      },
      pagination: {
        el: '.gallery-pagination',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  }

  // if ($('#video').length > 0) {
  //   if ($(window).width() >= 769) {
  //     let video = $('#video')[0];

  //     setInterval(function () {
  //       video.pause();

  //       window.onscroll = function () {
  //         video.play();
  //       }
  //     }, 50);
  //   }

  //   // setInterval(function () {
  //   //   video.currentTime = window.pageYOffset / 400;
  //   // }, 40);
  // }
  
  // setInterval(() => {
  //   clearAnimationTime();
  //   // $('.stages-item__circle').removeClass('run');
  //   // $('.stages-item__circle').addClass('run');
  //   // $('.stages-item__title').removeClass('run');
  //   // $('.stages-item__title').addClass('run');
  //   // console.log($('.stages-item__title'));
  //   setTimeout(() => {
  //     $('.stages-item__circle').addClass('run');
  //     $('.stages-item__title').addClass('run');
  //   }, 10);
  // }, 21000);

  //Начало анимации
  // const stagesTitles = $('.stages-item__title');
  // const stagesCircles = $('.stages-item__circle');

  // let stagesIndex = 1;

  // setInterval(() => {
  //   const stagesTitlesElem = stagesTitles[stagesIndex];
  //   const stagesTitlesPrevElem = stagesTitles[stagesIndex - 1];
  //   const stagesCirclesElem = stagesCircles[stagesIndex];
  //   const stagesCirclesPrevElem = stagesCircles[stagesIndex - 1];
    
  //   $([stagesTitlesElem, stagesCirclesElem]).addClass('run');
  //   if (stagesTitlesPrevElem && stagesCirclesPrevElem) {
  //     $([stagesTitlesPrevElem, stagesCirclesPrevElem]).removeClass('run');
  //   } else {
  //     $([stagesTitles[stagesTitles.length - 1], stagesCircles[stagesCircles.length - 1]]).removeClass('run');
  //   }

  //   if (stagesIndex === 6) {
  //     stagesIndex = 0;
  //   } else {
  //     stagesIndex++;
  //   }
  // }, 3000);
  //Конец анимации

  // const stagesTitles = $('.stages-item__title');
  // const stagesCircles = $('.stages-item__circle');
  
  // function clearAnimationTime() {
  //   // for (var i = 0; i < stagesTitles.length; i++) {
  //   //   const elem = stagesTitles[i];
  //   //   setTimeout((function (index) {
  //   //     return function () {
  //   //       // console.log(elem);
  //   //       elem.classList.remove('run');
  //   //     };
  //   //   })(i), 3000 * (i + 1))
  //   // }

  //   for (var i = 0; i < stagesTitles.length; i++) {
  //     const elem = stagesTitles[i];
  //     setTimeout(function () {
  //       elem.classList.remove('run');
  //     }, 3000 * (i + 1))
  //   }

  //   for (var i = 0; i < stagesCircles.length; i++) {
  //     const elem = stagesCircles[i];
  //     setTimeout((function (index) {
  //       return function () {
  //         // console.log(elem);
  //         elem.classList.remove('run');
  //       };
  //     })(i), 3000 * (i + 1))
  //   }
  // }

  // clearAnimationTime();

  var standsSlider = new Swiper('#stands-slider', {
    slidesPerView: 'auto',
    speed: 1200,
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: '.stands-pagination',
    },
    navigation: {
      nextEl: '.stands-button-next',
      prevEl: '.stands-button-prev',
    },
  });

  // jQuery(function ($) {
  //   $('.form-phone').mask('+ 7 (999) 999-99-99');
  // });

  $('.portfolio-pagination__item').click(function (e) {
    e.preventDefault();
    $('.portfolio-pagination__item').removeClass('active');
    $(this).addClass('active');
  });

  function portfolioCardTitleCheckLength() {
    let portfolioSliderTitle = document.querySelectorAll('.portfolio-slider__title');

    portfolioSliderTitle.forEach(elem => {
      elemValue = elem.innerText;

      if (elemValue.length <= 6) {
        $(elem).addClass('short')
      }
    });
  }
  
  portfolioCardTitleCheckLength();

  

});