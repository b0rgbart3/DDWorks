
$( document ).ready(function() {

  console.log('document ready');

    window.sliding =false;
    window.works = $('.work');
    window.work_count = window.works.length;

    window.titles = [];
    window.dates = [];
    window.sizes = [];
    window.solds = [];

    let choiceObject = getInfoFromURL();
    let choice = choiceObject['category'];
    window.category = choice;
    window.desiredWorkNumber = choiceObject['piece'];
    window.keyCount = 0;
    window.addEventListener('keydown', (e) => {
      if (!e.repeat) {
        window.keyCount=0;
        console.log('key:' +e.key);
      if (e.key && e.key=='ArrowDown' || e.key=='ArrowRight') {
        go_left();
      }
      if (e.key && e.key=='ArrowUp' || e.key=='ArrowLeft') {
        go_right();
      }
     } else {
       console.log('key repeating: ' + window.keyCount);
       window.keyCount++;
       if (window.keyCount >= 3) {
         window.keyCount =0;
         if (e.key && e.key=='ArrowDown' || e.key=='ArrowRight') {
          go_left();
        }
        if (e.key && e.key=='ArrowUp' || e.key=='ArrowLeft') {
          go_right();
        }
       }
     }
    });
    if (choice != 'all') {
    $('.titleTextBack h2').html(choice); } else
    {
      $('.titleTextBack h2').html('artist');
    }
    // $('.hiddentitle').each( function(index,value) {
    //   let thistitle = $(value).text();
    //   window.titles.push(thistitle);
    //  }
    // );
    
    // $('.date').each( function(index,value) {
    //   let date = $(value).text();
    //   window.dates.push(date);
    //  }
    // );
    // $('.size').each( function(index,value) {
    //   let size = $(value).text();
    //   window.sizes.push(size);
    //  }
    // );
    // $('.sold').each( function(index,value) {
    //   let sold = $(value).html();
    //   if (value) { 
    //   //  console.log('sold: ' + sold);
    //    }
    //   window.solds.push(sold);
    //  }
    //);
    
    let bottom = $('#swiper').position().top + $('#swiper').height();

    $('.titleTag').css({'top':bottom*.98});

  


    checkMobile();

    if (!window.isMobile) {
      
      // Mobile has a different layout / funcitonality - but I'm keeping this in here
      // so that we can mimic a 'swipe' event on desktop machines
      var myElement = document.getElementById('swiper');
     // document.addEventListener("wheel", wheelTrack);
      setupSlider();

      var hammertime = new Hammer(myElement);
      hammertime.on("swipeleft", go_left);
      hammertime.on("swiperight", go_right);
     
    }
    else {
      mobileSliderLayout();
    }
});

let mobileSliderLayout = function() {

$('.titleTag').remove();
  $('.swiper').remove();
  $('.art_slider').remove();
  $('.slide').remove();
  $('.artContainer').remove();
  // $('.tranny').remove();
  // let hiddenworks = $('.hiddenImage');
  // hiddenworks.removeClass('hiddenImage');
  // hiddenworks.addClass('viewableMobileImage');
  // let hiddenDiv = $('.hiddenImages');
  // hiddenDiv.removeClass('hiddenImages');

$('.prev').hide();
$('.next').hide();


$('.work').each( function() {
  let image_path = $(this).data('source');
  if (image_path != '') {
  let domObject = "<img src='uploads/artwork/" + image_path + "'>";
  let titleObject = "<div class='titleBrass'>";
  titleObject += "<h1>";
  titleObject += $(this).data('title');
  titleObject += "</h1>";
  titleObject += "<p>";
  titleObject += $(this).data('width') +" x " + $(this).data('height');
  titleObject += "</p>";
  titleObject += "<p>";
  titleObject += $(this).data('created');
  titleObject += "</p>";
  titleObject += "</div>";
  $(this).append( domObject );
  $(this).append( titleObject );
  }
 });


$('.hiddenImages').css({'display':'block'});

console.log('currentId: ' + window.currentId);
if (window.currentId != null) {
console.log('have an id in mind.');



    window.location.href = "#"+window.currentId;



}

}
  
