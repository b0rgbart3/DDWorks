define(['jquery', 'pubsub', 'TweenLite', 'TimelineLite'], function($, pubsub, TweenLite, TimelineLite) {

    var titleTag;
    var wordpress=['willow','womb', 'gede','ltccc'];
    var websites= ['jerry', 'cawc2', 'axis', 'paintedmonkey', 'ml_art', 'muscle2', 'cawc', 'sanctuary', 'dk_messenger', 'llt', 'wedding'];
    var design =['suz', 'willow_card', 'priestess', 'dave_card', 'rav2','rav', 'rav3'];
    var latest =['loom','cawc2', 'womb'];
    var home =['home'];
    var logos=['womb_logo', 'gede_logo','mjp','wk','vargatorte', 'suzanne_logotype' ];
    var apps=['loom', 'starburst', ];
    var animation=['cousteau', 'newline'];
    var contact=['contact'];
    var list = null;
    var projectDiv;
    var sequences = [];
    var currentProject = 0;
    var currentlyLoading = false;
    var longcategoryNames = ['Home', 'Current Projects','Web Design & Development','Websites built using the WordPress&reg; Platform','application development','graphic design & promotional materials', 'logo design & visual branding', 'animation & special effects', 'Contact Dority Design Works'];

    var lists= [home,latest,websites,wordpress, apps,design,logos, animation, contact];
    
    var categories = ['home', 'current','webdesign', 'wordpress', 'apps','graphics','logos','animation', 'contact'];


    function goNext(elements) {
        var imageNumber = elements[0];
        var thisImage = elements[1];
        var images = elements[2];
 
        $(thisImage).removeClass('active');
        $(thisImage).addClass('passive');

       if (imageNumber >= (images.length-1)) {
           imageNumber = -1;
       }
       $(images[imageNumber+1]).removeClass('passive');
       $(images[imageNumber+1]).addClass('active');
       $(images[imageNumber+1]).css({opacity:0, left:400});
        gN = new TimelineLite();

        gN.to($(images[imageNumber+1]), .25, {opacity:1, left:0});
    }

    function goPrevious(elements) {
        var imageNumber = elements[0];
        var thisImage = elements[1];
        var images = elements[2];

       // console.log('In goPrev: imageNumber='+imageNumber);
        if (imageNumber > 0) {
            
        $(thisImage).removeClass('active');
       $(thisImage).addClass('passive');
       $(images[imageNumber-1]).removeClass('passive');
       $(images[imageNumber-1]).addClass('active');
       
       $(images[imageNumber-1]).css({opacity:0, left:-400});
        gP = new TimelineLite();
        gP.to($(images[imageNumber-1]), .25, {opacity:1, left:0});
    
     } else {
        $(thisImage).removeClass('active');
        $(thisImage).addClass('passive');
        $(images[images.length-1]).removeClass('passive');
       $(images[images.length-1]).addClass('active');
       $(images[images.length-1]).css({opacity:0, left:-400});
        gP = new TimelineLite();
        gP.to($(images[images.length-1]), .25, {opacity:1, left:0});
     }
    }
    function nextImage(event) {
        var thisTarget = $(event.target);
        var parentDiv = thisTarget.parent();
        var imageContainer = parentDiv; 
        var sliderDivs = imageContainer.find('.slideMe');
        var slideCount = sliderDivs.length;
        for (var i = 0; i < slideCount; i++ ) {
            if ($(sliderDivs[i]).hasClass('active')) {

                iT = new TimelineLite();
                var sendParams = [ i, $(sliderDivs[i]), sliderDivs];
                iT.to ($(sliderDivs[i]), .25, {opacity:0, left:-500, onComplete:goNext, onCompleteParams:[sendParams] } );
       
                break;
            }
        }
        
    }
    function prevImage(event) {
        var thisTarget = $(event.target);
        var parentDiv = thisTarget.parent();
        var imageContainer = parentDiv.find('.imageContainer');
        var images = imageContainer.find('img');
        var imageCount = images.length;

        for (var i = imageCount-1; i >= 0; i-- ) {
            if ($(images[i]).hasClass('active')) {

                iTP = new TimelineLite();
                var sendParams = [i, $(images[i]), images];
                iTP.to ($(images[i]), .25, {opacity:0, left:500, onComplete:goPrevious, onCompleteParams: [sendParams] } );

                break;
            }
        }
        
    }
    function playAnimation(event) {
        var thisTarget = $(event.target);
        var parentDiv = thisTarget.parent();
        var imageContainer = parentDiv.next('.imageContainer');

        var animation = parentDiv.data("animation");
       
        $.get('projects/'+ animation, function( data ) {
                    
            parentDiv.empty();
            parentDiv.append( data );
         //   ddw_intro();
        });
        
    }

    function isInViewport(element) {
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < ( viewportBottom - 350);
        };



    
    function loadSequences() {
        sequences = [];
      //  console.log('In loadSequences');
        if (list && list.length > 0) 
        {
          
            var i = 0;
            var name = list[i];
        //    console.log('i='+i);
            var sequenceLoader = setTimeout( function getSequence() {
         
                   // console.log('In main loop');
                    i++;
                    name = list[i-1];
                    
                    if (i <= list.length) {
                    let path = 'projects/'+name+'.js';
                   
        
                    $.get(path, function( data) {
                      //  console.log("PUSHING NEW SEQUENCE: " + name);
                        sequences.push(window[name]);
                        
                        });
                    setTimeout(getSequence, 100);
                    }
           
            }, 10);
        }
    }
    pubsub.sub('image-in-view', function(element) {
        
        
  
          if (currentProject != element) {
            currentProject = element;
            console.log('viewing:' + element);
          //   console.log(sequences);
            if (sequences && sequences[element]) {
          //      console.log('found a squence to run');
                let sequenceFunction = sequences[element];
                if (typeof sequenceFunction==='function')
                {
                //  console.log('starting: '+element);
              sequences[element]();
             } else {
               //  console.log(sequenceFunction);
             }
           }
        
          }
      });
  
    pubsub.sub('done-loading', function() {
       // console.log('done-loading');
        var mobile = false;
        var check = navigator.userAgent.match(/Mobile/);

        /* Now that the dynamic projects have finished loading, we can
           assign the functionality -- such as card flipping for the graphics section.
        */

            window.TweenLite.set(".cardWrapper", {perspective:800});
            window.TweenLite.set(".card", {transformStyle:"preserve-3d"});
            window.TweenLite.set(".back", {rotationY:-180});
            window.TweenLite.set([".back", ".front"], {backfaceVisibility:"hidden"});

            /* This takes care of the actual flipping of all the cards */

            $('div.designContainer').on('click',function(event){

                let thisTarget = $(event.target).closest('.cardWrapper');
                console.log(thisTarget);    
                flipped = !thisTarget.hasClass('flipped');

                if (flipped) {
                    thisTarget.addClass('flipped');
                window.TweenLite.to(thisTarget.find(".card"), 1.2, {rotationY:180, ease:Back.easeOut});
                }
                else{
                thisTarget.removeClass('flipped');
                window.TweenLite.to(thisTarget.find(".card"), 1.2, {rotationY:0, ease:Back.easeOut});  
                }

                console.log('flipping now');

                });
            /* This takes care of showing the rotation icon */
                $(".cardWrapper").hover(
                    function(event) {
                        window.TweenLite.to($(event.target).find(".flipIcon"), 1.2, {opacity:1, ease:Back.easeOut});
                        },
                    function() {
                        window.TweenLite.to($(event.target).find(".flipIcon"), 1.2, {opacity:.01, ease:Back.easeOut});
                       }
                  );

        if (check == "Mobile") {
            mobile = true;
        } 
    });

    pubsub.sub('list-change',function(list) {
       // console.log('got list-change message');
        if (currentlyLoading) {
            return;
        }
        currentlyLoading = true;
        $('.projects').empty();

        // var start = new Date;
        // $('#collection').empty();

        /* This nested setTimeout block sets up a system whereby the 
           projects are loaded in sequentially - regardless of how long
           each project takes to load. That way faster loading projects
           don't skip their place in the order.  

           As far as I know, the delay (10 milliseconds) doesn't have much bearing
           on the outcome here because really what we're after is just forcing
           the loading of each piece to happen sequentially.  This happens because
           the getProject function get's called inside the get data method -- so
           it happens after the data for each project has returned.
        */

        if (list && list.length > 0) {
            
            var i = 0;

            var projectLoader = setTimeout( function getProject() {
               console.log('running project loader, i =' + i);
                name = list[i];
                i++;
          
                if (i <= list.length) {
                $.get('projects/'+name+'.html', function( data ) {
  
                    $('.projects').append( "<div class='project group project"+(i-1)+"'>" +  data + "</div>");    
                  
                    if (i >= list.length) {
            
                        loadSequences();
                        currentlyLoading = false; 
                        pubsub.pub('done-loading');
                        
                        $('.outsideLink').on('click', function(event) {
                            var dataLink = $(event.target).data('link');
                            window.open(dataLink, "_blank");
                        });
                        $('.arrowNav.next').on('click', function(event) {
                            nextImage(event);
                        });
                        $('.arrowNav.prev').on('click', function(event) {
                            prevImage(event);
                        });
                        $('.playButton').on('click', function(event) {
                            playAnimation(event);
                        });
                    } else {
                    setTimeout(getProject(),400);
                    }
                });

                
                }
              
            }, 10);  
        }
    });

 
    pubsub.sub('choose-category', function(category) {
        category = category.number;
        titleTag.html("<div class='catTitle'>"+longcategoryNames[category]+"</div>");
        list = lists[category];    
        projectDiv.html(list);
        console.log('Changing list to: ' + list);

        pubsub.pub('list-change',list);
        $('.static-title-tag').remove();
        $('.home-projects').remove();
    });

    return {
        init: function() {
            titleTag = $('.main-title-tag');
            projectDiv = $('.projects');
            currentProjectsDiv = $('.current_projects');           
        },
        homeinit: function() {
            titleTag = $('.main-title-tag');
            projectDiv = $('.projects');
            currentProjectsDiv = $('.home');
            pubsub.pub('list-change', lists[0]);  
        },
        getList: function() {
            return list;
        },
        queryListChange: function(category) {
            // If there is a query string on the url, the base js file will call this function
            // to mimic a user-chosen category.

          //  console.log('responding to query list change: ' + category);
            var categoryNumber = categories.indexOf(category);
         //   console.log('Category Number: '+ categoryNumber);
             var item = {
                 id: '', name: longcategoryNames[categoryNumber], number: categoryNumber
             }

            pubsub.pub('choose-category', item);
        }
    }
})