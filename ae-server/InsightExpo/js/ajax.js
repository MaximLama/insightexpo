document.addEventListener("DOMContentLoaded", function () {
  function portfolioCardTitleCheckLength() {
    let portfolioSliderTitle = document.querySelectorAll('.portfolio-slider__title');

    portfolioSliderTitle.forEach(elem => {
      elemValue = elem.innerText;

      if (elemValue.length <= 6) {
        $(elem).addClass('short')
      }
    });
  }
//CHOOSE PROJECTS
  $(document).on('click', '[section-id]', function(){
    let btn = $(this);
    let id = btn.attr('section-id');
    let url = new URL(window.location.origin+window.location.pathname);
    url.searchParams.append("SECTION_ID", id);
    url = url.toString();
    window.location = url;
    /*let data = {
      "SECTION_ID": id
    };

    $.ajax({
            type: "POST",
            url: window.location.href,
            data: data,
            timeout: 3000,
            success: function(data) {
              let container = $(data).find('.portfolio-content');
              $('.portfolio-content')[0].innerHTML = container[0].innerHTML;
              const portfolioSlider = new Swiper('.portfolio-slider', {
                slidesPerView: 'auto',
                speed: 1200,
                //autoplay: {
                //  delay: 4000,
                //},
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
                  type: "fraction",
                },
                navigation: {
                  nextEl: '.portfolio-button-next',
                  prevEl: '.portfolio-button-prev',
                },
              });
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
              let filter = $(data).find('#filter-year');
              $('#filter-year')[0].innerHTML = filter[0].innerHTML;
              $('#filter-year .filter_checked').click(function () {
                $(this).toggleClass('active').next().slideToggle();
              });
              $('#filter-year .filter-dropdown__option').click(function () {
                var value = $(this).attr('data-value');
                $(this).closest('.filter').find('.filter__select').val(value).end().find('.select_checked').toggleClass('active').end().find('.select-text span').text(value);
                // $('.filter-dropdown__option').removeClass('active');
                $(this).closest('.filter').find('.filter-dropdown__option').removeClass('active');
                $(this).addClass('active').closest('.select-dropdown').slideUp();
              });
              let pagination = $(data).find('.portfolio-pagination');
              $('.portfolio-pagination')[0].innerHTML = pagination[0].innerHTML;
              paginationHandlers();
              portfolioCardTitleCheckLength()
            }
    });*/
  });

  $(document).on('click', '[section-name]', function(){
    let btn = $(this);
    let btnCategories = $("#filter-categories .select-dropdown .active");
    let id = btnCategories.attr('section-id');
    let name = btn.attr('section-name');
    let url = new URL(window.location.origin+window.location.pathname);
    url.searchParams.append("SECTION_ID", id);
    url.searchParams.append("SECTION_NAME", name);
    url = url.toString();
    window.location = url;
    /*let data = {
      "SECTION_ID": id,
      "SECTION_NAME": name,
    };

    $.ajax({
            type: "POST",
            url: window.location.href,
            data: data,
            timeout: 3000,
            success: function(data) {
              let container = $(data).find('.portfolio-content');
              $('.portfolio-content')[0].innerHTML = container[0].innerHTML;
              const portfolioSlider = new Swiper('.portfolio-slider', {
                slidesPerView: 'auto',
                speed: 1200,
                //autoplay: {
                //  delay: 4000,
                //},
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
                  type: "fraction",
                },
                navigation: {
                  nextEl: '.portfolio-button-next',
                  prevEl: '.portfolio-button-prev',
                },
              });
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
              let pagination = $(data).find('.portfolio-pagination');
              $('.portfolio-pagination')[0].innerHTML = pagination[0].innerHTML;
              paginationHandlers();
              portfolioCardTitleCheckLength()
            }
    });*/
  });

  //CHANGE LANGUAGE
  $(document).on('click', '[data-language]', function(){
    let dataLanguage = $(this).attr('data-language');
    let language = (dataLanguage.toLowerCase() == 'ae') ? "en" : dataLanguage.toLowerCase(); 
    let search = window.location.pathname == '/category/port/'?"":window.location.search;
    $.ajax({
            type: "POST",
            url: window.location.origin+'/bitrix/templates/InsightExpo/ajax/url.php',
            data: '',
            dataType: 'json',
            timeout: 3000,
            success: function(data) {
              let path = window.location.pathname.replace(/(\/en|\/ru)/, "");
              if(dataLanguage==="EN"){
                window.location = window.location.protocol + "\/\/" + data.currentHost + "/en" + path + search;
              }
              else if(dataLanguage=="RU"){
                if(path !== window.location.pathname){
                  window.location = window.location.protocol + "\/\/" + data.currentHost + path + search;
                }
                else{
                  window.location = window.location.protocol + "\/\/" + data.anotherHost + path + search;
                }
              }
              else {
                window.location = window.location.protocol + "\/\/" + data.anotherHost + path + search;
              }
            },
            error: function(data){
              console.log(data);
            }
    });
  });

  //SEND MESSAGE
  $(document).on('click', '.feedback-form__btn', function(e){
    let form = $(this).parents("form");
    let inputs = $('.feedback-form .form-input');
    for(var i=0;i<inputs.length;i++){
      if(!inputs[i].checkValidity()){
        inputs[i].reportValidity();
        return;
      }
    }
    let dataForm = form.serializeArray();
    $.ajax({
      type: "POST",
      url:window.location.origin+'/bitrix/templates/InsightExpo/ajax/feedback-form.php',
      data: dataForm,
      dataType: 'json',
      success:function(data){
        $('.form').addClass('sent');
        let s = $('.feedback').offset().top;
        $('html').animate({scrollTop: s - 100}, 1000);
      }, 
      error:function(data){
        console.log(data);
      }      
    });
  });

  $(".form-phone").on("input", function(){
    $(this).val("+"+$(this).val().replace(/[\D]/g, ""));
  });
  $(".form-phone").on("focus", function(){
    if(!$(this).val())
      $(this).val("+");
  });

  function paginationHandlers(){
    $(".portfolio-pagination__btn").on("click", function(e){
      e.preventDefault();
      url = new URL($(e.target).closest('a')[0].href);
      url.searchParams.append("SECTION_ID", $('.active[section-id]').attr("section-id"));
      if($('.active[section-name]').attr("section-name"))
        url.searchParams.append("SECTION_NAME", $('.active[section-name]').attr("section-name"));
      url = url.toString();
      window.location = url;
      //console.log($(e.target).closest('a')[0].href);
      //console.log($('.active[section-id]').attr("section-id"));
      //console.log($('.active[section-name]').attr("section-name"));
      //window.location = $(e.target).closest('a')[0].href;
      /*e.preventDefault();
      let url = $(this).attr("href");
      if(url === 'javascript:void(0)') return;
      let id = $("#filter-categories .select-dropdown .active").attr('section-id');
      let name = $("#filter-year .select-dropdown .active").attr('section-name');
      let data = {
        "SECTION_ID": id,
        "SECTION_NAME": name,
      };
      $.ajax({
        type:"POST",
        url:url,
        data:data,
        timeout: 3000,
        success: function(data){
          $('html, body').animate({scrollTop:0}, 600);
          let container = $(data).find('.portfolio-content');
          $('.portfolio-content')[0].innerHTML = container[0].innerHTML;
          let pagination = $(data).find('.portfolio-pagination');
          $('.portfolio-pagination')[0].innerHTML = pagination[0].innerHTML;
          paginationHandlers();
          portfolioCardTitleCheckLength()
        },
        error: function(data){
          console.log(data);
        }*
      });*/
    });
    $(".portfolio-pagination__item:not(.active)").on("click", function(e){
      e.preventDefault();
      url = new URL(e.target.href);
      url.searchParams.append("SECTION_ID", $('.active[section-id]').attr("section-id"));
      if($('.active[section-name]').attr("section-name"))
        url.searchParams.append("SECTION_NAME", $('.active[section-name]').attr("section-name"));
      url = url.toString();
      window.location = url;
      //window.location = e.target.href;
      /*e.preventDefault();
      let url = $(this).attr("href");
      let id = $("#filter-categories .select-dropdown .active").attr('section-id');
      let name = $("#filter-year .select-dropdown .active").attr('section-name');
      let data = {
        "SECTION_ID": id,
        "SECTION_NAME": name,
      };
      $.ajax({
        type:"POST",
        url:url,
        data:data,
        timeout: 3000,
        success: function(data){
          $('html, body').animate({scrollTop:0}, 600);
          let container = $(data).find('.portfolio-content');
          $('.portfolio-content')[0].innerHTML = container[0].innerHTML;
          let pagination = $(data).find('.portfolio-pagination');
          $('.portfolio-pagination')[0].innerHTML = pagination[0].innerHTML;
          paginationHandlers();
          portfolioCardTitleCheckLength()
        },
        error: function(data){
          console.log(data);
        }
      });*/
    });
  }

  paginationHandlers();

});