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
<div class='mainContent' id='mainContent'>
<?php include_once 'scripts/main.php'; ?>
</div>


</body>
</html>
