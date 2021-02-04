<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dority Design Works</title>
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,500,900" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='js/external/jquery.visible.min.js'></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
        <script src='js/TweenLite.js'></script>
        <script src='js/TimelineLite.js'></script>
        <script src='js/TimelineMax.js'></script>
        <script src='js/TweenMax.js'></script>
        <!-- Using Require JS to load in multiple JS modules -->
        <script src='js/external/require.js' data-main='js/base'></script>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/masthead.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/design.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mukta+Malar:200,300,400,500,600,700,800" rel="stylesheet">
        <!-- <link rel="stylesheet" href="//brick.freetls.fastly.net/Aileron:100,200,300,400,600,700,800,900"> -->
        <link href="https://fonts.googleapis.com/css?family=Overpass+Mono:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Overpass:100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,500,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
       
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700" rel="stylesheet">
<script src='intro1.js'></script>

<?php 



$fullname = '';

$email = '';
$msg = '';
$error = '';
$errorfield = "";
$datareceived = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['submit']))
    {
        echo "Thank you for you for contacting us.";
        if (isset($_POST['msg'])) {
            $msg = trim($_POST['msg']);
            if ($msg=='') {
                $errorfield = "msg";
                $error = "a message";
            }
          } else {
            $errorfield = "msg";
              $error = "a message";
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
            if ($lastname=='') {
                $error = "your fullname";
                $errorfield = "fullname";
            }
          } else {
              $error = "your fullname";
              $errorfield = "fullname";
          }
         

            if ($error == '') {
                $datareceived = true;

                $data = [];
                $data['fullname'] = $fullname;
                $data['email'] = $email;
                $data['msg'] = $msg;
                
                sendContactMessage($data);
            } 
            else {
                echo $error;
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
?>
</head>

    <body>

    <div class='mastContainer group'>
            <div class='mast group'>
                <div class='logo group'>
                    <img src='images/interface/logo.svg' class='ddwLogo'>
                </div>

                <div class='burger group'>
                    <div class='burgerIcon'></div>
                </div>
            </div>

            <div class='title-tag main-title-tag'></div> 
    <div class='burgerNav group noselect'>
    <ul class='navChoices group noselect'>
    <!-- <li class='nav-section'>GRAPHICS</li> -->
    <li class='nav-choice' data-number='5' data-shortname='graphics'>graphic design</li>
    <li class='nav-choice' data-number='6' data-shortname='logos'>logo design</li>
    <li class='nav-choice' data-number='7' data-shortname='animation'>animation</li>
    <!-- <li class='nav-section'>CODE</li> -->
    <!-- <li class='nav-choice' data-number='0' data-shortname='current'>current projects</li> -->
    <li class='nav-choice' data-number='2' data-shortname='webdesign'>web design &amp; development</li>
    <li class='nav-choice' data-number='3' data-shortname='wordpress'>wordpress websites</li>
    <li class='nav-choice' data-number='4' data-shortname='apps'>application development</li>
<!--     
    <li class='nav-section'></li> -->
    <li class='nav-choice' data-number='8' data-shortname='contact'>contact</li>
    <li class='nav-choice' data-number='-1' data-shortname='home'>home</li>
    </ul>
    </div>

            </div>
    </div>
    <div class='innercontent group'>
       <div class='projects group' id='collection'>
        <img src='images/interface/loading.gif'>
    </div>
</div>
<div class='footerWrapper'>
    <div class='footer group'>

        <div class='footerMenu'>
            <h1>Services:</h1>

        <!-- <img src='images/interface/ddw_wide_type.svg' class='wide_logotype'> -->
        <ul>
        <!-- <li class='nav-choice' data-number='0' data-shortname='current'>current projects</li> -->
        <li class='nav-choice' data-number='5' data-shortname='graphics'>graphic design</li>
         <li class='nav-choice' data-number='2' data-shortname='webdesign'>web design + development</li>
    <li class='nav-choice' data-number='3' data-shortname='wordpress'>custom wordpress themes</li>
    <li class='nav-choice' data-number='4' data-shortname='apps'>application development</li>
    

        </ul>
        <div class='connectionFrame'>
    <div class='connection' data-number='8' data-shortname='contact'>contact</div>
</div>
</div></div></div></body>
   </html>

   <?php
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

$message .= "<p>Fullname: ".$data['fullname']."</p>";
$message .= "<p>Email: ".$data['email']."</p>";
$message .= "<p>Message: ".$data['msg']."</p>";

$message .= "</div><br>End of contact form message.<br></body></html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@ddworks.org>' . "\r\n";
//$headers .= 'Bcc: bartdority@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

}

?>

