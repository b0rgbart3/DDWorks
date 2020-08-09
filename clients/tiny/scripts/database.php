<?php 
error_reporting(-1);
require 'app_config.php';
//echo "<h1>Establishing DB Connection</h1>";
// echo "<p>HOST: ".DB_HOST."</p>";
// echo "<p>USER: ".DB_USER."</p>";
// echo "<p>DB: ".DB_NAME."</p>";
$db = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

/* check connection */
if ($db->connect_errno) {
    printf("<br><h1>Connection failed:</h1><p> %s </p>\n", $db->connect_error);
    exit();
}

if (!$db) {
    echo "<h1>Error:</h1><p> Unable to connect to MySQL.</p>" . PHP_EOL;
    exit;
} else {
    // Pass a handle to the database to the rest of our app
    echo "Database Connection established successfully.<br>";
    $_SESSION['products_db'] = $db;

    $data = [];
    $queryString = "SELECT * FROM `products`";
    $result = mysqli_query($db, $queryString);

    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
                array_push($data, $row);
        }
        echo "Found the products table in the database.<br>";
        
        if (sizeof($data)<1) {
            echo "However, there is currently no data in the products table.<br>";
        } else {
            print_r($data);
        }
    } else {
        echo "Couldn't find the products table in the database.";
    }
}
?>
