<?php
    include("../SQL/DatabaseConnection.php");

    $username = mysqli_real_escape_string($SQLConnection, $_POST['username']);
    $email = mysqli_real_escape_string($SQLConnection, $_POST['email']);
    $password = $_POST['password'];
    $firstname = mysqli_real_escape_string($SQLConnection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($SQLConnection, $_POST['lastname']);

    $checkForExistingUserQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($SQLConnection, $checkForExistingUserQuery);

    if (mysqli_num_rows($result) > 0){
        echo "user is already registered";
    }
    else{
        $registrationQuery = "INSERT INTO users (username, first_name, last_name, email, password ) VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";
        mysqli_query($SQLConnection, $registrationQuery);
        echo "succes";
    }
?>