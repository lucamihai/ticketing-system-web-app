<?php
    session_start();

    include("../SQL/DatabaseConnection.php");

    $username = mysqli_real_escape_string($SQLConnection, $_POST['username']);
    $email = mysqli_real_escape_string($SQLConnection, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $firstname = mysqli_real_escape_string($SQLConnection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($SQLConnection, $_POST['lastname']);

    $checkForExistingUserQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($SQLConnection, $checkForExistingUserQuery);

    if (mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);
        $usernameFromDB = $row['username'];
        $emailFromDB = $row['email'];

        if ($username == $usernameFromDB)
            $_SESSION['SignUpErrorUsername'] = "The username is already taken";
        if ($email == $emailFromDB)
            $_SESSION['SignUpErrorEmail'] = "The email is already used";

        $_SESSION['usernameRestore'] = $username;      
        $_SESSION['emailRestore'] = $email;
        $_SESSION['firstnameRestore'] = $firstname;
        $_SESSION['lastnameRestore'] = $lastname;

        header("refresh:0;url=../dashboard.php");
    }
    else{
        $registrationQuery = "INSERT INTO users (username, first_name, last_name, email, password ) VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";
        mysqli_query($SQLConnection, $registrationQuery);

        header("refresh:0;url=../dashboard.php");
    }
?>