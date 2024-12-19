<?php 
    include "connect/db.php";
    include "connect/fun.php";

    $conn = new connect();
    $fun = new fun($conn->dbconnect());

    if(isset($_GET["completed"])){
        $id = $_GET["id"];
        $sql = "UPDATE `aesthatic_appointment` SET `status` = 'Completed' WHERE `id` = '$id'";
        $update = mysqli_query($conn->dbconnect(), $sql);
        header("location: appointments.php?aesthatic&msg=Marked as complete");
    }
    else if(isset($_GET["cancel"])){
        $id = $_GET["id"];
        $sql = "UPDATE `aesthatic_appointment` SET `status` = 'Cancel' WHERE `id` = '$id'";
        $update = mysqli_query($conn->dbconnect(), $sql);
        header("location: appointments.php?aesthatic&msg=Marked as Cancelled");
    }
    else if(isset($_GET["reschedule"])){
        $id = $_GET["id"];
        $sql = "UPDATE `aesthatic_appointment` SET `status` = 'Reschedule' WHERE `id` = '$id'";
        $update = mysqli_query($conn->dbconnect(), $sql);
        header("location: appointments.php?aesthatic&msg=Marked as Rescheduled");
    }
    else{
        header("location: appointments.php?aesthatic&msg=Something went wrong");
    }
?>