<?php
//echo "DataSource is set to: " .$_SESSION["datasource"] . "<br><br>";

// Set the CSS Classes to turn on and off the Live / Local Buttons
$liveswitch_class="db_choice ";
$localswitch_class="db_choice ";

// if ($_SESSION["db"]) {
//     echo "connected.<br><br><br>";
// } else {
//     echo "disconnected.<br><br><br>";
// }
if ($datasource=="live") {
    $liveswitch_class .= "chosen";
    $localswitch_class .= "unchosen";
    if ($_SESSION["db"]) {
        $liveswitch_class .= " connected";
    } else {
        $liveswitch_class .= " disconnected";
    }
} else {
    $liveswitch_class .= "unchosen";
    $localswitch_class .= "chosen";
    if ($_SESSION["db"]) {
        $localswitch_class .= " connected";
    } else {
        $localswitch_class .= " disconnected";
    }
}

?>

<!-- Toggle Buttons for Which Database to use -->
<a href='switch_db_to_local.php' 
class="<?php echo $localswitch_class; ?>">
Local DB</a>
<a href='switch_db_to_live.php' 
class="<?php echo $liveswitch_class; ?>"
>Live DB</a><br>
<br>