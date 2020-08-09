
let setupSlider = function() {
    console.log('setting up slide');
    window.sliding = false;
    let wwidth = $('.artContainer').width(); // window.innerWidth;
    let wheight = $('.artContainer').height(); //window.innerHeight;
    $('.art_slider').css({height: wheight*.94});
    let maxheight = $('.art_slider').height() * .96;
    let mainwidth = wwidth*.9;
    let mainheight = maxheight;
    let c1 = $('.c1');
    let centerl = (wwidth /2);
    let c1left = centerl - (mainwidth / 2);
    let c1top = c1.position().top;
   // let top1 = (mainheight - h1) / 2;
    c1.css({left: c1left, width: mainwidth, height:mainheight, top:10});
    window.c1left = c1left;
  //  window.top1 = top1;
    window.mainwidth = mainwidth;
    window.mainheight = mainheight;
    window.c1 = c1;
  
  
    window.currentId = getInfoFromURL().id;// need id

    window.currentWork = findWork();

    slideDisplay();

    // if (window.currentWorkNumber != window.desiredWorkNumber) {
    //     console.log('moving to desired');
    //     window.currentWorkNumber = window.desiredWorkNumber;
    //     slideDisplay();
    //     sizeObject = sizeImage(window.c1, window.c1.find('img').attr('src'));
    //     window.c1.find('img').css( { width: sizeObject.width, height:sizeObject.height, top:sizeObject.top});
    // }

    
    
}


