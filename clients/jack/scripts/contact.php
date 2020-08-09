<?php
$contact_success=false;
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
        
        if (isset($_POST['firstname'])) {
            $firstname = trim($_POST['firstname']);
            if ($firstname=='') {
                $error = "your first name";
                $errorfield = "firstname";
            }
        } else {
              $error = "your first name";
              $errorfield="firstname";
        }
        if (isset($_POST['lastname'])) {
            $lastname = trim($_POST['lastname']);
            if ($lastname=='') {
                $error = "your last name";
                $errorfield = "lastname";
            }
        }
        else {
              $error = "your last name";
              $errorfield="lastname";
        }
        if ($error == '') {
                //echo "<br>No errors.";
                $datareceived = true;

                $data = [];
                $data['firstname'] = $firstname;
                $data['lastname'] = $lastname;
                $data['email'] = $email;
                $data['message'] = $message;
                
                sendContactMessage($data);
                unset($_POST);

                       //print_r($_POST);
                $contact_success=true;

        } 
        else {
            echo "Error: " . $error;
        }
    
    
        
    }
}

function sendContactMessage( $data) {

    if ($live) {
        $to = "jack@jackdavisart.com";
    } else {
        $to = "b0rgBart3@gmail.com";
    }
    $subject = "A message was received from JackDavisArt.com";

    $message = <<<EOD
    <html>
    <head>
    <title>JackDavisArt.com</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel="stylesheet">
    </head>
    <body style="font-size:16px; font-family:sans-serif; color:#000000">
   
EOD;

    $message .= "<div style='color:#000000;background-color:white;padding:20px;border-radius:8px;border:4px solid pink;'>";
    $message .=  "<h1 style='color:#ff5566;'>A message from JackDavisArt.com</h1>";
    $labelIndex = 0;
    
    $message .="<p><span style='color:#ff5566;'>From:</span><br>";
    $message .= $data['firstname']." ".$data['lastname']."<br>";
    $message .= $data['email']."</p>";
    $message .= "<p><span style='color:#ff5566;'>Message:</span><br>".$data['message']."</p>";
    
    $message .= "</div><br></body></html>";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: <jackdavisart@jackdavisart.com>' . "\r\n";
    $headers .= 'Bcc: borgBart3@gmail.com' . "\r\n";
    
    mail($to,$subject,$message,$headers);
    
}


