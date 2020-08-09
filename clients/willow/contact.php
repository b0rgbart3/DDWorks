<?php 
session_start();
$contact_made = false;
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
date_default_timezone_set('America/Los_Angeles');
$under_construction = false;
$live = false;
include_once('scripts/contact.php');

$response = "";
?>
<html>
<head>
<style>.error{background-color:rgba(200,0,0,.5);width:80%;padding:12px; border-radius:4px;color:white;}

</style>
 
<?php include_once "parts/shared_head.html"; ?>
<script src='js/contact_form_validation.js'></script>
<link rel="stylesheet" href="css/form_style.css">
</head>
<body>
 <?php include_once "parts/header.php"; ?>
 <img src='images/mushroomsPurple-1.jpg' class='mainpic'>

<div class='content'>
<img src="images/Testimonials-1.png" class="midsizeImage">


<?php if (!$contact_success) {
    ?>
    <br>
    <h1>Contact Willow Kelly:</h1>  
<br>
<div class='ddw_icon ddw_email_icon'></div> 
<a name="contactform">
<form class='contactForm' method='post' action="<?= $_SERVER['PHP_SELF']?>#contactform" enctype="multipart/form-data" id="contactForm">

    <div class='inputs'>
    <input type='text' name='firstname' id='firstname' class='namefield' placeholder="Your First Name">
    <p class='notify'></p>

 
    <input type='text' name='lastname' id='lastname' class='namefield' placeholder="Your Last Name">
    <p class='notify'></p>

    <input type='text' name='email' id='email' placeholder="Your E-mail">
    <p class='notify'></p>
   

    <textarea name='message' id='message' cols='60' rows='6' placeholder="Your message"></textarea>
    <p class='notify'></p>

    <input type='submit' name='submit' value='SEND' id='send' class='send'>
    <br clear='all'>
</div>
</form>
<?php } 
$contact_success = false;
?>



<?php include_once "parts/shared_footer.html"; ?>
</div>  <!-- End of Content Div-->
</body>
</html>


 

