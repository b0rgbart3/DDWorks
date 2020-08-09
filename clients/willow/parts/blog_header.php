<html>
<head>
<?php include_once "parts/shared_head.html"; ?>
<script>
function copyFunction() {
  var copyText = document.getElementById("pageUrl");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("The url for this page has been copied to your clipboard: " + copyText.value + 
  "\n You can now paste it into an email or social media post.");
}
</script>
</head>
<body>
 <?php include_once "parts/header.php"; ?>

<img src='images/butterflies.jpg' class='mainpic'>
<div class='content'>
    <a href='magic-of-love-blog.php' name='blog'><h1>The Magic of Love Blog</h1></a>
    
    <div class='postMenu'>
        <ul>
        <a href='12_17_2019.php#blog'><li>How it all Began: a 30 year journey<br>
        <span class='blogpostdate'>December 17, 2019</span> </li></a> 
        <a href='06_27_2019.php#blog'><li>Complex Grief: Navigating 
        Deep Waters in a Social Media World<br>
        <span class='blogpostdate'>June 27, 2019</span> 
    </li>

        </ul>
    </div>