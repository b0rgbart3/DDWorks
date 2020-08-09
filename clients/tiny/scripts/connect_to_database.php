<?php 
require 'app_config.php';
function connect_to_db() {

$db = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

/* check connection */
if ($db->connect_errno) {
   // printf("<br><h1>Connection failed:</h1><p> %s </p>\n", $db->connect_error);
    return null;
}

if (!$db) {
   // echo "<h1>Error:</h1><p> Unable to connect to the database.</p>" . PHP_EOL;
    return null;
} else {
   
   // echo "Database Connection established successfully.<br>";
    return $db;
    } 
}
//     $data = [];
//     $queryString = "SELECT * FROM `products`";
//     $result = mysqli_query($db, $queryString);

//     if ($result) {
//         while ($row = mysqli_fetch_row($result)) {
//                 array_push($data, $row);
//         }
//         echo "Found the products table in the database.<br>";
        
//         if (sizeof($data)<1) {
//             echo "However, there is currently no data in the products table.<br>";
//         } else {
//             print_r($data);
//         }
//     } else {
//         echo "Couldn't find the products table in the database.";
//     }
// }

