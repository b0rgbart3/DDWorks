
// Here we do some preliminary javascript form validation
// to make sure the user is entering the right type of data
// before we send it on the the php script for formal
// processing.

$( document ).ready(function() {

    let checkValidity = function(email) {
    
    // regex for proper looking email address
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // If the user has started making changes, then remove the error messages.
    $('#fullname').on('change', function() {
        $('#fullname').removeClass('error');
    });
    $('#email').on('change', function() {
        $('#email').removeClass('error');
    });
    $('#message').on('change', function() {
        $('#message').removeClass('error');
    });


    // When the user clicks the send button, then we check all the fields
    // to make sure they have data 

    $('#send').on('click', function(event) {

        let fullname = $('#fullname').val();
        let email = $('#email').val();
        let message= $('#message').val();

        let notice = $("#fullname").next('.notify');

        // Fullname
        if (!fullname) {
            $('#fullname').addClass('error');      
            notice.text("Please include your full name.");
        } else {
            notice.text("");
        }
        
        // Email
        notice = $("#email").next('.notify');
        let validemail=false;
        if (!email) {
            $('#email').addClass('error');
            notice.text("Please include your email address.");
        } else {
            validemail = checkValidity(email);
            if (!validemail) {
                $('#email').addClass('error');
        
            notice.text("Please include a valid email address.");
            } else {
                notice.text("");
            }
        }

        // Message
        notice = $("#message").next('.notify');
        if (!message) {
            $('#message').addClass('error');
            notice.text("Please include a message.");
    
        } else {
            notice.text("");
        }

        // If any of these are invalid then we interrupt the process, and 
        // take the user to the appropriate place on the page.
        
        if( !fullname || !email || !message || !validemail) {
            event.preventDefault();

            const element = document.querySelector('#contactForm')
            const topPos = element.getBoundingClientRect().top + window.pageYOffset

            window.scrollTo({
                top: topPos, // scroll so that the element is at the top of the view
                behavior: 'smooth' // smooth scroll
            })
        }

    });

});
