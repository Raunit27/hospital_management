<?php
    session_start();
    if(!isset($_SESSION["username"])&& !$_SESSION['is_valid']) {
        header("Location: index.php");
        exit();
    }
    
?>