<?php 
    include "connect/db.php";
    include "connect/fun.php";

    $conn = new connect();
    $fun = new fun($conn->dbconnect());

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `student` WHERE `id` = '$id'";
        $delete = mysqli_query($conn->dbconnect(), $sql);
        header("location:admitted.php?msg=Student Deleted Successfully");
    }

?>