let loaded=function( ) {
  
  sizeObject = sizeImage(window.c1, window.c1.find('img').attr('src'));

  // if (sizeObject.width ==0) {
  //   alert("width = 0");
  // }
  //console.log('after sizing');
  window.c1.find('img').css(sizeObject);
  //sizeObject = sizeImage(window.r1, window.r1.find('img').attr('src'));
  //window.r1.find('img').css(sizeObject);
  //window.l1.css({'z-index':2, opacity:.5});
  window.c1.css({'z-index':5, opacity: 1});

}



let slideFit = function() {

  let title_div = $('.tt_title');

   title_div.html( $(window.currentWork).data('title') );
    let date_div = $(".tt_date");

   date_div.html( $(window.currentWork).data('created') );

   let size_div = $(".tt_size");

    size_div.html( $(window.currentWork).data('width') + " x " + $(window.currentWork).data('height'));

    let sold_div = $('.tt_sold');
    if ($(window.currentWork).data('sold')) {
      sold_div.html( "<span class='soldSpan'></span>"); 
    } else {
      sold_div.html("still available");
    }
   // sold_div.html( $(window.currentWork).data('sold'));
    // sizeObject = sizeExistingImage(window.c1, window.c1.find('img').attr('src'));
    // window.c1.find('img').css(sizeObject);

      let thisImage = new Image();
      thisImage.src = window.c1.find('img').attr('src'); 
      if (thisImage.complete) {
          loaded();
        } else {
          thisImage.addEventListener('load', loaded  )
          thisImage.addEventListener('error', function() {
             // alert('error loading image')
          })
        }
    
}


let slideDisplay = function() {

    console.log('in slideDisplay');
    let cW = window.currentId;

    console.log(cW);
    // if (cW != window.desiredWorkNumber) {
    //   cW = parseInt(window.desiredWorkNumber);
    //   window.currentWorkNumber = cW;
    // }

   //let nextVal = cW;


    //window.c1.find('img').attr('src', window.works[cW].src );

    //console.log(window.works[cW].src);
    //console.log(window.c1.find('img').attr('src'));

    //let sizeObject = sizeImage(window.l1, window.l1.find('img').attr('src'));
    //window.l1.find('img').css(sizeObject);
    console.log(window.c1.find('img').attr('src'));
    sizeObject = sizeImage(window.c1, window.c1.find('img').attr('src'));

    // if (sizeObject.width ==0) {
    //   alert("width = 0");
    // }
    //console.log('after sizing');
    window.c1.find('img').css(sizeObject);
    //sizeObject = sizeImage(window.r1, window.r1.find('img').attr('src'));
    //window.r1.find('img').css(sizeObject);
    //window.l1.css({'z-index':2, opacity:.5});
    window.c1.css({'z-index':5, opacity: 1});
    //window.r1.css({'z-index':4, opacity:.5});
    
    let title_div = $('.tt_title');
   // title_div.html(window.titles[cW]);
   title_div.html( $(window.currentWork).data('title') );
    let date_div = $(".tt_date");
   // date_div.html(window.dates[cW]);
   date_div.html( $(window.currentWork).data('created') );

   let size_div = $(".tt_size");
//    size_div.html(window.sizes[cW]);
    size_div.html( $(window.currentWork).data('width') + " x " + $(window.currentWork).data('height'));

    let sold_div = $('.tt_sold');
    if ($(window.currentWork).data('sold')) {
      sold_div.html( "<span class='soldSpan'></span>"); 
    } else {
      sold_div.html("still available");
    }
  //  sold_div.html( $(window.currentWork).data('sold'));
  //  sold_div.html(window.solds[cW]);
    

}
let wheelTrack = function(e) {
  //   if (!window.sliding) {
     
  //     console.log(e.deltaY);
  //  // var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
  //     //console.log(delta);
  //   if (e.deltaY > 0) {
  //      go_left();
  //   } else 
  //   {  
  //       go_right();
  //   }
  // }
    
}

let selectCategory=function(event) {
  getBaseURL();
 // console.log(window.baseURL);
  if (event && event.target && event.target.value) {
  let choice = event.target.value;
  document.location.href = window.baseURL + '/art.php?category='+choice;
}

}