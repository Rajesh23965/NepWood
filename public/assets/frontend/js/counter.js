// Use jQuery.noConflict() to avoid conflicts with other libraries that may use the '$' symbol
// var $j = jQuery.noConflict();
// Function to generate a random CAPTCHA
function generateRandomCaptcha(length) {
  var charset =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  var captcha = "";

  for (var i = 0; i < length; i++) {
    var randomIndex = Math.floor(Math.random() * charset.length);
    captcha += charset[randomIndex];
  }

  return captcha; // Return the generated CAPTCHA instead of updating the HTML
}

(function ($) {
  // Your jQuery code here
  var counterElements = $(".counter");
  var sectionToDisplay = $(".counter-container");
  var counterStarted = false;

  sectionToDisplay.each(function () {
    var section = $(this);
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.intersectionRatio > 0 && !counterStarted) {
          counterElements.each(function () {
            var counterElement = $(this);
            var finalValue = parseInt(counterElement.text());

            $({ Counter: 0 }).animate(
              {
                Counter: finalValue,
              },
              {
                duration: 4000,
                easing: "swing",
                step: function (now) {
                  counterElement.text(Math.ceil(now));
                },
              }
            );
          });

          counterStarted = true;
        }
      });
    });

    observer.observe(section[0]);
  });
})(jQuery);

// Document ready function
$j(document).ready(function () {
  var captchaLength = 6; // Set the desired length of the CAPTCHA
  var captcha = generateRandomCaptcha(captchaLength);
  $j(".captch_preview").val(captcha); // Display the initial CAPTCHA

  // Event handler for refreshing the CAPTCHA
  $j("#refresh").on("click", function () {
    var captcha = generateRandomCaptcha(captchaLength); // Generate a new CAPTCHA
    $j(".captch_preview").val(captcha); // Update the HTML with the new CAPTCHA
  });

  function refreshCaptcha() {
    var captcha = generateRandomCaptcha(6);
    $j(".captch_preview").val(captcha);
  }

  // Event handler for form submission
  $j(document).on("submit", "#feedbackForm", function (e) {
    e.preventDefault();

    var random_captcha = $j("#random_captcha").val();
    var captchaBox = $j("#captchaBox").val();

    if (captchaBox !== random_captcha) {
      alert("Invalid CAPTCHA. Please try again.");
      refreshCaptcha();
      return;
    }

    var form = $j(this);
    var url = form.attr("action");
    var formData = form.serialize();
    formData += "&random_captcha=" + random_captcha;

    // AJAX request
    $j.ajax({
      type: "POST",
      url: url,
      data: formData,
      random_captcha: random_captcha,
      success: function (response) {
        alert(response);
        refreshCaptcha();
        form[0].reset();
      },
    });
  });

  // Slick Carousel initialization
  $j("#carouselExampleAutoplaying .carousel-inner .row").slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: 1000,
    speed: 1000,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // Prevent dropdown menu from closing on click
  $j(document).on("click", ".dropdown-menu", function (e) {
    e.stopPropagation();
  });

  // Make dropdown menu act as an accordion for smaller screens
  if ($j(window).width() < 992) {
    $j(".dropdown-menu a").click(function (e) {
      e.preventDefault();
      if ($j(this).next(".submenu").length) {
        $j(this).next(".submenu").toggle();
      }
      $j(".dropdown").on("hide.bs.dropdown", function () {
        $j(this).find(".submenu").hide();
      });
    });
  }

  // Slick Carousel for sliderstuff
  $j(".sliderstuff").slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    infinite: true,
    speed: 5000,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow:
      '<button type="button" class="slick-prev text-secondary border rounded"></button>',
    nextArrow:
      '<button type="button" class="slick-next text-secondary border rounded"></button>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});
