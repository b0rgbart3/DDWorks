define(['jquery', 'pubsub', 'TweenLite', 'TimelineLite'], function($, pubsub, TweenLite, TimelineLite) {

    var titleTag;
    var wordpress=['willow','womb', 'gede','ltccc'];
    var websites= ['jerry',  'cawc2', 'axis', 'paintedmonkey', 'muscle', 'ml_art', 'cawc', 'sanctuary', 'dk_messenger', 'llt', 'wedding'];
    var design =['suz', 'willow_card', 'priestess', 'dave_card', 'rav2','rav', 'rav3'];
    var latest =['loom','cawc2', 'womb'];
    var home =['home'];
    var logos=['womb_logo', 'gede_logo','mjp','wk','vargatorte', 'suzanne_logotype' ];
    var apps=['loom', 'starburst', ];
    var animation=['cousteau', 'newline'];
    var businesscards=['willow_card','dave_card'];
    var contact=['contact'];
    var category = 0;
    var list = null;
    var currentlist = null;
    var projectDiv;
    var tipTimer;
    var infoOpen = false;
    var sequences = [];
    var currentProject = 0;
    var slim = false;
    var currentlyLoading = false;
    var slimming;
    var slim2;
    var longcategoryNames = ['Home', 'Current Projects','Web Design & Development','Websites built using the WordPress&reg; Platform','application development','graphic design & promotional materials', 'logo design & visual branding', 'animation & special effects', 'Contact Dority Design Works'];

    var lists= [home,latest,websites,wordpress, apps,design,logos, animation, contact];
    var chosenCategory = 0;

    
    var categories = ['home', 'current','webdesign', 'wordpress', 'apps','graphics','logos','animation', 'contact'];

    $.get('intro1.html', function( data ) {
                    
        $('#intro').empty();
        $('#intro').append( data );
        ddw_intro();
    });

    

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

        console.log('In goPrev: imageNumber='+imageNumber);
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
        var images = imageContainer.find('img');
        var imageCount = images.length;
        for (var i = 0; i < imageCount; i++ ) {
            if ($(images[i]).hasClass('active')) {

                iT = new TimelineLite();
                var sendParams = [ i, $(images[i]), images];
                iT.to ($(images[i]), .25, {opacity:0, left:-500, onComplete:goNext, onCompleteParams:[sendParams] } );
       
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

        if (list && list.length > 0) 
        {
          
            var i = 0;
            var name = list[i];
            var sequenceLoader = setTimeout( function getSequence() {
                if (i >= (list.length) ) 
                {
                    clearTimeout(sequenceLoader);
                } else 
                {
                    i++;
                    name = list[i-1];
                    
                    if (i < list.length-1) {
                    let path = 'projects/'+name+'.js';
                   
        
                    $.get(path, function( data) {
                        sequences.push(window[name]);

                        if (i==1) {
                            let animationFunction = window[name];

                            if (typeof animationFunction === 'function') 
                            {
                              window[name]();
                            }
                         
                            }
                        });
                    setTimeout(getSequence, 100);
                    }
                }
           
            }, 100);
        }
    }
    pubsub.sub('image-in-view', function(element) {
        
    //    console.log('viewing:' + element);
  
          if (currentProject != element) {
            currentProject = element;
           
            if (sequences && sequences[element]) {
             
                let sequenceFunction = sequences[element];
                if (typeof sequenceFunction==='function')
                {
                  console.log('starting: '+element);
              sequences[element]();
             } else {
                 console.log(sequenceFunction);
             }
           }
        
          }
      });
  
    pubsub.sub('done-loading', function() {
        console.log('done-loading');
        var mobile = false;
        var check = navigator.userAgent.match(/Mobile/);
        
        $('div.designContainer').on('click',function(event){
             let flip = $(event.target).data('flipside');
             let fliporigsrc = event.target.src;
             let splitSrc = fliporigsrc.split('/');
             let lastString = splitSrc[splitSrc.length-1];

             let newImage = $("<img data-flipside='"+lastString+"' src='"+'./projects/images/'+flip+"'>");
             newImage.insertAfter($(event.target));
             $(event.target).remove();

             //event.target.src='./projects/images/'+flip;
            });

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
        projectDiv.empty();

        $('.projects').empty();
        // put the loading gif in temporarily until all the pieces are done loading
        //$('#collection').empty();
        //$('.projects').append("<div class='loading' id='loading'><img src='images/interface/loading.gif'><br></div><br clear='all'><div id='collection' class='collection group'>");
        //var start = new Date;
        //$('#collection').empty();

        if (list && list.length > 0) {
            
            var i = 0;

            var projectLoader = setTimeout( function getProject() {

                if (i > list.length ) {
                    clearTimeout(projectLoader);

                    loadSequences();
                    var currentTime = +new Date;
                    var passedTime = currentTime - start;

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
                name = list[i];
                i++;
               // console.log('i now='+i);
                if (i <= list.length) {
                $.get('projects/'+name+'.html', function( data ) {
  
                    $('.projects').append( "<div class='project group project"+(i-1)+"'>" +  data + "</div>");
                   
                    // $(window).on('resize scroll', function() {
                       

                    setTimeout(getProject, 100);
                });}
                
                }

                if (i > list.length) {
                    console.log('publishing a done loading message: i=' + i);
                    
                    pubsub.pub('done-loading');
                    currentlyLoading = false;
                    window.containerWidth = $('.imageContainer img').width();
                    
                    pubsub.pub('foundSize');
                    $('#loading').append('</div>');
                    $('#loading').remove();
                    //$('#collection').css({display:"block"});
                }
               // console.log('project #: '+i);
            }, 100);


            
        }


    });

 
    pubsub.sub('choose-category', function(category) {
        category = category.number;
        titleTag.html("<div class='catTitle'>"+longcategoryNames[category]+"</div>");
        list = lists[category];    
        projectDiv.html(list);
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