$(document).ready(function () {

    $('.alert').addClass('show');
    $('.alert').click(function () {
      $('.alert').remove();
      $('.flash-container').remove();
    });

    $('.filter_form select').change(function () {
      $('.filter_form').submit();
    });

});