<?php 
    session_start(); 

    //if the user isn't logged in, redirect to login / signup page
    if(!isset($_SESSION['username'])){
        header("refresh:0;url=index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/layout.css">
    <title>Dashboard</title>
</head>
<body>
    <div id="top">
        <?php
            $_GET['title'] = "Dashboard";
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
            $userType;
            if ($_SESSION['user_type'] == '0')
                $userType = "customer";
            if ($_SESSION['user_type'] == '1')
                $userType = "agent";
            if ($_SESSION['user_type'] == '2')
                $userType = "admin";

            echo "<p style='text-align: center;'>Welcome</p>";
            echo "<p style='text-align: center;'>User type: $userType</p>";
        ?>
    </div>
</body>
</html>