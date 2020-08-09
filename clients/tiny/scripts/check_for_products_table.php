<?php 

function check_for_products_table() {

$db = $_SESSION["db"];

if (!$db) {
    return false;
} else {

    $data = [];
    $queryString = "SELECT * FROM `products`";
    $result = mysqli_query($db, $queryString);

    if ($result) {
        return true;
    } else {
        return false;
    }
        // while ($row = mysqli_fetch_row($result)) {
        //         array_push($data, $row);
        // }
        // echo "Found the products table in the database.<br>";
        
    //     if (sizeof($data)<1) {
    //         echo "However, there is currently no data in the products table.<br>";
    //     } else {
    //         print_r($data);
    //     }
    // } else {
    //     echo "Couldn't find the products table in the database.";
    // }
  }

}