<?php 
    session_start();
    //
    //if the user is logged in, redirect to dashboard
    if (isset($_SESSION['username'])){
        header("refresh:0;url=dashboard.php");
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticketing System</title>
    <link rel="stylesheet" href="CSS/layout.css">
    <link rel="stylesheet" href="CSS/login+signup.css">
    <script src="scripts/LoginAndSignUp.js"></script>
</head>

<body>
    <div id="top">
        <?php
            $_GET['title'] = "Landing page";
            include("/SeparatePageSections/top.php");           
        ?>
    </div>
    
    <div id="menu">
        <?php
            include("/SeparatePageSections/menu.php");
        ?>
    </div>

    <div id="content">
        <div class="formBox">
            <div class="header">
                Login
            </div>
            <form id="Login" onsubmit="return CheckLogin();" action="Handlers/login.php" method="post">
                <label for="email"><b>*</b>Email or Username: </label>
                <input type="text" class="inputIdentifier" name="identifier" placeholder="you@email.com">

                <br>

                <label for="password"><b>*</b>Password: </label>
                <input type="password" class="inputPassword" name="password" placeholder="password">

                <div class="errors">
                    <?php                       
                        include("Handlers/loginErrors.php");
                    ?>
                </div>

                <div class="submitContainer">
                    <input type=submit class="submit" value="Log in">
                </div>
            </form>
        </div>

        <div class="formBox">
            <div class="header">
                Sign up
            </div>
            <form id="SignUp" onsubmit="return CheckSignUp();" action="Handlers/signup.php" method="post">

                <label for="firstname"><b>*</b>First name: </label>
                <input type="text" class="inputFirstName" name="firstname" placeholder="John">

                <br>

                <label for="lastname"><b>*</b>Last name: </label>
                <input type="text" class="inputLastName" name="lastname" placeholder="Smith">

                <br>

                <label for="username"><b>*</b>Username: </label>
                <input type="text" class="inputUsername" name="username" placeholder="username">

                <br>

                <label for="email"><b>*</b>Email: </label>
                <input type="text" class="inputEmail" name="email" placeholder="email@example.com">

                <br>

                <label for="password"><b>*</b>Password: </label>
                <input type="password" class="inputPassword" name="password" placeholder="password">

                <br>

                <label for="confirmpassword"><b>*</b>Confirm password: </label>
                <input type="password" class="inputConfirmPassword" name="confirmpassword" placeholder="same password as above">              

                <div class="errors">
                    <?php                       
                        include("Handlers/signupErrors.php");
                    ?>
                </div>

                <div class="submitContainer">
                    <input type=submit class="submit" value="Sign up">
                </div>               
            </form>
        </div>
        
    </div>
    
</body>

</html>