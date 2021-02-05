<?php

$fullname = '';
$email = '';
$message = '';
$error = '';
$errorfield = "";
$datareceived = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['submit']))
    {
     //   print_r($_POST);
      //  echo "Thank you for you for contacting us.";
       // echo "<br>";

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
            $fullname = trim($_POST['fullname']);
            if ($fullname=='') {
                $error = "your name";
                $errorfield = "fullname";
            }
          } else {
              $error = "your full name";
              $errorfield = "fullname";
          }

  

            if ($error == '') {
                //echo "<br>No errors.";
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


 function sendContactMessage( $data) {

    $to = "bartdority@gmail.com";
    $subject = "A message was received from the DDWorks website";
    
    $message = <<<EOD
    <html>
    <head>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel="stylesheet">
    </head><body style="font-size:16px; font-family:sans-serif; color:#000000">
EOD;
    
    $message .= "<div style='color:#000000;padding:10px;border:1px solid #eeeeee;'>";
    $message .=  "<h1>A Message from the Contact Form of DDWorks</h1>";
    $labelIndex = 0;
    
    $message .= "<p>Full Name: ".$data['fullname']."</p>";
    $message .= "<p>Email: ".$data['email']."</p>";
    $message .= "<p>Message: ".$data['message']."</p>";
    
    $message .= "</div><br>End of contact form message.<br></body></html>";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: <info@ddworks.org>' . "\r\n";
    
    mail($to,$subject,$message,$headers);
    
}