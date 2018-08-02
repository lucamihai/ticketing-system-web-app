<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "TestDatabase";

    $SQLConnection = mysqli_connect($server, $username, $password, $database);

   if ( !$SQLConnection) {
        echo "Couldn't connect to database...";
   }
?>