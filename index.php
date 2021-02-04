<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dority Design Works</title>
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,500,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mukta+Malar:200,300,400,500,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Overpass+Mono:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Overpass:100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,500,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,500,700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/masthead.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="css/contact_style.css">

<?php INCLUDE 'contact_process.php';?>
    </head>

<body>
    <div class='mastContainer group'>
        <div class='mast group'>
            <div class='logo group'>
                <img src='images/interface/logo.svg' class='ddwLogo'>
            </div>

            <div class='burger group'>
                <div class='burgerIcon'></div>
            </div>
        </div>

        <div class='title-tag main-title-tag'></div> 
        <div class='burgerNav group noselect'>
            <ul class='navChoices group noselect'>
                <li class='nav-choice' data-number='4' data-shortname='apps'>application development</li>
                <li class='nav-choice' data-number='2' data-shortname='webdesign'>web design &amp; development</li>
                <li class='nav-choice' data-number='3' data-shortname='wordpress'>wordpress websites</li>
                <li class='nav-choice' data-number='5' data-shortname='graphics'>graphic design</li>
                <li class='nav-choice' data-number='6' data-shortname='logos'>logo design</li>
                <li class='nav-choice' data-number='7' data-shortname='animation'>animation</li>
                <li class='nav-choice' data-number='8' data-shortname='contact'>contact</li>
                <li class='nav-choice' data-number='-1' data-shortname='home'>home</li>
            </ul>
        </div>
    </div>

    <?php 
if ($datareceived) {
    echo "<div class='response'><p>Thank you for contacting us. <br>We will be in touch shortly.<br></div>";
    $datareceived = false;
}
?>
    <div class='innercontent group'>
       <div class='projects group' id='collection'>
        <img src='images/interface/loading.gif'>
    </div>
</div>



<div class='footerWrapper'>
    <div class='footer group'>

        <div class='footerMenu group'>
            <h1>Services:</h1>
        <ul class='group'>
        <li class='nav-choice' data-number='4' data-shortname='apps'>application development</li>
        <li class='nav-choice' data-number='2' data-shortname='webdesign'>web design + development</li>
        <li class='nav-choice' data-number='3' data-shortname='wordpress'>custom wordpress themes</li>
        <li class='nav-choice' data-number='5' data-shortname='graphics'>graphic design</li>
        </ul>

</div> 
</div>



<br clear='all'>
<style>

</style>
    <a name = 'contact'></a>

<form id="contactForm" class='contactForm' method='post' action="index.php" enctype="multipart/form-data">
<h1>Contact Dority Design Works:</h1>  
<br>
   
    <div class='inputs'>
    <label name='fullname'>Full Name</label>
    <input type='text' name='fullname' id='fullname' class='namefield'>
    <p class='notify'></p>

    <br clear='all'>
    <label name='email'>Email</label>
    <input type='text' name='email' id='email'>
    <p class='notify'></p>
   
    <br clear='all'>
    <label name='message'>Message</label>
    <textarea name='message' id='message' cols='60' rows='6'></textarea>
    <p class='notify'></p>
    <br clear='all'>

    <input type='text' name='not_human' id='human_test'>

    <input type='submit' name='submit' value='send' id='send'>
</div>
</form>

<script>
let checkValidity = function(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


$('#fullname').on('change', function() {
    $('#fullname').removeClass('error');
});

$('#email').on('change', function() {
    $('#email').removeClass('error');
});
$('#message').on('change', function() {
    $('#message').removeClass('error');
});
$('#send').on('click', function(event) {

    let fullname = $('#fullname').val();
    let email = $('#email').val();
    let message= $('#message').val();

    let notice = $("#fullname").next('.notify');
    if (!fullname) {
        $('#fullname').addClass('error');
        
        notice.text("Please include your full name.");
    } else {
        notice.text("");
    }
    
   
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
    notice = $("#message").next('.notify');
    if (!message) {
        $('#message').addClass('error');
        notice.text("Please include a message.");
 
    } else {
        notice.text("");
    }


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

</script>



</div></div>

</body>
<script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='js/external/jquery.visible.min.js'></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
        <script src='js/TweenLite.js'></script>
        <script src='js/TimelineLite.js'></script>
        <script src='js/TimelineMax.js'></script>
        <script src='js/TweenMax.js'></script>
        <!-- Using Require JS to load in multiple JS modules -->
        <script src='js/external/require.js' data-main='js/base'></script>
        <script src='intro1.js'></script>
</script>
</html>

   <?php
   function sendContactMessage( $data) {

$to = "bartdority@gmail.com";
$subject = "A message was received from the DDWorks website";

$message = <<<EOD
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel="stylesheet">
</head>
<body style="font-size:16px; font-family:sans-serif; color:#000000">

EOD;

$message .= "<div style='color:#000000;padding:10px;border:1px solid #eeeeee;'>";
$message .=  "<h1>A Message from the Contact Form of DDWorks</h1>";
$labelIndex = 0;

$message .= "<p>Full Name: ".$data['fullname']."</p>";
$message .= "<p>Email: ".$data['email']."</p>";
$message .= "<p>Message: ".$data['message']."</p>";

$message .= "</div><br>End of contact form message.<br></body></html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@ddworks.org>' . "\r\n";

mail($to,$subject,$message,$headers);

}



?>
