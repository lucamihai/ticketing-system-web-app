<?php
    $error = false;
    
    if (isset($_SESSION['LogInErrorCombination'])){
        $error = true;
        echo "<div>".$_SESSION['LogInErrorCombination']."</div>";
    }
    
    if ($error){

        $_SESSION['LogInErrorCombination'] = "";

        $identifierRestore = $_SESSION['identifierRestore'];

        echo "<script>ReenterLogInValues('$identifierRestore');</script>";
    }
    
?>