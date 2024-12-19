<?php 
    include "connect/db.php";
    include "connect/fun.php";

    $conn = new connect();
    $fun = new fun($conn->dbconnect());

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `enquiry` WHERE `id` = '$id'";
        $delete = mysqli_query($conn->dbconnect(), $sql);
        header("location:enquiries.php?msg=Enquiry Deleted Successfully");
    }

?>