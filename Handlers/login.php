<?php
    include("../SQL/DatabaseConnection.php");

    $identifier = mysqli_real_escape_string($SQLConnection, $_POST['identifier']);
    $password = $_POST['password'];

    $checkForExistingEmail = "SELECT * FROM users WHERE email = '$identifier'";
    $result = mysqli_query($SQLConnection, $checkForExistingEmail);

    if (mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);
        $dbPasswordHash = $row['password'];

        if (password_verify($password, $dbPasswordHash)){
            echo "Log In was successful (with email)";
            return;
        }   
    }

    $checkForExistingUsername = "SELECT * FROM users WHERE username = '$identifier'";
    $result = mysqli_query($SQLConnection, $checkForExistingUsername);
        
    if (mysqli_num_rows($result) > 0){  

        $row = mysqli_fetch_assoc($result);
        $dbPasswordHash = $row['password'];

        if (password_verify($password, $dbPasswordHash)){
            echo "Log In was successful (with username)";
            return;
        }
    }  
    
    echo "The user doesn't exist or the password you've entered is incorrect";
?>