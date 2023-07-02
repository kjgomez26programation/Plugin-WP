// Script para la galería de imágenes
(function($) {
    $(document).ready(function() {
      // Manejo del evento click en las miniaturas
      $('.gallery-thumbnail').on('click', function() {
        var imagePath = $(this).attr('src');
        var altText = $(this).attr('alt');
        $('.gallery-main-image').attr('src', imagePath);
        $('.gallery-main-image').attr('alt', altText);
      });
    });
  })(jQuery);
  