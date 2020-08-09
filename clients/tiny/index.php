<?php session_start();
include_once "classes/products.php";
include_once "parts/meta.php";
include_once "parts/header.php";
include_once "scripts/inits.php";
include_once 'scripts/connect_to_database.php';
include_once 'scripts/check_for_products_table.php';

$db = connect_to_db();
$_SESSION['db'] = $db;
include_once "parts/data_choice.php";



if ($db) {
    echo "<p class='feedback success'>Established the database connection.</p>";
} else {
    echo "<p class='feedback error'>Unable to establish the database connection.</p>";
}

$products_table_exists = check_for_products_table();
if ($products_table_exists) {
    echo "There is a products table.";
} else {
    echo "There is no products table.";
}

//include_once "scripts/load.php"; 

include_once "parts/footer.php";
exit();
?>

