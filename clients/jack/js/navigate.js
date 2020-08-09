    function assignNavigation() {
      $('#logo').on('click', function() {
        window.location.href="index.php";
    });
    $('.portfolio_link').on('click', function() {
        window.location.href="index.php";
    });
    $('.catalog_link').on('click', function() {
      window.location.href="index.php";
  });

        $('.contact_nav_link').on('click',function() {
           // scrollToContactForm();
           window.location.href="contact.php";
        });
        $('.bio_link').on('click',function() {
    
          window.location.href="bio.php";
            //$('#mainContent').html('');
            // $.get('bio.html', function( data ) {
            //   $('#mainContent').html(data);
            // });
        });

      $('#social_fb').on('click', function() {
        openInNewTab("https://www.facebook.com/profile.php?id=100005710719469");
       });

       $('#social_twitter').on('click', function() {
        openInNewTab("https://www.facebook.com/profile.php?id=100005710719469");
       });

       $('#email_contact').on('click', function() {
        //scrollToContactForm();
        window.location.href='contact.php';
       });

       $('#social_instagram').on('click', function() {
        openInNewTab("https://www.facebook.com/profile.php?id=100005710719469");
       });
    }