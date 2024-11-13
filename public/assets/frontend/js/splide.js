document.addEventListener("DOMContentLoaded", function () {
  new Splide(".mainSlider", {
    type: "loop",
    rewind: true,
    pagination: true,
    drag: true,
    focus: "center",
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".carousell", {
    rewind: true,
    pagination: true,
    type: "loop",
    drag: true,
    // focus      : 'center',
    perPage: 3,
    autoplay: true,
    gap: 10,
    breakpoints: {
      640: {
        perPage: 1,
      },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide("#testPackageCarousel", {
    type: "loop",
    rewind: true,
    pagination: false,
    drag: true,
    focus: "center",
    perPage: 3,
    gap: 10,
    breakpoints: {
      640: {
        perPage: 1,
      },
    },
  }).mount();
});
