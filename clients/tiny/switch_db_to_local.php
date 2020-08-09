<?php
session_start();
$_SESSION["datasource"] = "local";
$_SESSION["dummy"] = "chocolate";
header('Location: index.php');
exit();
?>