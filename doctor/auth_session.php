<?php
    session_start();
    if(!$_SESSION['is_start']) {
        header("Location: index.php?msg=Please Login First");
        exit();
    }
?>