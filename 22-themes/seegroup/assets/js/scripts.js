jQuery(document).ready(function ($) {
  /*---------------------------------------------------------------------------
    Init AOS
  ---------------------------------------------------------------------------*/

  AOS.init({
    offset: 120,
    duration: 500,
    easing: "ease-in-out",
  });

  /*---------------------------------------------------------------------------
    Toggle hamburger menu on click
  ---------------------------------------------------------------------------*/

  $(".hamburger").on("click", function () {
    $("body").toggleClass("menu-active");
  });

  /*---------------------------------------------------------------------------
    Toggle mobile submenu on click
  ---------------------------------------------------------------------------*/

  $(".responsive-menu li.menu-item-has-children").on("click", function () {
    $(this).toggleClass("submenu-active");
  });

  /*---------------------------------------------------------------------------
    Init Swiper
  ---------------------------------------------------------------------------*/

  var image_slider = new Swiper(".image-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    centeredSlides: true,
    loop: true,
    navigation: {
      nextEl: ".slider-button-next",
      prevEl: ".slider-button-prev",
    },
    breakpoints: {
      720: {
        slidesPerView: 1.5,
      },
    },
  });

  var posts_slider = new Swiper(".posts-slider", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: ".slider-button-next",
      prevEl: ".slider-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",
    },
    breakpoints: {
      720: {
        slidesPerView: 2,
      },
      900: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });

  /*---------------------------------------------------------------------------
    Init popups
  ---------------------------------------------------------------------------*/

  $(".popup-trigger").each(function (i) {
    let trigger = $(this).attr("data-popup-name");
    let modal = $("#" + trigger);

    $(modal).appendTo(".the-popups");

    $(this).click(function () {
      $(modal).show();
    });

    $(modal)
      .find(".popup-close")
      .click(function (e) {
        $(modal).hide();
      });

    $(modal)
      .find(".popup-wrap")
      .click(function () {
        if (event.target !== this) return;
        $(modal).hide();
      });
  });

  $(".popup-video").each(function () {
    var src = $(this).find("video source").attr("src");

    $(this)
      .find(".popup-wrap")
      .click(function () {
        if (event.target !== this) return;
        $(this).find("video").attr("src", src);
      });

    $(this)
      .find(".popup-close")
      .click(function () {
        if (event.target !== this) return;
        $(this).find("video").attr("src", src);
      });
  });

  /*---------------------------------------------------------------------------
    Toggle header class on scroll
  ---------------------------------------------------------------------------*/

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 50) {
      $("header").addClass("scrolled");
    } else {
      $("header").removeClass("scrolled");
    }
  });

  /*---------------------------------------------------------------------------
    Toggle mobile sub menus on click
  ---------------------------------------------------------------------------*/

  $("#mobile-menu > li.menu-item-has-children > a").on("click", function () {
    $(this).parent().toggleClass("show-sub-menu");
  });

  /*---------------------------------------------------------------------------
    Toggle accordion content on click
  ---------------------------------------------------------------------------*/

  $(".accordion-item").on("click", ".toggle", function (e) {
    e.preventDefault();
    $(this).parent().toggleClass("active");
    $(this).next(".general-content").not(":animated").slideToggle();
  });

  /*---------------------------------------------------------------------------
    Add brand emblem to titles
  ---------------------------------------------------------------------------*/

  $(".general-content h1, .general-content h2").each(function () {
    $(this).append(
      '<svg id="icon-arrow-sm" width="15px" height="8px" viewBox="0 0 15 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon fill="#F18A00" fill-rule="nonzero" points="11.7169003 4.49806934 9.15918035 4.49806934 9.15918035 1.77320934 7.5 0 0 8 15 8"></polygon></g></svg>'
    );
  });

  /*---------------------------------------------------------------------------
    Scroll Into View
  ---------------------------------------------------------------------------*/

  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return elemBottom <= docViewBottom && elemTop >= docViewTop;
  }

  $(window).on("scroll", function () {
    if (isScrolledIntoView($(".counter")) === true) {
      $(window).off("scroll");
      countingStats();
    }
  });

  /*---------------------------------------------------------------------------
    Counter Stats
  ---------------------------------------------------------------------------*/

  function countingStats() {
    $(".counter-item").each(function () {
      $(this)
        .prop("count", 0)
        .animate(
          {
            count: $(this).find(".counter").text(),
          },
          {
            duration: 2000,
            easing: "swing",
            step: function (now) {
              $(this).find(".counter").text(Math.ceil(now));
            },
          }
        );
    });
  }

  // function startCounter() {
  //   if ($(window).scrollTop() > 800) {
  //     console.log("hello");
  //     $(window).off("scroll", startCounter);
  //     $(".counter-item").each(function () {
  //       var $this = $(this);
  //       jQuery({ Counter: 0 }).animate(
  //         { Counter: $this.text() },
  //         {
  //           duration: 1000,
  //           easing: "swing",
  //           step: function () {
  //             $this.text(Math.ceil(this.Counter));
  //           },
  //         }
  //       );
  //     });
  //   }
  // }

  /*---------------------------------------------------------------------------
    Load More Posts
  ---------------------------------------------------------------------------*/

  let listing_wrap = $(".load-posts-wrap");
  let load_more = $(listing_wrap).find(".load-more");

  $(load_more).on("click", function () {
    $(this).hide();
    $(this).parent().next(".load-posts-row").addClass("active");
  });
});
