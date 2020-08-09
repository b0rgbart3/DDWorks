<?php 
include_once "classes/images.php";
session_start();
include_once "classes/artworks.php";
include_once "scripts/load.php"; 

load_full_works();
//$db = $_SESSION['artwork_db'];
$images = load_images($db, 'current');
// $shows = load_shows($db);
$works = $_SESSION['works'];

//include_once 'scripts/in_memory_functions.php';
$category = null;
// if (isset($_GET['category'])) {
// $category = $_GET['category'];
// $works = load_art($db, $category);
// } 
?>
<!DOCTYPE HTML PUBLIC >
<html lang="en">
<?php include 'parts/head.php';?>
<body>
<link rel="Stylesheet" href="style/catalog.css"> 
<div class='framer group'>
<!-- This is english -->
<?php 
include_once 'parts/titlebar.php'; 
include_once 'parts/navigation.php'; 
include 'parts/catalog.php';
?>
    </div>
</div>
</body>
</html>
