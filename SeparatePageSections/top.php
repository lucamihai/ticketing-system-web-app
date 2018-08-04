<div id="LoginStatus">
    <?php
        if (isset($_SESSION['username'])){
            echo "<div>";
            echo "You're logged in with ".$_SESSION['username'];
            echo "</div>";
            echo "<form style='text-align: right' action='Handlers/logout.php' method='post'>";
            echo "<input type='submit' value='Log out'>";
            echo "</form>";
        }
        else{
            echo "<div>";
            echo "You're not logged in";
            echo "</div>";
        }
    ?>
</div>
<h1 id="title">
    <?php echo $_GET['title']; ?>
</h1>
