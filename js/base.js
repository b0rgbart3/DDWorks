"use strict";

require(['jquery','pubsub', 'menu', 'page'], 
  function($, pubsub, menu, page) {

    // our main dom ready event
    $(document).ready(function() { 
        let query = null;
        
        if (window['query'] && window['query'] != null) {
            query = window['query'];
        }

        // bootstrap the project list
       menu.init();
       
       if (query) {
        page.init();

       } else {
           page.homeinit();
       }

       

       var isInViewport = function(element) {
            var elementTop = $(element).offset().top;
            var elementBottom = elementTop + $(element).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            return elementBottom > viewportTop && elementTop < ( viewportBottom - 250);
        };

        if (query) {
            page.queryListChange(query);
        } 
    
        $('html').on('click',function(e) {
            pubsub.pub('choose-nothing');
           // console.log(e.attr('href'));
        });

        $('.outsidelink').click(function(e){

            e.preventDefault();
            e.stopPropagation();
            return false;
        });
        
        $('.mast').addClass('stage1');

    

        $(window).on('resize scroll', function() {

            var list = page.getList();
        
      
            var highest = 0;
            if (list) {
            for (var i = 0; i < list.length; i++ ) {
            
                var projectIdentifier = $('.project' +i)[0];
           
                var imageInProject = $(projectIdentifier).find('.art')[0];
           
                if (imageInProject && isInViewport(imageInProject)) {
                    highest = i;
              }
            }}

            pubsub.pub('image-in-view', highest );

        });
        
    });


});

