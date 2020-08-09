function openInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}
function findPiece(id) {
  for(var i =0; i< window.artwork.length; i++) {
    if (window.artwork[i].id == id) {
      return window.artwork[i];
    }
  }
}

    $( document ).ready(function() {

      loadJSON(function(response) {
        // Parse JSON string into object
          window.artwork = JSON.parse(response);
          //console.log(response);
         // console.log(window.artwork);
       });

      $('#modal').hide();
      window.modalShowing = false;
      $location = "portfolio";
      assignNavigation();
  //     $('#logo').on('click', function() {
  //       window.location.href="index.php";
  //   });
  //   $('.portfolio_link').on('click', function() {
  //       window.location.href="index.php";
  //   });
  //   $('.catalog_link').on('click', function() {
  //     window.location.href="catalog.php";
  // });

        // $('.contact_nav_link').on('click',function() {
        //   window.location.href="contact.php";
        // });
        // $('.bio_link').on('click',function() {

        //   window.location.href="bio.php";
        //     // $('#mainContent').html('');
        //     // $.get('bio.html', function( data ) {
        //     //   $('#mainContent').html(data);
        //     // });
        // });

      // $('#social_fb').on('click', function() {
      //   openInNewTab("https://www.facebook.com/profile.php?id=100005710719469");
      //  });

      //  $('#social_twitter').on('click', function() {
      //   openInNewTab("https://www.facebook.com/profile.php?id=100005710719469");
      //  });

      //  $('#email_contact').on('click', function() {
      //    window.location.href="contact.php";
      //  });

      //  $('#social_instagram').on('click', function() {
      //   openInNewTab("https://www.facebook.com/profile.php?id=100005710719469");
      //  });

       $('.thumbnail').on('click', function(e) {
          var thumb = $(e.target).closest('.thumbnail');
          //console.log(thumb);
          var id = thumb.data('piece');
          var artwork = findPiece(id);
         // console.log('id: '+ id);
           displayDetail(artwork);
          
       });

       // SHOW DETAIL IMAGE
       $('.modalImage').on('click',function(e) {
          
        var id = $('#modalImage').attr('data-id');
        var artwork = findPiece(id);
        var currentSrc = $('#modalImage').attr('src');

        // find out which image this is in the array
        var index = 0;
        var foundIndex = 0;

        console.log("# of images: " + artwork.images.length);

        artwork.images.forEach(function(e) {
          console.log(e + ", " + currentSrc);
          var imagePath = "uploads/artwork/" + e;
          if (imagePath == currentSrc) {
            //found it
            console.log("Found it");
            foundIndex = index;
          }
          index++;
        });

        var nextIndex = foundIndex+1;
        if (artwork.images.length <= nextIndex) {
          nextIndex = 0;
        }
        $('#modalImage').attr('src', 'uploads/artwork/'+artwork.images[nextIndex]);


       
          
       });

       $('html').click(function(e) {

      });
      $('.closer').click(function() {
        $('#modal').hide();
      });


       
    });


    function loadJSON(callback) {   

      var xobj = new XMLHttpRequest();
          xobj.overrideMimeType("application/json");
      xobj.open('GET', 'data/my_data.json', true); // Replace 'my_data' with the path to your file
      xobj.onreadystatechange = function () {
        console.log('onready changed');
            if (xobj.readyState == 4 && xobj.status == "200") {
              // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
              callback(xobj.responseText);
            }
      };
      xobj.send(null);  
   }

   function displayDetail(artwork) {
    window.modalShowing = true;
    currentTop = window.pageYOffset;
    $('#modalLander').css('top',currentTop + 10);
    $('#modal').show();
    
    console.log(currentTop);
    //window.scrollTo({top: 0, behavior: 'smooth'});

    $('#modalTitle').html(artwork.title);
    $('#modalImage').attr('src', 'uploads/artwork/'+artwork.images[0]);
    $('#modalImage').attr('data-id', artwork.id);
    d = new Date(artwork.date);

    $('#modalDate').html( d.getUTCFullYear().toString() );
    $('#modalMedia').html(artwork.media);
    $('#modalDescription').html(artwork.description);
   }
