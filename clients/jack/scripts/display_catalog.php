<?php 
include_once('scripts/json_data.php');
include_once('scripts/artwork.php');
include_once('scripts/piece.php');
//$art = new Artwork('data','artwork.txt');
$art = new Artwork('data', 'my_data.json');
$date = new DateTime();

if (!$under_construction) {
   // echo "There are ".$art->count()." pieces in the portfolio.<br>";
// $art->outputImages();
$art->outputThumbnails();
}

?>

