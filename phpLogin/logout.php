<?php 
        $_SESSION = array();
        setcookie("PHPSESSID", "", time() - 3600, "/");
        session_destroy();   
        header('location: ../2LOGIN.php');
?>