<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "ticketing_system_db";

    $SQLConnection = mysqli_connect($server, $username, $password);

    //-------------your desired admin user data----------------
    $adminUsername = "admin";                   //shouldn't be empty
    $adminEmail = "admin@ticketingsystem.com";  
    $adminFirstName = "FirstName";
    $adminLastName = "LastName";    
    $adminPassword = "password";                //shouldn't be empty
    //---------------------------------------------------------

    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    mysqli_query($SQLConnection, $sql);

    $SQLConnection = mysqli_connect($server, $username, $password, $database);

    if ( !$SQLConnection) {
        die("Couldn't connect to database...");
    }

    //-------------if there's no users table, create one-------
    $sql = "SELECT 1 FROM users";
    $result = mysqli_query($SQLConnection, $sql);

    if (!$result){
        include("createUsersTable.php");
    } 
    //---------------------------------------------------------
    
    //-------------if there's no admin, create one-----------------
    $sql = "SELECT * FROM users WHERE user_type = '2'";
    $result = mysqli_query($SQLConnection, $sql);

    if (mysqli_num_rows($result) == 0){

        //-------------escaping admin user data--------------------
        $adminUsername = mysqli_real_escape_string($SQLConnection, $adminUsername);
        $adminEmail = mysqli_real_escape_string($SQLConnection, $adminEmail);
        $adminFirstName = mysqli_real_escape_string($SQLConnection, $adminFirstName);
        $adminLastName = mysqli_real_escape_string($SQLConnection, $adminLastName);
        $adminPassword = password_hash($adminPassword, PASSWORD_BCRYPT);
        //---------------------------------------------------------

        $createAdminQuery = "INSERT INTO users 
        (username, first_name, last_name, email, password, user_type)
        VALUES  ('$adminUsername', '$adminFirstName', '$adminLastName', '$adminEmail', '$adminPassword', '2')";

        mysqli_query($SQLConnection, $createAdminQuery);
    } 
    //---------------------------------------------------------
?>