<?php 
$fullname = '';
$email = '';
$message = '';
$error = '';
$errorfield = "";
$datareceived = false;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dority Design Works</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dority Design Works</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mukta+Malar:200,300,400,500,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Overpass+Mono:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Overpass:100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,500,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,500,700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700" rel="stylesheet">

        <!-- My Style Sheets -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/masthead.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="css/contact_style.css">
       
    </head>

<body>
    <?php 
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
                $error = "your name";
                $errorfield = "fullname";
            }
          } else {
              $error = "your full name";
              $errorfield = "fullname";
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
    </head>
    <body style="font-size:16px; font-family:sans-serif; color:#000000">
    
EOD;
    
    $message .= "<div style='color:#000000;padding:10px;border:1px solid #eeeeee;'>";
    $message .=  "<h1>A Message from the Contact Form of DDWorks</h1>";
    $labelIndex = 0;
    
    $message .= "<p>Full Name: ".$data['fullname']."</p>";
    $message .= "<p>Email: ".$data['email']."</p>";
    $message .= "<p>Message: ".$data['message']."</p>";
    
    $message .= "</div><br>End of contact form message.<br></body></html>";
    
 
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    

    $headers .= 'From: <info@ddworks.org>' . "\r\n";
    
    mail($to,$subject,$message,$headers);
    
}
    

    ?>
    
<h1>Welcome</h1>
 



</body>


</html>

