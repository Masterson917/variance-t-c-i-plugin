jQuery(document).ready(function($) {
    $('.tci-clickable-text').click(function() {
        var imgSrc = $(this).data('image'); // Get the image URL from the data attribute
        if (imgSrc) {
            var imgElement = $('<img />', {
                src: imgSrc,
                alt: 'Clicked Image',
                class: 'tci-clicked-image'
            });

            // Check if the image is already displayed and toggle visibility
            if ($('.tci-clicked-image').length > 0) {
                $('.tci-clicked-image').fadeOut(300, function() {
                    $(this).remove(); // Remove image after fade out
                });
            } else {
                $(this).after(imgElement); // Insert image after the clicked text
                imgElement.fadeIn(300); // Fade in the image
            }
        } else {
            console.error('No image source specified.');
        }
    });
});
