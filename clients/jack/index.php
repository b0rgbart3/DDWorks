<?php
session_start();
date_default_timezone_set('America/Los_Angeles');
$under_construction = false;
$live = false;
include_once('parts/header_part.php');
?>

<link rel="stylesheet" type="text/css" href="css/catalog.css">
<script src='js/catalog.js'></script>

<body>
<?php include_once('parts/masthead.php'); ?>

<div class='mainContent group' id='mainContent'>
  <div class='thumbnailGroup group'>
<?php include_once 'scripts/display_catalog.php'; ?>
</div>
</div>
<div class='modalLander' id='modalLander'>
<div id="modal" class='modal'>
  <div class='closer'></div>
<br clear='all'>
  <div class='modalImageDiv'>
    <img id='modalImage' class='modalImage' src=''><br>  <p class='instructions'>( Click on the image to see a closeup )</p>
  </div>
  <div class='modalTitleBox'>
  <div id='modalTitle' class='title'></div>
  <div id='modalDate' class='date'></div>
  <div id='modalMedia' class='media'></div>
  <div id='modalDescription' class='description'></div>
</div>
</div>
</div>

</body>
</html>
