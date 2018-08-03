<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "ticketing_system_db";

    $SQLConnection = mysqli_connect($server, $username, $password);

    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    mysqli_query($SQLConnection, $sql);

    $SQLConnection = mysqli_connect($server, $username, $password, $database);

    if ( !$SQLConnection) {
        echo "Couldn't connect to database...";
    }
?>