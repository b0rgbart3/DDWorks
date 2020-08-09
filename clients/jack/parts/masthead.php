<?php ?>
<div class='header'>
  <div class='socials'>
    <div id='social_fb' class='social_icon'><img src='images/social/facebook.svg'></div>
    <!-- <div id='social_twitter' class='social_icon'><img src='images/social/twitter.svg'></div>
    -->
    <div id='email_contact' class='social_icon'><img src='images/social/email2.svg'></div>

    <div id='social_instagram' class='social_icon'><img src='images/social/instagram.svg'></div>
  </div>
<div class='logo' id='logo'>Jack Davis <span style="color:pink;">Art</span></div>
<div class='navigationBar group'>
  <div class='burger group' onclick='myFunction(this)'>
    <div class='bar1'></div>
    <div class='bar2'></div>
    <div class='bar3'></div>
  </div>
<ul>
<li class='catalog_link'>catalog</li>
<?php if (!$contact_success) {
    echo "<li class='contact_nav_link'>contact</li>";
}
?>
<li class='bio_link'>biography</li>
</ul>
</div>
<div class='mobileMenu' id='mobileMenu'>
<ul>
<li class='catalog_link'>catalog</li>
<?php if (!$contact_success) {
    echo "<li class='contact_nav_link'>contact</li>";
}
?>
<li class='bio_link'>biography</li>
</ul>

</div>