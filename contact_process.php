<?php

$firstname = '';
$lastname = '';
$email = '';
$message = '';
$error = '';
$errorfield = "";
$datareceived = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['submit']))
    {

        if (isset($_POST['message'])) {
            $message = trim($_POST['message']);
            if ($message=='') {
                $errorfield = "message";
                $error = "a message";
            }
          } else {
            $errorfield = "message";
              $error = "a message";
              echo "<br>Missing message.";
          }

          if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "a valid email";
                $errorfield = "email";
            }

            if ($email=='') {
                $error = "a valid email";
                $errorfield = "email";
            }
          } else {
              $error = "a valid email";
              $errorfield = "email";
          }
          if (isset($_POST['fullname'])) {
            $lastname = trim($_POST['fullname']);
            if ($lastname=='') {
                $error = "your fullname";
                $errorfield = "fullname";
            }
          } 
  

            if ($error == '') {
                $datareceived = true;

                $data = [];
                $data['fullname'] = $fullname;
                $data['email'] = $email;
                $data['message'] = $message;
                
                sendContactMessage($data);
                unset($_POST);
            } 
            else {
                echo "Error: " . $error;
            }
    }
    
} else {
    if (isset($_GET['section'])) {
        $section = $_GET['section'];
        //echo $section;
        echo "<script>var query='".$section."';";
        echo "</script>";
    }
    
}