<?php
function load_products($db) {
    $products = [];

    $data = fetch_images($db);

    if ($data != null) {
    foreach($data as $index => $line) {
       $object = new images($line);
       //echo "In load.php, line 29.<br>";

       array_push($images, $object);
   } }


    $_SESSION['images'] = $images;

    return $images;

}