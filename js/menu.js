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

            burger = $('#burger');
            burgerNav = $('#navMenu');
            menu = $('#navMenu ul');
            footermenu = $('.footer ul');
            logo = $('.logo');
            menuOpen = false;
            connect = $('.connectionFrame');

            burger.on('click', function(event) {

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
                console.log("Clickd on menu item.");
                event.stopPropagation();
                $this = $(this);
                if ($this.data('number') >= 0) {
                    var item = {
                        id: this, name: $this.html(), number: $this.data('number')
                    }
                    var shorty = $this.data('shortname');
                    console.log("Short menu name: ", shorty);

                    if (shorty !== "contact") {
                    history.pushState('', '', "?section=" + shorty);
                    pubsub.pub('choose-category', item);
                    } else {
                        const element = document.querySelector('#contactForm')
                        const topPos = element.getBoundingClientRect().top + window.pageYOffset

                        window.scrollTo({
                        top: topPos, // scroll so that the element is at the top of the view
                        behavior: 'smooth' // smooth scroll
                        })
                        menu.slideUp();
                      
                    }
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

            });
            
        }
    }
})