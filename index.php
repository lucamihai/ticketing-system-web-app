<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/layout.css">

</head>

<body onload="FillerText(document.getElementById('content'))">
    <div id="top">
        <?php
            $_GET['title'] = "Interesting way of passing parameters";
            $server = $_SERVER['SERVER_NAME']."/homepage";
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
            include "/SQLConnections/TestDatabase.php";

            $sql = "SELECT * FROM test_users";
            $result = mysqli_query($SQLConnection ,$sql);

            echo "<h1>Hello there</h1>";           
        ?>
    </div>
    <script>
        //var content=document.getElementById("content");
        //for ( var i = 0; i < 100; i++) {
        //    content.innerHTML += "<p>ceva</p>";
        //}
    </script>

</body>

</html>