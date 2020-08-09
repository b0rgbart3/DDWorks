define(['jquery', 'pubsub'], function($, pubsub) {
    var burger;
    var menu;
    var logo;
    var menuOpen;
    var $this;
    var connect;

    // If the user chooses something from the menu...
    pubsub.sub('choose-category', function(category) {
        burger.removeClass('burgerOpen');
        menu.slideUp();
        menuOpen = false;
    });

    // If the user clicks off the menu -- onto the page somewhere
    pubsub.sub('choose-nothing', function() {
        burger.removeClass('burgerOpen');
        menu.slideUp();
        menuOpen = false;
    });


    return {
        init: function() {
            console.log('in menu init.');
            burger = $('.burger');
            var fullWidth = window.outerWidth;
            var contentWidth = $('.content').width();
            var burgerWidth = $('.burger').width();
            var burgerPos = $('.burger').offset().left;
            var menuWidth = $(".burgerNav").width();
            console.log('burgerPos: ' + burgerPos);
            var diff = fullWidth-contentWidth;
            console.log("DIf= " + diff);
            var newPos = fullWidth - (diff/2) -400;

            burgerNav = $('.burgerNav');
           // burgerNav.css({"left":burgerPos-250});

           // menuContainer = $('.burgerNav');
            menu = $('.burgerNav ul');
            footermenu = $('.footer ul');
            logo = $('.logo');
            menuOpen = false;
            connect = $('.connectionFrame');
           


            burger.on('click', function(event) {

                // mast = $('.mastContainer')[0];
                event.stopPropagation();
                burger.toggleClass('burgerOpen');
                if (!menuOpen) {
                    menu.slideDown();
                } else {
                    menu.slideUp();
                }
                menuOpen = !menuOpen;
                
            });

            logo.mouseover(function(event) {
                let target = $(event.target);
                if (target.is('img')) {
                 //   event.target.src = "images/interface/logo_hi.svg";
                }
                
            });
            logo.mouseout(function(event) {
                let target = $(event.target);
                if (target.is('img')) {
                    event.target.src = "images/interface/logo.svg";
                }
                
            });

            logo.on('click', function() {
                window.location='index.php';
            })


            menu.on('click', 'li', function(event) {
                event.stopPropagation();
                $this = $(this);
                if ($this.data('number') >= 0) {
                    var item = {
                        id: this, name: $this.html(), number: $this.data('number')
                    }
                    var shorty = $this.data('shortname');
                    //console.log(shorty);
                    history.pushState('', '', "?section=" + shorty);
                    pubsub.pub('choose-category', item);
                } else {
                  //  console.log('go home');
                    burger.removeClass('burgerOpen');
                    menu.slideUp();
                    menuOpen = false;
                    window.location='index.php';
                }
                $('.footer').show();

            });

            footermenu.on('click', 'li', function(event) {
                event.stopPropagation();
                $this = $(this);
                var shorty = $this.data('shortname');
                history.pushState('', '', "?section=" + shorty);
                var item = {
                    id: this, name: $this.html(), number: $this.data('number')
                }
                pubsub.pub('choose-category', item);
            });

            connect.on('click', 'div', function(event) {
                event.stopPropagation();
                $this = $(this);
                var shorty = $this.data('shortname');
                history.pushState('', '', "?section=" + shorty);
                var item = {
                    id: this, name: $this.html(), number: $this.data('number')
                }
                pubsub.pub('choose-category', item);
               // $('.connectionFrame').css({'display':'none'});

            });
            
        }
    }
})