<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dority Design Works</title>
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1:300,500,900" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='js/external/jquery.visible.min.js'></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
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

<style>
    .response {
        width:90%;
        background-color:#ccffcc;
        padding:20px;
        border-radius:0px;
        text-align:center;
    }
    </style>
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
          if (isset($_POST['lastname'])) {
            $lastname = trim($_POST['lastname']);
            if ($lastname=='') {
                $error = "your lastname";
                $errorfield = "lastname";
            }
          } else {
              $error = "your lastname";
              $errorfield = "lastname";
          }
          if (isset($_POST['firstname'])) {
             $firstname = trim($_POST['firstname']);
           // echo "Your firstname: " . $firstname. "<br>";
            if ($firstname == '') {
                $error = "your firstname";
                $errorfield = "firstname";
            }
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
    <li class='nav-choice' data-number='4' data-shortname='apps'>application development</li>
    <li class='nav-choice' data-number='2' data-shortname='webdesign'>web design &amp; development</li>
    <li class='nav-choice' data-number='3' data-shortname='wordpress'>wordpress websites</li>
    <li class='nav-choice' data-number='5' data-shortname='graphics'>graphic design</li>
    <li class='nav-choice' data-number='6' data-shortname='logos'>logo design</li>
    <li class='nav-choice' data-number='7' data-shortname='animation'>animation</li>
    <!-- <li class='nav-section'>CODE</li> -->
    <!-- <li class='nav-choice' data-number='0' data-shortname='current'>current projects</li> -->
  
   
<!--     
    <li class='nav-section'></li> -->
    <li class='nav-choice' data-number='8' data-shortname='contact'>contact</li>
    <li class='nav-choice' data-number='-1' data-shortname='home'>home</li>
    </ul>
    </div>

            </div>
    </div>
    <?php 
if ($datareceived) {
    echo "<div class='response'><p>Thank you for contacting us. <br>We will be in touch shortly.<br></div>";
    $datareceived = false;
}
?>
    <div class='innercontent group'>
       <div class='projects group' id='collection'>
        <img src='images/interface/loading.gif'>
    </div>
</div>

<div class='footerWrapper'>
    <div class='footer group'>

        <div class='footerMenu group'>
            <h1>Services:</h1>

        <!-- <img src='images/interface/ddw_wide_type.svg' class='wide_logotype'> -->
        <ul class='group'>
        <!-- <li class='nav-choice' data-number='0' data-shortname='current'>current projects</li> -->
        <li class='nav-choice' data-number='4' data-shortname='apps'>application development</li>
        <li class='nav-choice' data-number='2' data-shortname='webdesign'>web design + development</li>
        <li class='nav-choice' data-number='3' data-shortname='wordpress'>custom wordpress themes</li>
        <li class='nav-choice' data-number='5' data-shortname='graphics'>graphic design</li>

    

        </ul>
        <!-- <div class='connectionFrame'>
    <div class='connection' data-number='8' data-shortname='contact'>contact</div>-->
</div> 

<br clear='all'>
<style>
input[type='text'].error {
    border:2px solid #5fff2f;
}
.contactForm {
    width:100%;
    margin-left:auto;
    margin-right:auto;
    box-sizing: border-box;
   /* background-color:#aaaaaa; */
    max-width:1200px;
    padding-left:20px;
    margin-top:40px;
    padding-top:20px;
    padding-left:5%;
    padding-bottom:150px;
    background-color:rgba(0,0,0,.07);
}
    input[type='submit'] {
        padding:20px;
        background-color:#444444;
        color:white;
        font-weight:bold;
        text-transform: uppercase;
        margin-top:30px;
        margin-bottom:10px;
        padding-left:40px;
        padding-right:40px;
        border-radius:1px;
        border:2px solid #888888;
        position:relative;
        outline:none;
        box-shadow:1px 1px 4px rgba(0,0,0,.25);
        cursor:pointer;
        user-select: none;
        font-size:1em;
        border:none;
    }
    input[type='submit']:hover {
        background-color:#5fff2f;
        color:black;
        outline:none;
        border:none;
    }
    input[type='submit']:active {
        background-color:#5fff2f;
        color:black;
        border-color:#5fff2f;
        top:2px;
        left:2px;
        outline:none;
        border:none;
    }
    input[type='text'] {
        border:none;
        border-radius:6px;
        display:block;
        width:90%;
        box-sizing:border-box;
        background-color:rgba(255,255,255,.4);
        cursor: pointer;
        /* box-shadow:0 0 19px rgba(0,0,0,.2); */
        font-family: 'Roboto Condensed', sans-serif;
        font-size:1.7em;
        padding:8px;
        padding-bottom:4px;
        color:black;
        box-sizing: border-box;
        
    }
    .namefield {
        text-transform:capitalize;
    }
    input[type='text']:active, input[type='text']:focus  {
        outline-color:#5fff2f;
        background-color:white;
    }
    textarea.error {
        border:2px solid #5fff2f;
    }
    textarea {
        width:90%;
        box-sizing:border-box;
        border:none;
        /* box-shadow:0 0 19px rgba(0,0,0,.2); */
        border-radius:6px;
        background-color:rgba(255,255,255,.4);
        padding:12px;
        font-family: 'Roboto Condensed', sans-serif;
        font-size:1.4em;
        color:black;
        box-sizing: border-box;

    }
    textarea:active, textarea:focus {
        outline-color:#5fff2f;
        background-color:white;
    }
    label {
        display:block;
        margin-bottom:.4em;
        text-transform:uppercase;
        color:#777777;
        margin-top:11px;
        font-size:.9em;

    }
    img.write_icon {
        box-shadow:none;
        float:left;
        display:inline-block;
        width:30%;
        max-width:180px;
        box-sizing: border-box;
        margin-left:5%;
       padding:0;
       vertical-align: top;
    
       margin-top:0;
    }

    .notify {
        color:#555555;
    }

    .contactForm p {
        line-height:2em;
        padding-top:0;
        margin-top:0;
        font-style:italic;
        font-weight:bold;
    }

    .inputFrame {
        background-color:rgba(255,255,255,.3);
        padding:35px;
        border-radius:8px;
        box-shadow:1px 1px 18px rgba(0,0,0,.4);
        padding-top:40px;
        
    }
    .inputs {
        width:100%;
        /* border-right:4px solid #aaaaaa; */
        max-width:650px;
       
    }
</style>
    <!-- <img src='images/interface/ideas.svg' class='write_icon'> -->
    <a name = 'contact'></a>
<form class='contactForm' method='post' action="index.php" enctype="multipart/form-data">
<h1>Contact Dority Design Works:</h1>  
<br>
        <!-- <p>Have an idea?  &nbsp;Send me a message about it. &nbsp;We can build it.</p> -->
    <div class='inputs'>
    <label name='firstname'>First Name</label>
    <input type='text' name='firstname' id='firstname' class='namefield'>
    <p class='notify'></p>

    <br clear='all'>
    <label name='lastname'>Last Name</label>
    <input type='text' name='lastname' id='lastname' class='namefield'>
    <p class='notify'></p>

    <br clear='all'>
    <label name='email'>Email</label>
    <input type='text' name='email' id='email'>
    <p class='notify'></p>
   
    <br clear='all'>
    <label name='message'>Message</label>
    <textarea name='message' id='message' cols='60' rows='6'></textarea>
    <p class='notify'></p>
    <br clear='all'>
    <input type='submit' name='submit' value='send' id='send'>
</div>
</form>

<script>
let checkValidity = function(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


$('#firstname').on('change', function() {
    $('#firstname').removeClass('error');
});
$('#lastname').on('change', function() {
    $('#lastname').removeClass('error');
});
$('#email').on('change', function() {
    $('#email').removeClass('error');
});
$('#message').on('change', function() {
    $('#message').removeClass('error');
});
$('#send').on('click', function(event) {

    let firstName = $('#firstname').val();
    let lastName = $('#lastname').val();
    let email = $('#email').val();
    let message= $('#message').val();

    let notice = $("#firstname").next('.notify');
    if (!firstName) {
        $('#firstname').addClass('error');
        
        notice.text("Please include your first name.");
    } else {
        notice.text("");
    }
    
    notice = $("#lastname").next('.notify');
    if (!lastName) {
        $('#lastname').addClass('error');
        notice.text("Please include your last name.");
    } else {
        notice.text("");
    }
    notice = $("#email").next('.notify');
    let validemail=false;
    if (!email) {
        $('#email').addClass('error');
        notice.text("Please include your email address.");
    } else {
        validemail = checkValidity(email);
        if (!validemail) {
            $('#email').addClass('error');
    
        notice.text("Please include a valid email address.");
        } else {
            notice.text("");
        }
    }
    notice = $("#message").next('.notify');
    if (!message) {
        $('#message').addClass('error');
        notice.text("Please include a message.");
 
    } else {
        notice.text("");
    }


    if( !firstName || !lastName || !email || !message || !validemail) {
        event.preventDefault();
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    }

});

</script>


</div>
</div></div></body>
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

$message .= "<p>Firstname: ".$data['firstname']."</p>";
$message .= "<p>Lastname: ".$data['lastname']."</p>";
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

