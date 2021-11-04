// Libraries
import 'bootstrap';

// Local Scripts
import '../src/font-awesome-pseudo-elements';
import '../src/smooth-scrolling';
import '../src/form-ajax';
import '../src/form-ajax-2';
import '../src/aos';
import '../src/animate-numbers';

// Sticky navbar
$(window).scroll(function () {
    // Navbar home
    if ($(this).scrollTop() > 15) {
        $('#navbar').addClass('bg-light');
        $("#logo").attr("src", "./assets/images/logo-2.png");
    } else {
        $('#navbar').removeClass('bg-light');
        $("#logo").attr("src", "./assets/images/logo.png");
    }
});

// Stop YouTube videos on modals
$('#testimonialModal').on('hidden.bs.modal', function () {
    $("#testimonialModal iframe").attr("src", $("#testimonialModal iframe").attr("src"));
});

// Clear forms inside modals when closing
$('.modal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
});