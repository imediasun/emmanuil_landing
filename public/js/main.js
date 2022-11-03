$(document).ready(function () {
  $('.submitForm').submit(function (e) {
    e.preventDefault();
    var form = $(this), button = $(this).find("button[type='submit']");
    button.attr('disabled', 'disabled');
    var valButton = button.html();
    button.addClass('loader');
    $.post('form.php', form.serialize(), function (data) {
      button.removeAttr('disabled');
      $("input[type='text']").val('');
      button.removeClass('loader');
      $('.modalWrapper').modal('hide');
      $('.modalBlock').modal('show');
    });
  });


  var iti = $(".phone").intlTelInput({
    initialCountry: "auto",
    separateDialCode: true,
    geoIpLookup: function (success, failure) {
      $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
        var countryCode = (resp && resp.country) ? resp.country : "us";
        success(countryCode);
      });
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
  });
  $('.phone').on('focus', function () {
    var $this = $(this),
      activePlaceholder = $this.attr('placeholder'),
      newMask = activePlaceholder.replace(/[1-9]/g, "0");
    $this.mask(newMask);
  });
  $(".phone").on("countrychange", function (e, countryData) {
    $(".phone").val('');
    var mask1 = $(".phone").attr('placeholder').replace(/[0-9]/g, 0);
    $('.phone').mask(mask1);
  });
  $('button[type="submit"]').on('click', function () {
    var form = $(this).closest('form');
    var phone = $(form).find(".phone");
    var inputHide = $(form).find("input[name='phone_full']");
    $(inputHide).val($(phone).intlTelInput("getNumber"));
  });


  lozad('.lazy', {
    load: function (el) {
      el.src = el.dataset.src;
      el.onload = function () {
        el.classList.add('fade')
      }
    }
  }).observe()

  Fancybox.bind('[data-fancybox="gallery_slider"]', {
    caption: function (fancybox, carousel, slide) {
      return (
        `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
      );
    },
  });
});