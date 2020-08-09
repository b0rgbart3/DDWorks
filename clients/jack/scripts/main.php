<?php 
include_once('scripts/json_data.php');
include_once('scripts/artwork.php');
include_once('scripts/piece.php');

//$art = new Artwork('data','artwork.txt');
$art = new Artwork('data', 'my_data.json');
echo "";

if (!$under_construction) {
    echo "There are ".$art->count()." pieces in the portfolio.<br>";
$art->outputImages();
}
$date = new DateTime();
//echo "<p>Today is ".date_format($date, 'F j, Y');

?>

<?php if ($under_construction) { ?>
<p><span style='font-weight:700;'>This website is under construction.</span><br><br>Please check back with us soon...</p>
<?php
} else {
  
}
?>

