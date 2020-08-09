<?php 
     switch($_SESSION["datasource"]) {
          case "local": 
              // echo "<h1>Establishing a local DB Connection</h1>";
               define("DB_HOST",  "localhost" );
               define("DB_USER",  "bartdority");
               define("DB_PW",    "indiGlow79");
               define("DB_NAME",  "ddw_tiny"); 
               break;
          case "live":
              // echo "<h1>Establishing DB Connection from the Server</h1>";
               define("DB_HOST",  "mysql.ddworks.org" );
               define("DB_USER",  "bartdority79");
               define("DB_PW",    "IjlB4324j");
               define("DB_NAME",  "ddw_tiny"); 
               break;
          default:
               break;
     }

?>