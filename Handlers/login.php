<?php
    session_start();

    include("../SQL/DatabaseConnection.php");

    $loggedIn = false;

    $identifier = mysqli_real_escape_string($SQLConnection, $_POST['identifier']);
    $password = $_POST['password'];

    $checkForExistingEmail = "SELECT * FROM users WHERE email = '$identifier'";
    $result = mysqli_query($SQLConnection, $checkForExistingEmail);

    if (mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);
        $dbPasswordHash = $row['password'];

        if (password_verify($password, $dbPasswordHash)){

            $username = $row['username'];
            $email = $row['email'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $usertype = $row['user_type'];

            UserLogin($username, $email, $firstname, $lastname, $usertype);

            $loggedIn = true;
        }   
    }

    $checkForExistingUsername = "SELECT * FROM users WHERE username = '$identifier'";
    $result = mysqli_query($SQLConnection, $checkForExistingUsername);
        
    if (mysqli_num_rows($result) > 0){  

        $row = mysqli_fetch_assoc($result);
        $dbPasswordHash = $row['password'];

        if (password_verify($password, $dbPasswordHash)){

            $username = $row['username'];
            $email = $row['email'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $usertype = $row['user_type'];

            UserLogin($username, $email, $firstname, $lastname, $usertype);

            $loggedIn = true;
        }
    }
    
    if ($loggedIn){
        header("refresh:0;url=../dashboard.php");       
    }

    else{
        $_SESSION['LogInErrorCombination'] = "Combination not found";
        $_SESSION['identifierRestore'] = $identifier;

        header("refresh:0;url=../index.php"); 
    }
?>

<?php
    function UserLogIn($username, $email, $firstname, $lastname, $usertype) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $firstname;
        $_SESSION['last_name'] = $lastname;
        $_SESSION['user_type'] = $usertype;
    }
?>