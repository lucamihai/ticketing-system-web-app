<?php
    session_start();
    session_destroy();

    echo "Succesfully logged out";

    header("refresh:1;url=../index.php");
?>