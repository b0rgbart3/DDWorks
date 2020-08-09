<?php
session_start();
$_SESSION["datasource"] = "live";
$_SESSION["dummy"] = "candy";
header('Location: index.php');
exit();
?>