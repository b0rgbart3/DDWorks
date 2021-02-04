<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dority Design Works</title>

        <!-- Google Fonts -->
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

        <!-- My Style Sheets -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/masthead.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="css/contact_style.css">

        <!-- Form Handler PHP script -->
        <?php INCLUDE 'contact_process.php';?>
    </head>

<body>
    <!-- Masthead -->
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

    <!-- PHP script to post a thank you message when the contact form is filled out. -->
    <?php INCLUDE 'contact_thank_you.php'; ?>

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

    <!-- The Contact Form -->
    <a name='contact'></a>
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

</body>

<!-- Javascript Includes -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='js/external/jquery.visible.min.js'></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script src='js/TweenLite.js'></script>
<script src='js/TimelineLite.js'></script>
<script src='js/TimelineMax.js'></script>
<script src='js/TweenMax.js'></script>
<!-- Using Require JS to load in multiple JS modules -->
<script src='js/external/require.js' data-main='js/base'></script>
<script src='js/intro1.js'></script>
<script src='js/form_validation.js'></script>

</html>

<?php
  


?>
