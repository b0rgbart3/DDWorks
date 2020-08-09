<?php
if (!isset($_SESSION["datasource"])) {
    // Set this as the inital state if there is no current value
  $_SESSION["datasource"] = "live";  
}
$datasource = $_SESSION["datasource"];

?>
