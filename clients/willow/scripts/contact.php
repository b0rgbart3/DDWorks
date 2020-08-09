<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

/**** */


$success_message = "<div class='successMessage'>Thank you for contacting Willow.  She will be in touch shortly.</div>";

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
                echo $success_message;

        } 
        else {
          //  echo "Error: " . $error;
        }
    
    
        
    }
}

function sendContactMessage( $data) {

    //if ($live) {
        $to = "willow@willowkelly.com";
        $to = "b0rgBart3@gmail.com";
//        $to = "jack@jackdavisart.com";
   // } else {
   //     $to = "b0rgBart3@gmail.com";
    //}
    $subject = "A message was received from WillowKelly.com";

    $message = <<<EOD
    <html>
    <head>
    <title>WillowKelly.com</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel="stylesheet">
    </head>
    <body style="font-size:16px; font-family:sans-serif; color:#000000">
   
EOD;

    $message .= "<div style='color:#000000;background-color:#e6e5cc;padding:30px;margin-right:20px;border-radius:8px;border:4px solid 89887a;'>";
    $message .=  "<h1 style='color:#89887a; margin:0;padding:0;'>A new message from your willowkelly website:</h1>";
    $labelIndex = 0;
    
    $message .="<p><span style='color:#89887a;'>From:</span><br>";
    $message .= $data['firstname']." ".$data['lastname']."<br>";
    $message .= $data['email']."</p>";
    $message .= "<p><span style='color:#89887a;'>Message:</span><br>".$data['message']."</p>";
    
    $message .= "</div><br></body></html>";
    

   $mail = new PHPMailer(true);  
   try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.dreamhost.com';                   // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'willow@willowkelly.com';        // SMTP username
    $mail->Password = 'bQ4CTX23';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('willow@willowkelly.com', 'Info');
    $mail->addAddress('b0rgBart3@gmail.com', 'BartDority'); 

    $mail->addBCC('b0rgBart3@gmail.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'A new message from WillowKelly.com';
    $mail->Body    = $message; // 'This is just a test';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}



    
}


