<?php
session_start();
//$_SESSION['logged_in'] = false;
//$_SESSION['error'] = false;

$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = test_input($_POST["password"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($password != "cr3x%8stG@240x") 
{
	$_SESSION['error'] = "wrong password";
	header("Location: admin.php"); /* Redirect browser */
}
else
{
	$_SESSION['error'] = false;
	$_SESSION['logged_in'] = true;
	header("Location: dashboard.php?tab=collection&sort=title&order=ASC"); /* Redirect browser */
}





?>

