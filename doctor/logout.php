<?php
session_start();
unset($_SESSION['userid']);


unset($_SESSION['is_valid']);

session_destroy();
header('location:index.php');


?>