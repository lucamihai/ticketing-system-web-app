<?php
    $error = false;
    if (isset($_SESSION['SignUpErrorUsername'])){
        $error = true;
        echo "<div>".$_SESSION['SignUpErrorUsername']."</div>";
    }
    if (isset($_SESSION['SignUpErrorEmail'])){
        $error = true;
        echo "<div>".$_SESSION['SignUpErrorEmail']."</div>";
    }
    
    if ($error){

        $_SESSION['SignUpErrorUsername'] = "";
        $_SESSION['SignUpErrorEmail'] = "";

        $firstnameRestore = $_SESSION['firstnameRestore'];
        $lastnameRestore = $_SESSION['lastnameRestore'];
        $usernameRestore = $_SESSION['usernameRestore'];
        $emailRestore = $_SESSION['emailRestore'];

        echo "<script>ReenterSignUpValues('$firstnameRestore', '$lastnameRestore', '$usernameRestore', '$emailRestore');</script>";
    }
    
?>