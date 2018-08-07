<?php
    session_start();
    session_destroy();

    echo "Succesfully logged out";

    header("refresh:0;url=../index.php");
?>