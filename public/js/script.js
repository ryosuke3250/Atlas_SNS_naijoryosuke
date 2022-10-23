$(function () {
  $('.accordion-btn').on('click', function () {
    $(this).next().slideToggle();
    $(this).toggleClass("open");
  });
});
