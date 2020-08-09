function openInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}

    var scrollToContactForm = function() {

        $('html, body').animate({
        scrollTop: $('#contactForm').offset().top
      }, 800, function(){
        // Add hash (#) to URL when done scrolling (default click behavior)
      //  window.location.hash = hash;
      });
    };

    $( document ).ready(function() {
      $location = "portfolio";

    assignNavigation();

    });

