<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticketing System</title>
    <link rel="stylesheet" href="CSS/layout.css">
    <link rel="stylesheet" href="CSS/login+signup.css">
</head>

<body onload="FillerText(document.getElementById('content'))">
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
        <?php
            include "/SQL/DatabaseConnection.php";

            $sql="SELECT 1 FROM users";
            $result = mysqli_query($SQLConnection, $sql);
            if (!$result){
                //there's no 'users' table, so there will be one created
                include("SQL/createUsersTable.php");
            }

            $sql = "SELECT * FROM test_users";
            $result = mysqli_query($SQLConnection ,$sql);         
        ?>
        <div class="formBox">
            <div class="header">
                Login
            </div>
            <form action="Handlers/login.php" method="post">
                <label for="email">email: </label>
                <input type="text" name="email" placeholder="email@example.com">

                <br>

                <label for="password">password: </label>
                <input type="password" name="password" placeholder="password">

                <div class="submitContainer">
                    <input type=submit class="submit" value="Log in">
                </div>
            </form>
        </div>

        <div class="formBox">
            <div class="header">
                Sign up
            </div>
            <form action="Handlers/signup.php" method="post">
                <label for="email">Email: </label>
                <input type="text" name="email" placeholder="email@example.com">

                <br>

                <label for="password">Password: </label>
                <input type="password" name="password" placeholder="password">

                <br>

                <label for="confirmpassword">Confirm password: </label>
                <input type="password" name="confirmpassword" placeholder="same password as above">

                <br>

                <label for="firstname">First name: </label>
                <input type="text" name="firstname" placeholder="John">

                <br>

                <label for="lastname">Last name: </label>
                <input type="text" name="lastname" placeholder="Smith">

                <br>

                <div class="submitContainer">
                    <input type=submit class="submit" value="Sign up">
                </div>               
            </form>
        </div>
        
        
    </div>

</body>

</html>