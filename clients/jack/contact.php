<?php
session_start();
date_default_timezone_set('America/Los_Angeles');
$under_construction = false;
$live = false;
include_once('scripts/contact.php');
include_once('parts/header_part.php');
?>

<body>
    <?php
    if ($contact_success) {
      echo "<div class='thankyou'><h1>Thank you for you for contacting Jack Davis.</h1>";
      echo "<br>";
      echo "<p>He will be in touch shortly.</p>";
      echo "</div>";
    }
    ?>
<?php include_once('parts/masthead.php'); ?>


<?php if (!$contact_success) {
    ?>
<form class='contactForm' method='post' action="index.php" enctype="multipart/form-data" id="contactForm">
<h1>Contact Jack Davis:</h1>  
<br>
       
    <div class='inputs'>
    <label name='firstname'>First Name</label>
    <input type='text' name='firstname' id='firstname' class='namefield'>
    <p class='notify'></p>

    <br clear='all'>
    <label name='lastname'>Last Name</label>
    <input type='text' name='lastname' id='lastname' class='namefield'>
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
    <input type='submit' name='submit' value='send' id='send' class='send'>
</div>
</form>
<?php } 
$contact_success = false;
?>


</body>
</html>
